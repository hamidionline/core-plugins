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

class plugin_info_je_custom_html_tab
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_custom_html_tab",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Creates a new tab in the property details page where you can enter any html content you want using a WYSIWYG editor.",
			"version"=>(float)"2.7",
			"description"=> "Custom HTML Tab plugin creates a new tab in property details page where you can enter any HTML content you want by using the Joomla or Wordpress default html editor. This can be useful for those who want to show some specific information on the property details page but also keep the property description and other property details fields separate. 
			After successfully installing the plugin, a new button will be created in the Settings section of your Jomres manager control panel (frontend). The tab content can be entered on this page using the html editor, which must be enabled from site configuration->misc tab, otherwise the html code will be stripped when saving. The content entered here is language dependent like the property description fields and it can be translated in the same way.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>' v2.1 User role related updates. v2.2  Removed references to Jomres Array Cache as it is now obsolete. v2.3 Menu options updated for menu refactor in v9.8.30 v2.4 Modified how array contents are checked. v2.5 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.6 CSRF hardening added. v2.7 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_qi93u.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
