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

// 9.8.19 moved these tables into Core installer, but will leave these in-situ for a few versions.

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_clients (
	`client_id` VARCHAR(80) NOT NULL, 
	`client_secret` VARCHAR(80), 
	`redirect_uri` VARCHAR(2000) NOT NULL, 
	`grant_types` VARCHAR(80), 
	`scope` VARCHAR(1000), 
	`user_id` VARCHAR(80), 
    `identifier` VARCHAR(255),
	CONSTRAINT clients_client_id_pk 
	PRIMARY KEY (client_id)
	)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_access_tokens (access_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT access_token_pk PRIMARY KEY (access_token))";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_authorization_codes (authorization_code VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), redirect_uri VARCHAR(2000), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code))";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_refresh_tokens (refresh_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255), expires TIMESTAMP NOT NULL, scope VARCHAR(2000), CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token))";
doInsertSql($query,"");


$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_users (username VARCHAR(255) NOT NULL, password VARCHAR(2000), first_name VARCHAR(255), last_name VARCHAR(255), CONSTRAINT username_pk PRIMARY KEY (username))";
doInsertSql($query,"");


$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_scopes (scope TEXT, is_default BOOLEAN)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS  #__jomres_oauth_jwt (client_id VARCHAR(80) NOT NULL, subject VARCHAR(80), public_key VARCHAR(2000), CONSTRAINT jwt_client_id_pk PRIMARY KEY (client_id))";
doInsertSql($query,"");

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig[ 'api_core_show' ])) {
	$siteConfig->insert_new_setting('api_core_show', '0');
}

$query = "SHOW COLUMNS FROM #__jomres_oauth_clients LIKE 'identifier'";
$colExists = doSelectSql( $query );
if (count($colExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_oauth_clients` ADD `identifier` VARCHAR(255) ";
	doInsertSql($query,"");
	}

$cron =jomres_getSingleton('jomres_cron');
$cron->addJob("api_tokens_cleanup","D","");
    