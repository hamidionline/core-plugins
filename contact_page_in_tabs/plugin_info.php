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

class plugin_info_contact_page_in_tabs
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"contact_page_in_tabs",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Inserts the contact owner page into the property details tabs.",
			"version"=>(float)"1.6",
			"description"=> " Inserts the contact owner page into the property details tabs.",
			"lastupdate"=>"2016/04/25",
			"min_jomres_ver"=>"9.7.4",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/45-contact-page-in-tabs',
			'change_log'=>'v1.1 Plugin updated to work alongside Jomres 6.6.6 and its new recaptcha verification code. v1.2 modified to use Jomres 7 contact owner page, no longer a need for contactowner2 plugin. v1.3 PHP7 related maintenance. v1.4 PHP7 related maintenance. v1.5 Jomres 9.7.4 related changes v1.6 Remaining globals cleanup and jr_gettext refactor related changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_d3o0z.png',
			'demo_url'=>''
			);
		}
	}
