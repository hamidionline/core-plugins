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
class j00605connected
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton("mcHandler");
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
        } else {
            $eLiveSite = get_showtime("eLiveSite");
            $ePointFilepath = get_showtime("ePointFilepath");
            if (file_exists(JOMRES_TEMP_ABSPATH . "key.php")) {
                unlink(JOMRES_TEMP_ABSPATH . "key.php");
            }
            if (!isset($componentArgs["bookingdata"]["contract_total"]) || $componentArgs["bookingdata"]["contract_total"] == 0) {
                echo "Error, the booking information has expired";
            } else {
                $siteConfig = jomres_singleton_abstract::getInstance("jomres_config_site_singleton");
                $jrConfig = $siteConfig->get();
                $tmpBookingHandler = jomres_singleton_abstract::getInstance("jomres_temp_booking_handler");
                $guest_details = $tmpBookingHandler->getGuestData();
                if (isset($jrConfig["platform_connected"]) && $jrConfig["platform_connected"] == 1) {
                    $jomres_media_centre_images = jomres_singleton_abstract::getInstance("jomres_media_centre_images");
                    $jomres_media_centre_images->get_images($componentArgs["bookingdata"]["property_uid"], array("property"));
                    $test_mode = "0";
                    if ($jrConfig["development_production"] == "development") {
                        $test_mode = "1";
                    }
                    $params = array();
                    $params["jsid"] = get_showtime("jomressession");
                    $params["booking_total"] = $componentArgs["bookingdata"]["contract_total"];
                    $params["deposit"] = $componentArgs["bookingdata"]["deposit_required"];
                    $params["licensekey"] = $jrConfig["licensekey"];
                    $params["connection_account_id"] = $jrConfig["connection_account_id"];
                    $params["test_mode"] = $test_mode;
                    $params["thumbnail"] = $jomres_media_centre_images->images["property"][0][0]["small"];
                    $params["site_name"] = get_showtime("sitename");
                    if (!this_cms_is_joomla()) {
                        $params["MetaDesc"] = "";
                    } else {
                        $params["MetaDesc"] = get_showtime("MetaDesc");
                    }
                    $params["live_site"] = get_showtime("live_site");
                    $url = "https://license-server.jomres.net/shop/connect/validate_payment.php";
                    try {
                        $client = new GuzzleHttp\Client();
                        $response = $client->request("POST", $url, array("connect_timeout" => 4, "read_timeout" => 30, "verify" => false, "http_errors" => false, "form_params" => $params));
                        $transaction_state = json_decode((string) $response->getBody());
                    } catch (Exception $e) {
                        logging::log_message("Could not get transaction data from license server ", "Connect", "WARNING", "");
                        return NULL;
                    }
                    if (isset($transaction_state->success) && $transaction_state->success == true) {
                        $basic_property_details = jomres_singleton_abstract::getInstance("basic_property_details");
                        $basic_property_details->gather_data($componentArgs["bookingdata"]["property_uid"]);
                        $params["account"] = $params["connection_account_id"];
                        $params["jsid"] = $params["jsid"];
                        $params["transaction_fee"] = $transaction_state->transaction_fee;
                        $params["confirmation_url"] = JOMRES_SITEPAGE_URL_AJAX;
                        $params["licensekey"] = $params["licensekey"];
                        $params["currency_code"] = $componentArgs["bookingdata"]["property_currencycode"];
                        $params["booking_number"] = $tmpBookingHandler->tmpbooking["booking_number"];
                        $params["arrival_date"] = $tmpBookingHandler->tmpbooking["arrivalDate"];
                        $params["departure_date"] = $tmpBookingHandler->tmpbooking["departureDate"];
                        $params["business_name"] = $jrConfig["business_name"];
                        $params["business_email"] = $jrConfig["business_email"];
                        $params["live_site"] = get_showtime("live_site");
                        $params["property_name"] = $basic_property_details->property_name;
                        $params["property_email"] = $basic_property_details->property_email;
                        $params["guest_firstname"] = $guest_details["firstname"];
                        $params["guest_surname"] = $guest_details["surname"];
                        $params["guest_email"] = $guest_details["email"];
                        $params["guest_mobile"] = $guest_details["tel_mobile"];
                        if ($test_mode) {
                            $testing = "&test_mode=1";
                        } else {
                            $testing = "";
                        }
                        $charge_url = "https://license-server.jomres.net/shop/connect/charge?params=" . base64_encode(json_encode($params)) . $testing;
                        echo "\n\t\t\t\t\t<script>\n\t\t\t\t\t\tvar interval = window.setInterval(function() {\n\t\t\t\t\t\ttry {\n\t\t\t\t\t\t\tif (connectWindow == null || connectWindow.closed) {\n\t\t\t\t\t\t\t\twindow.location = \"" . JOMRES_SITEPAGE_URL . "&task=connected_done\";\n\t\t\t\t\t\t\t}\n\t\t\t\t\t\t}\n\t\t\t\t\t\tcatch (e) {\n\t\t\t\t\t\t}\n\t\t\t\t\t}, 1000);\n\t\t\t\t\t</script>\n\t\t\t\t\t\n\t\t\t\t\t\t\t\t<a onClick='connectWindow = window.open(\"" . $charge_url . "\", \"Pay now\", \"location=no,height=600,width=520,scrollbars=no,status=no\")'  class=\"btn btn-large btn-primary\">Pay now!</a>\n\t\t\t\t\t\t\t\n\t\t\t\t\t\n\t\t\t\t";
                    }
                } else {
                    insertInternetBooking(get_showtime("jomressession"), $depositPaid = false, $confirmationPageRequired = true, $customTextForConfirmationForm = "");
                }
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