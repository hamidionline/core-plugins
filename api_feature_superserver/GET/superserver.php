<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Superserver Touch
	** Description | Used by the superserver to confirm that this server responds correctly to api calls
	** Plugin | api_feature_superserver
	** Scope | superserver_get
	** URL | superserver/touch
 	** Method | GET
	** URL Parameters | superserver/touch
	** Data Parameters | none
	** Success Response | {"data":{"touch":true},"meta":{"code":200}}
	** Error Response | 
	** Sample call |superserver/touch
	** Notes | Used by the superserver to confirm that this server responds correctly to api calls
*/


Flight::route('GET /superserver/touch', function() 
	{
	validate_scope::validate('superserver_get');
	
	Flight::json( $response_name = "touch" , true );
	});



/*
	** Title | Superserver Get property ids
	** Description | Returns a list of property types with their IDs. Will only return published properties.

	** Plugin | api_feature_superserver
	** Scope | superserver_get
	** URL | site_structure
 	** Method | GET
	** URL Parameters |superserver/property_ids
	** Data Parameters | none
	** Success Response | object(stdClass)#292 (2) {
  ["data"]=>
  object(stdClass)#277 (1) {
    ["property_uids"]=>
    array(26) {
      [0]=>
      int(1)
      [1]=>
      int(4)
    }
  }
  ["meta"]=>
  object(stdClass)#494 (1) {
    ["code"]=>
    int(200)
  }
}
	** Error Response | 409 No properties in database
	** Sample call |jomres/api/superserver/property_ids
	** Notes | 
*/

Flight::route('GET /superserver/property_ids', function() 
	{
	validate_scope::validate('superserver_get');
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$stmt = $conn->query( 'SELECT propertys_uid FROM '.Flight::get("dbprefix").'jomres_propertys WHERE published = 1 ORDER BY propertys_uid' );
	$property_uids = array();
	while ($row = $stmt->fetch())
		{
		$property_uids[] = $row['propertys_uid'];
		}
	
	if ( empty($property_uids) )
		Flight::halt(409, "No properties in database");
	else
		{
		Flight::json( $response_name = "property_uids" ,$property_uids);
		}
	});
	
	

Flight::route('GET /superserver/property/@id', function($property_uid) 
	{
	validate_scope::validate('superserver_get');
	
	$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$property_uid = (int)$property_uid;
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data( $property_uid );

	if ( !isset($current_property_details->multi_query_result[$property_uid]) )
		Flight::halt(409, "Property unknown");
	
	$mrConfig	 = getPropertySpecificSettings( $property_uid );
	if (isset($mrConfig['version'])) {
		unset($mrConfig['version']);
	}
	
	$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
	$images = $jomres_media_centre_images->get_images( $property_uid );
	
	$jomres_property_list_prices = jomres_singleton_abstract::getInstance('jomres_property_list_prices');
    $jomres_property_list_prices->gather_lowest_prices_multi(array($property_uid));
	$property_details_url = get_property_details_url($property_uid , "nosef");
	$response = array("details" => $current_property_details->multi_query_result[$property_uid] , "settings" => $mrConfig , "images" => $images , "price" => $jomres_property_list_prices->lowest_prices[$property_uid] , "live_site" => $property_details_url );
	
	
	Flight::json( $response_name = "property_details" ,$response);
	});