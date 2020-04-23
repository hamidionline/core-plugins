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

class plugin_info_unpaid_bookings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"unpaid_bookings",
			"category"=>"Scheduled tasks",
			"marketing"=>"This plugin automatically deletes or cancels all provisional (unpaid) bookings after a time period set by the administrator.",
			"version"=>(float)"3.3",
			"description"=> "This plugin automatically deletes or cancels all provisional (unpaid) bookings after a time period set by the administrator. ",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.11.1",
			"manual_link"=>'',
			'change_log'=>'v3.1 Settings moved to Site Config v3.2 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v3.3 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_bw56y.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
