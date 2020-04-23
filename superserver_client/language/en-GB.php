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
defined( '_JOMRES_INITCHECK' ) or die();
// ################################################################

jr_define('SUPERSERVER_TITLE',"Online Booking Network");
jr_define('SUPERSERVER_TITLE_STATS',"OBN Stats");

jr_define('SUPERSERVER_SERVER_LIVE_LINKTEXT',"See the live server");
jr_define('SUPERSERVER_SERVER_SANDBOX_LINKTEXT',"See the sandbox server");

jr_define('SUPERSERVER_DESC',"The Online Booking Network Superserver plugin allows you to share your properties with the Jomres Online Booking Network. This will add you to a pool of other properties, thereby increasing your footprint on the web and bringing traffic to your site. To use this service all you'll need is a valid Jomres license key. This is an essential tool to increase your site's visiblity.");

jr_define('SUPERSERVER_DESC_WARNING',"If your key expires your properties will be removed from the Online Booking Network at http://onlinebooking.network but they will continue to work on your own server.");

jr_define('SUPERSERVER_DESC_2',"Once your license key is validated by the Online Booking Network any properties you add will be added to the OBN's properties. Once the properties are published they'll appear on the OBN's property list and guests will be able to search the OBN's database. When they view the property's details they'll be sent to your site, where you will have the opportunity to capture the booking.");

jr_define('SUPERSERVER_KEY_NOT_VALID',"Unfortunately you will not be able to connect to the Super Server. Either your internet connection is down, or your license key is not valid ( are you trying to connect to the live server with a Trial licence? ). If you were previously connected and you had any properties on the Super Server, they will have been unpublished.");

jr_define('SUPERSERVER_ALREADY_REGISTERED',"Congratulations, you are connect to the Online Booking Network, you can leave the rest to us.");
jr_define('SUPERSERVER_NOT_REGISTERED',"Your server's not connected to the OBN yet. Click the Connect button to begin the registration process.");
jr_define('SUPERSERVER_REGISTER',"Connect");
jr_define('SUPERSERVER_DISCONNECT',"Disconnect");

jr_define('SUPERSERVER_DEV_PROD_STATE_DEV',"Your installation is current set to Development mode. Connection will connect you to the Sandbox Superserver");
jr_define('SUPERSERVER_DEV_PROD_STATE_PROD',"Your installation is current set to Live mode. Connection will connect you to the  Live Superserver.");


jr_define('SUPERSERVER_REGISTERED',"Great, your server has been connected to the Online Booking Network. Any new properties you add will be added to the Super Server.");
jr_define('SUPERSERVER_DISCONNECT_WARNING',"If you choose to disconnect from the Super Server then any properties already registered will be deleted and you will no longer get traffic from our server to yours.");

jr_define('SUPERSERVER_REGISTER_FAILED',"Sorry, connection failed, please raise a support ticket with Jomres at https://tickets.jomres.net and we'll look into it for you.");
jr_define('SUPERSERVER_SERVER_KEY_VALIDATION',"Sorry but the server cannot valid your key. This may be a problem at our end, please <a href='https://tickets.jomres.net'>contact us</a> if you see this message.");

jr_define('SUPERSERVER_SUPPORTED_PROPERTY_TYPES',"Please note that we only support these property types. Any properties on your system that do not correspond to these property type names will not be uploaded to the Super Server.");

jr_define('SUPERSERVER_API_FEATURE_NOT_INSTALLED',"The API Feature Superserver plugin is not installed, please install that before attempting to Connect, as it is required for the two machines to talk to each other.");

jr_define('SUPERSERVER_DEV_PROD',"Connect to Live Superserver?");
jr_define('SUPERSERVER_DEV_PROD_DESC',"Only users with Single, Portal or Developer licenses can connect their properties with the OBN. If you have a Trial license or are just experimenting, leave this option set to No so that your properties are only registered on the OBN sandbox.");

