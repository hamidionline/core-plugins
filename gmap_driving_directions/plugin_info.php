<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_gmap_driving_directions
	{
	function __construct()
		{
		
		$this->data=array(
			"name"=>"gmap_driving_directions",
			"category"=>"Search",
			"marketing"=>"The Google Maps With Driving Directions plugin for Jomres offers the possibility for your guests to get driving, walking or cycling directions from their location to your property.",
			"version"=>(float)"5.0",
			"description"=> "The Google Maps With Driving Directions plugin for Jomres offers the possibility for your guests to get driving, walking or cycling directions from their location to your property. Your guests have to enter their address, postal code and town and the plugin will display directions to your property without reloading the page. Directions are provided in the website active language.
			Configuration can be made from the backend (admin) where a new button was created after you installed the plugin. Here you can set map width and height to fit your template, map zoom level and map type.
			The v2 of the Google Maps with Driving Directions plugin has been completely rewritten to use the v3 Googole Maps API. Also, guests now have the option to choose more waypoints from their location to your property and also print the directions. Other parameters can be set too, like directions type (driving, walking, cycling), use highways or tolls.
			For this plugin to work, it is mandatory that you enter latitude and longitude coordinates for your properties. Also, please make sure that google driving directions feature is supported for your country.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Added control panel in backend to set map dimensions, map type and zoom level. v1.2 Small improvements and fixes. v1.3 Small change to the print directions window. v1.4 Updated javascript for Jomres v5.2 and dropped compatibility with older Jomres versions. v1.5 Updated for Jomres v5.6. v2 Completely rewritten to use the v3 Google Maps API. v2.1 Fixed aprostropes issue. v2.2 Small tweak to properly reset the map after tab changes. v2.3 Updated with Twitter Bootstrap templates. v2.4 Small changes. v2.5 Removed references to no longer used Jomres token functionality. v2.6 Minor tweaks. v2.7 Updated for Jomres v7.4. Dropped compatibility with older Jomres versions. v2.8 Updated for Jomres 8.1 and dropped compatibility with older Jomres versions. v2.9 Added Bootstrap 3 support. v3. Fix for map in tabs in bootstrap 3. v3.1 Updated fro Jomres v9.2. v3.2 Fix for maps in tabs. v3.3 Updated constructors for PHP7. v4.1 fixed paths v4.2 Added Shortcode related changes. v4.3 Added map styles to plugin. v4.4 Plugin revamped v4.5 Changed how a path is defined & how variables are detected. v4.6 Fixed notices. v4.7 Node/javascript path related changes. v4.8 Updated plugin to adapt to new hyphen encoding. v4.9 CSRF hardening added. v5.0 French language file added. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_cguul.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
