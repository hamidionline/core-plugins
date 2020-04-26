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

class plugin_info_webhooks_authmethod_mailchimp
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"webhooks_authmethod_mailchimp",
			"category"=>"Webhooks",
			"marketing"=>"Updates a mailchimp mailing list with a new user's email address when a user is created by a property manager/receptionist.",
			"version"=>"1.1",
			"description"=> "Updates a mailchimp mailing list with a new user's email address when a user is created by a property manager/receptionist.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/02",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'',
			'change_log'=>'1.0 Changed how array contents are checked. v1.1 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
