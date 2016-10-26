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
						<?php	session_start();
							if(!isset($_SESSION['hotel_id'])){

								die('you are not logged in');
							}
							else{ 
						?>		
						<h1> Add room</h1>
						<form action="create_room.php" method="post"enctype="multipart/form-data">
							<div class="form-group">
							 	<label for="name">Room Type:</label>
							 	<select name="room_type" class="form-control">
									<option value="single">Single</option>
								 	<option value="double">Double</option>
								 	<option value="hall">Multiple/Hall</option>
								</select>	
							</div>
							<div class="form-group">
							    <label for="email">	Room Availability:</label>
							    <select name="room_availability" class="form-control">
							 		<option value="yes">Yes</option>
							  		<option value="no">No</option>
								</select>
							</div>
						    <div class="form-group">
							    <label for="pwd">Room Price</label>
							    <input type="text" class="form-control"  name="room_price" >
						    </div>
						   <div class="form-group">
							    <label for="pwd">Location</label>
							    <input type="text" class="form-control" id="pwd" name="room_location" >
						   </div>
						   <div class="form-group">
							    <label for="tel">Image</label>
							    <input  class="form-control" id="tel" type="file" name="room_image">
						   </div>
								<button type="submit" name="submit" class="btn btn-primary" > Add room </button>
								&nbsp	<a class="btn btn-warning" href="../index.php" type="button" type="button">Cancel</a>
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