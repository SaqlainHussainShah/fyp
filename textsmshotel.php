<?php


function textsmshotel($number,$message){
	include ( "NexmoMessagehotel.php" );


	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessagehotel('bda459da', '34080c1f5afc48c4');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $number, 'MyApp', $message );

	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!
	}

?>