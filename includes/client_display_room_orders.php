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
			session_start();
			if (isset($_SESSION['client_signin']) && isset($_GET['client_id'])) {
				$client_id=$_GET['client_id'];
				$sql="SELECT * FROM order_room WHERE client_id=$client_id";
				$result1 = mysqli_query($conn, $sql);?>
					
					<!-- Table to display	-->

			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Rooms booked
					</div>
					<table class="table table-striped table-hover table-bordered table-condensed"><?php
						if(mysqli_num_rows($result1)>0) { ?>
							<tr class="info">
								<th>Hotel Name</th>
								<th>Location</th>
								<th>Room Type</th>
								<th>Room Price</th>
								<th>Number of orders</th>
								<th>Total price</th>
								<th>Hotel Contact</th>
							</tr>

					<?php
							while ($room_orders = mysqli_fetch_array($result1)) {
							$room_id=$room_orders['product_id'];
							$hotel_id=$room_orders['hotel_id'];
							// get hotel detail
							$sql="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
							$hotel1 = mysqli_query($conn, $sql);
							$hotel = mysqli_fetch_array($hotel1);
							//end get hotel detail
							// get room detail
							$sql="SELECT * FROM room WHERE room_id=$room_id";
							$room1 = mysqli_query($conn, $sql);
							$room = mysqli_fetch_array($room1);
							//end get room detail
					?>

							<tr>
								<td><?php echo $hotel['hotel_name']; ?></td>
								<td><?php echo $hotel['hotel_location']; ?></td>
								<td><?php echo $room['room_type']; ?></td>
								<td><?php echo $room['room_price']; ?></td>
								<td><?php echo $room_orders['product_quantity']; ?></td>
								<td><?php echo $room_orders['order_total']; ?></td>
								<td><?php echo $hotel['hotel_contact']; ?></td>

							</tr>


						<?php
									}}else{
									echo "no record found";
									}

						?>
					</table>

					<!-- 		end Table to display -->

					<a href="../index.php">Back to main Page</a>
				</div>
			</div>
		<?php	
				}
		?>
	</body>
</html>