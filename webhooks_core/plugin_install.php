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

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_webhooks_integrations (
    `id` INT(11) auto_increment, 
    `manager_id` int(11),
    `settings`  text null, 
    `enabled` BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY	(`id`)
    )";
doInsertSql($query,"");

if ( !checkIntegrationsEnabledColExists() ) alterIntegrationsEnabledCol();

function checkIntegrationsEnabledColExists()
	{
	$query  = "SHOW COLUMNS FROM #__jomres_webhooks_integrations LIKE 'enabled'";
	$result = doSelectSql( $query );
	if ( !empty( $result ))
		return true;
	return false;
	}

function alterIntegrationsEnabledCol()
	{
	$query = "ALTER TABLE `#__jomres_webhooks_integrations` ADD `enabled` BOOLEAN NOT NULL DEFAULT TRUE AFTER `settings` ";
	doInsertSql( $query, '' );
	}

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig[ 'webhooks_core_show' ])) {
	$siteConfig->insert_new_setting('webhooks_core_show', '0');
}
