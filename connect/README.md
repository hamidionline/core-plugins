      
This plugin is generated by Connecting to the Jomres Platform 

After you connect Jomres will write to the "jomres/configuration.php" file.

Updating these:

'platform_connected' => '1',

'connection_account_id' => 'numbers-goes-here',

When 'platform_connected' => '1', then the "connect" plugin is installed. It is listed under "Third party plugins".

When 'platform_connected' => '0', then you are able to uninstall this plugin under "Third party plugins".

Also, make sure this is what it looks like after you edit this file:

'platform_connected' => '0',

'connection_account_id' => '',

This plugin is ionCube encoded when installed.

If you don't want to use Jomres Platform just delete this plugin and make sure the settings in the configuration.php are updated to look like this: 'platform_connected' => '0', 'connection_account_id' => '',