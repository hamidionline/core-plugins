<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 4 
* @package Jomres
* @copyright	2005-2011 Vince Wooll/Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_wikipedia_region_in_tab
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"wikipedia_region_in_tab",
			"category"=>"Property Details Enhancements",
			"marketing"=>"A simple plugin that adds wikipedia content about a property's region in one of the property tabs.",
			"version"=>(float)"1.4",
			"description"=> 'This plugin inserts a wikipedia page about the property region into the property details tab. No special instructions, just install the plugin.',
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.7.4",
			"manual_link"=>'',
			'change_log'=>'v1.1 Jomres 9.7.4 related changes & SSL tweaks v1.2 Remaining globals cleanup and jr_gettext refactor related changes. v1.3 jr_gettext tweaks. v1.4 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2ij80.png',
			'demo_url'=>''
			);
		}
	}
