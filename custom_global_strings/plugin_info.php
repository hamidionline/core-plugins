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

class plugin_info_custom_global_strings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"custom_global_strings",
			"category"=>"Administrator tools",
			"marketing"=>"Lists and allows you to delete custom global strings. This is useful if you've used editing mode with Global Editing enabled and created a global string in error.",
			"version"=>(float)"3.4",
			"description"=> " Lists and allows you to delete custom global strings. This is useful if you've used editing mode with Global Editing enabled and created a string that you don't want.",
			"lastupdate"=>"2019/09/02",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/22-control-panel/languages/166-global-strings',
			'change_log'=>' 1.2  updated for use in v5.6 1.3 updated templates. 1.4 updated for use in Jr7 1.5  Templates bootstrapped. 1.6 Jr7.1 specific changes v1.7 Array Cache related changes. v1.8 Hide menu option if Simple Site Config enabled. v1.9 Added BS3 templates. 2.0 Added changes to reflect addition of new Jomres root directory definition. v2.1  Modified plugin to ensure correct use of jomresURL function. v2.2 Improved how toolbar is constructed in Joomla. v2.3 PHP7 related maintenance.v2.4 Jomres 9.7.4 related changes v2.5 Remaining globals cleanup and jr_gettext refactor related changes. v2.6 Fixed some notice level errors. v2.7  Removed references to Jomres Array Cache as it is now obsolete. v2.8 Advanced Site Config flag removed. v2.9 Modified how admin menu is generated. v3.0 Modified how array contents are checked. v3.1 Updated functionality to work with new language context handling. v3.2 Node/javascript path related changes. v3.3 French language file added. v3.4 French language file updated. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_4950c.png',
			'demo_url'=>''
			);
		}
	}
