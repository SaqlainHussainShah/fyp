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

if (isset($_SESSION['hotel_signin'])) {
	 $hotel_id=$_SESSION['hotel_id'];

	$sql="SELECT * FROM order_room WHERE hotel_id=$hotel_id";
		$result1 = mysqli_query($conn, $sql);
		?>
<br><br><br><br>
	<div class="container">

		<div class="panel panel-primary">
			<div class="panel-heading">
				Orders for rooms

			</div>
			<table class="table table-striped table-hover table-bordered table-condensed">

				<?php
		if(mysqli_num_rows($result1)>0){?>
<!-- 
Table to display
-->

				<tr class="info">
					<th>client Name</th>
					<th>hotel Name</th>
					<th>client email</th>
					<th> room type</th>
					<th>Number of orders</th>
					<th>Total price</th>
					<th>client Contact</th>



				</tr>

<?php
			while ($room_orders = mysqli_fetch_array($result1)) {
				$client_id=$room_orders['client_id'];
				$hotel_id=$room_orders['hotel_id'];
				$room_id=$room_orders['product_id'];
				$sql="SELECT * FROM room WHERE room_id=$room_id";
				$room1 = mysqli_query($conn, $sql);
				$rm = mysqli_fetch_array($room1);
			// get hotel detail
				$sql="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
				$hotel1 = mysqli_query($conn, $sql);
				$hotel = mysqli_fetch_array($hotel1);

			//end get hotel detail

			// get food detail

				$sql="SELECT * FROM client WHERE client_id=$client_id";
				$client1 = mysqli_query($conn, $sql);
				$client = mysqli_fetch_array($client1);
					//end get food detail

				?>

				<tr>
					<td><?php echo $client['client_name']; ?></td>
					<td><?php echo $hotel['hotel_name']; ?></td>
					<td><?php echo $client['client_email']; ?></td>
					<td><?php echo $rm['room_type']; ?></td>
					<td><?php echo $room_orders['product_quantity']; ?></td>
					<td><?php echo $room_orders['order_total']; ?></td>
					<td><?php echo $client['client_contact']; ?></td>
				</tr>
				<?php
							}

				?>
			
				<?php			

								

						}
						else{
							echo "no record found";
						}?> </table>
				<!-- 
				end Table to display
				-->
						</div>


					</div>
				<?php }


				?>

	</body>


</html>