<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06005cancel_subscription
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		$subscription_id = (int) jomresGetParam( $_REQUEST, 'id', 0 );
		
		//some checks
		if ( $subscription_id == 0 )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//get subscription details
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		$jrportal_subscriptions->subscription['id'] = $subscription_id;

		if ( !$jrportal_subscriptions->getSubscription() )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		
		//check if this subscription has other than "0: not active" status
		if ($jrportal_subscriptions->subscription['status'] != 0 )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		
		//check if the expiration date is higher than today`s date, otherwise the susbcription is actually expired so we won`t cancel it
		if ( strtotime($jrportal_subscriptions->subscription['expiration_date']) <= strtotime(date('Y-m-d H:i:s')) )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		
		//check if this user is the owner of this subscription
		if ( $jrportal_subscriptions->subscription['cms_user_id'] != $thisJRUser->id )
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		
		$invoice_id = $jrportal_subscriptions->subscription['invoice_id'];

		//delete subscription
		$jrportal_subscriptions->deleteSubscription();

		//cancel invoice
		jr_import( 'jrportal_invoice' );
		$jrportal_invoice = new jrportal_invoice();
		$jrportal_invoice->id = $invoice_id;
		$jrportal_invoice->getInvoice();
		$jrportal_invoice->mark_invoice_cancelled();

		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
		exit;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}