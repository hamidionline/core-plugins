<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2019 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_channelmanagement_jomres2jomres
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"channelmanagement_jomres2jomres",
			"category"=>"Integration",
			"marketing"=>"Plugin that allows child installations of Jomres to import properties from parent installations",
			"version"=>(float)"0.2",
			"description"=> "Thin plugin for the Jomres CMF that allows child installations of Jomres to import properties from parent installations",
			"lastupdate"=>"2020/03/09",
			"min_jomres_ver"=>"9.21.4",
			"manual_link"=>'',
			'change_log'=>'0.2 Property import and booking export for alpha dev added.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
