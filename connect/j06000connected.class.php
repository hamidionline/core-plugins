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
class j06000connected
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton("mcHandler");
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
        } else {
            $eLiveSite = get_showtime("eLiveSite");
            $ePointFilepath = get_showtime("ePointFilepath");
            $siteConfig = jomres_singleton_abstract::getInstance("jomres_config_site_singleton");
            $jrConfig = $siteConfig->get();
            if (isset($_REQUEST["response"])) {
                $response = json_decode(base64_decode($_REQUEST["response"]));
                $tmpBookingHandler = jomres_singleton_abstract::getInstance("jomres_temp_booking_handler");
                $tmpBookingHandler->initBookingSession(filter_var($response->jsidx, FILTER_SANITIZE_STRING));
                $jomressession = $tmpBookingHandler->getJomressession();
                set_showtime("jomressession", $jomressession);
                $_SESSION["payment_success"] = false;
                $_SESSION["property_uid"] = $tmpBookingHandler->tmpbooking["property_uid"];
                $secret_key = "";
                if ($jrConfig["development_production"] == "development") {
                    if (isset($jrConfig["test_secret_key"]) && trim($jrConfig["test_secret_key"]) != "") {
                        $secret_key = $jrConfig["test_secret_key"];
                    }
                } else {
                    if (isset($jrConfig["live_secret_key"]) && trim($jrConfig["live_secret_key"]) == "") {
                        $secret_key = $jrConfig["live_secret_key"];
                    }
                }
                if (trim($secret_key) != "") {
                    Stripe\Stripe::setApiKey($secret_key);
                    $payment_intent = Stripe\PaymentIntent::retrieve($response->payment_intent);
                    $_SESSION["payment_intent"] = base64_encode(json_encode($payment_intent));
                    if ($payment_intent->status == "succeeded" && $payment_intent->metadata->booking_number == $tmpBookingHandler->tmpbooking["booking_number"]) {
                        $_SESSION["payment_success"] = true;
                        insertInternetBooking(get_showtime("jomressession"), true, false);
                    }
                } else {
                    $_SESSION["payment_success"] = true;
                    insertInternetBooking(get_showtime("jomressession"), true, false);
                }
                echo "<script type=\"text/javascript\"><!--\n\t\t\t\t\tsetTimeout('self.close()', 50);\n\t\t\t\t\t//--></script>";
                exit;
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