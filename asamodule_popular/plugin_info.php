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

class plugin_info_asamodule_popular
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_popular",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows popular properties in an ASAModule widget/module. Popular properties are those that have been viewed a lot.",
			"version"=>(float)"1.8",
			"description"=> "Widget. Shows popular properties in an ASAModule widget/module. Use the arguments 'asamodule_popular_listlimit' to control the number of properties shown, and 'asamodule_popular_ptype_ids' to only show popular properties of a specific property type. Use asamodule_popular_vertical=1 if the module would be used with a vertical layout. CMS agostic replacement for jomres_ngm_popular.",
			"lastupdate"=>"2021/04/26",
			"min_jomres_ver"=>"9.8.30",
			"type"=>"",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/30-asamodule-popular',
			'change_log'=>' v1.1 Added vertical layout option. v1.2 improved queries for working with PDO. v1.3 PHP7 related maintenance. v1.4 Globals cleanup and jr_gettext related changes. v1.5 Added Shortcode related changes. v1.6 Updated a query. v1.7 Modified how array contents are checked. v1.8 added property uids option to shortcode arguments.',
			'image'=>'http://www.jomres.net/non-joomla/plugin_list/plugin_images/asamodule_popular.png',
			'demo_url'=>''
			);
		}
	}
