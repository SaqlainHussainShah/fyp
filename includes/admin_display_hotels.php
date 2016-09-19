<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css">
<script type="text/javascript" src="../bootstrap/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
include 'dbconnect.php';
if (!isset($_GET['admin_display_hotels'])) {
	
	 $page_hotels=0;
}elseif ($_GET['admin_display_hotels']=="" || $_GET['admin_display_hotels']=="1") {
	 $page_hotels=0;
}else{
	$page=$_GET['admin_display_hotels'];
	 $page_hotels=($page*7)-7;
}
$query="SELECT * FROM hotel limit $page_hotels,7";
$retrieve=mysqli_query($conn,$query);
if (mysqli_num_rows($retrieve)>0) {?>
	<div class="container">

		<div class="panel panel-primary">
			<div class="panel-heading">
				Hotels registered
				<a type="button"href="includes/form_hotel_signup.php" class="btn btn-primary pull-right" style="margin-top:-6px;">Add new Hotel</a>
			</div>
			<table class="table table-striped table-hover table-bordered table-condensed">
				<tr class="info">
					<th>Hotel Id</th>
					<th>Hotel Name</th>
					<th>Hotel Email</th>
					<th>Hotel Password</th>
					<th>Hotel Contact</th>
					<th>Hotel Location</th>
					<th></th>
				</tr>
	<?php	while($hotels=mysqli_fetch_array($retrieve)){
?>

<tr>
					<td><?php echo $hotels['hotel_id']; ?></td>
					<td><?php echo $hotels['hotel_name']; ?></td>
					<td><?php echo $hotels['hotel_email']; ?></td>
					<td><?php echo $hotels['hotel_password']; ?></td>
					<td><?php echo $hotels['hotel_contact']; ?></td>
					<td><?php echo $hotels['hotel_location']; ?></td>
					<td><a href="includes/delete_hotel.php?hotel_id=<?php echo $hotels['hotel_id']; ?>">Delete Record</a></td>
					

				</tr>


<?php
}
?>
</table>
<?php
//paging

$sql="SELECT * FROM hotel";
$result=mysqli_query($conn,$sql);
$cou=mysqli_num_rows($result);
$a=$cou/7;
$a=ceil($a);
echo "<br><br>";
for($b=1;$b<=$a;$b++){

?>
<a href="index.php?admin_display_hotels=<?php echo $b; ?>"><?php echo $b; ?></a>
<?php

}?>


		</div>


	</div><?php
}
else{
	echo "No Hotels found";
}





?>