<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

/**
*
* @package Jomres\CMF
*
* Handles webhook events on the parent server
*
*
*/

class jomres2jomres_changelog_item_process_guest_type_saved
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

		if ( isset($item->data->property_uid) ) {
			$item_type = "guest_types";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			$manager_id = channelmanagement_framework_utilities :: get_manager_id_for_property_uid ( $componetArgs->property_uid );

			jr_import('channelmanagement_jomres2jomres_communication');
			$remote_server_communication = new channelmanagement_jomres2jomres_communication();

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/list/guesttypes/'.$item->data->property_uid , [] , true );

			if ( is_object($response)) {
				$response = json_decode(json_encode($response), true);
			}

			if (is_array($response) ) {
				foreach ($response as $guest_type) {
					if ($guest_type->id == $item->data->guest_type_uid) {
						if (isset($cross_references[$item->data->guest_type_uid])) {
							$guest_type_id = $cross_references[$item->data->guest_type_uid]['local_id'];
						} else {
							$guest_type_id = 0;
						}

						$put_data = array(
							"property_uid" => $componetArgs->property_uid,
							"id" => $guest_type_id,
							"type" => $guest_type->type,
							"notes" => $guest_type->notes,
							"maximum" => $guest_type->maximum,
							"is_percentage" => $guest_type->is_percentage,
							"is_child" => $guest_type->is_child,
							"posneg" => $guest_type->posneg,
							"order" => $guest_type->order,
							"variance" => $guest_type->variance
						);

						$send_response = $jomres_call_api->send_request(
							"PUT",
							"cmf/property/guesttype",
							$put_data,
							array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . $manager_id)
						);

						if (isset($send_response->data->response->id) && $send_response->data->response->id > 0) {
							channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->guest_type_uid, $send_response->data->response->id);
							logging::log_message("Added guest type ", 'CMF', 'DEBUG', '');
							logging::log_message("Component args ", 'CMF', 'DEBUG', serialize($componetArgs));
							logging::log_message("Response ", 'CMF', 'DEBUG', serialize($send_response));
							$this->success = true;
						} else {
							logging::log_message("Failed to add guest type ", 'CMF', 'ERROR', '');
							logging::log_message("Component args ", 'CMF', 'ERROR', serialize($componetArgs));
							logging::log_message("Response ", 'CMF', 'ERROR', serialize($send_response));
							$this->success = false;
						}
					}
				}
			} else {
				logging::log_message("Did not get a valid response from parent server", 'CMF', 'ERROR' , serialize($response) );
			}
		} else {
			logging::log_message("Property id not set", 'CMF', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}
	}
}



