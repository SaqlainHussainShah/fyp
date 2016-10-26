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

			$sql="SELECT * FROM order_food WHERE client_id=$client_id";
				$result1 = mysqli_query($conn, $sql);
				
				if(mysqli_num_rows($result1)>0){?>
		<!-- 
		Table to display
		-->
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Foods ordered
					</div>
					<table class="table table-striped table-hover table-bordered table-condensed">
						<tr class="info">
							<th>Food Name</th>
							<th>hotel Name</th>
							<th>Location</th>
							<th>Food serving</th>
							<th>food Price</th>
							<th>Number of orders</th>
							<th>Total price</th>
							<th>Hotel Contact</th>
						</tr>
				<?php
					while ($food_orders = mysqli_fetch_array($result1)) {
						$food_id=$food_orders['product_id'];
						$hotel_id=$food_orders['hotel_id'];
						// get hotel detail
						$sql="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
						$hotel1 = mysqli_query($conn, $sql);
						$hotel = mysqli_fetch_array($hotel1);
						//end get hotel detail
						// get food detail
						$sql="SELECT * FROM food WHERE food_id=$food_id";
						$food1 = mysqli_query($conn, $sql);
						$food = mysqli_fetch_array($food1);
						//end get food detail
				?>
						<tr>
							<td><?php echo $food['food_name']; ?></td>
							<td><?php echo $hotel['hotel_name']; ?></td>
							<td><?php echo $hotel['hotel_location']; ?></td>
							<td><?php echo $food['food_serving']; ?></td>
							<td><?php echo $food['food_price']; ?></td>
							<td><?php echo $food_orders['product_quantity']; ?></td>
							<td><?php echo $food_orders['order_total']; ?></td>
							<td><?php echo $hotel['hotel_contact']; ?></td>
						</tr>
		<?php
					}
		?>
					</table>
		<!-- 
		end Table to display
		-->
		<a href="../index.php">Back to main Page</a>
				</div>
			</div>
		<?php			
				}
				else{
					echo "no record found";
				}
		}
		?>
	</body>
</html>