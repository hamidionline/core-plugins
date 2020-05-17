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
#

class plugin_info_addthis_sharing
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"addthis_sharing",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Shows a link to 'addthis.com' allowing users to add the property link to various community sites like Reddit, Digg etc. Appears above the property details and under the header in the view property page.",
			"version"=>(float)"1.6",
			"description"=> "Internal plugin. Shows a link to 'addthis.com' allowing users to add the property link to various community sites like Reddit, Digg etc. Appears above the property details and under the header in the view property page. ",
			"lastupdate"=>"2016/04/25",
			"min_jomres_ver"=>"9.7.4",
			"type"=>"internal",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/26-addthis-sharing',
			'change_log'=>' v1.1 fixed bug that caused an error in touch templates. 1.2 Modified headers to ensure script uses Jomres init check, not Joomla\'s old init check. v1.4 updated url to use https javascript file. v1.5 PHP7 related maintenance. v1.6 Remaining globals cleanup and jr_gettext refactor related changes.',
			'highlight'=>'',
			'image'=>'http://www.jomres.net/non-joomla/plugin_list/plugin_images/addthis_sharing.png',
			'retired'=>'1',
			'demo_url'=>''
			
			);
		}
	}
