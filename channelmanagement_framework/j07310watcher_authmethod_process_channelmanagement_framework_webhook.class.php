<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j07310watcher_authmethod_process_channelmanagement_framework_webhook
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			return;
		}

		$ePointFilepath=get_showtime('ePointFilepath');
		$this->retVals = false;

		// Not currently using this and right now it creates log items that confuse matters
		return;

		// $messages =  unserialize($componentArgs["payload"]); // Need to do this to get messages in 07320 scripts
		$messages = $componentArgs; // In 07310 scripts we can access the componentArgs variable

		$webhook_messages = $messages['webhook_messages'];

		$method=$messages['settings']['authmethod'];

		if ( $method!=='channelmanagement_framework_webhook' ) 
			return;
		
		if (isset($componentArgs["task"])) {
			$task =  $componentArgs["task"];
		} else {
			$task = get_showtime('task');
		}
		
		logging::log_message("CMF instant webhook handler : Received instant message with contents " , 'CMF', 'DEBUG' , serialize( $webhook_messages ) );
		logging::log_message("CMF instant webhook handler : Received instant message task ".$task , 'CMF', 'DEBUG' , serialize($componentArgs) );

		$non_processing_tasks = array ( // A number of tasks should not result in webhooks being sent onwards to the app server.
			);

		if (
			!empty($webhook_messages) && 
			!in_array( $task , $non_processing_tasks)
			) {
			$webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects

			// The Save normal mode tariffs features will add two webhooks, rooms_multiple_added & tariffs_updated. We don´t need to run them both as this script does both at the same time, so we´ll check to see if both of these webhooks are set, and if they are we´ll discard one.
			$messages = array();
			foreach ( $webhook_messages as $webhook_notification ) {
				$messages[] = $webhook_notification->webhook_event;
			}
			if ( in_array (  "rooms_multiple_added" , $messages ) && in_array (  "rooms_multiple_added" , $messages ) ) {
				unset( $webhook_messages[1] );
			}

			foreach ( $webhook_messages as $webhook_notification ) {
				logging::log_message("CMF instant webhook handler :  Webhook triggered ".$webhook_notification->webhook_event , 'CMF', 'DEBUG' , '' );
				$data = $webhook_notification->data;
				
				if (isset($data) && $data !== false && isset($webhook_notification->webhook_event) ) { // The data, whatever it is, has been collected, let's send it off to the remote site
					$data->task = $webhook_notification->webhook_event;

/* 					$this_plugin_tasks = array( "booking_added" , "booking_marked_noshow" );
					if ( in_array( $data->task , $this_plugin_tasks )) {

						$current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
						$current_contract_details->gather_data($data->contract_uid, $data->property_uid);
						
						if (!array_key_exists($data->contract_uid, $current_contract_details->contract)) { // The contract uid is wrong. Was it for a different property?
							return;
							}

						switch ( $data->task )
							{
							case 'booking_added':
								$context = 'syndication_guests';
								$this->send_notification_to_app_server( $context , 'booking_added/'	, $data = array( "email" => $current_contract_details->contract[$data->contract_uid]['guestdeets']['email']) );
								break;
							case 'booking_marked_noshow';
								$context = 'syndication_guests';
								$this->send_notification_to_app_server( $context , 'booking_noshow/', $data = array( "email" => $current_contract_details->contract[$data->contract_uid]['guestdeets']['email']) );
								break;
							}
					} */
					

				}
			}
		}
	logging::log_message("CMF instant webhook handler : Completed Watcher's run." , 'CMF', 'DEBUG' , '' );
	}

	

	public function getRetVals()
	{
		return $this->retVals;
	}
}
	