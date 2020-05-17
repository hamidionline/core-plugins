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

class plugin_info_data_wipe
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"data_wipe",
			"category"=>"Administrator tools",
			"marketing"=>"Administrator area function. Destroys data that is collected when making bookings etc, is intended for developers who wish to clear their Jomres tables of test bookings and other data. If you use this script, then complain to us that your data has gone and you did not make a backup of it, we will point fingers and laugh at you. Then we will probably tweet about it.",
			"version"=>(float)"3.2",
			"description"=> "Destroys data that is collected when making bookings etc, is intended for developers who wish to clear their Jomres tables of test bookings and other data. INTENTIONALLY HIGHLY DESTRUCTIVE, use at your own risk!",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/53-data-wipe',
			'change_log'=>'v1.7 Added changes to reflect addition of new Jomres root directory definition. v1.8 added Beds24 integration plugin tables. v1.9 added bootstrap 3 templates. v2.0 Updated tables that are wiped. v2.1 PHP7 related maintenance. v2.2 Jomres 9.7.4 related changes v2.3 Remaining globals cleanup and jr_gettext refactor related changes. v2.4 Removed reference to a redundant table. v2.5 fixed a notice level bug. v2.6 Fixed some notice level errors. v2.7 Fixed some notices. v2.8 Advanced Site Config flag removed. v2.9 Modified how admin menu is generated. v3.0 Removed an old table and added two new ones. v3.1 CSRF hardening added. v3.2 French language file added.',
			'highlight'=>'If you use this script, then complain to us that your data has gone and you did not make a backup of it, we will point fingers and laugh at you. Then we will probably tweet about it.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
			'demo_url'=>''
			);
		}
	}
