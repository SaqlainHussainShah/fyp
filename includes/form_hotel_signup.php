<?php
session_start();
if (isset($_SESSION['client_signin']) || isset($_SESSION['hotel_signin']) ) {
	header('Location: ../index.php');
}


?><!DOCTYPE html>
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
					<div class="row col-md-6 col-xs-8" id="form-mid">
					<?php
					if (isset($_SESSION['flash_message'])) {
						echo $_SESSION['flash_message'];
					}

					?>
					<h1> Register your hotel</h1><em>Have an account ?
					<a href="form_hotel_signin.php" type="button" style="color:white;" >Login</a></em>
						<form action="create_hotel.php" method="post"  enctype="multipart/form-data">
							<div class="form-group">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" name="hotel_name">
							</div>
						 	<div class="form-group">
							    <label for="email">Email</label>
							    <input type="email" class="form-control" id="email" name="hotel_email">
							</div>
							<div class="form-group">
							    <label for="pwd">Password:</label>
							    <input type="password" class="form-control" id="pwd" name="hotel_password">
							</div>
							<div class="form-group">
							    <label for="location">Location:</label>
							    <input type="text" class="form-control" id="location" name="hotel_location">
							</div>
							<div class="form-group">
							    <label for="tel">contact # :</label>
							    <input type="tel" class="form-control" id="tel" name="hotel_number">
							</div>
							<div class="form-group">
							    <label for="main_image">Upload Picture :</label>
							    <input type="file" class="form-control" id="main_image" name="main_image"  >
							</div>
		      				<button type="submit" type="button"name="submit" class="btn btn-primary" > Registered </button>
					      	&nbsp	<a  type="button" name="submit" class="btn btn-danger" href="../index.php" > cancel </a>
						</form>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>