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

class plugin_info_je_overview
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_overview",
			"category"=>"Search",
			"marketing"=>"Displays useful info about checkins, checkouts, current residents and pending commission invoices.",
			"version"=>(float)"3.8",
			"description"=> "The Advanced Overview plugin offers an overview of the currently selected property status, for the current day: today`s checkins, today`s checkouts, current residents and also, if the commission feature is enabled, it will display the pending commission invoices so that the manager can quickly access and pay them. After successfully installing the plugin, a new button will be created in the Dashboard section of your Jomres frontend control panel (the overview is available for receptionist access level and higher).",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.11.0",
			"manual_link"=>'',
			'change_log'=>' v2.1 User role related updates. v2.2 Notices fixes. v2.3 Extras renumbered and renamed. v2.4 Edit booking tasks renamed and renumbered. v2.5 Edit deposit script renamed and numbered. v2.6 Frontend menu refactored. v2.7 Modified how array contents are checked. v2.8 Overview template tweaked to fit better when working with the dashboard calendar. v2.9 Added site config setting. 3.0 Changed how variables are detected. v3.1 Variety of changes to support how the task can be viewed either standalone or in the dashboard. v3.2 Added widget. v3.3 Template changes. v3.4 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.5 Node/javascript path related changes. v3.6 Plugin updated to work with Jomres data encryption of user details. v3.7 fixed issue with departures not showing. v3.8 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2g8k5.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
