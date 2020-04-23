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

class j06005subscribe
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
			
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		$profile_check_pass = false;

		if ( $thisJRUser->profile_id > 0 )
			{
			if (
				$thisJRUser->firstname != "" &&
				$thisJRUser->surname != "" &&
				$thisJRUser->house != "" &&
				$thisJRUser->street != "" &&
				$thisJRUser->town != "" &&
				$thisJRUser->postcode != "" &&
				$thisJRUser->country != "" &&
				$thisJRUser->email != ""
				)
				$profile_check_pass = true;
			}

		if (!$profile_check_pass)
			{
			if (using_bootstrap())
				{
				echo '<div class="alert alert-warning">'.jr_gettext( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', false ).'</div>';
				}
			else
				{
				echo '<div class="ui-state-highlight">'.jr_gettext( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', false ).'</div>';
				}
			
			$componentArgs = array();
			$componentArgs['return_url'] = jr_base64url_encode(jomresURL( JOMRES_SITEPAGE_URL . "&task=save_subscription&package_id=".(int) jomresGetParam( $_REQUEST, 'id', 0 )));
			$MiniComponents->specificEvent( '06005', 'edit_my_account', $componentArgs );
			}
		else
			{
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=save_subscription&package_id=".(int) jomresGetParam( $_REQUEST, 'id', 0 )), "");
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}