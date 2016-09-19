<?php
	include 'dbconnect.php';
if (isset($_GET['code']) && isset($_GET['hotel_email'])) {
	$code=$_GET['code'];
	$hotel_email=$_GET['hotel_email'];
	$query="SELECT * FROM hotel WHERE hotel_email=$hotel_email";
	if($data=mysqli_query($conn,$query)){
		$dbdata=mysqli_fetch_array($data);
		$dbcode=$dbdata['hotel_confirm_code'];
		if ($dbcode==$code) {
			$sql1="UPDATE hotel SET hotel_confirm='1'";
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