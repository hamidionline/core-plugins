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

class plugin_info_channelmanagement_framework
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"channelmanagement_framework",
			"category"=>"Integration",
			"marketing"=>"Plugin that offers framework code for channel management plugins",
			"version"=>(float)"1.3",
			"description"=> "Plugin that offers framework code for channel management plugins",
			"lastupdate"=>"2020/04/23",
			"min_jomres_ver"=>"9.21.4",
			"manual_link"=>'',
			'change_log'=>'v1.1 Added UI functionality to frontend for importing properties via ajax, plus webhook handling updates. v1.2 Variety of changes for jomres2jomres which mean that Rentals United thin plugin will require some refactoring before it can be progressed in dev.  v1.3 Various fixes for jomres2jomres property import. ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
