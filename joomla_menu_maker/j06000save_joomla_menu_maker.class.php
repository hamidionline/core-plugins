<?php
/**
* Core file
* @author Vince Wooll <sales@jomres.net>
* @version Jomres 6
* @package Jomres
* @copyright	2005-2012 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/**
#
 * Lists the properties, according to property uids passed from a search function
 #
* @package Jomres
#
 */
class j06000save_joomla_menu_maker
	{
	/**
	#
	 * Constructor: Executes the sql query to find property details of those property uids passed by a search, then displays those details in the list_propertys patTemplate file
	#
	 */
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		if (!JOMRES_MAGIC_MENU_CONTINUE)
			return;
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$thisJRUser=jomres_getSingleton('jr_user');
		
		$menu_name		= trim(jomresGetParam( $_REQUEST, 'menu_name', '' ));
		$alias			= strtolower($menu_name);
		$search_url		= trim(jomresGetParam( $_REQUEST, 'search_url', '' ));
		$menu			= jomresGetParam( $_REQUEST, 'menu', 0 );

		if ( $thisJRUser->superPropertyManager && $menu_name != "" && $search_url != "")
			{
			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig   = $siteConfig->get();

			$query = "SELECT menutype FROM #__menu_types WHERE id =".(int)$menu;
			$menutype = doSelectSql($query,1);

			$alias_exists = true;
			$counter =1;
			while ($alias_exists)
				{
				$query = "SELECT alias FROM #__menu WHERE alias ='".$alias."'";
				$result = doSelectSql($query);
				if (count($result)>0)
					{
					$counter++;
					$alias = $alias.$counter;
					}
				else
					{
					$alias_exists = false;
					}
				}

			$query = "SELECT extension_id FROM #__extensions WHERE `type` = 'component' AND `element` = 'com_jomres' LIMIT 1";
			$jomres_component_id = doSelectSql($query,1);

			$search_url = str_replace("&#38;","&",$search_url);

			$data = array();
			$data['menutype'] = $menutype;
			$data['client_id'] = 1;
			$data['title'] = $menu_name ;
			$data['alias'] = $alias;
			$data['link'] = 'index.php?option=com_jomres'.$search_url;
			$data['type'] = 'component';
			$data['published'] = '1';
			$data['parent_id'] = '1';
			$data['params']='{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}';
			$data['language'] = '*';
			$data['level'] = '0';
			$data['client_id'] = '0';
			$data['component_id'] = $jomres_component_id;
			$data['home'] = 0;

			$table = JTable::getInstance('menu');
			
			$table->setLocation($parent_id, 'last-child');
			$table->bind($data);
			$table->check();
			$table->store();
			}
		jomresRedirect($data['link']); 
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
