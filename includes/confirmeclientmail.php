<?php
	include 'dbconnect.php';
if (isset($_GET['code']) && isset($_GET['client_email'])) {
	$code=$_GET['code'];
	$client_email=$_GET['client_email'];
	$query="SELECT * FROM client WHERE client_email=$client_email";
	if($data=mysqli_query($conn,$query)){
		$dbdata=mysqli_fetch_array($data);
		$dbcode=$dbdata['client_confirm_code'];
		if ($dbcode==$code) {
			$sql1="UPDATE client SET client_confirm='1'";
			if(mysqli_query($sql1)){
				echo "successfully confirmed registration";
			}
			else{
				echo "sorry cannot confirm registration this time";
			}
		}
		else{
			echo "Username and code don't match";
		}
	}else{
		echo "database query failed";
	}
}
?>