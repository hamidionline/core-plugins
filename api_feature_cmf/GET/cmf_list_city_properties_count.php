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

Return regions used by properties

*/

Flight::route('GET /cmf/list/city/properties/count', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$query = "SELECT property_town FROM #__jomres_propertys WHERE published = '1' ORDER BY property_town ASC ";
	$activeTownList = doSelectSql($query);

	$towns = array();
	foreach ($activeTownList as $town ) {
		if (isset($towns[$town->property_town])) {
			$towns[$town->property_town] ++;
		} else {
			$towns[$town->property_town] =1;
		}
	}
	
	Flight::json( $response_name = "response" , $towns ); 
	});
	
	
