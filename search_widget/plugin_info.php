<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_search_widget
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"search_widget",
			"category"=>"Search",
			"marketing"=>"A variety of search plugin layouts for you to choose from. Designed to be used as shortcodes so see the Shortcodes page after installation and in that table search for search_widget to see the available layouts.",
			"version"=>"1.0",
			"description"=> "Shows a google map with points for the various published propertys. If displayed through jomres_asamodule you can add arguments in the arguments field in the format of '&ptype_ids=4,5,3' to ensure that you only include properties of a certain type. Example usage in url or asamodule: &show_properties=0 This will display a map only with attractions and events. &show_events=0&show_properties=0 This will display a map only with attractions. Property type specific markers can be uploaded through the administrator area Media Centre in the Site Structure menu area after installing the marker uploader." ,
			"lastupdate"=>"2020/07/03",
			"min_jomres_ver"=>"9.23.0",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
    
    
    
