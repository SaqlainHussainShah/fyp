<?php

include('dbconnect.php');
if (isset($_POST['submit'])) {
	if (!empty($_POST['hotel_signin_email']) && !empty($_POST['hotel_signin_password'])) {
		$signin_email=$_POST['hotel_signin_email'];
		$signin_password=$_POST['hotel_signin_password'];
		$query="SELECT * FROM hotel WHERE hotel_email='$signin_email'";
		if ($object_result=mysqli_query($conn,$query)) {
			$result_array=mysqli_fetch_assoc($object_result);
			$db_email=$result_array['hotel_email'];
			$db_password=$result_array['hotel_password'];
			if ($signin_email==$db_email && $signin_password==$db_password) {
				session_start();
				$_SESSION=$result_array;
				$_SESSION['hotel_signin']=true;
				unset($_SESSION['flash_massage']);
				$_SESSION['flash_massage']="Logged in";
				header('Location: ../index.php'); 
			}
			else{
				session_start();
			 echo $_SESSION['flash_message']="email or password incorrect";
				header('Location: form_hotel_signin.php');
			}

		}
		else{
			
			session_start();
			echo $_SESSION['flash_message']='record not found';
				header('Location: form_hotel_signin.php');
		}




	}
	else{
		
		session_start();
		echo	$_SESSION['flash_message']="Kindly fill both fields";
		header('Location: form_hotel_signin.php');

	}

}




?>