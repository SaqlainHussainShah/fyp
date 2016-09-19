<?php

function confirm_hotel_email($email,$code){
	echo $confirm_code=$code;
	$message="
	Confirm your email
	Click on link below
	http://legendscloud.com/csemust/includes/confirmehotelmail.php?hotel_email=$email&code=$confirm_code
	";
	echo $email;
mail($email, "Hello Confirm email", $message);
echo "Registeration complete! please confirm your email";


}




?>