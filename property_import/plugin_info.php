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

class plugin_info_property_import
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_import",
			"category"=>"Administrator tools",
			"marketing"=>"This feature allows site managers to import properties via csv files.",
			"version"=>(float)"2.3",
			"description"=> "This feature allows site managers to import properties via csv files. A new menu option is added to the administrator area under the Site Structure category. When you click on that, you'll find a new menu option under Site Structure where you can import properties from a csv file.",
			"lastupdate"=>"2019/10/21",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/27-control-panel/site-structure/324-property-import',
			'change_log'=>'v1.0 Jomres 9.7.4 related changes v1.1 Jomres 9.7.4 related changes v1.2 Remaining globals cleanup and jr_gettext refactor related changes. v1.3 Notice level changes. v1.4  Removed references to Jomres Array Cache as it is now obsolete. v1.5 Modified how admin menu is generated. v1.6 Modified how array contents are checked. v1.7 Added a new definition to replace the dashboard task. v1.8 Fixed issue where region and country arrays were not being imported on sites where those regions had not already been populated. v1.9 Updated code to use a new class. v2.0 CSRF hardening added. v2.1 French language file added v2.2 French lang file updated v2.3 Added a check to see how the property uid is handled',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_o1cti.png',
			'demo_url'=>''
			);
		}
	}
