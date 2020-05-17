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

class plugin_info_property_notes
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_notes",
			"category"=>"Administration",
			"marketing"=>"Adds the ability for property managers to leave notes about a property that are only visable by them, for example keyholder details. Adds new widget to see these notes on the Dashboard.",
			"version"=>"1.3",
			"description"=> "Adds the ability for property managers to leave notes about a property that are only viable by them. Adds a new menu option under Dashboard where notes can be added.  Adds new widget to see these notes on the Dashboard. Property specific.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/09/16",
			"min_jomres_ver"=>"9.14.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Property notes plugin updated to prevent an error showing in the plugin manager. v1.2 French language file added v1.3 Fixed some notices',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
