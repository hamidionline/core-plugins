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

class j16000super_server_unregister
{
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		jr_import('super_server_client');
		$super_server_client = new super_server_client();

		$super_server_client->disconnect_from_superserver();
			
		// We now need to remove the old superserver webhook
		jr_import("webhooks");
		$webhooks = new webhooks($super_server_client->superserver_userid);
			
		$all_webhooks = $webhooks->get_all_webhooks();
		if (!empty($all_webhooks)) {
			foreach ( $all_webhooks as $key=>$val ) {
				if ($val['manager_id'] == $super_server_client->superserver_userid ) {
					$webhooks->delete_integration( $val['id'] );
					}
				}
			}
		
		// Delete the oauth client
		$query = "DELETE FROM #__jomres_oauth_clients WHERE `user_id` = ".(int)$super_server_client->superserver_userid."";
		doInsertSql( $query );
		
		jomresRedirect(jomresUrl(JOMRES_SITEPAGE_URL.'&task=super_server'));
	}

	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
