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

class plugin_info_weather
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"weather",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Adds current weather to property details pages.",
			"version"=>(float)"4.6",
			"description"=> "Adds current weather to property details pages.",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			'change_log'=>'v2.0 Weather plugin now requires an API key to be set, this can be done via the Admin -> Portal Openweather menu option. Reworked weather plugin completely to improve output. v2.1 Added user contributed code to make the cache file language specific and tidy up the layout a little. v2.2 PHP7 related maintenance. v2.2 restored a previously working version of the bs3 show weather plugin. v2.4 Updated show weather template. v2.5 Jomres 9.7.4 related changes v2.6 Remaining globals cleanup and jr_gettext refactor related changes. v2.7 jr_gettext tweaks. v2.8 Fixed some notice level errors. v2.9 Modfied plugin to output that API not set yet if true. v3.0 shortcode data updated. v3.1 updated caching to use cron jobs. v3.2 Improved how language is determined. v3.3 Settings moved to site config. v3.4 Site config tabs updated. v3.5 Fixed a notice caused by api key not being set. v3.6 Changed how a path is defined. v3.7 Added widget code. v3.8 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.9 Fixed a notice. 4.0 Updated plugin to use Guzzle v4.1 Use rebuildregistry task to empty weather cache. v4.2 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v4.3 Modified url due to changes in Openweather API route. v4.4 French language file added v4.5 Plugin updated for recent weather api changes. v4.6 BS4 template set added',
			"manual_link"=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_upz4z.png'
			);
		}
	}
