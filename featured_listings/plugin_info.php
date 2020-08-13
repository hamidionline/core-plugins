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

class plugin_info_featured_listings
{
	function __construct()
		{
		$this->data=array(
			"name"=>"featured_listings",
			"category"=>"Site Building Tools",
			"marketing"=>" Allows you to set some listings as featured. The search results will have the featured listings (that qualify in the search) displayed at the top. Once properties are marked as featured you can then use some of the Features Listings slider/gallery plugins.",
			"version"=>"3.5",
			"description"=> " Allows you to set some listings as featured. The search results will have the featured listings (that qualify in the search) displayed at the top. Successor to the older 'featured properties' plugins.",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/177-featured-listings',
			'change_log'=>'v1.1 Modified to work with bootstrap, and added option to enter a featured listings class so that featured listings are emphasised in the property list. 1.2  Templates bootstrapped. 1.3 updated to work with Jr7.1 1.4 Jr7.1 specific changes v1.5 Minor tweak to ensure that editing mode does not interfere with buttons. v1.6 Hide menu option if Simple Site Config enabled. v1.7 Added BS3 templates. v1.8 Added changes to reflect addition of new Jomres root directory definition. v1.9  Modified plugin to ensure correct use of jomresURL function. v2.0 Minor query improvement. v2.1 Fixed a bug where featured listings class would not save due to a change in Site Settings functionality. v2.2 PHP7 related maintenance. v2.3 Jomres 9.7.4 related changes v2.4 Remaining globals cleanup and jr_gettext refactor related changes. v2.5 Fixed some notice level errors. v2.6 Performance improvements. v2.7 Advanced Site Config flag removed. v2.8 Plugin refactored for admin area changes in jr 9.9 v2.9 Modified how array contents are checked. v3.0 Language string clarified. v3.1 Changed how variables are detected. v3.2 CSRF hardening added. v3.3 Added site config option to allow site admins to prevent feature properties from appearing at the top of search results.  v3.4 French language file added. 3.5 BS4 template set added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_u8k1x.png',
			'demo_url'=>''
			);
		}
	}

	