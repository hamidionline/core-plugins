<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_registered_sites`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `jomres_url` TEXT NOT NULL,
  `api_url` TEXT NOT NULL,
  `ip_number` VARCHAR(255) NOT NULL DEFAULT '',
  `property_count` INT(10) DEFAULT 0,
  `license_number` VARCHAR(255) NOT NULL DEFAULT '',
  `display` BOOLEAN DEFAULT TRUE,
  `date_added` DATE,
  `date_display_denied` DATE,
  PRIMARY KEY(id)
)";
doInsertSql($query,"");

