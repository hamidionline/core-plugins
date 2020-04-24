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

class plugin_info_logo_uploader
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"logo_uploader",
			"category"=>"Site building tools",
			"marketing"=>"Allows site administrators to upload a logo that will be used on admin invoices and property managers to upload a logo for each property that will be used on booking invoices.",
			"version"=>(float)"1.1",
			"description"=> "Allows site administrators to upload a logo that will be used on admin invoices and property managers to upload a logo for each property that will be used on booking invoices.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
