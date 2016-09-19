<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['flash_message']="You are now logged out";
header('Location: ../index.php');

?>