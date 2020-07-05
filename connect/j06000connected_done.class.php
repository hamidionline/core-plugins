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
class j06000connected_done
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton("mcHandler");
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
        } else {
            $eLiveSite = get_showtime("eLiveSite");
            $ePointFilepath = get_showtime("ePointFilepath");
            if (isset($_SESSION["payment_success"]) && $_SESSION["payment_success"] == true) {
                $componentArgs = array("property_uid" => $_SESSION["property_uid"]);
                $MiniComponents->triggerEvent("03030", $componentArgs);
            } else {
                echo "Sorry, but we could not confirm that payment.";
            }
        }
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
    }
}

?>