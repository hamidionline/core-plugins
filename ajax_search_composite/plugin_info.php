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

class plugin_info_ajax_search_composite
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"ajax_search_composite",
			"category"=>"Search",
			"marketing"=>"Allows you to put a search module that offers searching on availability, price range, features, property type, room type, guest numbers, stars, country, region and town in a sidebar or across the top. Offers 4 possible layouts, 2 vertical 2 horizontal.",
			"version"=>(float)"8.8",
			"description"=> "Uses the ajax search framework. Allows you to put a search module that offers searching on availability, price range, features, property type, room type, guest numbers, stars, country, region and town in a sidebar or top bar. You'll need to create a new jomres asamodule module, set the task to 'ajax_search' and the arguments to '&ajs_plugin=ajax_search_composite'. You will then have a new option in the administrator -> portal area which allows you to enable/disable different options. You can also 'pre filter' property uids and property types, so instead of searching all properties, you can tell the system to only return properties that fall into a group that you have already selected. To do that, you would add more arguments to the arguments field like so : '&ajs_plugin=ajax_search_composite&property_uids=1,3&ptypes=5' By default all options are enabled, you can disable them through the tab under 'Site Configuration' titled 'Ajax search composite settings', or through the arguments list. 
			In v3.8 we added the option to prefilter countries and regions, so to prefilter the countries so that only regions in certain countries are shown you would do something like &prefilter_country_code=GB,FR which will only show regions in the UK and France. Similarly, you can prefilter regions like so : &prefilter_region=Avon which will only show towns in the county of Avon. Because Avon is in the UK, no other countries will be shown.
			
			To disable an option through the arguments list you can set the arguments like so : '&ajs_plugin=ajax_search_composite&by_stars=0' however be aware that if you have set an option via 'Ajax search composite settings' to No then setting 'by_stars' in the arguments list will have no effect. The full list of options are by_stars, by_price, by_features, by_country, by_region, by_town, by_roomtype, by_propertytype and by_guestnumber, by_date. If you're using a bootstrapped template you've got a choice of two templates to use, by setting the Modal option to Yes or No. With this set to No then all filter options will be viewable as buttons. If set to Yes then the title becomes clickable and the filter options can be seen in a modal popup. If you have html experience and are familiar with bootstrap then you can further customise this look/feel by combining the elements you like from each template into one. 
			In v5.0 we added a new Multiselect template, plus the option to choose the template style through the arguments so you can set &template_style=buttons/modals/accordion/multiselect to choose a different style. We also added a flag 'view_on_property_details', which you can set to 0 or 1. This allows you to enable/disable the plugin on the property details page, which might be useful if you want one view of the module on most pages (e.g. horizontal) and another view in the property details (e.g. in a sidebar).
			
			",
			"lastupdate"=>"2021/05/03",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/29-ajax-search-composite',
			'change_log'=>'v6.0 changed the Return to Results button to use a link where we can pass a flag so that previous search results can be listed. v6.1 PHP7 related maintenance. v6.2 Improved search by town query to be suitable for larger installations. v6.3 new changes needed by 9.5.6. v6.4 Added support for Enhanced Property List Totals plugin. v6.5 Modified region prefiltering. 6.6 Jomres 9.7.4 related changes v6.7 Remaining globals cleanup and jr_gettext refactor related changes. v6.8 Notice level changes. v7.0 Fixed some notice level errors. v7.1 Small change to multiselect template to make the "starts" row tapable. v7.2 Notices fixes. v7.3 Removed references to Jomres Array Cache as it is now obsolete. v7.4 Added session related updates. v7.5 Settings moved to Site Config. v7.6 Modified how array contents are checked. v7.7 Changed how a variable is detected. v7.8 Resolved an issue where property features would not show in search options when ptype option was set. v7.9 Region and Town name listings improved to be sorted alphabetically. v8.0 Updated to provide shortcode information. v8.1 Node/javascript path related changes. v8.2 Templates updated to allow for pre-selections. v8.3 Improved how price ranges are setup. v8.4 French language file added. v8.5 BS4 template set added v8.6 Italian language file added, thanks Nicola. v8.7 Tweaked how real estate property prices are searched because it was skewing the results. v8.8 Further improved searching.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_nfnn3.png',
			'demo_url'=>''
			);
		}
	}
