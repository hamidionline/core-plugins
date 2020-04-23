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

class j06005save_subscription
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
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

		$package_id = (int) jomresGetParam( $_REQUEST, 'package_id', 0 );
		
		//some checks
		if ( $package_id == 0 )
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		if (
			$thisJRUser->firstname == "" &&
			$thisJRUser->surname == "" &&
			$thisJRUser->house == "" &&
			$thisJRUser->street == "" &&
			$thisJRUser->town == "" &&
			$thisJRUser->postcode == "" &&
			$thisJRUser->country == "" &&
			$thisJRUser->email == ""
			)
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=subscribe&id=" . $package_id ), "" );
			exit;
			}

		//get subscription package details
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		$jrportal_subscriptions->package['id'] = $package_id;

		if ( !$jrportal_subscriptions->getSubscriptionPackage() )
			{
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		// Now we need to check and see if this is a freebie package (costs 0). If so, we then need to see if the subscriber is already subscribed to it.
		$subscribing_to_freebie = false;
		if ($jrportal_subscriptions->package['full_amount'] == 0.00)
			$subscribing_to_freebie = true;

		//get this user existing subscriptions
		$jrportal_subscriptions->getSubscriptionsForCmsUserId( $thisJRUser->id );

		//check if the user is subscribed to freebie
		if ( !empty($jrportal_subscriptions->userSubscriptions) )
			{
			foreach ( $jrportal_subscriptions->userSubscriptions as $sub )
				{
				if ( $package_id == $sub->package_id ) //user is already subscribed to this package, no matter if it`s free or not, so we`ll recommend renewals instead.
					{
					$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
					$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', false ) );
					jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
					exit;
					}
				}
			
			//user has already subscribed to some package, so he should use renewals instead
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( jr_gettext( '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', false ) );
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}

		//set the new subscription details
		$jrportal_subscriptions->subscription['cms_user_id']    = $thisJRUser->id;
		$jrportal_subscriptions->subscription['package_id']     = $package_id;
		$jrportal_subscriptions->subscription['raised_date'] 	= date("Y-m-d H:i:s");
		$jrportal_subscriptions->subscription['expiration_date']= date("Y-m-d H:i:s", strtotime("+" . (string)$jrportal_subscriptions->package['frequency'] . " days"));
		$jrportal_subscriptions->subscription['status']         = 0;

		//commit the new subscription
		$jrportal_subscriptions->commitSubscription();

		//set the new invoice details
		jr_import( 'jrportal_invoice' );
		$jrportal_invoice = new jrportal_invoice();
		
		$invoice_data = array();
		$invoice_data['cms_user_id'] 		= $thisJRUser->id;
		$invoice_data['currencycode'] 		= $jrportal_subscriptions->package['currencycode'];
		$invoice_data['subscription']		= 1;
		$invoice_data['subscription_id'] 	= $jrportal_subscriptions->subscription['id'];
		$invoice_data['status']			 	= 3; //pending
		
		//set the price depending if it includes tax or not
		$tax_rate = (float)$jrportal_taxrate->taxrates[ $jrportal_subscriptions->package['tax_code_id'] ][ 'rate' ];
		
		if ((int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] == 1)
			{
			$divisor = ( $tax_rate / 100 ) + 1;
			$price = $jrportal_subscriptions->package['full_amount'] / $divisor ;
			}
		else
			$price = $jrportal_subscriptions->package['full_amount'];

		$line_items = array();
		$line_item_data = array ( 
								 'tax_code_id' => $jrportal_subscriptions->package['tax_code_id'], 
								 'name' => '_JRPORTAL_INVOICES_SUBSCRIPTION', 
								 'description' => '('.$jrportal_subscriptions->package['name'].')', 
								 'init_price' => $price, 
								 'init_qty' => 1, 
								 'init_discount' => 0
								 );
		$line_items[] = $line_item_data;
			
		$jrportal_invoice->create_new_invoice( $invoice_data, $line_items );
		
		//update the subscription with the new invoice id
		$jrportal_subscriptions->subscription['invoice_id'] = $jrportal_invoice->id;
		
		if ($subscribing_to_freebie)
			{
			$jrportal_subscriptions->subscription['status'] = 1;
			
			$jrportal_invoice->mark_invoice_paid();
			}
		
		//update the subscription with the new invoice id and status (if changed)
		$jrportal_subscriptions->commitUpdateSubscription();
		
		if (!$subscribing_to_freebie)
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=list_gateways_for_invoice&invoice_id=".$jrportal_invoice->id ), "" );
			exit;
			}
		else
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=my_subscriptions" ), "" );
			exit;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}