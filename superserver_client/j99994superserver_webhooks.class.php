<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j99994superserver_webhooks
{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
        $ePointFilepath=get_showtime('ePointFilepath');
        require($ePointFilepath."config.php");
		
        $webhook_messages = get_showtime('webhook_messages');

		$manager_id 	= (int)$superserver_userid;
		$all_webhooks 	= array();

		if ( $manager_id == 0 ) {
			return;
		}
		
		jr_import("webhooks");
		$webhooks = new webhooks($manager_id);
		$all_webhooks = $webhooks->get_all_webhooks();

		if (is_array($webhook_messages)) {
			$webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects
		}
        
		if (!empty($all_webhooks) && !empty($webhook_messages) ) {
            logging::log_message("Preparing deferred messages " , 'Core', 'DEBUG'  );
			foreach ( $all_webhooks as $webhook ) {
                $webhook['webhook_messages'] = $webhook_messages;
                if ($webhook['enabled'] == true ) {
                    $watcher_authmethod = "watcher_authmethod_process_".$webhook['settings']['authmethod'];

					
					if (!empty($webhook['webhook_messages'])) {
						
						$token =  $this->request_token ( $webhook['settings']['url'] , $webhook['settings']['client_id']  ,  $webhook['settings']['secret'] );
						foreach ($webhook['webhook_messages'] as $message ) {
							$event = $message->webhook_event;
							
							switch ($event) {
								case 'property_unpublished': // Tell the remote server that the property has been unpublished. 
								case 'property_unapproved': // Tell the remote server that the property has been been unapproved. As a result the property is not published and should be removed. 
								case 'property_deleted': // Tell the remote server that the property has been deleted. 
									$property_uid = $message->data->property_uid;
									$this->send_request( $webhook['settings']['url'] , $token->access_token , "GET" , "superserver_master/".$property_uid."/delete/" , array(3) );
								break;
								
								case 'property_published': // Tell the remote server that the property has been unpublished. 
									$property_uid = $message->data->property_uid;
									$this->send_request( $webhook['settings']['url'] , $token->access_token , "GET" , "superserver_master/".$property_uid."/add/" , array(3) );
								break;
							}
						}
					}
                }
			}
		}
    }

	private function send_request($server , $token , $method="GET" , $request ="" , $data=array(3)) {
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		$ch = curl_init($server.$request.$jrConfig['licensekey']."/");

		switch ( $method ) {
			case 'POST':
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
				break;
			case 'DELETE':
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				break;
			case 'PUT':
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
				break;
			default :
				break;
			}
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Authorization: Bearer '.$token,
			'Accept: application/json',
			));

		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$result=curl_exec ($ch);
		
		$errors = curl_error($ch);
		$status = curl_getinfo($ch); 
		$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ( $response_code != 200 ) {
			logging::log_message("Received response code ".$response_code." when sending data to ".$server.$request.$jrConfig['licensekey']."/", 'Webhooks', "WARNING"); 
			logging::log_message("Data ".serialize($data), 'Webhooks', "WARNING"); 
		}
		return array ("result" => $result , "status" => $status , "errors" => $errors , "response_code" => $response_code );
	}
	
	private function request_token ( $url , $client_id ='' , $client_secret = '' ) {
		$data=array('grant_type' => 'client_credentials' , "client_id" => $client_id , "client_secret" => $client_secret);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$token_request=curl_exec ($ch);
		$errors = curl_error($ch);
		$status = curl_getinfo($ch); 
		$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if ( $response_code != 200 ) {
			logging::log_message("Received response code ".$response_code." when attempting to receive token from remote server ".$url." Client ID ".$client_id." Secret ".$client_secret." ".$errors, 'Webhooks', "WARNING"); 
		}
		curl_close ($ch);
		$response = json_decode($token_request);
		return $response;
	}
  
	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
