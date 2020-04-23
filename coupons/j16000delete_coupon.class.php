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

class j16000delete_coupon {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$id = (int)jomresGetParam( $_REQUEST, 'coupon_id', 0 );
		
		jr_import( 'jrportal_coupons' );
		$jrportal_coupons = new jrportal_coupons();
		$jrportal_coupons->id = $id;
		$jrportal_coupons->property_uid	= 0;
		
		$jrportal_coupons->delete_coupon();
		
		$jomres_messaging = jomres_singleton_abstract::getInstance('jomres_messages');
		$jomres_messaging->set_message(jr_gettext('_JOMRES_MR_AUDIT_DELETE_COUPON','_JOMRES_MR_AUDIT_DELETE_COUPON',FALSE));
		
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_coupons"), jr_gettext('_JOMRES_MR_AUDIT_DELETE_COUPON','_JOMRES_MR_AUDIT_DELETE_COUPON',false) );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
