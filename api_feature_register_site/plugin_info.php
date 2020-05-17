<?php
/**
* Jomres CMS Agnostic Plugin
* @author  
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_api_feature_register_site
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_register_site",
			"marketing"=>"Allows remote Jomres installations to register themselves.",
			"version"=>"0.1",
			"description"=> "Allows remote Jomres installations to register themselves",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/09/10",
			"min_jomres_ver"=>"9.18.0",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
