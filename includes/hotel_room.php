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
			$query="SELECT * FROM room WHERE hotel_id=$hotel_id ";
			include 'dbconnect.php';
			$result=mysqli_query($conn,$query);?>
			<div class="container">

				<div class="panel panel-primary">
					<div class="panel-heading">
						Table
						
						<a href='../index.php'class="btn btn-info pull-right" type="button"style=" margin-top:-5px;">Back to main page</a>
		<a class="btn btn-info pull-right" type="button" href="add_new_room.php "style=" margin-top:-5px;" > Add new room</a>
					</div>
					<table class="table table-striped table-hover table-bordered table-condensed responsive"><?php
			if (mysqli_num_rows($result)>0) {?>
				
						<tr class="info">
							<th>Room availability</th>
							<th>Location</th>
							<th>Room Type</th>
							<th>Room Price</th>
							<th>Remove Offer</th>
							<th>Edit Offer</th>
							
							


						</tr>

		<?php
				while ($room=mysqli_fetch_array($result)) {
					$room_id=$room['room_id'];?>
					<tr class="info">
							<td><?php echo $room['room_availability'];?></td>
							<td><?php echo $room['room_location'];?></td>
							<td><?php echo $room['room_type'];?></td>
							<td><?php echo $room['room_price'];?></td>
							<td><form action="delete_room.php" method="post">
								<input type="hidden" name="room_id" value="<?php echo $room_id;?>">
								<button class="btn btn-warning"type="submit"> Delete room</button>
							</form></td>
							<td><form action="form_edit_room.php" method="post">
								<input type="hidden" name="room_id" value="<?php echo $room_id;?>">
								<button class="btn btn-info" type="submit">edit room</button>
							</form></td>
							


					</tr>
						<?php
							}
						}
						else{
							echo "you have no rooms added" ;
						}
					}
					else{
						echo "You donot have access to this page";
					}

					?>
	</body>
</html>