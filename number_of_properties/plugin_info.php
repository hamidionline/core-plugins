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

class plugin_info_number_of_properties
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"number_of_properties",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows the number of published properties in the system and links direct to the Jomres search page.",
			"version"=>(float)"1.6",
			"description"=> "Shows the number of published properties in the system and links direct to the Jomres search page. Use it with ASAModule setting the task to \"number_of_properties\" to provide a link to search pages. Default output will say something like \"Test hotel : 1300 hotels available worldwide. Book your holiday online now!\" ",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/310-number-of-properties',
			'change_log'=>'v1.1 Fixed an error that can result in Property uid not recognised error emails. v1.2 PHP7 related maintenance. v1.3 Jomres 9.7.4 related changes v1.4 Remaining globals cleanup and jr_gettext refactor related changes. v1.5 French language file added v1.6 BS4 template set added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_uvo1q.png',
			'demo_url'=>''
			);
		}
	}
