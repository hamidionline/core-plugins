<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.25
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class super_server_api_requests
{

	public function __construct()
	{
		$this->site_id = 0;
		$this->endpoint = '';
	}

	public function get_token( $endpoint , $client_id , $client_secret ) 
	{
		$this->endpoint = $endpoint;
		$data=array('grant_type' => 'client_credentials' , "client_id" => $client_id , "client_secret" => $client_secret);
		
		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$token_request=curl_exec ($ch);

		$status = curl_getinfo($ch); 
		curl_close ($ch);
		return json_decode($token_request);  
	}

	public function query_remote_server( $token , $method="GET" , $request ="" , $data=array(3) )
	{
		if ( $this->endpoint == '' ) {
			throw new Exception('endpoint url not set, cannot send request to remote site');
			} 
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

		$ch = curl_init($this->endpoint.$request."/".$jrConfig['licensekey']);

		switch ( $method )
			{
			#########################################################################################
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

		// return array ("result" => $result , "status" => $status , "errors" => $errors , "response_code" => $response_code );
		$result = $this->replace_unicode($result);
		$response = json_decode($result);

		if (isset($response->meta->code) && $response->meta->code != "200") {
			throw new Exception($response->meta->code." ".$response->meta->error_message);
		} else {
			return $response;
		}
	}
	
	private function replace_unicode($str) 
	{
		$str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
			return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
			}, $str);
		return $str;

	}
	
}
