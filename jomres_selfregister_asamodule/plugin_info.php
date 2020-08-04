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

class plugin_info_jomres_selfregister_asamodule
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_selfregister_asamodule",
			"category"=>"Property Manager tools",
			"marketing"=>"Rarely used nowadays as there's a link in the Jomres main menu that directs the user to the property creation page. This, nevertheless is still useful if you'd like to put a \"Register your property\" type link somewhere that it'll get a lot of attention.",
			"version"=>(float)"1.7",
			"description"=> 'Offers a link to the property creation page. Position it using Jomres asamodule, and setting the task to "jomres_selfregister_asamodule"',
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/316-jomres-selfregister-asamodule',
			'change_log'=>'v1.1 PHP7 related maintenance. v1.2 Jomres 9.7.4 related changes v1.3 Remaining globals cleanup and jr_gettext refactor related changes. v1.4 New property link updated. v1.5 Settings moved to Site Config. v1.6 French language file added v1.7 BS4 template set added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_zlq2u.png',
			'demo_url'=>''
			);
		}
	}
