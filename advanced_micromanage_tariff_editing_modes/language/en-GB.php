<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITPRICES',"Set prices manually");
jr_define('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITMINDAYS',"Set minimum nights manually");
jr_define('_JOMRES_MICROMANAGE_PICKER_SETMINDAYS',"Set minimum nights");

jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_DOW',"Set <em>price per night</em> by day of week");
jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_RATES',"Set <em>price per night</em> by date range");
jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_MINDAYS',"Set <em>minimum nights</em> by date range");

jr_define('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_RATES',"The date pickers and the rate input allow you to set one price for a given date range. Choose a start and end date, input a price, and click the Set price per night button.");
jr_define('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_MINDAYS',"The date pickers and the minimum nights input allow you to set one value for the minimum nights for a given date range. Choose a start and end date, input a number for the minimum nights, and click 'Set minimum nights'.");

jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO',"Use this dropdown to change between setting prices for individual dates, to setting minimum nights for individual dates. You can use the <em>by day of week</em> picker, the <em>by date range</em> picker or set the prices/minimum nights by manually editing the dates.");
jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO_SMALL_VIEWPORT',"Use this dropdown to change between setting prices for individual dates, to setting minimum nights for individual dates. You can use the <em>by date range</em> picker or set the prices/minimum nights by manually editing the dates.");
jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR',"Set prices or minimum nights");

jr_define('_JOMRES_MICROMANAGE_PICKER_BYDOW',"Set <em>minimum nights</em> by day of week");
jr_define('_JOMRES_MICROMANAGE_PICKER_BYDOW_INFO',"The day of week fields allow you to set a minimum number of nights for a given day of week, once you click the day of week button all days of the week will be set to that min nights setting.");


jr_define('_JOMRES_MICROMANAGE_MANUALLY',"Manually set prices/minimum nights");
jr_define('_JOMRES_MICROMANAGE_SET_PRICES',"Set prices");
jr_define('_JOMRES_MICROMANAGE_SET_MINDAYS',"Set minimum nights");

jr_define('_JOMRES_MICROMANAGE_PRICE',"Per night");
jr_define('_JOMRES_MICROMANAGE_MINDAYS',"Min nights");
jr_define('_JOMRES_MICROMANAGE_MAXDAYS',"Max nights");

jr_define('_JOMRES_MICROMANAGE_INTRO',"Here you can create you tariffs, which are associated with the room types that you have in your property. ");

jr_define('_JOMRES_MICROMANAGE_BASIC_SETTINGS',"Most commonly used options");

jr_define('_JOMRES_MICROMANAGE_MODAL_BUTTON',"Instructions");

jr_define('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS',"If you want to add different prices for different numbers of guests then <em>you can create more than several tariffs for each room type</em> and have different min/max guests values in those tariffs.");

jr_define('_JOMRES_MICROMANAGE_INFO',"Give the tariff a name, define the maximum number of nights, and the minimum and maximum number of guests that are required in the booking form before the tariff is offered.<br/><br/> Use the date picker panel to add prices and minimum nights settings to a range of dates, or edit the inputs directly. If you don't want the tariff to be offered at all on certain dates, leave the price set to 0 ( zero ) on those dates. <br/><br/> You can have different minimum nights on different dates, so if you want longer bookings during festival/conference weeks then you can set the min nights to be higher in just those periods.<br/><br/>If you charge Per Person Per Pight (PPPN) you can enable that setting in Settings > Property Configuration > Tariffs and Currency tab, then create the guest types that you require in Settings > Guest Types.");

jr_define('_JOMRES_MICROMANAGE_EXTRAOPTIONS',"Extra options");

jr_define('_JOMRES_MICROMANAGE_EXTRA_OPTIONS',"These are additional options that are not so commonly used, but nevertheless available to you. <br/><strong>Ignore PPPN</strong> Means Ignore Per Person Per Night. You can have several different tariffs for the same room type, for example one of which charges per person per night, and one that does not.<br/><strong>Allow weekends</strong> The Allow Weekends option gives you the option to make a tariff that's only available during weekdays, for example if you want a special tariff for business travellers. In that case you would set the option to No and the min nights to 1 and the max nights, at most, 5.  <br/><strong>Weekends only</strong>  The Weekends only option is the converse of the Allow Weekends option. What you consider to be weekend days can be configured in your Property Configuration settings. This gives you the ability to define a weekend only rate that you might want to offer for special events.<br/><strong>Check-in Day of week</strong> This option gives you the ability to force checkin to only be on certain days of the week and is best used in conjunction with the Property Configuration > Bookings tab > Fixed periods options. The majority of users will want to leave this option set to All.<br/>The final two options, <strong>Min rooms already selected</strong> and <strong>Max rooms already selected</strong> are very specialised and useful to properties with extremely complicated tariffs. <em>Unless you have a specific need, you should leave these options alone.</em> Use them if you only want this tariff to be offered when the guest has already selected N number of rooms in the booking form, so for example you could have one basic tariff where those options are left at the default, and a second tariff where the min rooms already selected option is set to 1, then this second tariff will be offered in the booking form once a room has been selected.");

jr_define('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS_LIST_PAGE',"You can create multiple tariffs for the same room type, so you can create one tariff for min/max days of 1 - 7 and a second tariff where the min days is 7, the max days 14, and so on. This allows you create pricing schemes as simple or as complicated as you need. It also allows you to create multiple tariffs with different conditions, so you can have a second set of tariffs where the price is lower for Bed & Breakfast, and another set of more expensive tariffs for Bed, Breakfast and Evening Meal.");

jr_define('_JOMRES_MICROMANAGE_USE_SELECTED_DATES',"Set date picker days only");
