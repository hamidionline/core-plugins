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

if (!defined('JOMRES_INSTALLER')) exit;

$plugin_name = "jomsearch_m1";
$plugin_type = "module";
$params="";


install_external_plugin($plugin_name,$plugin_type,"",$params);
