<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_api_feature_cmf
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_cmf",
			"category"=>"REST API",
			"marketing"=>"Functionality used by the Channel Management Framework",
			"version"=>"0.6",
			"description"=> "Functionality used by the Channel Management Framework, however intended to be used by any application that has a key/secret pair",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2020/04/06",
			"min_jomres_ver"=>"9.21.4",
			"manual_link"=>'',
			'change_log'=>' v0.2 Added scores of new endpoints v0.3 Added...Blackbookings, list booking status, get booking, get changeover day, list active bookings, list bookings, publishing, put availability, status review, property children reporting, echo, property booking link, available rooms, easy setting of base price, easy setting of min stays and prices, reservation add and cancel. Various scripts updated in Nightly to support status review where if a property is changed and it no longer passes sanity checks then if (currently secret) settings are enabled then the property is unpublished and possibly set for Re-approval too. v0.4 Standardised response names, added endpoints plugin settings (for gateways) and a variety of admin level endpoints.  v0.5 Various tweaks and updates. v0.6 Significant update required to support Jomres2jomres and various bugfixes.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
