<?php 
session_start();
if (isset($_SESSION['flash_message'])) {
	echo $_SESSION['flash_message'];
	 unset($_SESSION['flash_message']);
}
else{
	echo "not set";
}

 ?>