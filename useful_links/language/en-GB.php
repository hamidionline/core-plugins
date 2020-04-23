<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('USEFUL_LINKS_MODULE_TITLE',"Useful links for ");
jr_define('USEFUL_LINKS_FORSALE',"Properties for sale in ");
jr_define('USEFUL_LINKS_HOTELS',"Hotels/Bed & Breakfasts in ");
jr_define('USEFUL_LINKS_VILLAS',"Holiday homes to rent in ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Information about ");

jr_define('USEFUL_LINKS_ADMIN',"Useful Links");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Real Estate property type id");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Hotel/B&B property type id");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Holiday homes property type id");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'This plugin is designed to show links to specific searches if the url includes "country", "region" or "town", so typically you would want to put it in a sidebar or module/widget position at the top of the page. You will need to configure the plugin in the Site Configuration > Useful links tab first to indicate the property type ids for Hotels, Real Estate and Apartment/Cottage/Villas. ' );
