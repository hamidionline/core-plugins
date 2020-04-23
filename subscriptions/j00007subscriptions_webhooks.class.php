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

class j00007subscriptions_webhooks
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{ 
			$this->template_touchable = false; 
			return; 
			}
		
		//check if subscriptions are enabled, otherwise we don`t need to go forward
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		//has to be named subscriptions_*, for example subscriptions_extras. This will be used when saving the edit subscriptions package form to get all subscriptions_* post data
		$feature_name = "subscriptions_webhooks";
		
		$subscribable_features = get_showtime("subscribable_features");
		
		if ( is_null ("subscribable_features"))
			$subscribable_features = array();
			
		$subscribable_features [ $feature_name ] = array (
			"minicomponents" => array (
				"06002" => array("webhooks_core", "save_integration", "edit_integration", "delete_integration"),
				"06000" => array("webhooks_core_documentation")
				),
			"name" => $feature_name,
			"friendlyname" => jr_gettext("WEBHOOKS_CORE", 'WEBHOOKS_CORE', false ),
			"friendlydesc" => "",
			"input_type" => "dropdown", //use "dropdown" for a yes/no dropdown, or text for a simple text field
			
			//if the input_type is number, set the min/max values
			"input_min" => "",
			"input_max" => "",
			
			//"subscribe_url" => jomresURL( JOMRES_SITEPAGE_URL . "&task=feature_subscribe&feature_name=".$feature_name ),
			//"not_subscribed_message" => "Sorry, but you are not able to use this feature."
			);

		set_showtime ( "subscribable_features" , $subscribable_features );
		
		//if we`re in the admin area, return here
		if ( jomres_cmsspecific_areweinadminarea() )
			return;

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$basic_subscription_details = jomres_singleton_abstract::getInstance( 'basic_subscription_details' );
		$basic_subscription_details->gatherData($thisJRUser->id);
		
		if ($thisJRUser->accesslevel >= 1) //this subscription feature is applicable only to manager users. also new subscribers that don`t have any properties created.
			{
			if ( isset($basic_subscription_details->package['params'][$subscribable_features[$feature_name]['name']]) && (int)$basic_subscription_details->package['params'][$subscribable_features[$feature_name]['name']] == 0 ) //feature is disabled for this subscription package
				{
				foreach ( $subscribable_features[$feature_name]['minicomponents'] as $eventPoint => $eventDetails )
					{
					foreach ($eventDetails as $eventName) 
						{
						unset( $MiniComponents->registeredClasses[$eventPoint][$eventName] );
						}
					}
				
				//disable menus
				$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

				if (isset($jomres_menu->items['webhooks_core']))
					{
					unset($jomres_menu->items['webhooks_core']);
					}
				
				if (isset($jomres_menu->items['webhooks_core_documentation']))
					{
					unset($jomres_menu->items['webhooks_core_documentation']);
					}
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
