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

class j00005oauth {
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
		
		//menu items
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

		if (jomres_cmsspecific_areweinadminarea()) {
			$jomres_menu->add_admin_item(100, jr_gettext('API_METHODS_TITLE', 'API_METHODS_TITLE', false), 'https://api.jomres.net/', 'fa-book', true, true);
		} else {
			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig = $siteConfig->get();
			
			$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
			
			if ($thisJRUser->accesslevel >= 1 && $jrConfig[ 'api_core_show' ] == '1') {
				$jomres_menu->add_item(10, jr_gettext('_OAUTH_TITLE', '_OAUTH_TITLE', false), 'oauth', 'fa-key');
				$jomres_menu->add_item(10, jr_gettext('API_DOCUMENTATION_TITLE', 'API_DOCUMENTATION_TITLE', false), 'api_documentation', 'fa-book');
			}
		}
			
		// Create a client for the system here, if they don't already exist? May help with converting internal code to use the API later on.
		
		}

	//Must be included in every mini-component
	function getRetVals()
		{
		return null;
		}
	}

