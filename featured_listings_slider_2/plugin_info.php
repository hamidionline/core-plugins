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

class plugin_info_featured_listings_slider_2
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings_slider_2",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to display a slider with the featured listings in a module position.",
			"version"=>(float)"2.1",
			"description"=> "Allows you to display a slider with the featured listings in a module position using jomres_asamodule by setting the task to featured_listings_slider_2. Note, this plugin is not suitable for bootstrapped templates. ",
			"lastupdate"=>"2017/05/10",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/64-featured-listings-slider-2',
			'change_log'=>'v1.1 Improved how html is stripped from descriptions. 1.2 Updated to work with Jr7. v1.3 Added code supporting Media Centre image locations. v1.4 Improved how the feature listings ordering is calculated. v1.5 added limiting to prevent broken layouts if too many featured listings are chosen. v1.6 Added functionality pertaining to Jomres javascript versioning. v1.7 Added changes to reflect addition of new Jomres root directory definition. v1.8 PHP7 related maintenance. v1.9 Changed how paths to css/javascript are determind. v2.0 Modified functionality to use new get_property_details_url function. v2.1 Modified how array contents are checked. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_ld3k5.png',
			'demo_url'=>''
			);
		}
	}
