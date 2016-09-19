<?php
if (isset($_POST['message'])) {
	$from=$_POST['from'];
	$name=$_POST['name'];
	$message=$_POST['message'];
	$subject="FRom ". $name . $from;
	mail("saqlaingardezi86@gmail.com", $subject, $message);
	header('Location: index.php');


}


?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>
			Forms
		</title>
		   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="custom-css.css">
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
<h1> Send us Feedback 	 <br> </h1>
<form action="" method="post">
															 
															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="from">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Name:</label>
															    <input type="text" class="form-control" id="pwd" name="name">
															  </div>
															   <div class="form-group">
															    <label>Message</label>
															    <textarea class="form-control" name="message"></textarea>
															  </div>

  



										      				<button type="submit" name="submit" class="btn btn-primary" > Send message </button>
										      &nbsp				<a  type="button" name="submit" class="btn btn-danger" href="../index.php" > cancel </a>
				
										      				</form>
						</div>
				</div>
				
			</div>	
		</div>

	</body>
</html>