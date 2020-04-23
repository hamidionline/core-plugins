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

class plugin_info_embed_booking_form
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"embed_booking_form",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds a menu option to the misc menu option to show managers embed code for embedding their booking form into an off-site page. Particularly useful if you're using Jomres as a portal.",
			"version"=>(float)"2.6",
			"description"=> " Adds a menu option to the misc menu option to show managers embed code for embedding their booking form into an off-site page. It is best that your site NOT be configured to show the booking form as a modal popup, for this to work best.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/44-your-toolbar/misc/227-embed-booking-form',
			'change_log'=>'1.1 layout tweaks. 1.2 updated to work on Jr7 v1.3  Templates bootstrapped. 1.4 updated to work with Jr7.1. v1.5 Added BS3 templates. v1.6 Updated so that the property uid is shown in the embed code. v1.7 PHP7 related maintenance. v1.8 Jomres 9.7.4 related changes v1.9 Jomres 9.7.4 related changes v2.0 Remaining globals cleanup and jr_gettext refactor related changes. v2.1 template improvements. v2.2 Notices fixes. v2.3 Modified functionality to use new get_booking_url function. v2.4 Menu options updated for menu refactor in v9.8.30 v2.5 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.6 French language file added.',
			'highlight'=>'',
			'image'=>'http://www.jomres.net/non-joomla/plugin_list/plugin_images/embed_booking_form.png',
			'demo_url'=>'http://userdemo.jomres.net/index.php?option=com_jomres&Itemid=103&lang=en&task=embed_booking_form'
			);
		}
	}
