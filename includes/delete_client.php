<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['admin_signin']) && isset($_GET['client_id'])) {
	if ($_SESSION['admin_signin'] ) {
	$admin_id= $_SESSION['admin_id'];
	$client_id=$_GET['client_id'];
	$sql="DELETE FROM client WHERE client_id='$client_id'";
	
	
	if(mysqli_query($conn,$sql)){
		
		header('Location:  ../index.php');

	}else{
		echo "sorry! try again later";
	}

}
}
else{

	echo "You cannot access this page";
}

?>