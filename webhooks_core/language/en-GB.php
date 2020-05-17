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

jr_define( 'WEBHOOKS_CORE', 'Webhooks' );

jr_define('_WEBHOOKS_CONFIG_SHOW',"Show Webhook configuration options in Jomres main menu?");
jr_define('_WEBHOOKS_CONFIG_SHOW_DESC',"You may choose to not show the Webhook configuration options in the 'My Account' section of the Jomres mainmenu. You could instead decide that you wanted to show them on other pages using Jomres Shortcodes.");

jr_define('WEBHOOKS_DOCUMENTATION_TITLE',"Webhooks documentation");

jr_define( '_JOMRES_SHORTCODES_06000WEBHOOKS_DOCS', "Displays the API core documentation page. The API Core allows users to create API clients, which are then used to access the API functionality which is outlined in the API Core documentation." );

jr_define( '_JOMRES_SHORTCODES_06005WEBHOOKS_CLIENT_ADMIN', "Displays the API core administration page, where property managers can configure API clients. Note that this is a registered user only feature, so users must be registered and logged in before they can see this page." );

jr_define( 'WEBHOOKS_INTEGRATION_EDIT', 'Edit Integration' );
jr_define( 'WEBHOOKS_INTEGRATION_ID', 'Integration ID' );
jr_define( 'WEBHOOKS_INTEGRATION_URL', 'URL or Name' );
jr_define( 'WEBHOOKS_ENABLED', 'Enabled' );

jr_define( 'WEBHOOKS_AUTH_METHOD_SELECT', 'Authentication method/Integration' );

jr_define( 'WEBHOOKS_MANAGER_PROPERTIES_NONE', 'Any webhooks you create will not be triggered as you are not assigned to any properties. Super property managers are not typically assigned individual properties, so you may need a new user for webhook creation.' );
jr_define( 'WEBHOOKS_MANAGER_PROPERTIES_ASSIGNED_DESC', 'Any webhooks you create will be triggered against the following properties : ' );