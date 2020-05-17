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
	** Title | Webhooks Guest Type Deleted
	** Description | Should respond with 404
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/guest_type_deleted/:GUEST_TYPE_UID
	** Data Parameters | None 
	** Success Response | 404 invalid_guest_type_uid
	** Error Response | {"data":{"guest_details":{"firstname":"webhook test","surname":"webhook test","house":"webhook test","street":"webhook test","town":"webhooktest","county":"1305","country":"GB","postcode":"webhook test","tel_landline":"webhook test","tel_mobile":"webhook test","tel_fax":"","discount":"0","vat_number":"","vat_number_validated":"0"}},"meta":{"code":200}}
	** Sample call |jomres/api/webhooks/1/guest_type_deleted/13
	** Notes | Replies with 404 if the guest type is not found
*/

Flight::route('GET /webhooks/@id/guest_type_deleted/@guest_type_uid', function($property_uid , $guest_type_uid)
	{
    $guest_type_uid = (int)$guest_type_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

    jr_import( 'jrportal_guest_types' );
	$jrportal_guest_types = new jrportal_guest_types();
	$jrportal_guest_types->id = $guest_type_uid;
	$jrportal_guest_types->property_uid = $property_uid;
       
    if (!$jrportal_guest_types->get_guest_type()) {
        Flight::halt( "404" ,"invalid_guest_type_uid");
    } else {
        $response                          = new stdClass();
        $response->type                    = $jrportal_guest_types->type;
        $response->notes                   = $jrportal_guest_types->notes;
        $response->maximum                 = $jrportal_guest_types->maximum;
        $response->is_percentage           = $jrportal_guest_types->is_percentage;
        $response->posneg                  = $jrportal_guest_types->posneg;
        $response->variance                = $jrportal_guest_types->variance;
        $response->is_child                = $jrportal_guest_types->is_child;

        Flight::json( $response_name = "guest_type_details" ,$response);
        }
	});
