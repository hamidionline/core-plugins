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

class j00035tabcontent_03_contact
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=(int)$componentArgs['property_uid'];  
		$mrConfig=getPropertySpecificSettings($property_uid);
		
		if (isset($componentArgs['currrent_output']))
			$output = $componentArgs['currrent_output'];  
		else
			$output = array();
		//
		$form = $MiniComponents->specificEvent('06000','contactowner',array("noshownow"=>true,"property_uid"=>$property_uid));
		$anchor = jomres_generate_tab_anchor(jr_gettext('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL','_JOMRES_FRONT_MR_MENU_CONTACTHOTEL',false,false));
		$tab = array(
			"TAB_ANCHOR"=>$anchor,
			"TAB_TITLE"=>jr_gettext('_JOMRES_FRONT_MR_MENU_CONTACTHOTEL','_JOMRES_FRONT_MR_MENU_CONTACTHOTEL',false,false),
			"TAB_CONTENT"=>$form
			);
		$this->retVals = $tab;
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}

	}
