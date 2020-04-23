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

$cron =jomres_getSingleton('jomres_cron');
$cron->removeJob("subscriptions");
$cron->removeJob("subscriptions_reminder");
