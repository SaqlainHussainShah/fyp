<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>
			Forms
		</title>
		   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../custom-css.css">
		<style type="text/css">
		*{
			background-color:gray;


		}

		</style>
	</head>
	<body>


<?php 
session_start();
if (isset($_POST['room_id']) && isset($_SESSION['hotel_signin'])) {
	$room_id=$_POST['room_id'];
	$hotel_id=$_SESSION['hotel_id'];
	$query="SELECT * FROM room WHERE room_id=$room_id";
	include 'dbconnect.php';
	$room_details=mysqli_query($conn,$query);
	$room_details=mysqli_fetch_array($room_details);
	?>
<div class="form-container">
			<div class="no-results">
				<div class="form-vertical-align ">
					<div class="row col-md-6 col-xs-8" id="form-mid">
					
<h1> Edit room </h1>
		<form action="edit_room.php" method="post">
			<div class="form-group">
				<label for="Type">Type:</label>
				<select  class="form-control" name="room_type" id="Type">
					<option value="single">Single</option>
					<option value="double">Double</option>
					<option value="hall">Hall</option>
				</select>
				
			</div>
			<div class="form-group">
				<label for="Availability">Availability:</label>
				<input type="text" class="form-control" name="room_availability" id="Availability" value="<?php echo $room_details['room_availability']; ?>">
			</div>
			<div class="form-group">
				<label for="Price">Price:</label>
				<input type="text" class="form-control" name="room_price" id="Price" value="<?php echo $room_details['room_price']; ?>">
			</div>
<input type="hidden" class="form-control" name="room_id"  value="<?php echo $room_details['room_id']; ?>">
			<button type="submit" type="button" name="submit" class="btn btn-prinmary" > Save </button>
		</form>
						</div>
				</div>
				
			</div>	
		</div>



<?php
}
else{

	echo "Hotel or room details missing <a href='../index.php'>Go to main page</a>";
}




 ?>