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

/**
#
 * Outgoing interrupt for cheque details
 #
* @package Jomres
#
 */

class j00600cheque {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
			
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$mrConfig=getPropertySpecificSettings();
		$plugin="cheque";
		$bookingdata=$componentArgs['bookingdata'];
		
		$output=array();
		$valid_manager_id = 0;
		
		$output['DEPOSIT']=output_price($bookingdata['deposit_required']);
		$output['TOTAL']=output_price($bookingdata['contract_total']);
		$bal=(float)$bookingdata['contract_total']-(float)$bookingdata['deposit_required'];
		$output['BALANCE']=output_price($bal);

		$query = "SELECT a.id, a.manager_id FROM #__jomres_managers_propertys_xref a, #__jomres_managers b WHERE a.property_uid = ".(int)$bookingdata['property_uid']." AND ( a.manager_id = b.userid AND b.access_level < 90 )";
		$result = doSelectSql($query);

		if (!empty($result))
			{
			foreach ($result as $manager)
				{
				$valid_manager_id = $manager->manager_id;
				}
			}
		
		$manager_details = false;
		if ($valid_manager_id > 0)
			{
			$query = "SELECT `enc_firstname`,`enc_surname`,`enc_house`,`enc_street`,`enc_town`,`enc_county`,`enc_country`,`enc_postcode`,`enc_tel_landline`,`enc_email` FROM #__jomres_guest_profile WHERE `cms_user_id` = ".(int)$valid_manager_id;
			$manager_details = doSelectSql($query,2);
			}

		if ($manager_details != false )
			{
			$output['PROP_NAME']=$this->jomres_encryption->decrypt($manager_details['enc_firstname'])." ".$this->jomres_encryption->decrypt($manager_details['enc_surname']);
			$output['PROP_STREET']=$this->jomres_encryption->decrypt($manager_details['enc_house'])." ".$this->jomres_encryption->decrypt($manager_details['enc_street']);
			$output['PROP_TOWN']=$this->jomres_encryption->decrypt($manager_details['enc_town']);
			$output['PROP_POSTCODE']=$this->jomres_encryption->decrypt($manager_details['enc_postcode']);
			
			$jomres_regions = jomres_singleton_abstract::getInstance( 'jomres_regions' );
			$region_name = jr_gettext( "_JOMRES_CUSTOMTEXT_REGIONS_" .$this->jomres_encryption->decrypt($manager_details['enc_county']), $jomres_regions->get_region_name((int)$this->jomres_encryption->decrypt($manager_details['enc_county'])), false, false );
			
			$output['PROP_REGION']=$region_name;
			$countryname=getSimpleCountry($this->jomres_encryption->decrypt($manager_details['enc_country']));
			$output['PROP_COUNTRY']=ucfirst($countryname);
			$output['PROP_TEL']=$this->jomres_encryption->decrypt($manager_details['enc_tel_landline']);
			$output['PROP_EMAIL']=$this->jomres_encryption->decrypt($manager_details['enc_email']);
			}
		else
			{
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data((int)$bookingdata['property_uid']);

			$output['PROP_NAME']=$current_property_details->property_name;
			$output['PROP_STREET']=$current_property_details->property_street;
			$output['PROP_TOWN']=$current_property_details->property_town;
			$output['PROP_POSTCODE']=$current_property_details->property_postcode;
			$output['PROP_REGION']=$current_property_details->property_region;
			$output['PROP_COUNTRY']=$current_property_details->property_country;
			$output['PROP_TEL']=$current_property_details->property_tel;
			$output['PROP_EMAIL']=$current_property_details->property_email;
			}

		$output['PROP_FAX']=$current_property_details->property_fax;
		
		$output['GATEWAY']=$plugin;
		$output['JR_GATEWAY_SENDDEPOSITTO']=jr_gettext('_JOMRES_CUSTOMTEXT_SENDDEPOSITTO'.$plugin,"Please send your deposit of ");
		$output['JR_GATEWAY_BELOWADDRESS']=jr_gettext('_JOMRES_CUSTOMTEXT_BELOWADDRESS'.$plugin," to the address below ");
		$output['JR_GATEWAY_CONTACTUS1']=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS1'.$plugin,"If you have any problems, please do not hesitate to contact us. You can ring us on ");
		$output['JR_GATEWAY_CONTACTUS2']=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS2'.$plugin," or email us at ");
		$output['_JOMRES_REVIEWS_SUBMIT'] = jr_gettext('_JOMRES_REVIEWS_SUBMIT','_JOMRES_REVIEWS_SUBMIT',false);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( get_showtime('ePointFilepath') );
		$tmpl->readTemplatesFromInput( 'j00600'.$plugin.'.html' );
		$tmpl->addRows( 'interrupt_outgoing', $pageoutput );
		$tmpl->displayParsedTemplate();
		}
		
	function touch_template_language()
		{
		$output=array();
		$plugin="cheque";

		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_SENDDEPOSITTO'.$plugin,"Please send your deposit of ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_BELOWADDRESS'.$plugin," to the address below ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS1'.$plugin,"If you have any problems, please do not hesitate to contact us. You can ring us on ");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_CONTACTUS2'.$plugin," or email us at ");
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
