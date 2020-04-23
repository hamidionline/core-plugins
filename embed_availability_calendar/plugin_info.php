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

class plugin_info_embed_availability_calendar
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"embed_availability_calendar",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds a menu option to the misc menu option to show managers embed code for embedding their availability calendar into an off-site page. Particularly useful if you're using Jomres as a portal.",
			"version"=>(float)"1.7",
			"description"=> " Adds a menu option to the misc menu option to show managers embed code for embedding their availability calendar into an off-site page.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/326-embed-availability-calendar',
			'change_log'=>'1.1 Jomres 9.7.4 related changes v1.2 Jomres 9.7.4 related changes v1.3 Remaining globals cleanup and jr_gettext refactor related changes. v1.4 Notices fixes. v1.5 Frontend menu refactored. v1.6 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v1.7 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_j0hn6.png',
			'demo_url'=>''
			);
		}
	}
