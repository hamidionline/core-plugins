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

class plugin_info_webhooks_core
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"webhooks_core",
			"marketing"=>"Provides the ability for managers to configure webhooks.",
			"version"=>"1.3",
			"description"=> "Provides the ability for managers to configure webhooks.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2017/05/11",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/developers-guide/64-webhooks',
			'change_log'=>'v0.2 Refactored code to support webhook calls being available in 9.8.22 v0.3 Added a panel to show a manager the properties they are assigned to, as Super Managers typically are not assigned to any individual properties ergo webhooks would not be triggered for those properties. v0.4 Minor performance improvements, added checks so that a default integration method is always chosen, regardless of what is installed, menu options hidden from super managers, method list updated to correspond with 9.8.25 webhooks in Jomres Core. v0.5 Added notes output to templates. v0.6 Added ability to enable/disable individual webhooks. v0.7 Added a default setting if active has not been configured yet. v0.8 Removed some unneeded shortcode code from scripts. v0.9 Added support for deferred messages. v1.0 Added changes supporting 9.8.30 minicomponent registry changes. v1.1 Setting moved in site config v1.2 Advanced Site Config flag removed. v1.3 Changed how array contents are checked.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'retired'=>'1'
			);
		}
	}
