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
			session_start();
			if (isset($_SESSION['hotel_signin'])) {
				$hotel_id=$_SESSION['hotel_id'];
				$query="SELECT * FROM food WHERE hotel_id=$hotel_id ";
				include 'dbconnect.php';
				$result=mysqli_query($conn,$query);
				?>
					<div class="container">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Table
							<a href='../index.php'class="btn btn-info pull-right" type="button"style=" margin-top:-5px;">Back to main page</a>
							<a class="btn btn-info pull-right" type="button" href="add_new_food.php"style=" margin-top:-5px;" > Add new food</a>
						</div>
						<table class="table table-striped table-hover table-bordered table-condensed responsive">
							<?php	if (mysqli_num_rows($result)>0) {
							?>		<tr class="info">
								<th>Food availability</th>
								<th>Location</th>
								<th>Food name</th>
								<th>food Price</th>
								<th>Remove Offer</th>
								<th>Edit Offer</th>
							</tr>
							<?php
								while ($food=mysqli_fetch_array($result)) {
									$food_id=$food['food_id'];?>
									<tr class="info">
										<th><?php echo $food['food_availability'];?></th>
										<th><?php echo $food['food_location'];?></th>
										<th><?php echo $food['food_name'];?></th>
										<th><?php echo $food['food_price'];?></th>
										<th><form action="delete_food.php" method="post">
											<input type="hidden" name="food_id" value="<?php echo $food_id;?>">
											<button class="btn btn-warning"type="submit"> Delete food</button>
										</form></th>
										<th><form action="form_edit_food.php" method="post">
											<input type="hidden" name="food_id" value="<?php echo $food_id;?>">
											<button class="btn btn-info" type="submit">edit food</button>
										</form></th>
									</tr>
							<?php
									}
									}
									else{
										echo "you have no food added " ;
									}
								?>
									</table>
								</div></div></div><?php
								}
								else{
									echo "You donot have access to this page";
								}
							?>
	</body>
</html>