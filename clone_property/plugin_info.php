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

class plugin_info_clone_property
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"clone_property",
			"category"=>"Administrator tools",
			"marketing"=>"Administrator area function. Clones one property's settings to a new property. This is useful if you manage multiple properties, you can quickly copy one property to a new one. Note that tariffs aren't copied, for that you'll need the Clone Tariffs plugin, which is a frontend feature.",
			"version"=>(float)"4.5",
			"description"=> " Clones one property's settings to a new property.",
			"lastupdate"=>"2019/07/08",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/27-control-panel/site-structure/188-clone-property',
			'change_log'=>'v2.3 Tariff Cloning has been removed from this plugin, as the Clone Tariff plugin is more reliable. Improved the code to ensure that the new property name is added to the property\'s custom text data. v2.4 Cloned properties are now unpublished. v2.5 Modified the property name dropdown so that it is always a dropdown. v2.6 Fix so that plugin will work in WP v2.7 Added functionality to create a new apikey when a property is cloned. v2.8 Changed how a directory path is detected. v2.9  Removed Smoking and Disabled access options from cloning functionality. v3.0 PHP7 related maintenance. v3.1 added Tour cloning.',
			'highlight'=>'Does not clone tariffs, you will need to use the Clone Tariff plugin to populate the tariffs for the newly created property (or create the tariffs manually). v3.2 Fixed an issue where Jintour property room was not added for the purpose of searching. v3.3 Jomres 9.7.4 related changes v3.4 Remaining globals cleanup and jr_gettext refactor related changes. v3.5 Added changes supporting 9.8.30 minicomponent registry changes. v3.6 edit property task renamed. v3.7 Plugin refactored for admin area changes in jr 9.9 v3.8 Modified how array contents are checked. v3.9 Disabled exporting of room features as it can be buggy. v4.0 Notes updated. v4.1 Clones language context now. v4.2 CSRF hardening added. v4.3 Resolved an issue with cloning on non-Quickstart installations. v4.4 French language file added. v4.5 French lang file updated',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_gnf07.png',
			'demo_url'=>''
			);
		}
	}
