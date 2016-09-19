<?php
include 'dbconnect.php';

if (isset($_POST['food_price']) && isset($_POST['food_availability']) && isset($_POST['food_name']) && isset($_POST['food_serving']) ) {
	if (!empty($_POST['food_price']) && !empty($_POST['food_availability']) && !empty($_POST['food_serving'])  && isset($_POST['food_name']) ) {
		$food_price=$_POST['food_price'];
		$food_serving=$_POST['food_serving'];
		$food_availability=$_POST['food_availability'];
		$food_id=$_POST['food_id'];
		$food_name=$_POST['food_name'];
		$sql="UPDATE food SET food_price = '$food_price', food_name='$food_name',food_serving='$food_serving', food_availability='$food_availability'	WHERE food_id=$food_id";
		if (mysqli_query($conn,$sql)) {
			echo "form saved";
			header('Location: hotel_food.php');
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