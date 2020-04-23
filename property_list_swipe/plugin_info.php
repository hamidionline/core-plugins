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

class plugin_info_property_list_swipe
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_list_swipe",
			"category"=>"Property List Views",
			"version"=>"1.8",
			"marketing"=>"Shows the property list as a swipe-able row of property images.",
			"description"=> "Shows the property list as a swipe-able row of property images. This plugin is optimised for full width pages (i.e. no sidebars) if you'd like to change the size of the area (e.g. for different template's component areas or because you have different size thumbnail sizes you can edit idangerous.swiper.css. You will need to edit the .swiper-container, .swiper-slide definitions.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.8.28",
			'change_log'=>'v1.1 modified to ensure js and css files are only included if needed. v1.2 Improved functionality to resolve some javascript errors. v1.3 Improved some paths to js files. v1.4 PHP7 related maintenance. v1.5 Jomres 9.7.4 related changes v1.6 Remaining globals cleanup and jr_gettext refactor related changes. v1.7 Refactored to work with current version of Jomres. v1.8 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_oqxvg.png',
			'demo_url'=>'',
			"manual_link"=>''
			
			);
		}
	}
