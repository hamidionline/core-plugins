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

class plugin_info_je_top_destinations
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_top_destinations",
			"category"=>"Search",
			"marketing"=>"Displays top destinations (towns with most listings).",
			"version"=>(float)"4.3",
			"description"=> "Displays top destinations (towns with most listings) by using the jomres_asamodule and setting the task to je_top_destinations. Use &topdest_limit=L as param to set how many destinations to show and &topdest_ptype_ids=X,Y,Z to set the property types you want to show and count. ",
			"lastupdate"=>"2020/08/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'',
			'change_log'=>'v1.3 Added region output. v1.4 Updated with Twitter Bootstrap templates. v1.5 Updated to display regions properly. v1.6 Fixed problem with regions not being displayed correctly. v1.7 Small improvements. v1.8 Updated for Jomres 8.1 and dropped compatibility with older Jomres versions. v1.9 Added Bootstrap 3 support. v2 Updated constructors for PHP7. v3.1 Improved a query for performance. v3.2 Plugin improved to use media centre uploading refactor in 9.8.27 v3.3 Modified how region names are determined v3.4 Plugin refactored for new menu changes. v3.5 Added property type ids to the resultant search url if they are set. v3.7 Updated how town images are found. v3.8 Changed a trigger point for language inclusion. v3.9 Resolved an issue with duplicated town images. v4.0 Node/javascript path related changes. v4.1 link added to counter badge. v4.2 French language file added v4.3 BS4 template set added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_855pp.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
			
		}
	}
