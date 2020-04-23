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

class plugin_info_custom_property_fields
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"custom_property_fields",
			"category"=>"Administrator tools",
			"marketing"=>"Allows you to add custom fields in the administrator area (via a new button 'custom property fields'). This allows property managers to add information extra to that normally recorded by the edit property details page.",
			"version"=>(float)"6.1",
			"description"=> " Allows you to add custom fields in the administrator area (via a new button 'custom property fields'). This allows property managers to add information extra to that normally recorded by the edit property details page. This data is added to a new tab in the property details page, however you must edit the tabcontent_01_custom_property_fields.html yourself, sample data is provided that uses the fields that you create to build the template contents.",
			"lastupdate"=>"2019/07/08",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/18-control-panel/developer-tools/149-custom-property-fields',
			'change_log'=>'v2.1 updated to work with Jr7.1 2.2 Jr7.1 specific changes v2.3 Made changes in support of the Text Editing Mode in 7.2.6. v2.4 removed some redunant Touch Template code. v2.5 Minor tweak to ensure that editing mode does not interfere with buttons. v2.6 Removed references to Token functionality that is no longer used. v2.7 A variety of changes relating to v7.4 changes to property type relationships. v2.8 Added a condition to a bootstrap template to prevent output in the event that there is nothing to show. v2.9 Hide menu option if Simple Site Config enabled. v3.0 Reordered button layout. Added BS3 templates. v3.1 Added changes to reflect addition of new Jomres root directory definition. Added functionality to allow custom fields to be added to list properties page. v3.2 added some extra output. v3.3 Added BS3 template related tweaks. v3.4 Improved toolbar rendering in Joomla. v3.5 Added code to translate custom property fields. v3.6 PHP7 related maintenance. v3.7 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v3.8 Jomres 9.7.4 related changes v3.9 Remaining globals cleanup and jr_gettext refactor related changes. v4.0 jr_gettext tweaks. v4.1 Fixed some notice level errors v4.2 Fixed a notice. v4.3 Replaced ereg_replace with preg_replace to be PHP7 compatible. v4.4 fixed some notices. v4.5 Preview option in jomres.php refactored out and this plugin updated to reflect that. v4.6 Advanced Site Config flag removed.  v4.7 Plugin refactored for admin area changes in jr 9.8.30 v4.8 Menu options updated for menu refactor in v9.8.30 v4.9 Modified how array contents are checked. v5.0 Tweaked how a row is generated. v5.1 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v5.2 Fixed a bug in a previous version v5.3 Improved how language translations are done for custom field names. v5.4 translation handling improved. v5.5 Node/javascript path related changes. v5.6 Resolved an issue with field name descriptions not being translated. v5.8 Added a new script to allow you to show property fields data in other Jomres templates. See the note in j06000custom_property_fields.class.php v5.9 CSRF hardening added. v6.0 French language file added. v6.1 French lang file updated',
			'highlight'=>'Warning : To use this plugin you need to customise the tabcontent_01_custom_property_fields.html template file, however if you upgrade this plugin then that file will be overwritten, so please ensure that you have backed it up before upgrading this plugin.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_tcyub.png',
			'demo_url'=>''
			);
		}
	}
