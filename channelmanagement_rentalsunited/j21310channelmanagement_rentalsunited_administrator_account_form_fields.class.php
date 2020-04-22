<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2019 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j21310channelmanagement_rentalsunited_administrator_account_form_fields {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$channel_name = 'rentalsunited';
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$channel_administrator_form_fields = get_showtime('channel_administrator_form_fields');
		
		$channel_administrator_form_fields[$channel_name] = array ( 
			"channel_management_rentals_united_username" => 
				array (
					"type" => "input" , 
					"field_title" => jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_TITLE', 'CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_TITLE', false),
					"field_help" => jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_DESC', 'CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_DESC', false),
					) , 
			"channel_management_rentals_united_password" => 
				array (
					"type" => "password" ,
					"field_title" => jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_TITLE', 'CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_TITLE', false),
					"field_help" => jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_DESC', 'CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_DESC', false),
					) 
			);
		
		set_showtime('channel_administrator_form_fields' , $channel_administrator_form_fields );
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
