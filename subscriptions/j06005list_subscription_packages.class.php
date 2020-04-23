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

class j06005list_subscription_packages
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
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

		$subscribeIcon = '<img src="' . JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon" />';
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
		
		$output        = array ();
		$pageoutput    = array ();
		$rows          = array ();

		$output[ 'PAGETITLE' ]      = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', false );
		$output[ 'HNAME' ]          = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', false );
		$output[ 'HDESCRIPTION' ]   = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', false );
		$output[ 'HPUBLISHED' ]     = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', false );
		$output[ 'HFREQUENCY' ]     = jr_gettext( '_SUBSCRIPTIONS_HFREQUENCY_DAYS', '_SUBSCRIPTIONS_HFREQUENCY_DAYS', false );
		$output[ 'HFULLAMOUNT' ]    = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', false );

		foreach ( $basic_subscription_package_details->allPackages as $p )
			{
			if ( $p[ 'published' ] != 0 ) //we don`t display unpublished options here
				{
				$r                    = array ();
				$r[ 'ID' ]            = $p[ 'id' ];
				$r[ 'NAME' ]          = jr_gettext( '_JOMRES_CUSTOMTEXT_SUBSCRIPTIONPACKAGES_NAME' . $p[ 'id' ], stripslashes( $p[ 'name' ] ), false, false );
				$r[ 'DESCRIPTION' ]   = jr_gettext( '_JOMRES_CUSTOMTEXT_SUBSCRIPTIONPACKAGES_DESC' . $p[ 'id' ], stripslashes( $p[ 'description' ] ), false, false );
				$r[ 'PUBLISHED' ]     = $p[ 'published' ];
				$r[ 'FREQUENCY' ]     = $p[ 'frequency' ];
	
				//set the price depending if it includes tax or not
				$tax_rate = (float)$jrportal_taxrate->taxrates[ $p['tax_code_id'] ][ 'rate' ];
				
				if ((int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] == 0)
					{
					$tax   = ( $p['full_amount'] / 100 ) * $tax_rate;
					$price = $p['full_amount'] + $tax;
					}
				else
					$price = $p['full_amount'];
				
				$r[ 'FULLAMOUNT' ]    = output_price( $price, $p[ 'currencycode' ] );
	
				$r[ 'SUBSCRIBE_URL' ] = jomresUrl(JOMRES_SITEPAGE_URL . '&task=subscribe&id=' . $p[ 'id' ] );
				$r[ 'HSUBSCRIBE' ]	  = jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', false );
				$rows[ ]              = $r;
				}
			}

		$pageoutput[ ] = $output;
		$tmpl          = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'frontend_list_subscription_packages.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
