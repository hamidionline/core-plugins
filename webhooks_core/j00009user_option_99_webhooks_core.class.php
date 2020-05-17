<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.8.21
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00009user_option_99_webhooks_core
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true; return;
			}
			
		$thisJRUser         = jomres_singleton_abstract::getInstance( 'jr_user' );
		$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig           = $siteConfig->get();
		if (!isset($jrConfig[ 'webhooks_core_show' ]))
			$jrConfig[ 'webhooks_core_show' ] =0;
		
		$this->cpanelButton = "";
		if ( $thisJRUser->userIsManager && !$thisJRUser->superPropertyManager && $jrConfig[ 'webhooks_core_show' ] =="1" )
			{
			$this->cpanelButton = jomres_mainmenu_option( JOMRES_SITEPAGE_URL . "&task=webhooks_core", '', jr_gettext( 'WEBHOOKS_CORE', 'WEBHOOKS_CORE', false, false ), null, jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT", '_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT', false, false ) );
			}
		}

	function touch_template_language()
		{
		$output = array ();

		$output[ ] = jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT", '_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}
	}

