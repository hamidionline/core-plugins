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

class plugin_info_jomsearch_m4
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomsearch_m4",
			"category"=>"Search",
			"version"=>(float)"3.4",
			"description"=> 'Module. Search module',
			"type"=>"module",
			"lastupdate"=>"2018/03/14",
			"min_jomres_ver"=>"9.10.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/116-module-jomsearch-m1-m2-m3-m4',
			'change_log'=>'v3.0 1 Changed search template name to reflect name of module. v3.1 PHP7 related maintenance. v3.2 Modified plugin with a fallback for JOMRES_ROOT_DIRECTORY in case the jomres_root.php file cannot be created. v3.3 Updated for Jomres 9.9 v3.4 Removed a definition',
			'highlight'=>'REQUIRES THE ALT INIT PLUGIN TO BE INSTALLED FIRST. ONCE INSTALLED PLEASE USE JOOMLA\'S DISCOVER FEATURE TO FINISH THE MODULE\'S INSTALLATION. <p><i>To upgrade, you need to uninstall this plugin via the Joomla extension manager first, then reinstall it through the Jomres plugin manager. Once you have uninstalled it in the module manager it will still show up as installed in the Jomres plugin manager, but the files will have been removed by Joomla.</i></p>',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
