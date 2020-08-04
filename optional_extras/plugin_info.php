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

class plugin_info_optional_extras
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"optional_extras",
			"category"=>"Bookings Configuration",
			"marketing"=>"Adds a new button to the manager's toolbar, and allows the creation of various models of optional extras which are added to the booking form. These are upsold items that are offered in the booking form after the rooms have been selected.",
			"version"=>(float)"6.8",
			"description"=> " Adds a new button to the manager's toolbar, and allows the creation of various models of optional extras which are added to the booking form (e.g. bouquet on arrival). v5.5 changes to allow property managers to set an optional extra as selected in the booking form when the form opens. ",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/257-extras-admin',
			'change_log'=>'v4.0 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v4.1 Added functionality that allows managers to make optional extras only available when X room types have already been selected. v4.2 minor tweak that swaps extra name and description when building a dropdown. v4.3 Added a fix for Jintour properties creating sql errors because they do not have any room types. v4.4 Added some minor improvements to searches for room types. v4.5 Jomres 9.7.4 related changes v4.6 Remaining globals cleanup and jr_gettext refactor related changes. v4.7 jr_gettext tweaks. v4.8 Resolved an issue with images. v4.9 Extras models table cleaned up on Delete Extras. v5.0 Changed how optional extras descriptions are saved to the database so that they can be translated. v5.1 to prompt reinstallation of plugin. v5.2 Webhook related changes. v5.3 Webhooks renamed for consistency. v5.4 Notices fixes. v5.5 Removed a stray ?> from a file. v5.6 Changes relating to media centre updates. v5.7 Added changes supporting 9.8.30 minicomponent registry changes v5.8 Extras tasks renamed and renumbered. v5.9 Property modification tasks updated. v6.0 Menu options updated for menu refactor in v9.8.30 v6.1 Subscription related functionality updated v6.2 Modified how array contents are checked. v6.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v6.4 Node/javascript path related changes. v6.5 Improved a query v6.6 CSRF hardening added. v6.7 Added property_uid to webhook v6.8 BS4 template set added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_o80ar.png',
			'demo_url'=>''
			);
		}
	}
