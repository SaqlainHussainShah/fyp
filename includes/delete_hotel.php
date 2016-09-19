<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['admin_signin']) && isset($_GET['hotel_id'])) {
	if ($_SESSION['admin_signin'] ) {
	echo $admin_id= $_SESSION['admin_id'];
	echo $hotel_id=$_GET['hotel_id'];

	$sql="DELETE FROM hotel WHERE hotel_id='$hotel_id'
	";
	if (mysqli_query($conn,$sql)) {
	
		header('Location: ../index.php');
	

	}else{
		echo "room not deleted";
	}
}
}
else{

	echo "You cannot access this page";
}

?>