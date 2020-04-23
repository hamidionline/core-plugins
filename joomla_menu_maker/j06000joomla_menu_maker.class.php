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

class j06000joomla_menu_maker
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$thisJRUser=jomres_getSingleton('jr_user');

		 if ( $thisJRUser->superPropertyManager )
			{
			
			$pageoutput = array();
			$output = array();
			
			$query = "SELECT id,title FROM #__menu_types";
			$menutypes = doSelectSql($query);
			
			$menuopts = array();
			if ( count($menutypes)>0)
				{
				foreach ($menutypes as $m)
					{
					$menuopts[] = jomresHTML::makeOption( $m->id, $m->title );
					}
				}
			
			$output['MENUDROPDOWN']= jomresHTML::selectList($menuopts, 'menu', 'class="inputbox" size="1"', 'value', 'text', '',false);

			$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
			$url=$tmpBookingHandler->tmpsearch_data['magic_menu_search'];
			$language_shortcode=get_showtime("lang_shortcode");
			
			$url = str_replace( "&lang=".$language_shortcode , "" , $url );
			$output['SEARCH_URL'] = $url.="&view=default";

			$output['_JOMRES_JOOMLA_MENUMAKER_INFO']			=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_INFO', _JOMRES_JOOMLA_MENUMAKER_INFO);
			$output['_JOMRES_JOOMLA_MENUMAKER_SAVE']			=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_SAVE', _JOMRES_JOOMLA_MENUMAKER_SAVE);
			$output['_JOMRES_JOOMLA_MENUMAKER_SEARCHTITLE']	=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_SEARCHTITLE', _JOMRES_JOOMLA_MENUMAKER_SEARCHTITLE);
			$output['_JOMRES_JOOMLA_MENUMAKER_TITLE']		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_TITLE', _JOMRES_JOOMLA_MENUMAKER_TITLE);
			$output['_JOMRES_JOOMLA_MENUMAKER_JOOMLA_MENU']	=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_JOOMLA_MENU', _JOMRES_JOOMLA_MENUMAKER_JOOMLA_MENU);




			$output['JOMRES_SITEPAGE_URL_NOSEF']=JOMRES_SITEPAGE_URL_NOSEF;
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS."templates" );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'magic_menu.html');
			$tmpl->displayParsedTemplate();

			 }
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_INFO', _JOMRES_JOOMLA_MENUMAKER_INFO);
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_SAVE', _JOMRES_JOOMLA_MENUMAKER_SAVE);
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_SEARCHTITLE', _JOMRES_JOOMLA_MENUMAKER_SEARCHTITLE);
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_TITLE', _JOMRES_JOOMLA_MENUMAKER_TITLE);
		$output[]		=jr_gettext('_JOMRES_JOOMLA_MENUMAKER_RAW', _JOMRES_JOOMLA_MENUMAKER_RAW);
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION', _JOMRES_MAGIC_MENUS_MENU_SECTION);
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO', _JOMRES_MAGIC_MENUS_MENU_SECTION_INFO);
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_CUSTOMSEARCHES', _JOMRES_MAGIC_MENUS_CUSTOMSEARCHES);
		

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
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
		return null;
		}
	}
