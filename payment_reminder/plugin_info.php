<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
**/
class plugin_info_payment_reminder
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"payment_reminder",
			"category"=>"Scheduled tasks",
			"marketing"=>"This plugin automatically sends a payment reminder email to guests that have unpaid bookings after a time period set by the administrator.",
			"version"=>(float)"3.5",
			"description"=> "The Payment Reminder Plugin runs automatically in the background (using the Jomres Cron feature) and sends a payment reminder email to customers that made provisional bookings which are not paid within an interval of your choice. This plugin is useful when you accept bookings that are paid offline by wire transfer or cheque. If a booking is not paid within X number of days (this interval can be set by the administrator in Jomres backend) from the time when the booking was made, then a payment reminder email is sent to the guest. You will also receive a copy of the email. This plugin can be used alone or together with the Unpaid Bookings Handling Plugin. If you also use the Unpaid Bookings Handling Plugin, the make sure the interval at which you want to send the payment reminder email is at least 1 day lower than the one set for deleting or cancelling the unpaid booking. When you receive the offline payment for a booking, don`t forget to mark the booking/deposit in Jomres as \"Paid\" using the \"Enter deposit\" feature, otherwise the payment reminder email will still be sent. ",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.11.1",
			"manual_link"=>'',
			'change_log'=>'v3.1 Settings moved to Site Config v3.2 Plugin updated to work with Jomres data encryption of user details. v3.3 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v3.4 Added a check to ensure zero value bookings, the reminder is not sent. v3.5 French language file added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_15o3p.png',
			'demo_url'=>'',
			"author"=>"Piranha",
			"authoremail"=>"sales@jomres.net"
			);
		}
	}
