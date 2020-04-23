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

class plugin_info_bypass_confirmation
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bypass_confirmation",
			"category"=>"Miscellaneous",
			"marketing"=>" A plugin to allow us to bypass the confirmation page if required.",
			"version"=>(float)"1.7",
			"description"=> " A plugin to allow us to bypass the confirmation page if required.  Note that if the property manager has more than one gateway configured then this plugin does not come into effect, because the payment method selection in the confirmation page needs to be accessed by the guest.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.9.6",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/37-bypass-confirmation',
			'change_log'=>' v1.1  Modified plugin to ensure correct use of jomresURL function. v1.2 Added custom field handling functionality. v1.3 PHP7 related maintenance. v1.4 Site Config setting added that enables / disables plugin. v1.5 Modified how array contents are checked. v1.6 Fixed an issue created by new gateway code. v1.7 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
			'demo_url'=>''
			);
		}
	}
