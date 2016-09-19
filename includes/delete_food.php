<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['hotel_signin']) && isset($_POST['food_id'])) {
	if ($_SESSION['hotel_signin'] ) {
	echo $hotel_id= $_SESSION['hotel_id'];
	echo $food_id=$_POST['food_id'];
	$sql="DELETE FROM food WHERE food_id='$food_id'";
	
	
	if(mysqli_query($conn,$sql)){
		header('Location:  hotel_food.php');

	}else{
		echo "sorry! try again later";
	}

}
}
else{

	echo "You cannot access this page";
}

?>