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

class jomres2jomres_changelog_item_process_extra_deleted
{
    function __construct($componetArgs)
	{
		$item = unserialize($componetArgs->item);

		if ( isset($item->data->property_uid) ) {
			$item_type = "extras";

			$cross_references = channelmanagement_framework_utilities :: get_cross_references_for_property_uid ( 'jomres2jomres' , $componetArgs->property_uid , $item_type );

			jr_import('channelmanagement_jomres2jomres_communication');
			$remote_server_communication = new channelmanagement_jomres2jomres_communication();

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/list/extras/'.$item->data->property_uid , [] , true );

			$manager_id = channelmanagement_framework_utilities :: get_manager_id_for_property_uid ( $componetArgs->property_uid );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			if (isset($cross_references[$item->data->extras_uid])) {
				$send_response = $jomres_call_api->send_request(
					"DELETE",
					"cmf/property/extra/". $componetArgs->property_uid.'/'.$cross_references[$item->data->extras_uid]['local_id'],
					[],
					array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy_id: " . $manager_id)
					);

				if (isset($send_response->data->response) && $send_response->data->response == true ) {
					channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->extras_uid, 0 );
					logging::log_message("Deleted extra ", 'CMF', 'DEBUG', '');
					logging::log_message("Component args ", 'CMF', 'DEBUG', serialize($componetArgs));
					logging::log_message("Response ", 'CMF', 'DEBUG', serialize($send_response));
					$this->success = true;
				} else {
					channelmanagement_framework_utilities::set_cross_references_for_property_uid('jomres2jomres', $componetArgs->property_uid, $item_type, $item->data->extras_uid, 0 );
					logging::log_message("Failed to delete extra ", 'CMF', 'ERROR', '');
					logging::log_message("Component args ", 'CMF', 'ERROR', serialize($componetArgs));
					logging::log_message("Response ", 'CMF', 'ERROR', serialize($send_response));
					$this->success = false;
				}
			}
		} else {
			logging::log_message("Id not set", 'CMF', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}
	}
}

