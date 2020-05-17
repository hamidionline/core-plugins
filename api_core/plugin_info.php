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

class plugin_info_api_core
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_core",
			"marketing"=>"Provides the ability for all registered users to create API clients for use with Jomres API functionality.",
			"version"=>"1.9",
			"description"=> "Provides the ability for all registered users to create API clients for use with Jomres API functionality.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2017/07/02",
			"min_jomres_ver"=>"9.9.5",
			"manual_link"=>'http://www.jomres.net/manual/developers-guide/63-jomres-api',
			'change_log'=>'v0.3 Added support for authorisation code grant type. v0.4 Signficantly updated documentation and added new menu option for accessing said documentation. v0.5 Changed the redirect url. v0.6 Added shortcode related changes plus the ability for site admins to switch off the output that typically appears in the My Account section of the main menu. v0.7 API (oauth) tables moved into Jomres Core, & because the call self functionality uses user ids as client ids for registered users, added checks to ensure that client ids of usernames cannot be used by guests ( in case the site admin decides to change the oauth template so that users can enter their own client ids ). v0.8 Limited API menu options to just managers ( for now ) as whilst we included functionality that allow guests to create API keys ( to ensure that it could be done ) I do not currently envisage much guest orientated API functionality (e.g. list my bookings ) being added at this time. This will be reviewed in the future, for now our focus will remain on Property Manager centric functionality. Added Delete function to API key list. v0.9 Added minor filtering to ensure that a returned array is unique. v1.0 Added an administrator - Jomres - Dev tools - API Methods option to view the API methods. This page automatically generates the API methods list of the site based on the currently installed API feature plugins, ensuring that your API methods list is always up-to-date. v1.1 Site Config tabs updated. v1.2 Added a column to allow users to identify key pairs. v1.3 Advanced Site Config flag removed. v1.4 Modified how admin menu is generated. v1.5 Added cron jobs for tidying up old tokens. v1.6 Older api methods removed from plugin and users are now directed to the Jomres API documentation as it is a lot easier to maintain. v1.7 Changed how a path is defined. v1.8 Added ability to support Implicit grant type, demonstrating the implicit authorisation url and the ability to save your own redirect urls, and accompanying notes. 1.9 Added support for auth_free functionality which will be introduced in 9.9.6. Added support for searching for scopes files in third party plugins dirs.',
			'highlight'=>'',
			'image'=>'https://www.jomres.net/manual/images/Manual/09_36_83inw.png',
			'demo_url'=>'',
			'retired'=>'1'
			);
		}
	}
