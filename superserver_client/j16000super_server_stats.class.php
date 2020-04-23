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

class j16000super_server_stats
{
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig[ 'live_superserver' ])) {
			$jrConfig[ 'live_superserver' ] = 0;
		}

        
		// $manager_id 	= (int)$superserver_userid;
		
		jr_import('super_server_client');
		$super_server_client = new super_server_client();
		
		jr_import("webhooks");
		$webhooks = new webhooks($super_server_client->superserver_userid);
		$all_webhooks = $webhooks->get_all_webhooks();
		
		foreach ( $all_webhooks as $webhook ) {
			$endpoint	= $webhook['settings']['url'];
			$client_id	= $webhook['settings']['client_id'];
			$secret		= $webhook['settings']['secret'];
			
		}

		jr_import('super_server_api_requests');
		$super_server_api_requests = new super_server_api_requests();
		$token_data = $super_server_api_requests->get_token( $endpoint , $client_id , $secret );
		$stats = $super_server_api_requests->query_remote_server( $token_data->access_token ,"GET" , "superserver_master/stats" , $data=array(3) );

		echo "Placeholder until charts can be developed<br/>";
		$property_uids = array();
		if (!empty($stats->data)) {
			foreach ( $stats->data->stats  as $key=>$val ) {
				$property_uids[] = $key;
			}
			
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->get_property_name_multi($property_uids);

			foreach ( $stats->data->stats  as $key=>$val ) {
				echo $current_property_details->get_property_name($key , false )."<br/>";
				foreach ( $val as $date=>$count ) {
					echo str_replace(" 00:00:00","",$date)." <strong>".$count."</strong><br/>";
				}
			}
		}

		
		
	}


	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
