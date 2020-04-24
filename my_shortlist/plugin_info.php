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

class plugin_info_my_shortlist
	{
	function __construct()
		{
		$this->data=array(
		"name"=>"my_shortlist",
			"marketing"=>"Show the guest's shortlisted properties in the sidebar.",
			"category"=>"Site Building Tools",
			"version"=>"1.2",
			"description"=> "Use Jomres asamodule to show the guest's shortlisted items in a sidebar. Set the asamodule task to 'my_shortlist' and as items are added to their shortlist, on the next pageload the item is added to their sidebar ",
			"lastupdate"=>"2017/05/10",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/84-my-shortlist',
			'change_log'=>'v1.1 PHP7 related maintenance. v1.2 Modified how array contents are checked.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_1simi.png',
			'demo_url'=>''
			);
		}
	}
