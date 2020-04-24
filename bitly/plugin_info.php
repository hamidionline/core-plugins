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

class plugin_info_bitly
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bitly",
			"category"=>"Integration",
			"version"=>(float)"1.6",
			"marketing"=>"Currently only used the the Twitter plugin, adds bitly shortcodes to tweets.",
			"description"=> "Adds the get_bitly_shortcode function, which allows specifically coded plugins to pull bit.ly shortcodes from bitly once you have configured an access key from them.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/303-twitter',
			'change_log'=>'v1.0 PHP7 related maintenance. v1.1 Jomres 9.7.4 related changes v1.2 Remaining globals cleanup and jr_gettext refactor related changes. v1.3 Fixed some notice level errors. v1.4 Plugin revampled. v1.5 Site Config tab updates. v1.6 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_r80yx.png',
			'demo_url'=>''
			);
		}
	}
