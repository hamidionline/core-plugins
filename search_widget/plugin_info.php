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
			"version"=>"1.2",
			"description"=> "A variety of search plugin layouts for you to choose from. Designed to be used as shortcodes so see the Shortcodes page after installation and in that table search for search_widget to see the available layouts." ,
			"lastupdate"=>"2020/09/03",
			"min_jomres_ver"=>"9.23.2",
			"manual_link"=>'',
			'change_log'=>'1.1 Added search by property name/description/categories & new horizontal location (searchable)/search/dates/sleeps templates. v1.2 Jomres 9.23.2 updated to add searching by children and this has been updated to offer new fuctionality related to that, specifically horizontal_adults_children_buttons template.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
    
    
    
