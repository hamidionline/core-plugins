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

class j16000super_server
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

        /* $ePointFilepath=get_showtime('ePointFilepath');
        require_once($ePointFilepath."config.php"); */
		
		$output = array();
		
		$output[ 'PAGETITLE' ] = jr_gettext('SUPERSERVER_TITLE', 'SUPERSERVER_TITLE', false);
		$output[ 'SUPERSERVER_DESC' ] = jr_gettext('SUPERSERVER_DESC', 'SUPERSERVER_DESC', false);
		$output[ 'SUPERSERVER_DESC_WARNING' ] = jr_gettext('SUPERSERVER_DESC_WARNING', 'SUPERSERVER_DESC_WARNING', false);
		$output[ 'SUPERSERVER_DESC_2' ] = jr_gettext('SUPERSERVER_DESC_2', 'SUPERSERVER_DESC_2', false);
		$output[ 'SUPERSERVER_ALREADY_REGISTERED' ] = jr_gettext('SUPERSERVER_ALREADY_REGISTERED', 'SUPERSERVER_ALREADY_REGISTERED', false);
		$output[ 'SUPERSERVER_NOT_REGISTERED' ] = jr_gettext('SUPERSERVER_NOT_REGISTERED', 'SUPERSERVER_NOT_REGISTERED', false);
		$output[ 'SUPERSERVER_REGISTER' ] = jr_gettext('SUPERSERVER_REGISTER', 'SUPERSERVER_REGISTER', false);
		$output[ 'SUPERSERVER_KEY_NOT_VALID' ] = jr_gettext('SUPERSERVER_KEY_NOT_VALID', 'SUPERSERVER_KEY_NOT_VALID', false);
		$output[ 'SUPERSERVER_SUPPORTED_PROPERTY_TYPES' ] = jr_gettext('SUPERSERVER_SUPPORTED_PROPERTY_TYPES', 'SUPERSERVER_SUPPORTED_PROPERTY_TYPES', false);
		
		$output[ 'SUPERSERVER_SERVER_SANDBOX_URL' ] = jr_gettext('SUPERSERVER_SERVER_SANDBOX_URL', 'SUPERSERVER_SERVER_SANDBOX_URL', false);
		$output[ 'SUPERSERVER_SUPPORTED_PROPERTY_TYPES' ] = jr_gettext('SUPERSERVER_SUPPORTED_PROPERTY_TYPES', 'SUPERSERVER_SUPPORTED_PROPERTY_TYPES', false);
		
		if ( $jrConfig[ 'live_superserver' ] == "1" ) {
			$output[ 'SERVER_URL' ] = 'http://onlinebooking.network';
			$output[ 'SERVER_LINKEXT' ] = jr_gettext('SUPERSERVER_SERVER_LIVE_LINKTEXT', 'SUPERSERVER_SERVER_LIVE_LINKTEXT', false);
		} else {
			$output[ 'SERVER_URL' ] = 'http://sandbox.onlinebooking.network';
			$output[ 'SERVER_LINKEXT' ] = jr_gettext('SUPERSERVER_SERVER_SANDBOX_LINKTEXT', 'SUPERSERVER_SERVER_SANDBOX_LINKTEXT', false);
		}


		if ( !isset($MiniComponents->registeredClasses['00005']['api_feature_superserver']) ) {
			
			$po = array();
			$o = array();
			
			$o['ERROR_MESSAGE'] = jr_gettext('SUPERSERVER_API_FEATURE_NOT_INSTALLED', 'SUPERSERVER_API_FEATURE_NOT_INSTALLED', false);

			$po[]=$o;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( "superserver_error_message.html" );
			$tmpl->addRows( 'pageoutput',$po);
			$output['MESSAGE']=$tmpl->getParsedTemplate();
		} else {
			jr_import('jomres_check_support_key');
			$key_validation = new jomres_check_support_key(JOMRES_SITEPAGE_URL_ADMIN.'&task=showplugins');
			$this->key_valid = $key_validation->key_valid;
			if (!$this->key_valid ) {
				$po = array();
				$o = array();
				
				$o['SUPERSERVER_KEY_NOT_VALID'] = $output[ 'SUPERSERVER_KEY_NOT_VALID' ];
				
				$po[]=$o;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( "key_not_valid.html" );
				$tmpl->addRows( 'pageoutput',$po);
				$output['MESSAGE']=$tmpl->getParsedTemplate();
				}
			else {
				jr_import('super_server_client');
				$super_server = new super_server_client();
				$key_status = $super_server->check_is_already_registered_on_superserver();

				if ($key_status == null) {
					echo "Error, null returned, is this ip number blocked?";
					return;
				}
				$po = array();
				$o = array();

				if ( $key_status->key_valid && !$key_status->key_registered && $key_status->can_register ) {
					$rows = array();
					foreach ($key_status->supported_property_types as $property_type_name ) {
						$r=array();
						$r['PROPERTY_TYPE_NAME'] = $property_type_name;
						$rows[] = $r;
					}
					
					$o['SUPERSERVER_NOT_REGISTERED'] = $output[ 'SUPERSERVER_NOT_REGISTERED' ];
					$o['SUPERSERVER_REGISTER'] = $output[ 'SUPERSERVER_REGISTER' ];
					$o['SUPERSERVER_SUPPORTED_PROPERTY_TYPES'] = $output[ 'SUPERSERVER_SUPPORTED_PROPERTY_TYPES' ];
					
					if ( $jrConfig[ 'live_superserver' ] == "1") {
						$o['SUPERSERVER_DEV_PROD_STATE'] = jr_gettext('SUPERSERVER_DEV_PROD_STATE_PROD', 'SUPERSERVER_DEV_PROD_STATE_PROD', false);
						$o['ALERT_CLASS'] = "success";
					} else {
						$o['SUPERSERVER_DEV_PROD_STATE'] = jr_gettext('SUPERSERVER_DEV_PROD_STATE_DEV', 'SUPERSERVER_DEV_PROD_STATE_DEV', false);
						$o['ALERT_CLASS'] = "warning";
					}

					$po[]=$o;
					$tmpl = new patTemplate();
					$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
					$tmpl->readTemplatesFromInput( "register.html" );
					$tmpl->addRows( 'pageoutput',$po);
					$tmpl->addRows( 'rows',$rows);
					$output['MESSAGE']=$tmpl->getParsedTemplate();
					}
				elseif ( $key_status->key_valid && $key_status->key_registered && $key_status->already_registered_to_this_endpoint) {
					$o['SUPERSERVER_ALREADY_REGISTERED'] = $output[ 'SUPERSERVER_ALREADY_REGISTERED' ];
					$o['SUPERSERVER_DISCONNECT'] = jr_gettext('SUPERSERVER_DISCONNECT', 'SUPERSERVER_DISCONNECT', false);
					$o['SUPERSERVER_DISCONNECT_WARNING'] = jr_gettext('SUPERSERVER_DISCONNECT_WARNING', 'SUPERSERVER_DISCONNECT_WARNING', false);
					
					$po[]=$o;
					$tmpl = new patTemplate();
					$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
					$tmpl->readTemplatesFromInput( "already_registered.html" );
					$tmpl->addRows( 'pageoutput',$po);
					$output['MESSAGE']=$tmpl->getParsedTemplate();
					}
				elseif ( $key_status->key_valid && $key_status->key_registered && !$key_status->can_register ) {
					$o['ERROR_MESSAGE'] = $key_status->cannot_register_failure_message;
					$o['SUPERSERVER_DISCONNECT'] = jr_gettext('SUPERSERVER_DISCONNECT', 'SUPERSERVER_DISCONNECT', false);
					$o['SUPERSERVER_DISCONNECT_WARNING'] = jr_gettext('SUPERSERVER_DISCONNECT_WARNING', 'SUPERSERVER_DISCONNECT_WARNING', false);

					$po[]=$o;
					$tmpl = new patTemplate();
					$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
					$tmpl->readTemplatesFromInput( "superserver_error_message.html" );
					$tmpl->addRows( 'pageoutput',$po);
					$output['MESSAGE']=$tmpl->getParsedTemplate();
					}
				else {
					if (!$key_status->key_valid) {
						
						$po = array();
						$o = array();
						
						$o['ERROR_MESSAGE'] = jr_gettext('SUPERSERVER_SERVER_KEY_VALIDATION', 'SUPERSERVER_SERVER_KEY_VALIDATION', false);

						$po[]=$o;
						$tmpl = new patTemplate();
						$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->readTemplatesFromInput( "superserver_error_message.html" );
						$tmpl->addRows( 'pageoutput',$po);
						$output['MESSAGE']=$tmpl->getParsedTemplate();
						}
					}
				}
			}
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "super_server.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		
	}

	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
