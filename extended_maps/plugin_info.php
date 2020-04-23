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

class plugin_info_extended_maps
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"extended_maps",
			"category"=>"Search",
			"marketing"=>"Provides an alternative front page to Jomres Property List page (but this can be switched off if required). Shows a google map with points for the various published propertys.",
			"version"=>"8.2",
			"description"=> "Shows a google map with points for the various published propertys. If displayed through jomres_asamodule you can add arguments in the arguments field in the format of '&ptype_ids=4,5,3' to ensure that you only include properties of a certain type. Example usage in url or asamodule: &show_properties=0 This will display a map only with attractions and events. &show_events=0&show_properties=0 This will display a map only with attractions. Property type specific markers can be uploaded through the administrator area Media Centre in the Site Structure menu area after installing the marker uploader." , 
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.11.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/175-extended-maps',
			'change_log'=>'v4.9 added a change that prevents extended maps being triggered when the task is configured to override the property list and the user is a manager. v5.0 Added changes to reflect addition of new Jomres root directory definition. v5.1 replaced a depreciated function. Tweaked BS3 related templates. v5.2 Fixed path to g maps script to use https. v5.3 Removed some redundant code. v5.4 Improved admin area input layout. v5.5 PHP7 related maintenance. v5.6 Jomres 9.7.4 related changes v5.7 Remaining globals cleanup and jr_gettext refactor related changes. v5.8 updated javascript, stopped working after moved to github. v5.9 Plugin updated to use new map styles. v6.0 Fixed some notice level errors. v6.1 Modified map so that scroll wheel on mouse is disabled. v6.2 Added Shortcode related changes. v6.3 Tweaked a clause to add more filtering options. v6.4 Added support for new Jomres map markers. v6.5 PSR2 related changes. v6.6 Modified functionality to use new get_property_details_url function. v6.7 Previously you could not have more than one country, or region or town in the parameters, this version now allows use of all three at the same time. v6.8 Removed weather layer as it is no longer offered by gmaps and this causes javascript errors. v6.9 Modified plugin to cope with town/region/property is set to All and published on front page. Would cause "No properties with lat/long settings" error. v7.0 Resolved an issue with a query searching for property types. v7.2 Settings moved to site config. v7.3 Fixed a configuration variable name. v7.4 Fixed a bug caused by new changes. v7.5 Modified how array contents are checked. v7.6 Fixed a notice. v7.7 Changed how a path is defined & how variables are detected. v7.8 Settings moved to site config gmaps tab. v7.9 Improved a query to make it broader v8.0 Node/javascript path related changes. v8.1 csv hardening protection str replace of hyphens resolved. v8.2 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_z42sy.png',
			'demo_url'=>''
			);
		}
	}
    
    
    
