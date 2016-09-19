<?php
session_start();
include('includes/dbconnect.php');
if (isset($_SESSION['client_signin'])) {
	if (isset($_GET['food_id']) && !empty($_GET['food_id'])) {
	
		
		echo $_SESSION['food_id']=$_GET['food_id'];
		echo $_SESSION['client_id']; echo "<br>";
		header('Location: includes/form_food_order.php');
		
	}
	else{
		echo "Food item not found";
	}



}
else{
		
	$_SESSION['food_id']=$_GET['food_id'];

	header('Location: includes/form_client_signin.php');
}



?>