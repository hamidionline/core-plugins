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

class j21001channelmanagement_rentalsunited_report_self {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$channel_reports = get_showtime("channel_reports");
		
		$channel_reports["rentalsunited"] = array ("channel_name" => "rentalsunited" , "friendly_name" => "Rentals United" , "features" => array ("has_dictionaries" => true ) );
		
		set_showtime("channel_reports" , $channel_reports);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
