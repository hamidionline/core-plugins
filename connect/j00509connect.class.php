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
class j00509connect
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton("mcHandler");
        if ($MiniComponents->template_touch) {
            $this->template_touchable = true;
        } else {
            $plugin = "connect";
            $defaultProperty = getDefaultProperty();
            $query = "SELECT value FROM #__jomres_pluginsettings WHERE prid = '" . (int) $defaultProperty . "' AND plugin = '" . $plugin . "' AND setting = 'active' AND value = '1'";
            $activeList = doSelectSql($query);
            if (!empty($activeList)) {
                $active = jr_gettext("_JOMRES_COM_MR_YES", "_JOMRES_COM_MR_YES", false);
            } else {
                $active = jr_gettext("_JOMRES_COM_MR_NO", "_JOMRES_COM_MR_NO", false);
            }
            $status = "status=no,toolbar=yes,scrollbars=yes,titlebar=no,menubar=yes,resizable=yes,width=750,height=500,directories=no,location=no";
            $link = JOMRES_SITEPAGE_URL_NOSEF . "&task=editGateway&popup=1&tmpl=" . get_showtime("tmplcomponent") . "&plugin=" . $plugin;
            $gatewayname = jr_gettext("_JOMRES_CUSTOMTEXT_GATEWAYNAME" . $plugin, ucwords($plugin), false, false);
            $pluginLink = "<a href=\"javascript:void window.open('" . $link . "', 'win2', '" . $status . "');\" title=\"" . $plugin . "\">" . $gatewayname . "</a>";
            $button = "<IMG SRC=\"" . get_showtime("eLiveSite") . "j00510" . $plugin . ".gif" . "\" border=\"0\">";
            $balance_payments_supported = "0";
            $this->outputArray = array("button" => $button, "link" => $pluginLink, "active" => $active, "balance_payments_supported" => $balance_payments_supported);
        }
    }
    public function touch_template_language()
    {
        $plugin = "connect";
        echo jr_gettext("_JOMRES_CUSTOMTEXT_GATEWAYNAME" . $plugin, "Connect");
    }
    /**
    	#
    * Must be included in every mini-component
    	#
    * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
    	#
    */
    public function getRetVals()
    {
        return $this->outputArray;
    }
}

?>