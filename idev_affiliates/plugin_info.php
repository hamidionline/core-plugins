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

class plugin_info_idev_affiliates
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"idev_affiliates",
			"category"=>"Integration",
			"marketing"=>" Creates a new settings page in Jomres control panel where you can set your url to sale.php and profile for Idev affiliates.",
			"version"=>"3.6",
			"description"=> " Creates a new settings page in Jomres control panel where you can set your url to sale.php and profile for Idev affiliates. When the booking completion page is shown then a hidden image used to link to sale.php to update the affiliate's sale information.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/21-control-panel/integration/162-idev-affiliates',
			'change_log'=>' 1.1 Fixed 00001 includer so that xx-XX is called if jomrsConfig_lang file doesn\'t exist. v2.0 Updated for Jomres v4. 2.2 updated templates for Jomres 6. 2.3 layout tweaks. 2.4 Updated to work with Jr7 2.5  Templates bootstrapped. 2.6 Jr7.1 specific changes v2.7 Removed references to Token functionality that is no longer used. v2.8 Hide menu option if Simple Site Config enabled. v2.9 Added BS3 templates. v3.0 Updated the cancellation url. v3.0 PHP7 related maintenance. v3.1 Jomres 9.7.4 related changes v3.2 Remaining globals cleanup and jr_gettext refactor related changes. v3.3 Fixed some notice level errors. v3.4 Settings moved to Site Config. v3.5 Site Config tabs updated. v3.6 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_jc0qk.png',
			'demo_url'=>''
			);
		}
	}
