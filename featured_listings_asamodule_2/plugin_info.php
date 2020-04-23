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

class plugin_info_featured_listings_asamodule_2
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings_asamodule_2",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to display the featured listings in a module position.",
			"version"=>"3.3",
			"description"=> "Allows you to display the featured listings in a module position using jomres_asamodule by setting the task to featured_listings_asamodule_2.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.18",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/62-featured-listings-asamodule-2',
			'change_log'=>'1.1 fixed an issue where this plugin and featured_listings_asamodule_1 had a duplicated function name. 1.2 change in the description output. first we don`t need to parse the description by bots in modules, and we also use strip html tags and html entity decode to avoid displaying the html code in text 1.3 Updated to work with Jr7 1.4  Templates bootstrapped. v1.5 updated code to use translatable region names. v1.6 Added code supporting Media Centre image locations. v1.7 Improved how the feature listings ordering is calculated. v1.8 Added BS3 templates. v1.9 Added changes to reflect addition of new Jomres root directory definition. v2.0 BS3 template related changes. v2.1 PHP7 related maintenance. v2.2 Jomres 9.7.4 related changes v2.3 Remaining globals cleanup and jr_gettext refactor related changes. v2.4 Removed references to customtext class due to 9.8.2 language changes. v2.5 User role related updates. v2.6 Modified functionality to use new get_property_details_url function. v2.7 Updated a query. v2.8 Menu options updated for menu refactor in v9.8.30 v2.9 Modified how array contents are checked. v3.0 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v3.1 Shortcode data updated v3.2 Node/javascript path related changes. v3.3 French language file added.' ,
			'image'=>'https://snippets.jomres.net/2017-09-21_caskg.png',
			'demo_url'=>''
			);
		}
		

	}
