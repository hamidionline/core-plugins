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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class plugin_info_asamodule_random
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_random",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows random properties in an ASAModule widget/module. Useful for generating visits to lots of properties that might otherwise not be seen.",
			"version"=>(float)"1.7",
			"description"=> "Widget. Shows random properties in an ASAModule widget/module. Use the arguments 'asamodule_random_listlimit' to control the number of properties shown, and 'asamodule_random_ptype_ids' to only show random properties of a specific property type.  Use asamodule_popular_vertical=1 if the module would be used with a vertical layout. CMS agostic replacement for jomres_ngm_random.",
			"lastupdate"=>"2017/05/10",
			"min_jomres_ver"=>"9.8.30",
			"type"=>"",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/31-asamodule-random',
			'change_log'=>' v1.1 Added vertical layout option.  v1.2 improved queries for working with PDO. v1.3 PHP7 related maintenance. v1.4 Globals cleanup and jr_gettext related changes. v1.5 Added Shortcode related changes. 1.6  Modified how array contents are checked.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_m7mx5.png',
			'demo_url'=>''
			);
		}
	}
