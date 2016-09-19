<?php
session_start();
if (isset($_SESSION['client_signin']) || isset($_SESSION['hotel_signin']) ||isset($_SESSION['admin_signin'])) {
	header('Location: ../index.php');
}


?>

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
<?php
				if (isset($_SESSION['flash_message'])) {
					echo $_SESSION['flash_message'];
					unset($_SESSION['flash_message']);
				}

				?>	
<h1> Login Here 	 <br> </h1><em>new user?
<a href="form_client_signup.php" type="button" style="color:white;" > Get Registered first</a></em>
<form action="client_signin.php" method="post">
															 
															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="client_signin_email">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Password:</label>
															    <input type="password" class="form-control" id="pwd" name="client_signin_password">
															  </div>
															   

  



										      				<button type="submit" name="submit" class="btn btn-primary" > Sign in </button>
										      &nbsp				<a  type="button" name="submit" class="btn btn-danger" href="../index.php" > cancel </a>
				
										      				</form>
						</div>
				</div>
				
			</div>	
		</div>

	</body>
</html>