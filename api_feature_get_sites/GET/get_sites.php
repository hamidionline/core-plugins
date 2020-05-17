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
	** Title | Get sites
	** Description | Report all sites records on the app server
	** Plugin | api_feature_get_sites
	** Scope | properties_get
	** URL | register_site
 	** Method | POST
	** URL Parameters | get_sites/
	** Data Parameters |
	** Success Response |
	** Error Response |
	** Sample call |jomres/api/get_sites/
	** Notes |

*/

Flight::route('GET /get_sites/', function()
	{
	require_once("../framework.php"); // Option for api features, but required by this method

	$query="SELECT `jomres_url` , `api_url` , `property_count` FROM ".Flight::get("dbprefix")."jomres_registered_sites WHERE `display` = 1 ";
	$result = doSelectSql($query);
	
	$data = array();
	
	$total_properties = 0;
	$total_sites = 0;
	
	if (count($result) > 0 ) {
		foreach ($result as $site) {
			if (trim($site->api_url) != '' ) {
				$data["sites"][] = (object) [
					'jomres_url'		=> $site->jomres_url,
					'api_url'			=> $site->api_url,
					'property_count'	=> $site->property_count 
					];
				$total_sites++;
				$total_properties = $total_properties + (int)$site->property_count;
			}
		}
	}
	
	$data['total_sites'] = $total_sites;
	$data['total_properties'] = $total_properties;
	
	Flight::json( $response_name = "sites" ,$data);
	});
	
