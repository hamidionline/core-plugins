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

class j06000search_widget
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
				$this->shortcode_data = array(
					'task' => 'search_widget',
					'arguments_distinct' => true,
					'info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET',
					'arguments' => array(
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_LOCATION_DATES_CATEGORIES',
							'arg_example' => 'horizontal_location_search_dates_sleeps',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_SLEEPS',
							'arg_example' => 'vertical_dates_sleeps',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_COUNTRIES',
							'arg_example' => 'vertical_dates_countries',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_FEATURES',
							'arg_example' => 'vertical_dates_features',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_PROPERTY_TYPES',
							'arg_example' => 'vertical_dates_property_types',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_REGIONS',
							'arg_example' => 'vertical_dates_regions',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_ROOM_TYPES',
							'arg_example' => 'vertical_dates_room_types',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_STARS',
							'arg_example' => 'vertical_dates_stars',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_VERTICAL_DATES_TOWNS',
							'arg_example' => 'vertical_dates_towns',
						),

						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_SLEEPS',
							'arg_example' => 'horizontal_dates_sleeps',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_COUNTRIES',
							'arg_example' => 'horizontal_dates_countries',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_FEATURES',
							'arg_example' => 'horizontal_dates_features',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_PROPERTY_TYPES',
							'arg_example' => 'horizontal_dates_property_types',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_REGIONS',
							'arg_example' => 'horizontal_dates_regions',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_ROOM_TYPES',
							'arg_example' => 'horizontal_dates_room_types',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_STARS',
							'arg_example' => 'horizontal_dates_stars',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_TOWNS',
							'arg_example' => 'horizontal_dates_towns',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DATES_CATEGORIES',
							'arg_example' => 'horizontal_dates_categories',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_PROPERTY_NAME',
							'arg_example' => 'horizontal_property_name',
						),
						array(
							'argument' => 'search_widget',
							'arg_info' => '_JOMRES_SHORTCODES_06000SEARCH_WIDGET_HORIZONTAL_DESCRIPTION',
							'arg_example' => 'horizontal_description',
						),

					),
				);
				return;
			}


			$client = new GuzzleHttp\Client();
			$response = $client->request('GET', JOMRES_SITEPAGE_URL_AJAX.'&task=ajax_locations' , ['connect_timeout' => 10 ] );

			$json_str = (string)$response->getBody();
			if ($json_str != '' ) {
				$json = json_decode($json_str);
				if (!$json == false && !empty($json) ) {
					$options = '';
					foreach ($json as $location ) {
						$geographic_search = $location->form_element."^".urlencode($location->element_name);
						$options .= '<option value="'.$geographic_search.'" >'.$location->element_name.'</option>';
					}
				}
			}

		$MiniComponents->specificEvent('06000', 'search', array( 'doSearch' => false , 'includedInModule' => true , 'form_elements' => array ("options" => $options) ) );

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


