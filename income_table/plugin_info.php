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

class plugin_info_income_table
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"income_table",
			"category"=>"Reporting",
			"marketing"=>"Adds a new button to the reports menu in the frontend, Shows a basic table of income by month",
			"version"=>(float)"1.2",
			"description"=> "Adds a new button to the reports menu in the frontend, Shows a basic table of income by month",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.11.1",
			"manual_link"=>'',
			'change_log'=>'v1.1 Updated access level for menu option. Commented out the query that pulls booking values for all properties. Should only show for the current property. v1.2 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/2018-05-30_tab8d.png',
			'demo_url'=>''
			);
		}
	}
