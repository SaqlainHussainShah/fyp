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
					<div class="row col-sm-6 col-xs-8" id="form-mid">
						<?php
						if (isset($_SESSION['flash_message'])) {
							echo $_SESSION['flash_message'];
							unset($_SESSION['flash_message']);
						}

						?>
						<h1> New Users Get registered</h1>
						<em>already have an account ?
						<a href="form_client_signin.php" type="button" style="color:white;" > Login to continue</a></em>
						<form action="create_client.php" method="post">
							<div class="form-group">
							    <label for="name">Name:</label>
							    <input type="text" class="form-control" name="client_name" id="name">
							</div>
							<div class="form-group">
							    <label for="email">Email</label>
							    <input type="email" class="form-control" id="email" name="client_email">
							</div>
							<div class="form-group">
							    <label for="pwd">Password:</label>
							    <input type="password" class="form-control" id="pwd" name="client_password">
							</div>							 
							<div class="form-group">
							    <label for="tel">Telephone:</label>
							    <input type="tel" class="form-control" id="tel" name="client_contact">
							</div>
							<button type="submit" type="button"name="submit" class="btn btn-primary" > Register </button>
							&nbsp	<a  type="button" name="submit" class="btn btn-danger" href="../index.php" > cancel </a>
						</form>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>