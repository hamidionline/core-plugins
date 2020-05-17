<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Search for properties by number of stars
	** Description | Perform searches and receive back basic property details of results after searching by stars

	** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/stars/:NUMBER(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response | 
	** Sample call |jomres/api/search/stars/3
	** Notes | Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/stars/@stars(/@language)', function($stars , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$_REQUEST['stars'] = $stars;
	
	$MiniComponents =jomres_getSingleton('mcHandler');
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		Flight::json( $response_name = "search_results" ,$data);
		}
	}); 

/*
	** Title | Search for properties by price
	** Description | Perform searches and receive back basic property details of results after searching by price

	** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/price/:LOW/:HIGH(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response |  
	** Sample call |jomres/api/search/price/50/100/
	** Notes | Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/price/@low/@high(/@language)', function($low, $high , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$_REQUEST['pricerange_value_from'] = $low;
	$_REQUEST['pricerange_value_to'] = $high;
	
	$MiniComponents =jomres_getSingleton('mcHandler');
	
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		Flight::json( $response_name = "search_results" ,$data);
		}
	}); 


/*
	** Title | Search for properties by property feature uids
	** Description | Perform searches and receive back basic property details of results after searching by property feature uids

	/** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/features/:ARRAY(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response | 
	** Sample call |jomres/api/search/features/3,2,5
	** Notes | Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/features/@features_ids(/@language)', function($features_ids , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	// Need to convert the CSV to something that the older script can use
	$ids_array = array_map('intval', explode(',', $features_ids));
	$_REQUEST['feature_uids'] = $ids_array;

	$MiniComponents =jomres_getSingleton('mcHandler');
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		Flight::json( $response_name = "search_results" ,$data);
		}
	});

/*
	** Title | search for properties in town
	** Description | Perform searches and receive back basic property details of results

	** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/towns/:TOWN(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response | 
	** Sample call |jomres/api/search/towns/Torquay,London/en-GB
	** Notes | Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/towns/@towns(/@language)', function($towns , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$towns = explode(',', $towns);
	$_REQUEST['towns'] = $towns;
	
	$MiniComponents =jomres_getSingleton('mcHandler');
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		Flight::json( $response_name = "search_results" ,$data);
		}
	}); 
	

/*
	** Title | search for properties in region
	** Description | Perform searches and receive back basic property details of results after searching by region

	** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/regions/:REGIONS(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response |  
	** Sample call |jomres/api/search/regions/Devon
	** Notes | Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/regions/@regions(/@language)', function($regions , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$regions = explode(',', $regions);
	$_REQUEST['regions'] = $regions;

	$MiniComponents =jomres_getSingleton('mcHandler');
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		
		Flight::json( $response_name = "search_results" ,$data);
		}
	}); 

/*
	** Title | search for properties in countries
	** Description | Perform searches and receive back basic property details of results

	** Plugin | api_feature_search
	** Scope | search_get
	** URL | search
 	** Method | GET
	** URL Parameters | search/countries/:COUNTRIES(:LANGUAGE)
	** Data Parameters | none
	** Success Response | {"data":{"search_results":{"2":{"property_name":"Best West Hotel","property_street":"142 - 146 Harley Street","property_town":"London","property_postcode":"W1G 7LD","property_region":"London, City of","property_region_id":"1154","property_country":"United Kingdom","property_country_code":"GB","property_tel":"34324324324","property_email":"your@email.com","stars":5,"images":[[{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/2.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/2.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/2.jpg"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2---Copy.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/74xDBSTTjJdmPG76VpZw-2.JPG","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/74xDBSTTjJdmPG76VpZw-2.JPG","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/74xDBSTTjJdmPG76VpZw-2.JPG"},{"large":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","medium":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/medium\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg","small":"http:\/\/localhost\/quickstart\/jomres\/uploadedimages\/2\/property\/0\/thumbnail\/9s1lvXLlSbCX5l3ZaYWP-hdr-1---Copy.jpg"}]],"property_details_page":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=viewproperty&property_uid=2","bookthis_link":"http:\/\/localhost\/quickstart\/index.php?option=com_jomres&Itemid=103&lang=en&task=dobooking&selectedProperty=2","bookthis_text":"Request booking"}}}}
	** Error Response | 
	** Sample call |jomres/api/search/countries/GB,RO/en-GB
	** Notes | 
		Countries sent must be in ISO 3166 format ( http://www.iso.org/iso/country_codes )
		Returns an indexed array of properties, the array key is the property uid
		Array contents : 
			property_name
			property_street
			property_town
			property_postcode
			property_region
			property_region_id
			property_country
			property_country_code
			property_tel
			property_email
			images , an array of any images that may have been uploaded. These are the "main" images which are typically seen on the property list pages.
			property_details_page
			bookthis_link , this is either to the booking form, or to the contact owner page depending on the property's configuration.
			bookthis_text , related to the bookthis_link it's contents will vary according to the property's configuration. 
*/


Flight::route('GET /search/countries/@countries(/@language)', function($countries , $language) 
	{
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$countries = explode(',', $countries);
	$_REQUEST['countries'] = $countries;
	
	$MiniComponents =jomres_getSingleton('mcHandler');
	if (!$MiniComponents->eventSpecificlyExistsCheck('06110',"ajax_search_composite") )
		{
		Flight::halt(500, "Ajax search Composite plugin is required to perform searches");
		}
	else
		{
		$data = search_get_function_perform_search();
		Flight::json( $response_name = "search_results" ,$data);
		}
	}); 

function search_get_function_perform_search()
	{
	$MiniComponents =jomres_getSingleton('mcHandler');
	$result = $MiniComponents->specificEvent('06110',"ajax_search_composite");
	if (count($result)>0)
		{
		$data = array();
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($result, array('property'));
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data_multi( $result );

		foreach ($result as $property_uid)
			{
			if (!isset($jomres_media_centre_images->multi_query_images[$property_uid]))
				{
				$jomres_media_centre_images->multi_query_images[$property_uid]['property'][0][0]= array (
					"large" => $jomres_media_centre_images->multi_query_images['noimage-large'],
					"medium" => $jomres_media_centre_images->multi_query_images['noimage-medium'],
					"small" => $jomres_media_centre_images->multi_query_images['noimage-small']
					);
				}
			$data[$property_uid] = search_get_function_build_property_reply($property_uid , $current_property_details->multi_query_result[$property_uid] , $jomres_media_centre_images->multi_query_images[$property_uid]);
			}

		return $data;
		}
	else
		{
		return array ();
		}
	}

function search_get_function_build_property_reply($property_uid,$search_result,$images)
	{
	$arr = array();

 	$arr['property_name']			= $search_result['property_name'];
	$arr['property_street']			= $search_result['property_street'];
	$arr['property_town']			= $search_result['property_town'];
	$arr['property_postcode']		= $search_result['property_postcode'];
	$arr['property_region']			= $search_result['property_region'];
	$arr['property_region_id']		= $search_result['property_region_id'];
	$arr['property_country']		= $search_result['property_country'];
	$arr['property_country_code']	= $search_result['property_country_code'];
	$arr['property_tel']			= $search_result['property_tel'];
	$arr['stars']					= $search_result['stars'];
	$arr['cat_id']					= $search_result['cat_id'];
	
	if (isset($images['property'])) {
		$arr['images']					= $images['property'];
	} else {
		$arr['images']					= array();
	}

	$arr['property_details_page']	= jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=viewproperty&property_uid=" . $property_uid );
	$mrConfig       = getPropertySpecificSettings( (int)$property_uid );
	$dobooking_task = "dobooking";
	
	$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
	
	if ( $mrConfig[ 'registeredUsersOnlyCanBook' ] == "1" && $thisJRUser->id == 0 ) 
		$dobooking_task = "contactowner";
	
	if ( $mrConfig[ 'is_real_estate_listing' ] == 0 )
		{
		if ( $mrConfig[ 'visitorscanbookonline' ] == "1" )
			{
			$url                      = jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=" . $dobooking_task . "&amp;selectedProperty=" . $property_uid );
			$arr[ 'bookthis_link' ] = $url;
			if ( $mrConfig[ 'singleRoomProperty' ] == "1" )
				{
				if ( $mrConfig[ 'requireApproval' ] == "1" )
					$arr[ 'bookthis_text' ] = jr_gettext( '_BOOKING_CALCQUOTE', '_BOOKING_CALCQUOTE', false, false );
				else
					$arr[ 'bookthis_text' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY', '_JOMRES_FRONT_MR_MENU_BOOKTHISPROPERTY', false, false );
				}
			else
				{
				if ( $mrConfig[ 'requireApproval' ] == "1" )
					$arr[ 'bookthis_text' ] = jr_gettext( '_BOOKING_CALCQUOTE', '_BOOKING_CALCQUOTE', false, false );
				else
					$arr[ 'bookthis_text' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_BOOKAROOM', '_JOMRES_FRONT_MR_MENU_BOOKAROOM', false, false );
				}
			if ( $dobooking_task != "dobooking" ) 
				$arr[ 'bookthis_text' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_CONTACTHOTEL', '_JOMRES_FRONT_MR_MENU_CONTACTHOTEL', false, false );
			}
		else
			{
			$arr[ 'bookthis_link' ]          = jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=contactowner&amp;selectedProperty=" . $property_uid );
			$arr[ 'bookthis_text' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_CONTACTHOTEL', '_JOMRES_FRONT_MR_MENU_CONTACTHOTEL', false, false );
			}
		}
	else
		{
		$arr[ 'bookthis_link' ]          = jomresURL( JOMRES_SITEPAGE_URL_NOSEF . "&task=contactowner&amp;selectedProperty=" . $property_uid );
		$arr[ 'bookthis_text' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_CONTACT_AGENT', '_JOMRES_FRONT_MR_MENU_CONTACT_AGENT', false, false );
		}
	
	
	return $arr;
	}
	