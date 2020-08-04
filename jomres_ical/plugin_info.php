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

class plugin_info_jomres_ical
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_ical",
			"category"=>"Integration",
			"marketing"=>"Adds ical import & export/feed functionality to Jomres.",
			"version"=>(float)"4.0",
			"description"=> "Adds ical support to Jomres. Allows for import of ics files, and exports both feeds and individual contracts. Feeds can be either anonymous or via a token which gives full information.",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/329-jomres-ical-plugin',
			'change_log'=>'v1.1 Added ability to import iCal files. v1.2 Considerably reworked the plugin. v1.3 Disabled menu option on Jintour properties as they are N/A v1.4 Jomres 9.7.4 related changes v1.5  Jomres 9.7.4 related changes v1.6 Remaining globals cleanup and jr_gettext refactor related changes. v1.7 jr_gettext tweaks. v1.8 Notice level changes. v1.9 Removed some redundant files. v2.0 Improved input filtering when importing ical files. v2.1 Improved how some urls are generated. v2.2 Added changes supporting 9.8.30 minicomponent registry changes  v2.3 Fixed some notices. v2.4 Black booking links renamed. v2.5 Edit booking tasks renamed and renumbered. v2.6 Frontend menu refactored. v2.7 Modified how array contents are checked. v2.8 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.9 removed conditions based on simple/advanced settings, now all users can see options in property config. v3 Completey rewritten v3.1 Plugin updated to work with Jomres data encryption of user details. v3.2 CSRF hardening added. v3.3 Added ical import from urls via scheduled tasks v3.4 Improved ical feed importing and logging. v3.5 Modified feed importing so that if one method dooes not work, try another. v3.6 Modified how the UID was generated to ensure that it follows recommended standards. This may impact how you are using the UID value if you are using this particular field in 3rd party software. v3.7 Improved how special requirement information is cleaned up before insert. v3.8 French language file added. v3.9 Plugin updated to add more information about bookings that could not be imported. v4.0 BS4 template set added',
			'highlight'=>'',
			'image'=>'http://www.jomres.net/manual/images/Manual/All_Listings_-_Mozilla_Firefox_08929.png',
			'demo_url'=>''
			);
		}
	}
