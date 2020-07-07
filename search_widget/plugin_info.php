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
			"version"=>"1.1",
			"description"=> "A variety of search plugin layouts for you to choose from. Designed to be used as shortcodes so see the Shortcodes page after installation and in that table search for search_widget to see the available layouts." ,
			"lastupdate"=>"2020/07/06",
			"min_jomres_ver"=>"9.23.0",
			"manual_link"=>'',
			'change_log'=>'1.1 Added search by property name/description/categories & new horizontal location (searchable)/search/dates/sleeps templates.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
    
    
    
