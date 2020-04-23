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

class plugin_info_featured_listings_asamodule_3
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings_asamodule_3",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to display the featured listings on a page or in a module/widget position.",
			"version"=>"2.1",
			"description"=> "Allows you to display the featured listings in a module/widget position using the jomres_asamodule/jomres_shortcodes plugins by setting the task to featured_listings_asamodule_3. You can also set the property/listing types ids to be displayed by using &ptype_ids=X,Y,Z and the number of properties/listings to be displayed by using &limit=L",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.18",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/320-featured-listings-asamodule-3',
			'change_log'=>'v1.1 fixed a class to have a . period so that countries are sorted properly. v1.2 Jomres 9.7.4 related changes v1.3 Jomres 9.7.4 related changes v1.4 Remaining globals cleanup and jr_gettext refactor related changes. v1.5 Removed references to customtext class due to 9.8.2 language changes. v1.4 User role related updates. v1.5 Modified functionality to use new get_property_details_url function. v1.7 Updated a query. v1.8 Menu options updated for menu refactor in v9.8.30 v1.9 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.0 Node/javascript path related changes. v2.1 French language file added. ',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_9d2oe.png',
			'demo_url'=>'',
			'highlight'=>'Bootstrap 3 only!'
			);
		}
	}
