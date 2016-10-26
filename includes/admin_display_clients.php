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
if (!isset($_GET['admin_display_clients'])) {
	 $page_clients=0;
}elseif ($_GET['admin_display_clients']=="" || $_GET['admin_display_clients']=="1") {
	 $page_clients=0;
}else{
	$page=$_GET['admin_display_clients'];
	 $page_clients=($page*7)-7;
}
$query="SELECT * FROM client limit $page_clients,7";
$retrieve=mysqli_query($conn,$query);
if (mysqli_num_rows($retrieve)>0) {?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Clients registered
				<a type="button"href="includes/form_client_signup.php" class="btn btn-primary pull-right" style="margin-top:-6px;">Add new Client</a>
			</div>
			<table class="table table-striped table-hover table-bordered table-condensed">
				<tr class="info">
					<th>client Id</th>
					<th>client Name</th>
					<th>client Email</th>
					<th>client Password</th>
					<th>client Contact</th>
					<th></th>			
				</tr>
	<?php	while($clients=mysqli_fetch_array($retrieve))
	{
	?>
				<tr>
					<td><?php echo $clients['client_id']; ?></td>
					<td><?php echo $clients['client_name']; ?></td>
					<td><?php echo $clients['client_email']; ?></td>
					<td><?php echo $clients['client_password']; ?></td>
					<td><?php echo $clients['client_contact']; ?></td>
					<td><a href="includes/delete_client.php?client_id=<?php echo $clients['client_id']; ?>">Delete Record</a></td>
				</tr>
<?php
}
?>
</table>
<?php
//paging
$sql="SELECT * FROM client";
$result=mysqli_query($conn,$sql);
$cou=mysqli_num_rows($result);
$a=$cou/7;
$a=ceil($a);
echo "<br><br>";
for($b=1;$b<=$a;$b++){
?>
<a href="index.php?admin_display_clients=<?php echo $b; ?>"><?php echo $b; ?></a>
<?php
}?>
		</div>
	</div><?php
}
else{
	echo "No clients found";
}
?>