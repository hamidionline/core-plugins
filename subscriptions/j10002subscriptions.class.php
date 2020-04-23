<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j10002subscriptions
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$htmlFuncs =jomres_getSingleton('html_functions');
		$this->cpanelButton = '';
		if ($jrConfig['useSubscriptions']=="0")
			return;
		
		$this->cpanelButton=$htmlFuncs->cpanelButton(JOMRES_SITEPAGE_URL_ADMIN.'&task=list_subscriptions', 'ViewDatabase.png',jr_gettext('_JOMRES_STATUS_SUBSCRIPTIONS','_JOMRES_STATUS_SUBSCRIPTIONS',FALSE) ,"/".JOMRES_ROOT_DIRECTORY."/images/jomresimages/small/",jr_gettext( "_JOMRES_CUSTOMCODE_MENUCATEGORIES_INCOME_GENERATION" , '_JOMRES_CUSTOMCODE_MENUCATEGORIES_INCOME_GENERATION' ,false,false));
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}	
	}
