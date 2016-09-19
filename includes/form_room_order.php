<?php
session_start();
if (isset($_SESSION['room_id']) && isset($_SESSION['client_id'])) {
	 $_SESSION['room_id'];
	 $_SESSION['client_id'];
	$room_id=$_SESSION['room_id'];
	$client_id=$_SESSION['client_id'];
	include 'dbconnect.php';
	$sql="SELECT * FROM room WHERE room_id=$room_id";
		$result = mysqli_query($conn, $sql);
		$room = mysqli_fetch_array($result);
		if ($room['room_availability']=='yes') {
			$sql="SELECT * FROM client WHERE client_id=$client_id";
		$result1 = mysqli_query($conn, $sql);
		$client = mysqli_fetch_array($result1);
		?>
<!--	form room order	-->


<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>
			Forms
		</title>
		   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../custom-css.css">
		<style type="text/css">
		*{
			background-color:gray;


		}

		</style>
	</head>
	<body>
		<div class="form-container">
			<div class="no-results">
				<div class="form-vertical-align ">
					<div class="row col-md-6 col-xs-8"  id="form-mid">
					
<h1> Confirm Room order</h1><br>
<form action="place_room_order.php" method="post">
															 <?php echo "<b>Room Type:  </b>" . $room['room_type']; ?>
															  <div class="form-group">
															    
															    <input type="hidden" class="form-control" id="email" name="hotel_id" value="<?php echo $room['hotel_id'];  ?>">
															  </div>
															  <div class="form-group">
															    
															    <input type="hidden" class="form-control" id="pwd" name="product_id" value="<?php echo $room['room_id'];?>">
															  </div> 
															  <div class="form-group">
															    
															    <input type="hidden" class="form-control" id="email" name="client_id" value="<?php echo $client['client_id']; ?>">
															  </div>
															  <div class="form-group">
															    <label for="pwd">product quantity:</label>
															   <select name="product_quantity">
															   	<option value="1">1</option>
															   	<option value="2">2</option>
															   	<option value="3">3</option>
															   	<option value="4">4</option>
															   	<option value="5">5</option>
															   	<option value="6">6</option>
															   </select>
															  </div>
															    
															  <div class="form-group">
															    <label >Per order price :</label> <?php echo $room['room_price'];?>
															    <input type="hidden" class="form-control"  name="order_price" value="<?php echo $room['room_price']; ?>">
															  </div>
															  
															 
															   

  


															  <br>
										      				<button type="submit" type="button"name="submit" class="btn btn-primary" > Order </button>
										      				&nbsp <a href="../index.php" class="btn btn-warning" type="button"> Cancel</a>
										      				</form>
						</div>
				</div>
				
			</div>	
		</div>

	</body>
</html>



<!-- end form food order -->
<?php		}else{
	echo "Sorry food  not available.";
	echo "<a href='../index.php' style='text-decoration:none;' type='button'>Go to main page</a>";
}
		

}



?>