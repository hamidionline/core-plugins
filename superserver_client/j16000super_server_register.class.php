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

class j16000super_server_register
{
    public function __construct()
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
        jr_import('jomres_check_support_key');
        $key_validation = new jomres_check_support_key(JOMRES_SITEPAGE_URL_ADMIN.'&task=showplugins');
        $this->key_valid = $key_validation->key_valid;

        if ($this->key_valid) {
                    
            jr_import('super_server_client');
            $super_server_client = new super_server_client();
            $key_pair = $super_server_client->get_superserver_api_keys();
            
            $key_status = $super_server_client->register_key_on_superserver($key_pair);
              // We now need to add a new webhook to talk to the super server
            $super_server_client->create_webhook_for_site( $key_status->redirect_uri , $key_status->client_id , $key_status->client_secret );
            
            }
        jomresRedirect(jomresUrl(JOMRES_SITEPAGE_URL.'&task=super_server'));
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
