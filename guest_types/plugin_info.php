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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_guest_types
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"guest_types",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds a new button to the manager's toolbar which allows the creation of customer/guest types such as Adults and Children. This functionality allows you to offer different discounts for different guest types, so for example you can create a OAP (Old Age Pensioner. Is that still PC? I hope so) guest type and offer a percentage discount off the normal cost of a room.",
			"version"=>(float)"4.5",
			"description"=> " Adds a new button to the manager's toolbar which allows the administration of customer/guest types. This plugin is required if you want to charge per person per night.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/255-guest-types',
			'change_log'=>'1.7 Modifications to bring plugin in line with Jr7.1 for SRPs and jquery ui templates. v1.8 Made changes in support of the Text Editing Mode in 7.2.6. v1.9 Removed references to Token functionality that is no longer used. v2.0 Removed references to Jomres URL Token function. v2.1  Added code supporting new Array Caching in Jomres. v2.2 Added BS3 templates. v2.3  Moved templates from core Jomres into plugin template dirs. v2.4 updated action toolbars. v2.5 Fixed issues with publish buttons and various template tweaks. v2.6 Jomres 8.1.4 adds the is_child flag to the customertypes table, this plugin updated to reflect that flag. v2.7 BS3 template related changes. v2.8 PHP7 related maintenance. v2.9 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v3.0 Fixed a bug where posneg was saved incorrectly. v3.1 Jomres 9.7.4 related changes v3.2 Remaining globals cleanup and jr_gettext refactor related changes. v3.3 jr_gettext tweaks. v3.4 Modified plugin to use new Guest Types class in 9.8. v3.5 Guest types have been converted to classes. v3.6 Fixed a notice that can appear on real estate properties if site set to Development. v3.7 Changed how an id is reset. v3.8 Guest type scripts renumbered to 06002 task numbers. v3.9 Menu options updated for menu refactor in v9.8.30 v4.0 Instructions added to page to provide guidance to managers. v4.1 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v4.2 Language file updated. v4.3 Fixed an issue with missing language strings. v4.4 CSRF hardening added. v4.5 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_ed22s.png',
			'demo_url'=>''
			);
		}
	}
