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

class plugin_info_pageview_recorder
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"pageview_recorder",
			"marketing"=>"Logs page views.",
			"version"=>"1.3",
			"description"=> "Logs page views. Does not provide any way of viewing output, instead this plugin replaces functionality that was removed from default installations of Jomres as some older users requested the functionality be restored.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'',
			'change_log'=>'v1.1 Modified to not trigger on ajax calls. v1.2 Added settings to enable/disable functionality in the Debugging tab of Site Config. v1.3 French language file added. ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
