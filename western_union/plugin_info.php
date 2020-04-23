<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_western_union
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"western_union",
			"category"=>"Payment handling",
			"marketing"=>"Western Union gateway (offline payments). Adds functionality to edit Western Union account details for each property individually or globally for all properties.",
			"version"=>(float)"3.0",
			"description"=> "Western Union gateway (offline payments). Adds functionality to edit Western Union account details for each property individually or globally for all properties.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Fix paths. v2.2 Improved Print icon functionality. v2.3 Updated language file. v2.4 Added changes supporting 9.8.30 minicomponent registry changes v2.5 Save plugin task changed. v2.6 Modified how admin menu is generated. v2.7 Subscription related functionality updated v2.8 Modified how array contents are checked. v2.9 CSRF hardening added. v3.0 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_ndtm7.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
			}
	}
