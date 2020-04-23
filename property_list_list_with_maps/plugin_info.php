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

class plugin_info_property_list_list_with_maps
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_list_list_with_maps",
			"category"=>"Property List Views",
			"marketing"=>"Identical to the standard property list, but puts a small Google map next to the price output in the property list.",
			"version"=>"3.2",
			"description"=> "Identical to the standard property list, but puts a small Google map next to the price output in the property list. ",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.18",
			'change_log'=>'v2.0 improved template (fixed issue with Quick Info button being too large) v2.1 Improved markup relating to Superior settings, set the Superior to be an image. v2.2 Added BS3 templates. v2.3 Added changes to reflect addition of new Jomres root directory definition. v2.4 added some paging tweaks. v2.4 Updated templates for dealing with new 8.1.12 live scrolling. v2.5 Increased the number of properties returned to 6. v2.5 improved BS templates to use BS modals. v2.7 PHP7 related maintenance. v2.8 updated for Jomres 9.7.1 property list slideshows. v2.9 Jomres 9.7.4 related changes v3.0 Remaining globals cleanup and jr_gettext refactor related changes. v3.1 Node/javascript path related changes. v3.2 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_bmrjh.png',
			'demo_url'=>'',
			"manual_link"=>''
			
			);
		}
	}
