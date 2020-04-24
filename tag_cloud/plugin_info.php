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

class plugin_info_tag_cloud
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"tag_cloud",
			"category"=>"Site Building Tools",
			"marketing"=>"Outputs a tag cloud.",
			"version"=>(float)"3.3",
			"description"=> ' Outputs a tag cloud, use jomres_asamodule to place this cloud somewhere in your page. Edit j99999tag_cloud.class.php to change from towns to regions or countrys. ',
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/104-tag-cloud',
			'change_log'=>'2.3 Variety of changes to prevent var not set notices. v2.4 Properly SEFed the urls. v2.5 Minor code tidy up. v2.6 PHP7 related maintenance. v2.7 Jomres 9.7.4 related changes v2.8 Remaining globals cleanup and jr_gettext refactor related changes. v2.9 Modified plugin to allow town names to be translatable. v3.0 Frontend menu refactored. v3.1 Modified how array contents are checked. v3.2 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.3 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_t4y4n.png',
			'demo_url'=>''
			);
		}
	}
