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

class plugin_info_jomres_ajax_search_contentwrapper
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_ajax_search_contentwrapper",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.1",
			"description"=> "Mambot. Wraps all Joomla content areas in a div that gives the jomres ajaxsearch asamodule a place to put search results. In short, when a search is triggered it replaces the contents of the component area with the search results. ",
			"lastupdate"=>"2015/11/13",
			"min_jomres_ver"=>"9.2.1",
			"type"=>"mambot",
			'highlight'=>'Use the Jomres plugin manager to add it to your system, then use Joomla\'s Discover feature to install it. After that, use the Joomla Plugin Manager to enable the plugin. <p><i>Cannot be uninstalled via the Jomres plugin manager, you must use the Joomla Extension Manager instead.</i></p>',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/110-jomres-ajax-search-contentwrapper',
			"change_log"=>"v1.1 PHP7 related maintenance."
			);
		}
	}