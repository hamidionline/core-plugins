<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_advanced_micromanage_tariff_editing_modes
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"advanced_micromanage_tariff_editing_modes",
			"category"=>"Bookings Configuration",
			"marketing"=>"Allows the property manager to use the Advanced and Micromanage tariff editing modes. These tariff editing modes offer greater flexability than the default Normal editing mode, enabling the property manager to set prices to be dependant on the number of people in a booking, the number of days in a booking or the number of rooms that have already been selected in the booking form. You can create multiple tariffs for a given room type, creating intricate pricing schemes, giving you the best opportunity to mirror a property's existing charging methods.",
			"version"=>(float)"7.1",
			"description"=> " Allows the property manager to use the Advanced and Micromanage tariff editing modes. These tariff editing modes offer greater flexability than the default Normal editing mode, enabling the property manager to set prices to be dependant on the number of people in a booking, the number of days in a booking or the number of rooms that have already been selected. You can create multiple tariffs for a given room type, creating intricate pricing schemes, giving you the best opportunity to mirror a property's existing charging method.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/27-advanced-micromanage-tariff-editing-modes',
			'change_log'=>'v3.2 Added a variety of Jomres 8 modifications including convert_entered_price_into_safe_float and BS3 templates. v3.3 Major update for Jomres 8 v3.4 Added tariff description to micromanaged tariffs. v3.5 Added filters to Return if this function is not appropriate for a certain property type. v3.6 added some minor performance tweaks. v3.7 Added a class to prevent Firefox from adding sliders to micromanage inputs. v3.8 Changed the default max people to 10. v3.9 Modified plugin to ensure correct use of jomresURL function. 4.0 BS3 templates updated. v4.1 A variety of BS3 related tweaks. v4.2 Modified how queries are performed to take advantage of quicker IN as opposed to OR. v4.3 Added functionality related to new subscription features in Jomres 9 v4.4 modified the Edit Micromanage script to force use of UTC when saving dates. v4.5 PHP7 related maintenance. v4.6 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v4.7 tweaked a template so that numbers work properly in mobile devices. v4.8 Removed a temporary limit to tariff prices that was in place until we could engineer a solution. v4.9 v5.0 Remaining globals cleanup and jr_gettext refactor related changes. v5.1 jr_gettext tweaks. v5.2 fixed a notice. v5.3 User role related updates. v5.4 Webhook related changes. v5.5 Modified Advanced tariff editing mode so that Tariff type cross references are created, just like Normal and Micromanage. Allows us to eventually simplify the booking engine tariff filtering functionality. v5.6 Notices fixes. v5.7 UI improvements. v5.8 Updated old BS2 template in light of recent BS3 cosmetic improvements. v5.9 Updated plugin to use new Jomres tariff saving class functionality. v6.0 Added changes supporting 9.8.30 minicomponent registry changes v6.1 Frontend menu refactored. v6.2 Subscription related functionality updated v6.3 Modified how array contents are checked. v6.4 Added text to list tariffs page to hightlight that you can create multiple tariffs for the same room type. v6.5 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v6.6 Added checkbox to limit day of weeks ranges to date picker date periods only. v6.7 Modified a dropdown so that some classes are not used as the dropdown does not become properly selected. v6.8 Default years to show setting changed to 1. v6.9 Added input-mini style to input class. v7.0 CSRF hardening added.v7.1 French language file added. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_g6m8w.png',
			'demo_url'=>'http://userdemo.jomres-demo.net/'
			);
		}
	}
