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

class plugin_info_location_map_regions
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"location_map_regions",
			"category"=>"Search",
			"marketing"=>"This will show a list of regions that have been populated by published properties.",
			"version"=>(float)"2.2",
			"description"=> " Plugin for the location_map plugin, to run this, create a jomres_asamodule module, set the 'task' to 'location_map' and the arguments to '&mm_plugin=location_map_regions'. This will show a list of regions and towns that have been populated by published properties.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/77-location-map-regions',
			'change_log'=>'1.1 Updated to work with Jr7 1.2  Templates bootstrapped. v1.3 Added BS3 templates. v1.4 PHP7 related maintenance. v1.5 Jomres 9.7.4 related changes v1.6 Jomres 9.7.4 related changes v1.7 Remaining globals cleanup and jr_gettext refactor related changes. v1.8 Plugin updated to use region ids only. v1.9 Menu options updated for menu refactor in v9.8.30 v2.0 Modified how region names are determined v2.1 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.2 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_8z6xy.png',
			'demo_url'=>''
			);
		}
	}
