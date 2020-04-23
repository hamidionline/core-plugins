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

class plugin_info_superserver_client
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"superserver_client",
			"marketing"=>"Provides functionality that allows you to register your site on the Jomres Online Booking Network",
			"version"=>"0.2",
			"description"=> "Under Development. Provides functionality that allows you to register your site on the Jomres Online Booking Network. Once installed, visit the Administrator area -> Portal -> Online Booking Network menu option. Follow the onscreen instructions to connect your site on the Jomres Super Server. ",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2017/09/06",
			"min_jomres_ver"=>"9.9.10",
			"manual_link"=>'',
			'change_log'=>' v0.2 fixed an issue where plugin not being installed could trigger a patTemplate error.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
