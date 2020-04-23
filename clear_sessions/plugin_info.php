<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2018 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_clear_sessions
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"clear_sessions",
			"category"=>"Administrator tools",
			"marketing"=>"Administrator area function. Empties the sessions table.",
			"version"=>(float)"1.1",
			"description"=> " Empties the sessions table.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.12.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added.',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
