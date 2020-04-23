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

class plugin_info_featured_listings_slider_1
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings_slider_1",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to display a slider with the featured listings in a module position.",
			"version"=>(float)"2.9",
			"description"=> "Allows you to display a slider with the featured listings in a module position using jomres_asamodule by setting the task to featured_listings_slider_1. You can also set the property/listing types ids to be displayed by using &ptype_ids=X,Y,Z and the number of properties/listings to be displayed by using &limit=L.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.10",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/63-featured-listings-slider-1',
			'change_log'=>'1.1 fixed a bug where the limit wasn\'t being set correctly. v1.2 Improved how html is stripped from descriptions. v1.3 tweak to ensure limit setting is used. 1.4 css tweak 1.5 Updated to work with Jr7 1.6 Bootstrapped. If using bootstrap this plugin will use Bootstrap carousel instead of the older slideshow functionality. 1.7 Modified thumbnail so that it links to property details page. 1.8 Added code supporting Media Centre image locations. v1.9 Improved how the feature listings ordering is calculated. v2.0 added limiting to prevent broken layouts if too many featured listings are chosen. v2.1 Added BS3 templates. v2.2 Added functionality pertaining to Jomres javascript versioning. v2.3 Added changes to reflect addition of new Jomres root directory definition. v2.4 PHP7 related maintenance. v2.5 Remaining globals cleanup and jr_gettext refactor related changes. v2.6  Modified functionality to use new get_property_details_url function. v2.7 Modified how array contents are checked. v2.8 Shortcode data updated. v2.9 French language file added.',
			'highlight'=>'',
			'image'=>'http://www.jomres.net/non-joomla/plugin_list/plugin_images/featured_listings_slider_1.png',
			'demo_url'=>''
			);
		}
	}
