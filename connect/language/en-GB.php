<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('JOMRES_PLATFORM',"Jomres Platform");


jr_define('JOMRES_PLATFORM_CONNECTED',"Connected");
jr_define('JOMRES_PLATFORM_CONNECTED_DESC',"Set this to Yes if you have already connected your sTRIPE account with the Jomres Platform.");

jr_define('JOMRES_PLATFORM_ACCOUNT_ID',"Stripe Live Account number");
jr_define('JOMRES_PLATFORM_ACCOUNT_ID_DESC',"This is your Stripe Account id which can be found in your Stripe Dashboard under Settings > Account information and looks like acct_xxxxxxxxx You would use this field if you have multiple Jomres installations and you want to use the same account across all sites and you have already connected to us. If you have not connected to the Jomres Platform, it's not sufficient to enter your details here. Instead, please visit the Get Connected menu option in the toolbar, under the Help section. If you want to test payments, in the Debugging tab of Site Configuration set your site from Production to Development.");

jr_define('JOMRES_PLATFORM_LIVE_SECRET_KEY',"Stripe live secret key");
jr_define('JOMRES_PLATFORM_LIVE_SECRET_KEY_DESC','Go to Developers > API keys in your Stripe Dashboard to find your secret keys. These are used by the system to verify booking data returned from the payment form is valid and that deposits have been paid before saving the booking.' );

jr_define('JOMRES_PLATFORM_TEST_SECRET_KEY',"Stripe test secret key");
jr_define('JOMRES_PLATFORM_TEST_SECRET_KEY_DESC',' ' );

