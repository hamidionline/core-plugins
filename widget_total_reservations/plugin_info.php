<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_widget_total_reservations
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"widget_total_reservations",
			"category"=>"Widgets",
			"marketing"=>"A widget to display the total number of reservations for a property.",
			"version"=>(float)"1.1",
			"description"=> "A widget to display the total number of reservations for a property. Install the widget then any hotel or b&b type property will see a summary of Total Bookings, Pending Bookings, Completed Bookings and Cancelled bookings.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.4",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_anz78.png',
			'demo_url'=>'',
			"author"=>"",
			"authoremail"=>""
			);
		}
	}
