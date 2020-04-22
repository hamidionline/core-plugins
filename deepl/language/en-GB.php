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


jr_define('_DEEPL_TITLE',"DeepL translations");
jr_define('_DEEPL_DESCRIPTION',"DeepL is a reasonably priced in-line translation service that you can use to translate Jomres language strings automatically. These translations, once received from the DeepL service, are stored locally and you can use the Label Translations feature to refine them. This significantly speeds up the process of making your website work with multiple languages.");
jr_define('_DEEPL_API_KEY_SETTING',"DeepL Authentication Key");
jr_define('_DEEPL_API_KEY_SETTING_DESC',"You will need a valid API Key from <a href='' target='_blank'>DeepL.</a> Once you have subscribed, you will find the authentication key in <a href='https://www.deepl.com/subscription.html' target='_blank'>your account.</a>  After you have saved the key in Jomres your site may slow down for a little while as there will be a lot of translations that need to be pulled from the DeepL service. Be patient and reload the page a few times. Afterwards you can finetune the customisations in the lable translations page.");