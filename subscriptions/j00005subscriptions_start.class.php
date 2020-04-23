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

class j00005subscriptions_start
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
	
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		//if subscriptions are not enabled, no need to go any further
		if ( (int)$jrConfig[ 'useSubscriptions' ] == 0 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
		
		//admin menu item
		if (jomres_cmsspecific_areweinadminarea())
			{
			$jomres_menu->add_admin_item(30, jr_gettext('_JOMRES_STATUS_SUBSCRIPTIONS', '_JOMRES_STATUS_SUBSCRIPTIONS', false), $task = 'list_subscriptions', 'fa-plus');
			$jomres_menu->add_admin_item(30, jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', false), $task = 'list_subscription_packages', 'fa-list');
			}
		else
			{
			if ( $thisJRUser->accesslevel >= 1 && $thisJRUser->accesslevel < 90) 
				{
				$jomres_menu->add_item(10, jr_gettext('_SUBSCRIPTIONS_MY', '_SUBSCRIPTIONS_MY', false), 'my_subscriptions', 'fa-list');
				}
			}

		if ( jomres_cmsspecific_areweinadminarea() && !AJAXCALL )
			{
			$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
			
			if (empty($basic_subscription_package_details->allPackages))
				{
				$souput      = array ();
				$spageoutput = array ();
				
				$soutput[ 'SUBSCRIPTION_WARNING' ] = jr_gettext('_SUBSCRIPTION_WARNING', '_SUBSCRIPTION_WARNING', false);
	
				$spageoutput[] = $soutput;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'subscription_warning.html' );
				$tmpl->addRows( 'pageoutput', $spageoutput );
				$tmpl->displayParsedTemplate();
				}
			}
	
		//apply the plugins subscription features restrictions for this cms user id
		if ( !jomres_cmsspecific_areweinadminarea() )
			{
			if ( 
				($thisJRUser->userIsRegistered && !$thisJRUser->superPropertyManager && !$thisJRUser->userIsManager) || //new subscriber
				($thisJRUser->userIsManager && $thisJRUser->accesslevel > 50 && !$thisJRUser->superPropertyManager) //higher than receptionist but not super property manager
				)
				{
				$MiniComponents->triggerEvent( '00007' ); 
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
