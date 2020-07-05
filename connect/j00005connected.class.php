<?php
/**
 * Connect plugin
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.22.0
 *
 * @copyright	2005-2020 Vince Wooll
 *
 * This file is NOT open source and you are not allowed to distribute it, for any reason.
 **/
class j00005connected
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton("mcHandler");
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
        } else {
            $ePointFilepath = get_showtime("ePointFilepath");
            if (file_exists($ePointFilepath . "language" . JRDS . get_showtime("lang") . ".php")) {
                require_once $ePointFilepath . "language" . JRDS . get_showtime("lang") . ".php";
            } else {
                if (file_exists($ePointFilepath . "language" . JRDS . "en-GB.php")) {
                    require_once $ePointFilepath . "language" . JRDS . "en-GB.php";
                }
            }
            $siteConfig = jomres_singleton_abstract::getInstance("jomres_config_site_singleton");
            $jrConfig = $siteConfig->get();
            if (isset($jrConfig["scid"]) && trim($jrConfig["scid"]) != "") {
                foreach ($MiniComponents->registeredClasses["00600"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["00600"][$key]);
                    }
                }
                foreach ($MiniComponents->registeredClasses["00605"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["00605"][$key]);
                    }
                }
                foreach ($MiniComponents->registeredClasses["00610"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["00610"][$key]);
                    }
                }
                foreach ($MiniComponents->registeredClasses["00510"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["00510"][$key]);
                    }
                }
                foreach ($MiniComponents->registeredClasses["00509"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["00509"][$key]);
                    }
                }
                foreach ($MiniComponents->registeredClasses["03108"] as $key => $plugin) {
                    if ($key != "connected") {
                        unset($MiniComponents->registeredClasses["03108"][$key]);
                    }
                }
            }
            if ($jrConfig["development_production"] == "development") {
                return NULL;
            }
            if (!file_exists(JOMRES_COREPLUGINS_ABSPATH . "connect" . JRDS . "plugin_info.php")) {
                $MiniComponents->specificEvent("16000", "addplugin", array("plugin" => "connect", "autoupgrade" => true));
            }
            $last_modified = 0;
            if (file_exists(JOMRES_TEMP_ABSPATH . "connect")) {
                $last_modified = filemtime(JOMRES_TEMP_ABSPATH . "connect");
                $interval = strtotime("-1 hour");
                if ($last_modified <= $interval && file_exists(JOMRES_TEMP_ABSPATH . "connect")) {
                    unlink(JOMRES_TEMP_ABSPATH . "connect");
                }
            }
            if (!file_exists(JOMRES_TEMP_ABSPATH . "connect") && !class_exists("plugin_info_connect")) {
                require_once JOMRES_COREPLUGINS_ABSPATH . "connect" . JRDS . "plugin_info.php";
                $info = new plugin_info_connect();
                $local_version = $info->data["version"];
                $client = new GuzzleHttp\Client(array("base_uri" => "http://plugins.jomres4.net/"));
                $response = $client->request("GET", "?r=sp&plugin=connect&cms=*");
                $remote = json_decode((string) $response->getBody());
                if (version_compare($local_version, $remote->version) < 0 && version_compare($remote->min_jomres_ver, $jrConfig["version"]) <= 0) {
                    $MiniComponents->specificEvent("16000", "addplugin", array("plugin" => "connect", "autoupgrade" => true));
                }
                touch(JOMRES_TEMP_ABSPATH . "connect");
            }
        }
    }
    public function getRetVals()
    {
    }
}

?>