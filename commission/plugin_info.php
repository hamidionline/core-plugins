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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_commission
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"commission",
			"category"=>"Monetisation",
			"marketing"=>"Adds functionality that allows site administrator to charge property managers commission on their bookings.",
			"version"=>(float)"5.3",
			"description"=> "Adds functionality that allows site administrator to charge property managers commission on their bookings.",
			"lastupdate"=>"2019/06/26",
			"min_jomres_ver"=>"9.13.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/42-commission',
			'change_log'=>'v1.1 updated for use in v5.6 1.2 Changed commission invoice button category in administrator menu. 1.3 Removed a border from an image icon. 1.4 updated to work with Jr7.1 1.5  v7.1 specific changes. v7.30 added improvements related to commission, specifically for saving tax codes against commission rates. v1.7 Removed references to Token functionality that is no longer used. v1.8 Reordered button layout. v1.9 Added changes to reflect addition of new Jomres root directory definition. v2.0 Commission orphan line item manager modified so that the line item is only assigned to an invoice if the booking is approved. v2.1  Modified plugin to ensure correct use of jomresURL function. v2.2 Removed duplicated New commission rate button. v2.3 Added Jomres 8.2.0 invoice improvement changes. v 3.0 Commission functionality completely rewritten for Jomres 9 v3.1 Modified plugin to not do anything if commission rate is zero. v3.2 tweaked a language string to fix a typo. v3.3 PHP7 related maintenance. v3.4 Added stats related scripts. v3.5 Jomres 9.7.4 related changes v3.6 Remaining globals cleanup and jr_gettext refactor related changes. v3.7 Removed an old array from template setup. v3.8 Notice level changes. v3.9 Fixed a notice. v4.0 Ensured that commission line items can be deleted. v4.1 Added changes that pertain to NO ZERO NUMBER updates to the database. v4.2 Updated a query to adjust to user role changes. v4.3 Modified code to reflect fact that currency code conversion is now a singleton. v4.4 Removed a number format as it borks calculations later. v4.5 Advanced Site Config flag removed. v4.6 Plugin refactored for admin area changes in jr 9.9 v4.7 Modified how array contents are checked. v4.8 Updated chart related code. v4.9 Added check for channel manager booking field, if set to 1 then commission line item is not added. v5.0 Node/javascript path related changes. v5.1 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v5.2 CSRF hardening added. v5.3 French language file added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/commission.png',
			'demo_url'=>''
			);
		}
	}
