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

class plugin_info_discounted_properties_list
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"discounted_properties_list",
			"category"=>"Search tools",
			"marketing"=>"Script that will display published properties who have enabled the Wiseprice or Lastminute settings.",
			"version"=>(float)"1.1",
			"description"=> "Script that will display published properties who have enabled the Wiseprice or Lastminute settings.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
