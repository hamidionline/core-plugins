<?php
/**
 * Core file
 *
 * @author
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2019
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get sites confirm
	** Description | Confirm if an api url is stored on the app server
	** Plugin | api_feature_get_sites
	** Scope | properties_get
	** URL | register_site
 	** Method | POST
	** URL Parameters | get_sites/
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api/get_sites/confirm/
	** Notes |

*/

Flight::route('POST /get_sites/confirm/', function()
	{
	require_once("../framework.php"); // Option for api features, but required by this method


	// We first need to get the url to the api and IP number of the remote server
	if ( !isset($_POST['api_url'])) {
		Flight::halt(204, 'api_url not sent');
	}

	$api_url		= filter_var( urldecode($_POST['api_url']), FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
	
	logging::log_message('Received request to register site '.$api_url, 'SITE_REGISTRATION', 'INFO');
	
	$ip				= jomres_get_client_ip();

	$remote_url = parse_url($api_url);
 
	// Basic checks
	$query = "SELECT id FROM ".Flight::get("dbprefix")."jomres_registered_sites WHERE ip_number = '".$ip."'  AND `api_url` = '".$api_url."' AND display = 1";
	$result = doSelectSql($query);

	if (count($result) != 0) {
		Flight::json( $response_name = "response" ,true);
		}
	else {
		Flight::json( $response_name = "response" ,false);
		}
	});
