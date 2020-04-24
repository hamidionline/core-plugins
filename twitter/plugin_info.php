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

class plugin_info_twitter
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"twitter",
			"category"=>"Integration",
			"marketing"=>"Allows Jomres to post to a twitter account whenever a booking is added to a property, and send DMs direct to property managers. ",
			"version"=>(float)"2.3",
			"description"=> 'This plugin allows Jomres to post to your twitter account whenever a new booking is made on a property, and to DM a manager on booking creation. Note that oauth functionality is required, so you will not be able to test this via a basic WAMP installation. You will need to request app keys from twitter so make sure you have a twitter account.',
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.19",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/303-twitter',
			'change_log'=>'v1.0 PHP7 related maintenance. v1.1 Added functionality to allow site managers to DM property managers giving them a direct link to new bookings. v1.2 Changed urls to NOSEF urls. v1.3 Jomres 9.7.4 related changes v1.4 Remaining globals cleanup and jr_gettext refactor related changes. v1.5 jr_gettext tweaks. v1.6 Notice level changes. v1.7 Fixed some notice level errors. v1.8 Settings moved to Site Config. v1.9 Site config tabs updated. v2.0 Edit booking tasks renamed and renumbered. v2.1 Modified how array contents are checked. v2.2 Fixed an issue caused by updated library. v2.3 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_mwl3g.png',
			'demo_url'=>''
			);
		}
	}
