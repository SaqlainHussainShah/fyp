<?php
session_start();
if (isset($_SESSION['client_signin']) || isset($_SESSION['hotel_signin']) ||isset($_SESSION['admin_signin'])) {
	header('Location: ../index.php');
}
?><?php
include 'dbconnect.php';
if (isset($_SESSION['admin_signin'])) {
	header('Location: ../index.php');
}
else{
if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
	$admin_password=$_POST['admin_password'];
	$admin_email=$_POST['admin_email'];
	$sql="SELECT * FROM admin WHERE admin_email='$admin_email'";
	if (mysqli_num_rows($dbdata=mysqli_query($conn,$sql))>0) {
		$admindata=mysqli_fetch_array($dbdata);
		$dbemail=$admindata['admin_email'];
		$dbpassword=$admindata['admin_password'];
		if($admin_password==$dbpassword && $admin_email==$dbemail){			
			$_SESSION['admin_id']=$admindata['admin_id'];
			$_SESSION['admin_email']=$dbemail;
			$_SESSION['admin_password']=$dbpassword;
			$_SESSION['admin_contact']=$admindata['admin_contact'];
			$_SESSION['admin_signin']=true;
			$_SESSION['flash_message']="Logged in as Admin";
			header('Location: ../index.php');
		}
		else{
			session_start();
			$_SESSION['flash_message']="email or password mismatch";
			header('Location: admin_login.php');
		}
		}
	
	else{
		session_start();
		$_SESSION['flash_message']="email not found. Try another email";
		header('Location: admin_login.php');
	}
}else{

?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>
			Admin Login
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
					unset($_SESSION['flash_message']);
				}
				?>	
						<h1> Admin Login </h1>
						<form method="post">
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="admin_email" id="email" required>				
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" name="admin_password" id="password" required>				
							</div>
							<div class="form-group">
								<button name="submit" class="btn btn-info"value="submit">Login</button>
								&nbsp&nbsp
								<a href="../index.php" type="button" class="btn btn-danger">Cancel</a>
							</div>
						</form>
						</div>
				</div>			
			</div>	
		</div>
</body>
</html>
<?php
}
}
?>