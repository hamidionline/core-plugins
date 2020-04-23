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

class plugin_info_disallow_syndication
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"disallow_syndication",
			"category"=>"Syndication",
			"marketing"=>"Allows users with valid licenses to remove their properties from the Jomres.net syndication network.",
			"version"=>(float)"1.1",
			"description"=> "This plugin allows you to remove the installation it is installed from the Jomres.net syndication network.",
			"lastupdate"=>"2019/10/15",
			"min_jomres_ver"=>"9.19.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Updated link to use https',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"",
			"authoremail"=>""
			);
		}
	}
