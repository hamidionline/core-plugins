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

class j00009manager_option_99_joomla_menu_maker 
	{

	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
	
		if ( $thisJRUser->superPropertyManager )
			{
			$url = '';
			foreach ($_GET as $key=>$val)
				{
				if ($key != "index.php" && $key != "option" && $key != "tmpl" && $key!="Itemid" && $key != "lang" )
					$url .= "&".$key."=".$val;
				}

			$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
			$tmpBookingHandler->tmpsearch_data['magic_menu_search']= $url;
			$this->cpanelButton=jomres_mainmenu_option(JOMRES_SITEPAGE_URL."&task=joomla_menu_maker", 'find.png', jr_gettext('_JOMRES_JOOMLA_MENUMAKER_MENUOPTIONS','_JOMRES_JOOMLA_MENUMAKER_MENUOPTIONS',false,false),null,jr_gettext( "_JOMRES_SEARCH_BUTTON" , '_JOMRES_SEARCH_BUTTON' ,false,false) );
			}
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_MENUOPTIONS', '_JOMRES_JOOMLA_MENUMAKER_MENUOPTIONS');
		$output[]		=jr_gettext('_JOMRES_MAINMENU_SEARCH','_JOMRES_MAINMENU_SEARCH');
		
		

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		if (isset($this->cpanelButton))
			return $this->cpanelButton;
		else
			return null;
		}
	}
