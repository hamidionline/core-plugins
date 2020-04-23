<?php

/*
Do NOT change these unless you're setting up your own Super Server network! To do that you'd need access to both the Super Server Client and Master plugins. The Master plugin is not currently available to the public.
*/

$super_server_url_dev = 'http://sandbox.onlinebooking.network/index.php?option=com_jomres&no_html=1&jrajax=1&task='; // The url to the Development Super Server
$super_server_url_live = 'http://sandbox.onlinebooking.network/index.php?option=com_jomres&no_html=1&jrajax=1&task='; // The url to the Live Super Server

$super_server_endpoint_dev = 'http://sandbox.onlinebooking.network/jomres/api/'; // The url to the Development Super Server
$super_server_endpoint_live = 'http://sandbox.onlinebooking.network/jomres/api/'; // The url to the Live Super Server

$superserver_client_id_dev = "superserver_dev"; // The super server REST API client_id that's stored on the client site. This is passed to the Super Server when the client site registers with the Super Server, it allows the Super Server to request information from the client site. Likewise the Super Server creates an api key pair for the client and passes them back during the registration process. They are stored locally and allow the client site to send information to the super server.
$superserver_client_id_live = "superserver_live"; 

$superserver_get = "superserver_get";
$superserver_set = "superserver_set"; // These two settings refer to the scopes that the superserver will access ( e.g. the api_features_superserver ). If you had a server that would register on both the Jomres Super Server plus your own network, then you would need to create your own copies of the api_features_superserver and customise it to suit, then modify this file before registering this client server on your own super server.

$superserver_userid = 18032005; // When API keys are created on this server, there is no CMS user to associate with the super server. 18th March 2005 is the birth date of Jomres, so it seems appropriate to have that as the user id of the API key's settings. If you've got 18m users on your system, you've probably got enough money to pay somebody to modify the database and change this figure to something much higher.


