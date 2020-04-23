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

class plugin_info_jomres_asamodule_mambot
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_asamodule_mambot",
			"category"=>"Site Building Tools",
			"version"=>(float)"2.1",
			"description"=> "Joomla plugin (aka mambot). Allows you to put anything that can called by asamodule in your content. Let's say that you want to include the calendar in your page's content somewhere. All you need to do is put {asamambot remoteavailability \"&id=1\"} in your Joomla article and you're away. The same could be done for the ui-calendar by putting {asamambot ui_availability_calendar \"&property_uid=1\"} in the content. Refer to each plugin's asamodule settings as described in it's description and use those same settings here, or refer to the asamodule report for ideas on how you can use this plugin/mambot. ",
			"type"=>"mambot",
			"lastupdate"=>"2017/06/19",
			"min_jomres_ver"=>"9.9.4",
			'change_log'=>'v1.1  Modified paths to take into account new path modifications in Jomres. v1.2 Fix an incorrect path to jomres_root.php. v1.3 Added support to convert + to - for search functionality. v1.4 PHP7 related maintenance. v1.5 Changed how we detect the current property uid to be compatible with Jr 9.8.0 v1.6 Modified plugin with a fallback for JOMRES_ROOT_DIRECTORY in case the jomres_root.php file cannot be created. v1.7 Changed shortcode from {asamambot} to {jomres} v1.8 added onRenderModule to allow shortcode contents to show in modules as well as article content. v1.9 Removed previous change as it breaks modules. v2.0 Improved paths. Added support for 06001, 06002 & 06005 tasks.',
			'highlight'=>'Use the Jomres plugin manager to add it to your system, then use Joomla\'s Discover feature to install it. After that, use the Joomla Plugin Manager to enable the plugin. <p><i>Cannot be uninstalled via the Jomres plugin manager, you must use the Joomla Extension Manager instead.</i></p>',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/112-jomres-asamodule-mambot'
			);
		}
	}
