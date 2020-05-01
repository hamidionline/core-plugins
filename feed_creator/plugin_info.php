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

class plugin_info_feed_creator
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"feed_creator",
			"category"=>"Search",
			"marketing"=>"Feed Creator plugin. Creates a language dependent feed from all jomres propertys. Currently supports RSS 1.0 and RSS 2.0 feed formats.",
			"version"=>(float)"4.1",
			"description"=> "Feed Creator plugin. Creates a language dependent feed from all jomres propertys. Currently supports RSS 1.0 and RSS 2.0 feed formats.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.10.1",
			"manual_link"=>'',
			'change_log'=>'v3.1 Fixed paths. v3.2 Resolved a fatal error v3.3  Modified functionality to use new get_property_details_url function. v3.5 Settings moved to site config. v3.6 Renamed how feeds are called. v3.7 Modified how array contents are checked. v3.8 Fixed a notice. v3.9 Node/javascript path related changes. v4.0 Fixed a bug in a query v4.1 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_dc6qh.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
