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

class plugin_info_embed_video
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"embed_video",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Offers the ability to embed Youtube video in the property details page.",
			"version"=>(float)"3.7",
			"description"=> "Embed Youtube Video Plugin offers the possibility to insert a youtube video in your property details page. Now you can easily provide a video presentation of the property or tourist attractions from the surrounding area. The video will be displayed in a new tab which is visible only when the plugin is enabled. Adding the Youtube video link and editing the configuration can be done from frontend manager control panel, where a new \"Embed Video\" button has been created. All you have to do to set up the plugin is paste the youtube video url and choose the video width and height. ",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v3.1 Menu options updated for menu refactor in v9.8.30 v3.2 Modified how array contents are checked. v3.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.4 Node/javascript path related changes. v3.5 CSRF hardening added. v3.6 Added embedding instructions. v3.7 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_urmn3.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}