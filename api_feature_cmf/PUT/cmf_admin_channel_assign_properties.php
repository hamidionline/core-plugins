<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('PUT /cmf/admin/channel/assign/properties', function()
	{
    require_once("../framework.php");

	cmf_utilities::validate_admin_for_user();

	$_PUT = $GLOBALS['PUT'];
	
	$channel_id					= (int)$_PUT['channel_id'];
	$properties				= json_decode(stripslashes($_PUT['properties']));

	if ($channel_id == 0 ) {
		Flight::halt(204, "Channel id not sent");
	}
	
	if (empty($properties)) {
		Flight::halt(204, "No properties sent");
	}
	
	$query = "SELECT channel_id , property_uid FROM #__jomres_channelmanagement_framework_property_uid_xref ";
	$result = doSelectSql($query);

	$existing_channel_properties = array();
	if (!empty($result)) {
		foreach ( $result as $property ) {
			$existing_channel_properties[$property->property_uid] = $property->channel_id;
		}
	}
	
	$properties_to_assign = array();
	$unsuccessful_assignments = array();
	
	foreach ($properties as $property) {
		if ( array_key_exists( $property->property_uid , $existing_channel_properties) ) {
			$unsuccessful_assignments[] = $property ;
		} else {
			$properties_to_assign[] = $property;
		}
	}

	$successful_assignments = array();
	

	if (!empty($properties_to_assign)) {
		foreach ($properties_to_assign as $property ) {
			$query = "INSERT INTO #__jomres_channelmanagement_framework_property_uid_xref ( channel_id , property_uid , remote_property_uid , cms_user_id ) VALUES ( ".(int)$property->channel_id." ,".(int)$property->property_uid." ,".(int)$property->remote_property_uid." ,".(int)$property->cms_user_id." )";
			if (doInsertSql($query)) {
				$successful_assignments[] = $property;
			}
		}
	}
	
	// 
	
	$response = array ( "unsuccessful_assignments" => $unsuccessful_assignments , "successful_assignment" => $successful_assignments );
	
	Flight::json( $response_name = "response" , $response ); 
	});
	
	