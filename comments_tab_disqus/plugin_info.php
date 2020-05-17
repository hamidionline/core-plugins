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

class plugin_info_comments_tab_disqus
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"comments_tab_disqus",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Adds a Disqus comment tab to the property details page. ",
			"version"=>(float)"2.2",
			"description"=> "Adds a Disqus comment tab to the property details page. Please remember to update the Disqus settings page before using this. The button is found under the Portal category in the Jomres menu.",
			"lastupdate"=>"2017/05/11",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/41-comments-tabs-disqus',
			'change_log'=>'v1.1 removed slashes in output code. v1.2 changed menu section to "integration" and added an image. 1.3 updated to work with Jr7.1 v1.4 Reordered button layout. v1.5 changed how a directory path is detected. v1.6 Url to embed script updated to use protocol specific urls. v1.7 PHP7 related maintenance. v1.8 Jomres 9.7.4 related changes v1.9 Remaining globals cleanup and jr_gettext refactor related changes. v2.0 Settings moved to Site Config. v2.1 Site config tabs updated. v2.2 Fixed a notice.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_glr2l.png',
			'demo_url'=>''
			);
		}
	}
