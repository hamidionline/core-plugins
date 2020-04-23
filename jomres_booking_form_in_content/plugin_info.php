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

class plugin_info_jomres_booking_form_in_content
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_booking_form_in_content",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.6",
			"description"=> "Mambot/Plugin. Allows you to view a property's booking form in a content page. Put {bot_jomres_bookingform N} in your contend to show the form. N is the property id of the property you want to show.",
			"type"=>"mambot",
			"lastupdate"=>"2018/02/22",
			"min_jomres_ver"=>"9.9.19",
			'change_log'=>' 1.1 minor code tidyup. v1.2 Modified paths to take into account new path modifications in Jomres. v1.3 Fixed a path to the Jomres Root file. v1.4 PHP7 related maintenance. v1.5 Modified plugin with a fallback for JOMRES_ROOT_DIRECTORY in case the jomres_root.php file cannot be created. v1.6 Updated to work with current version of Jomres.',
			'highlight'=>'Use the Jomres plugin manager to add it to your system, then use Joomla\'s Discover feature to install it. After that, use the Joomla Plugin Manager to enable the plugin. <p><i>Cannot be uninstalled via the Jomres plugin manager, you must use the Joomla Extension Manager instead.</i></p>',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/109-jomres-booking-form-in-content'
			
			);
		}
	}
