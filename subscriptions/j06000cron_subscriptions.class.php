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

class j06000cron_subscriptions
	{
	function __construct()
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false;
			return;
			}
		
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$query = "SELECT 
						a.`id`,
						a.`cms_user_id`,
						a.`package_id`,
						a.`status`,
						a.`raised_date`,
						a.`expiration_date`,
						b.`enc_firstname`,
						b.`enc_surname`,
						b.`enc_email`
					FROM #__jomresportal_subscriptions a  
					LEFT JOIN #__jomres_guest_profile b ON a.`cms_user_id` = b.`cms_user_id` 
					WHERE a.`status` = 1 
						AND DATE_FORMAT(NOW(), '%Y-%m-%d') > DATE_FORMAT(
																		 ( SELECT MAX(`expiration_date`) 
																			FROM #__jomresportal_subscriptions 
																			WHERE `cms_user_id` = a.`cms_user_id` 
																				AND `package_id` = a.`package_id`
																			)
																		 , '%Y-%m-%d') 
					GROUP BY cms_user_id, package_id ";
		$result = doSelectSql( $query );

		if ( !empty($result) )
			{
			$expired_subscriptions_ids = array();
			
			if ((int)$jrConfig[ 'subscriptionSendExpirationEmail' ] == 1)
				{
				$output = array();
				
				$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
				
				$output['DEAR'] = jr_gettext('_JRPORTAL_NEWUSER_DEAR','_JRPORTAL_NEWUSER_DEAR',false);
				$output['EMAIL_TEXT1'] = jr_gettext('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1','_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1',false);
				$output['HLEVEL'] = jr_gettext('_SUBSCRIPTIONS_HPACKAGE_YOUR','_SUBSCRIPTIONS_HPACKAGE_YOUR',false);
				$output['HSTATUS'] = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_STATUS','_JOMRES_COM_MR_VIEWBOOKINGS_STATUS',false);
				$output['STATUS'] = jr_gettext('_SUBSCRIPTIONS_EXPIRED','_SUBSCRIPTIONS_EXPIRED',false);
				$output['HVALID_FROM'] = jr_gettext('_JOMRES_FRONT_TARIFFS_STARTS','_JOMRES_FRONT_TARIFFS_STARTS',false);
				$output['HVALID_TO'] = jr_gettext('_JOMRES_FRONT_TARIFFS_ENDS','_JOMRES_FRONT_TARIFFS_ENDS',false);
				
				$email_title = jr_gettext('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1','_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',false) . get_showtime('sitename') . jr_gettext('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2','_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',false);
				}
					
			foreach ($result as $s)
				{
				$expired_subscriptions_ids[] = $s->id;
				
				jr_import( 'jomres_suspensions' );
				$jomres_suspensions = new jomres_suspensions();
				$jomres_suspensions->set_manager_id( $s->cms_user_id );
				$jomres_suspensions->suspend_manager();
				$jomres_suspensions->unpublish_managers_properties();
				
				if ((int)$jrConfig[ 'subscriptionSendExpirationEmail' ] == 1)
					{
					//variable email output
					$output['SUBSCRIBER_NAME'] = $this->jomres_encryption->decrypt($s->enc_firstname).' '.$this->jomres_encryption->decrypt($s->enc_surname);
					$output['LEVEL'] = $basic_subscription_package_details->allPackages[$s->package_id]['name'];
					$output['VALID_FROM'] = $s->raised_date;
					$output['VALID_TO'] = $s->expiration_date;
					
					$pageoutput[]=$output;
					$tmpl = new patTemplate();
					$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
					$tmpl->readTemplatesFromInput( 'email_subscription_expiration.html' );
					$tmpl->addRows( 'pageoutput', $pageoutput );
					$text=$tmpl->getParsedTemplate();
	
					//send email
					if (!jomresMailer( get_showtime( 'mailfrom' ), get_showtime( 'fromname' ), $this->jomres_encryption->decrypt($s->enc_email), $emailTitle, $text,$mode=1))
						error_logging('Failure in sending subscription expiration email to manager. Target address: '.$this->jomres_encryption->decrypt($s->enc_email).' Subject: '.$emailTitle);
					}
				}

			//now let`s set the expired subscriptions status to 0
			$query = "UPDATE #__jomresportal_subscriptions SET `status` = 0 WHERE `id` IN (".implode(',',$expired_subscriptions_ids).") ";
			doInsertSql($query, "");
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
