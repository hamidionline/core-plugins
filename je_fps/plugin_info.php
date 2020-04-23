<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_je_fps
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_fps",
			"category"=>"Search",
			"marketing"=>"Jomres Frontpage Slideshow plugin can be used to display your featured listings in a nice layout on your site frontpage. It has support for specifying the property types you need to display and the number of featured listings to display, making it very useful if you have a portal with more property/listing types. It requires the jomres_asamodule and featured_listings plugins to be installed.",
			"version"=>(float)"3.3",
			"description"=> "Jomres Frontpage Slideshow plugin can be used to display your featured listings in a nice layout on your site frontpage. It has support for specifying the property types you need to display and the number of featured listings to display, making it very useful if you have a portal with more property/listing types. It requires the jomres_asamodule and featured_listings plugins to be installed. Set the jomres_asamodule task to je_fps and set the params to &ptype_id=X,Y,Z (or 0 if you want to display all property types) and &limit=L (to limit the number of displayed properties) ",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'',
			'change_log'=>'v3.1 Updated paths and usage of Markdown. v3.2 Node/javascript path related changes. v3.3 French language file added ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_o94jd.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
