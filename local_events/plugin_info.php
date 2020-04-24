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

class plugin_info_local_events
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"local_events",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Allows site admin to add local events that will be listed underneath the property details. As an added bonus, these local events can be listed on the maps page, showing potential guests the opportunity to see what's happening in the area.",
			"version"=>"5.7",
			"description"=> " Allows site admin to add local events that will be listed in the property details tabs, and if the extended_maps plugin is installed, listed on the map. Can also be called via asamodule/shortcodes : task = show_local_events/show_local_attractions and you can also set the radius through '&radius=100' ",
			"lastupdate"=>"2019/08/13",
			"min_jomres_ver"=>"9.13.0",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/75-local-events',
			'change_log'=>'v3.0  Modified plugin to ensure correct use of jomresURL function. v3.1 modified plugin so that local event tabs are shown after property details tab. v3.2 BS3 template related changes. v3.3 Fixed modals in BS3 v3.4 Improved toolbar rendering. v3.4 Added a check to ensure if property uid is not set then do not attempt to run a particular query. v3.6 PHP7 related maintenance. v3.7 Plugin improved so that local events can be called via asamodule. v3.8 Jomres 9.7.4 related changes v3.9 Jomres 9.7.4 related changes v4.0 Remaining globals cleanup and jr_gettext refactor related changes. v4.1 jr_gettext tweaks. v4.2 Added a default for a return variable. v4.3 Fixed some notice level errors. v4.4 Fixed a query error that can occur when managers have not yet added address details then the property is viewed. v4.5 Added support for new Jomres map markers. v4.6 Removed a function that is obsolete now that we have new image handling functionality. v4.7 Settings moved to Site Configuration, Properties tab. v4.8 Fixed a notification. v4.9 Admin area templates updated. v5.0 Advanced Site Config flag removed. v5.1 Plugin refactored for admin area changes in jr 9.9 v5.2 Changed how variables are detected. v5.3 Node/javascript path related changes.  v5.4 Updated BS3 templates to use https instead of http. v5.5  CSRF hardening added. v5.6 French language file added v5.7 French lang file updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_otdqu.png',
			'demo_url'=>''
			);
		}
		

	}
