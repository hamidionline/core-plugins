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

class plugin_info_jomres_asamodule
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_asamodule",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.9",
			"description"=> 'Module. Allows you to run a certain Jomres task as a module. See the module parameters page for more information.  ',
			"type"=>"module",
			"lastupdate"=>"2018/03/14",
			"min_jomres_ver"=>"9.10.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/111-jomres-asamodule',
			'change_log'=>' v1.2 Updated plugin for v4/v5 compatability. 1.3 tweaked plugin for v6 to ensure that the showtime task is set. 1.4 minor code tidyup. v1.5  Modified paths to take into account new path modifications in Jomres. v1.6 updated to add no caching option for asamodules so now for some asamodule tasks we can have no caching, like recently viewed, which always changes v1.7 PHP7 related maintenance. v1.8 Modified plugin with a fallback for JOMRES_ROOT_DIRECTORY in case the jomres_root.php file cannot be created. v1.9 Removed a definition',
			'highlight'=>' REQUIRES THE ALT INIT PLUGIN TO BE INSTALLED FIRST. ONCE INSTALLED PLEASE USE JOOMLA\'S DISCOVER FEATURE TO FINISH THE MODULE\'S INSTALLATION. <p><i>To upgrade, you need to reinstall it through the Jomres plugin manager. Once you have uninstalled it in the module manager it will still show up as installed in the Jomres plugin manager, but the files will have been removed by Joomla.</i></p>',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}