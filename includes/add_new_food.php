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
		<div class="form-container">
			<div class="no-results">
				<div class="form-vertical-align ">
					<div class="row col-md-6" id="form-mid">
					
<h1> Add food</h1>

<?php
session_start();
if(!isset($_SESSION['hotel_id'])){

	die('you are not logged in');
}
else{
?>
<form method="post" action="create_food.php" enctype="multipart/form-data">
															 <div class="form-group">
															    <label for="name">Name:</label>
															    <input class="form-control" type="text" name="food_name">
															  </div>
															  <div class="form-group">
															    <label for="email">Serving for</label>
															    <input type="number" name="food_serving" class="form-control">
															  </div>
															   <div class="form-group">
															    <label for="email">Price</label>
															    <input type="text" name="food_price" class="form-control">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Availability</label>
															    <select name="food_availability" class="form-control">
																  <option value="Yes">Yes</option>
																  <option value="No">No</option>
																</select>
															  </div>
															   <div class="form-group">
															    <label for="tel">Location:</label>
															    <input type="text" name="food_location" class="form-control" value="<?php 
															    echo $_SESSION['hotel_location'];
																?>">
															  </div>
  
  															 <div class="form-group">
															    <label for="email">Image</label>
															    <input  type="file" name="food_image" class="form-control">
															  </div>



										      				<button type="submit" name="submit" class="btn btn-primary" > Add food</button>
										      				&nbsp <a type="button" class="btn btn-warning" type="button" href="hotel_food.php">Cancel</a>
										      				</form>
										      				<?php
										      			}
										      				?>
						</div>
				</div>
				
			</div>	
		</div>

	</body>
</html>