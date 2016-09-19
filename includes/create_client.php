
<?php

function create_client(){
include('dbconnect.php');

if(isset($_POST['submit']))
{

		if(!empty($_POST['client_name']) && !empty($_POST['client_email'])   && !empty($_POST['client_password']) && !empty($_POST['client_contact'])){
			 $name=$_POST['client_name'];
			 $email=$_POST['client_email'];
			 $contact=$_POST['client_contact'];
			 $password=$_POST['client_password'];
			 $address=$_POST['client_address'];
			 $client_confirm_code=rand();
			$query="INSERT INTO client (client_confirm_code,client_name,client_email,client_password,client_contact) VALUES ('$client_confirm_code','$name','$email','$password','$contact')";
			if(mysqli_query($conn,$query)){
				session_start();
				//include 'confirm_client_email.php';
				//confirm_client_email($email,$client_confirm_code);
				$_SESSION['flash_message']="Sign up complete";
				header('Location: form_client_signin.php');
			}
			else{
				session_start();
				$_SESSION['flash_message']= "we have some problems try again later";
				header('Location: ../index.php');
			}

		}

		else{
			session_start();
		$_SESSION['flash_message']="All fields are required";
		header('Location: form_client_signup.php');
		}

}


}

create_client();

?>