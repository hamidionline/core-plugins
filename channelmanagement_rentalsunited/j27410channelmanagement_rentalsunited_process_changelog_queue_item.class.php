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
 * When a webhook is passed to the channel management framework the cmf webhook authmethod then hands the webhook to this script to allow this script to perform any actions required
 *
 */

class j27410channelmanagement_rentalsunited_process_changelog_queue_item
{
    /**
     *
     * Constructor
     *
     * Main functionality of the Minicomponent
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

        $item = unserialize(base64_decode($componentArgs->item));

		if ( $item->manager_id == 0 ) {
			throw new Exception('Error: Manager id not set');
		}
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->proxy_manager_id = $item->manager_id;

		$new_class_name = 'channelmanagement_rentalsunited_changelog_item_update_'.strtolower($item->thing);
		jr_import($new_class_name );
		if (class_exists($new_class_name)) {
			$thing_class_result = new $new_class_name($componentArgs);
			if (isset($thing_class_result->success)) {
				$this->retVals = $thing_class_result->success;
			} else {
				logging::log_message('Success not returned ', 'RENTALS_UNITED', 'WARNING', serialize($thing_class_result));
			}
		}
		if (!isset($this->retVals)) {
			$this->retVals = false;
		}
    }

    public function getRetVals()
    {
		return $this->retVals;
    }
}
