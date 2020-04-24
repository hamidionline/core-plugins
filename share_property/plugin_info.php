<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_share_property
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"share_property",
			"category"=>"Search",
			"marketing"=>"Adds social buttons to property list and property details pages.",
			"version"=>(float)"2.6",
			"description"=> "The Share Property plugin can be used to display social sharing icons at the bottom of the property details and property list pages. There are 30 icon themes available to choose from. The available social sharing buttons are Facebook, Twitter, Google Bookmarks, LinkedIn, Digg, Delicious, StumbleUpon and Technorati. URLs can be shortened automatically using tinyurl.com. After successfully installing the plugin, a new button will be created in your Jomres control panel (backend). You can configure the icons you want to display, select the icons theme and choose if you want to use the tinyurl.com URL shortening service.",
			"lastupdate"=>"2019/08/12",
			"min_jomres_ver"=>"9.9.9",
			"manual_link"=>'',
			'change_log'=>'v2.1 Resolved a notice. v2.2 Settings moved to site config. v2.3 Updated plugin to use Guzzle v2.4 Removed a defunct service from list. v2.5 French language file added v2.6 let try that again, shall we? French lang file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_9dxbp.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
