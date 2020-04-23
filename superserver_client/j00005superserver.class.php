<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005superserver {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}
			
		// Create a client for the system here, if they don't already exist? May help with converting internal code to use the API later on.
		
		if (jomres_cmsspecific_areweinadminarea())
			{
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
			$jomres_menu->add_admin_item(50, jr_gettext('SUPERSERVER_TITLE', 'SUPERSERVER_TITLE', false), $task = 'super_server', 'fa-handshake-o');
			$jomres_menu->add_admin_item(50, jr_gettext('SUPERSERVER_TITLE_STATS', 'SUPERSERVER_TITLE_STATS', false), $task = 'super_server_stats', 'fa-handshake-o');
			}
			
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}

