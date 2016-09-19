<?php
function confirm_client_email($email,$code){
	echo $confirm_code=$code;
	$message="
	Confirm your email
	http://legendscloud.com/csemust/includes/confirmeclientmail.php?client_email=$email&code=$confirm_code
	";
	echo $email;
mail($email, "Hello Confirm email", $message);
echo "Registeration complete! please confirm your email";
 header('Location:../index.php');
}




?>