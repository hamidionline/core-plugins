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
class plugin_info_connect
{
    public function __construct()
    {
        $this->data = array("name" => "connect", "category" => "Payment handling", "marketing" => "Connect plugin for Jomres", "version" => (double) "0.2", "description" => "Connect to the Jomres Platform. No setup fees, no big initial purchase fee, just one small transaction fee for each booking taken.", "lastupdate" => "2020/06/11", "min_jomres_ver" => "9.22.0", "manual_link" => "", "change_log" => "", "highlight" => "", "image" => "", "demo_url" => "");
    }
}

?>