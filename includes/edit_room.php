<?php
include 'dbconnect.php';

if (isset($_POST['room_price']) && isset($_POST['room_availability']) && isset($_POST['room_type']) ) {
	if (!empty($_POST['room_price']) && !empty($_POST['room_availability']) && !empty($_POST['room_type']) ) {
		$room_price=$_POST['room_price'];
		$room_type=$_POST['room_type'];
		$room_availability=$_POST['room_availability'];
		$room_id=$_POST['room_id'];

		$sql="UPDATE room SET room_price = '$room_price', room_type='$room_type', room_availability='$room_availability'	WHERE room_id=$room_id";
		if (mysqli_query($conn,$sql)) {
			echo "form saved";
			header('Location: hotel_room.php');
		}
		else{
			echo "database issue <a href='../index.php'>Go to main page</a>";
		}
	}
	else{
		echo "Fill All fields ";
	}
}
else{
echo "sorry data not found <a href='../index.php'>Go to main Page</a>";

}
?>