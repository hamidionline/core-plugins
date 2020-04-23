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

class plugin_info_joomla_menu_maker
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"joomla_menu_maker",
			"category"=>"Search",
			"version"=>"1.4",
			"description"=> "This plugin allows Super Property Managers to add new options to any Joomla menu. Go to the Jomres page you want to link to in a new menu, under the Search menu option (only viewable while the site's status is set to Development in Site Configuration as of Jomres 8) will be an option 'Add this page to a menu'. Click that link to add the page to a new Joomla menu, on the following page you will be able to give the link a title and choose the menu to add it to.",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.8.11",
			'change_log'=>' v0.9 BS3 template related tweaks. v1.0 PHP7 related maintenance. v1.1 Improved how menus are saved. v1.2 Added proper class constructor v1.3 Fixed a couple of notices, resolved some issues where the J code could complain about Locking problems, and added code to build a new Alias if the current one already exists. v1.4 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/47-your-toolbar/search/343-add-this-page-to-a-joomla-menu'
			
			);
		}
	}
