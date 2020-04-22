<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_deepl
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"deepl",
			"category"=>"System",
			"marketing"=>"Provides automatic machine translation of labels and text in Jomres.",
			"version"=>"1.2",
			"description"=> "Experimental. Provides automatic machine translation of labels and text in Jomres. Visit Site Configuration -> Integrations to set your API key, and Site Configuration -> Misc to configure the default 'source' language. DeepL supports translations into English, German, French, Spanish, Italian, Dutch & Polish." , 
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.12.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Improved how strings are sanitised before saving to custom text table. v1.2 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/2018-06-20_8hwjx.png',
			'demo_url'=>''
			);
		}
	}
