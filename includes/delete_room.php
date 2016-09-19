<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['hotel_signin']) && isset($_POST['room_id'])) {
	if ($_SESSION['hotel_signin'] ) {
	echo $hotel_id= $_SESSION['hotel_id'];
	echo $room_id=$_POST['room_id'];
	$sql="DELETE FROM room WHERE room_id='$room_id'";
	
	
	if(mysqli_query($conn,$sql)){
		header('Location:  hotel_room.php');

	}else{
		echo "sorry! try again later";
	}

}
}
else{

	echo "You cannot access this page";
}

?>