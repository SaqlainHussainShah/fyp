<?php
session_start();
include('includes/dbconnect.php');
if (isset($_SESSION['client_signin'])) {
	if (isset($_GET['room_id']) && !empty($_GET['room_id'])) {
	
		
		echo $_SESSION['room_id']=$_GET['room_id'];
		echo $_SESSION['client_id']; echo "<br>";
		header('Location: includes/form_room_order.php');
		
	}
	else{
		echo "Food item not found";
	}



}
else{
		
	$_SESSION['room_id']=$_GET['room_id'];

	header('Location: includes/form_client_signin.php');
}



?>