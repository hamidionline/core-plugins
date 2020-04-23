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

class plugin_info_je_bookingform_instructions
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_bookingform_instructions",
			"category"=>"Bookings Configuration",
			"marketing"=>"Displays custom instructions at the top of the booking form.",
			"version"=>(float)"2.8",
			"description"=> "The Booking Form Instructions plugin can be used to display useful info/instructions for guests at the top of the booking form, to make the booking process easier. Instructions can be in multiple languages and can be edited using the Joomla WYSIWYG editor (if enabled in Jomres Site Configuration->Misc tab). After successfully installing the plugin, a new button will be created in the Settings section of your Jomres frontend control panel (the settings for this plugin require manager or super property manager access, not available for receptionists). From here you can enable/disable the plugin and edit the instructions/content.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Notices fixes. v2.2 Menu options updated for menu refactor in v9.8.30 v2.3 Modified how array contents are checked. v2.4 Fixed an issue that can appear in the Label Editing page. v2.5 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.6 Removed a definition that is no longer used and causes notices as a result. v2.7 CSRF hardening added. v2.8 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_z87rc.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
