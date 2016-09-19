<?php
function client_signin(){
	include('dbconnect.php');
//if (isset($_POST['submit'])) {
	$_POST['client_signin_email'];
	 $_POST['client_signin_password'];
	if (isset($_POST['client_signin_email']) && isset($_POST['client_signin_password'])) {
		$signin_email=$_POST['client_signin_email'];
		$signin_password=$_POST['client_signin_password'];
		$query="SELECT * FROM client WHERE client_email='$signin_email'";
		if ($object_result=mysqli_query($conn,$query)) {
			$result_array=mysqli_fetch_assoc($object_result);
			$db_email=$result_array['client_email'];
			$client_confirm=$result_array['client_confirm'];
			$db_password=$result_array['client_password'];
		//if ($client_confirm==1) {
				if ($signin_email==$db_email && $signin_password==$db_password) {
				session_start();
				
				if (isset($_SESSION['food_id'])) {
					$food_id=$_SESSION['food_id'];
					$_SESSION=$result_array;
				$_SESSION['client_password']=$db_password;
				$_SESSION['client_signin']=true;
				$_SESSION['food_id']=$food_id;

					header('Location: form_food_order.php');

				}
				elseif (isset($_SESSION['room_id'])) {
					$room_id=$_SESSION['room_id'];
					$_SESSION=$result_array;
				$_SESSION['client_password']=$db_password;
				$_SESSION['client_signin']=true;
				$_SESSION['room_id']=$room_id;

					header('Location: form_room_order.php');

				}
				else{
					$_SESSION=$result_array;
				$_SESSION['client_password']=$db_password;
				$_SESSION['client_signin']=true;
				$_SESSION['flash_message']="You are now signed in";
				header('Location: ../index.php');
				} 
			}
			else{
				session_start();
				echo $_SESSION['flash_message']="wrong password or email";
				
				header('Location: form_client_signin.php');
			}


//			}else{
//				echo "not registered! confirm your email";
//			}			

		}
		else{
	session_start();
			echo "record not found";
			$_SESSION['flash_message']="Record not found";
			header('Location: ../index.php');
		}
	}
	else{
		echo "fill both fields ";
	}

}



client_signin();

?>