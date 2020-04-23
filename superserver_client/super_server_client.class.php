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

class super_server_client
{
    public function __construct()
    {
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig[ 'live_superserver' ])) {
			$jrConfig[ 'live_superserver' ] = 0;
		}
		
        $ePointFilepath=get_showtime('ePointFilepath');
        require_once($ePointFilepath."config.php");
		if ( (bool) $jrConfig[ 'live_superserver' ] == true ) {
			$this->super_server_url			= $super_server_url_live;
			$this->superserver_client_id	= $superserver_client_id_live;
			$this->super_server_endpoint	= $super_server_endpoint_dev;
		} else  {
			$this->super_server_url			= $super_server_url_dev;
			$this->superserver_client_id	= $superserver_client_id_dev;
			$this->super_server_endpoint	= $super_server_endpoint_live;
		}
		

        $this->superserver_get = $superserver_get;
        $this->superserver_set = $superserver_set;
        $this->superserver_userid = $superserver_userid;

        $this->registered = false;

    }

    public function check_is_already_registered_on_superserver()
    {
        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $task='superserver_check_registered&license_key='.$jrConfig['licensekey']."&endpoint=".get_showtime( 'live_site' )."/".JOMRES_ROOT_DIRECTORY."/api/";

        $response = $this->communicate($task);
		if (isset($response->data)) 
			return $response->data;
		else
			return null;
    }

    public function register_key_on_superserver($keypair = array() )
    {
        if (empty($keypair)) {
            throw new Exception('Passed an empty key set, cannot register on the super server without them');
            }

        if ( trim($keypair['redirect_uri']) == '' ){
            throw new Exception('redirect_uri is not set, cannot register on the super server');
            }

        if ( trim($keypair['client_id']) == '' ){
            throw new Exception('client_id is not set, cannot register on the super server');
            }

        if ( trim($keypair['client_secret']) == '' ){
            throw new Exception('client_secret is not set, cannot register on the super server');
            }

        if ( trim($keypair['scope']) == '' || trim($keypair['scope']) == ',' ){
            throw new Exception('scope is not set, cannot register on the super server');
            }

        $client_server_api_keys = http_build_query($keypair);

        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $task='superserver_register&license_key='.$jrConfig['licensekey']."&".$client_server_api_keys."&endpoint=".get_showtime( 'live_site' )."/".JOMRES_ROOT_DIRECTORY."/api/&site_name=".get_showtime('sitename');
        
        $response = $this->communicate($task);
        return $response->data;
    }

    public function disconnect_from_superserver()
    {
        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $task='superserver_disconnect&license_key='.$jrConfig['licensekey'];
        
        $response = $this->communicate($task);
		if (isset($response->success) && $response->success == true )
			return true;
		else
			return false;
    }


    public function communicate($request='')
    {
        if ($request == '' ) {
            throw new Exception('Can\'t communicate with the super server, try passing a request to the communicate method, you dimwit.');
            }

        if (!function_exists('curl_init')) {
            return 'Error, CURL not enabled on this server.';
            }
        else {
            $url = $this->super_server_url.$request;

            logging::log_message('Starting curl call to '.$url, 'Curl', 'DEBUG');
            $logging_time_start = microtime(true);
			
			logging::log_message('Sent message to superserver '.$url, 'Superserver', 'DEBUG');
			
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Jomres');
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($curl_handle);

            curl_close($curl_handle);
            $logging_time_end = microtime(true);
            $logging_time = $logging_time_end - $logging_time_start;
            logging::log_message('Curl call took '.$logging_time.' seconds ', 'Curl', 'DEBUG');

            return json_decode($response);
            }
    }

    public function create_webhook_for_site($url , $client_id , $client_secret )
    {
        jr_import("webhooks");
        $webhooks = new webhooks($this->superserver_userid);
        $all_webhooks = $webhooks->get_all_webhooks();
        if (!empty($all_webhooks)) {
            foreach ( $all_webhooks as $key=>$val ) {
                if ($val['settings']['url'] == $url ) {
                    return true; // A webhook for this site already exists, we will not create a new one
                    }
                }
            }
        $integration_id = 0;

        $webhooks->set_setting( $integration_id , 'url' , filter_var($url, FILTER_SANITIZE_SPECIAL_CHARS) );
        $webhooks->set_setting( $integration_id , 'client_id' , filter_var($client_id, FILTER_SANITIZE_SPECIAL_CHARS) );
        $webhooks->set_setting( $integration_id , 'secret' , filter_var($client_secret, FILTER_SANITIZE_SPECIAL_CHARS) );
        $webhooks->set_setting( $integration_id , 'authmethod' , 'oauth' );
        $webhooks->webhooks[$integration_id ]['enabled'] = 1;
        
        $webhooks->commit_integration($integration_id);
    }
    
    public function get_superserver_api_keys()
    {
        $query = "SELECT `client_secret` , `redirect_uri` , `scope` FROM #__jomres_oauth_clients WHERE client_id = '".$this->superserver_client_id."' LIMIT 1 ";
        $result = doSelectSql($query,2);

        $redirect_uri = get_showtime( 'live_site' )."/".JOMRES_ROOT_DIRECTORY."/api/";

        if ($result == false) {
            $client_secret = createNewAPIKey();

            $query = "INSERT INTO #__jomres_oauth_clients
                (`client_id`,`client_secret`,`redirect_uri`,`grant_types`,`scope`,`user_id`)
                VALUES
                ('".$this->superserver_client_id."','".$client_secret."','".$redirect_uri."',null,'".$this->superserver_get.",".$this->superserver_set."',".$this->superserver_userid.")";

            doInsertSql($query , "Created Super Server client keypair");

            return array (
                "redirect_uri" => $redirect_uri,
                "client_id" => $this->superserver_client_id,
                "client_secret" => $client_secret,
                "scope" => $this->superserver_get.",".$this->superserver_set
                );
            }
        else {
            return array (
                "redirect_uri" => $result['redirect_uri'],
                "client_id" => $this->superserver_client_id,
                "client_secret" => $result['client_secret'],
                "scope" => $result['scope']
                );
            }

    }


}
