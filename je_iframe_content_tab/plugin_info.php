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

class plugin_info_je_iframe_content_tab
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_iframe_content_tab",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Allows you to enter an iframe in the property details in a new tab.",
			"version"=>(float)"2.5",
			"description"=> "The Custom Iframe Tab plugin creates a new tab in property details page where you can display any external web page in an iframe. This can be useful for those who want to show some specific external content on the property details page in a separate tab. It`s recommended that for security reasons this feature should be used only by super property managers. After successfully installing the plugin, a new button will be created in the Settings section of your Jomres manager control panel (frontend). The iframe url, width and height can be entered on this page.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Menu options updated for menu refactor in v9.8.30 v2.2 Modified how array contents are checked. v2.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.4 CSRF hardening added. v2.5 French language file added ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2y9y2.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
