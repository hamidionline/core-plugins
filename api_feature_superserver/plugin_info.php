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

class plugin_info_api_feature_superserver
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_superserver",
			"marketing"=>"Allows the superserver to query the site for information that's required to show your properties on the Jomres Super Server.",
			"version"=>"0.3",
			"description"=> "Allows the superserver to query the site for information that's required to show your properties on the Jomres Super Server.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/02",
			"min_jomres_ver"=>"9.10.0",
			"manual_link"=>'',
			'change_log'=>'v0.2 Adjustment to remove Jomres version from its old setting. v0.3 French language file added ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
