<?php
/**
 * Core file
 *
 * @author
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Register site
	** Description | Push a site to the app server
	** Plugin | api_feature_register_site
	** Scope | properties_get
	** URL | register_site
 	** Method | POST
	** URL Parameters | register_site/
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api_url/register_site/http://localhost/joomla_portal
	** Notes |

*/

Flight::route('POST /register_site/', function()
	{
	require_once("../framework.php"); // Option for api features, but required by this method


	$localhost_allowed = false; // Set this to false when in prod

	// We first need to get the url to the api and IP number of the remote server

	if ( !isset($_POST['api_url'])) {
		Flight::halt(204, 'api_url not sent');
	}

	$api_url		= filter_var( urldecode($_POST['api_url']), FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
	
	logging::log_message('Received request to register site '.$api_url, 'SITE_REGISTRATION', 'INFO');
	
	$ip				= jomres_get_client_ip();

	$remote_url = parse_url($api_url);

	// Basic checks
	$query = "SELECT id FROM ".Flight::get("dbprefix")."jomres_registered_sites WHERE ip_number = '".$ip."'  AND `api_url` = '".$api_url."' ";
	$result = doSelectSql($query);
	
	if (count($result) != 0) {
		Flight::halt(204, 'Site already registered');
	}

	if ($remote_url['host'] == "localhost" && $localhost_allowed == false ) {
		Flight::halt(204, 'Localhost not allowed');
	}

	if ( ($ip == "127.0.0.1" || $ip == "0.0.0.0") &&  $localhost_allowed == false ) {
		Flight::halt(204, 'Localhost not allowed');
	}

	// Now we need to call it back. This will confirm that it's a Jomres installation, and get the number of properties
	try {
		$client = new GuzzleHttp\Client(['base_uri' => $remote_url['scheme'].'://'.$remote_url['host']]);
		$response = $client->request('GET' , $remote_url['path'].'core/report/');
	} catch (\Exception $e) {
		logging::log_message('Unable to communicate with remote site '.$api_url.' failed with error '.$e->getMessage(), 'SITE_REGISTRATION', 'INFO');
		Flight::halt(204, 'Unable to communicate with remote site');
		//var_dump($e->getMessage());exit;
	}

	// We will call core/report, which will respond with the Jomres url and the number of properties installed
	$code = $response->getStatusCode();
	if ($code == 200) {
		$body				= json_decode((string)$response->getBody());
		$data				= $body->data->report[0];
		$api_url			= urldecode($data->api_url);
 		$jomres_url			= urldecode($data->jomres_url);
		$property_count		= (int)$data->property_count;
		
	} else {
		Flight::halt(204, 'Could not validate remote server details');
	}

	// Assuming that the data is valid, we will store the remote site's api url, ip number and jomres url in the database
	$query="INSERT INTO ".Flight::get("dbprefix")."jomres_registered_sites SET
		`jomres_url`		= '".filter_var($jomres_url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED)."' ,
		`api_url`			= '".filter_var($api_url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED)."' ,
		`ip_number`			= '".$ip."' ,
		`property_count`	= ".(int)$property_count." ,
		`display`			= true ,
		`date_added`		= '".date('Y-m-d H:i:s')."'
		";

	$id = doInsertSql($query);
	if ( (int)$id > 0) {
		$query = "DELETE FROM ".Flight::get("dbprefix")."jomres_registered_sites WHERE `ip_number` = '".$ip."' AND `api_url` = '".$api_url."' AND id != '".(int)$id."'";
		doInsertSql ($query);
		logging::log_message('Added site '.$api_url, 'SITE_REGISTRATION', 'INFO');
		Flight::json( $response_name = "reponse" ,true);
	} else {
		Flight::json( $response_name = "reponse" ,false);
	}
	});



/*
	** Title | Delete site
	** Description | Allows remote sites to remove themselves from the syndication network
	** Plugin | api_feature_register_site
	** Scope | properties_get
	** URL | register_site
 	** Method | POST
	** URL Parameters | register_site/remove_site/
	** Data Parameters | 
	** Success Response | 
	** Error Response | 
	** Sample call |jomres/api_url/register_site/remove_site
	** Notes |  
	
*/

Flight::route('POST /register_site/remove_site/', function() 
	{
	require_once("../framework.php"); // Option for api features, but required by this method

	// We first need to get the url to the api and IP number of the remote server

	if ( !isset($_POST['api_url'])) {
		Flight::halt(204, 'api_url not sent');
	}
	
	
	
	$api_url		= filter_var( urldecode($_POST['api_url']), FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
	$license_key	= filter_var( $_POST['license_key'] );
	$remove			= (int) $_POST['remove'];
	$ip				= jomres_get_client_ip();
	
	logging::log_message('Received request to remove/readd site '.$api_url, 'SITE_REGISTRATION', 'INFO');
	
	// Flip the remove flag
	if ($remove == 1 ) {
		$display = 0;
	} else {
		$display = 1;
	}

	$remote_url = parse_url($api_url);
	
	// Basic checks
	$query = "SELECT id FROM ".Flight::get("dbprefix")."jomres_registered_sites WHERE ip_number = '".$ip."'  AND `api_url` = '".$api_url."' LIMIT 1";
	$id = (int)doSelectSql($query,1);
	
	if (!isset($id) || $id == 0 ) {
		Flight::halt(204, 'Site not registered');
	}
	
	if ($remote_url['host'] == "localhost" ) {
		Flight::halt(204, 'Localhost not allowed');
	}
	
	if ( ($ip == "127.0.0.1" || $ip == "0.0.0.0") ) {
		Flight::halt(204, 'Localhost not allowed');
	}
	
 	$jomres_check_support_key = jomres_singleton_abstract::getInstance('jomres_check_support_key');
	
	$jomres_check_support_key->check_license_key(true , $license_key );
	
	if ($jomres_check_support_key->key_valid) {
		// If the key is valid, we'll carry out the request
		if ($display == 1 ) {
			$date = '';
		} else {
			$date = date('Y-m-d');
		}
		$query="UPDATE ".Flight::get("dbprefix")."jomres_registered_sites SET 
			`display`					= ".$display." ,
			`date_display_denied`		= '".$date."'
			WHERE id = ".$id."
			";

		$result = doInsertSql($query);

		if ($result) {
			Flight::json( $response_name = "reponse" ,true);
		} else {
			Flight::json( $response_name = "reponse" ,false);
		}
	}
	
 
	});
