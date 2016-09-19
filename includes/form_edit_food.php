<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>
			Edit food
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
if (isset($_POST['food_id']) && isset($_SESSION['hotel_signin'])) {
	$food_id=$_POST['food_id'];
	$hotel_id=$_SESSION['hotel_id'];
	$query="SELECT * FROM food WHERE food_id=$food_id";
	include 'dbconnect.php';
	$food_details=mysqli_query($conn,$query);
	$food_details=mysqli_fetch_array($food_details);
	?>
<div class="form-container">
			<div class="no-results">
				<div class="form-vertical-align ">
					<div class="row col-md-6 col-xs-8" id="form-mid">
					
<h1> Edit food </h1>
		<form action="edit_food.php" method="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="food_name" id="name" value="<?php echo $food_details['food_name']; ?>">				
			</div>
			<div class="form-group">
				<label for="serving">Serving:</label>
				<input type="number" class="form-control" name="food_serving" id="serving" value="<?php echo $food_details['food_serving']; ?>">				
			</div>
			<div class="form-group">
				<label for="Availability">Availability:</label>
				<input type="text" class="form-control" name="food_availability" id="Availability" value="<?php echo $food_details['food_availability']; ?>">
			</div>
			<div class="form-group">
				<label for="Price">Price:</label>
				<input type="text" class="form-control" name="food_price" id="Price" value="<?php echo $food_details['food_price']; ?>">
			</div>
<input type="hidden" class="form-control" name="food_id"  value="<?php echo $food_details['food_id']; ?>">
			<button type="submit" type="button" name="submit" class="btn btn-prinmary" > Save </button>
		</form>
						</div>
				</div>
				
			</div>	
		</div>



<?php
}
else{

	echo "Hotel or food details missing <a href='../index.php'>Go to main page</a>";
}




 ?>