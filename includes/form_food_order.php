<?php
session_start();
if (isset($_SESSION['food_id']) && isset($_SESSION['client_id'])) {
	 $_SESSION['food_id'];
	 $_SESSION['client_id'];
	$food_id=$_SESSION['food_id'];
	$client_id=$_SESSION['client_id'];
	include 'dbconnect.php';
	$sql="SELECT * FROM food WHERE food_id=$food_id";
		$result = mysqli_query($conn, $sql);
		$food = mysqli_fetch_array($result);
		
		if ($food['food_availability']=='Yes') {
			$sql="SELECT * FROM client WHERE client_id=$client_id";
		$result1 = mysqli_query($conn, $sql);
		$client = mysqli_fetch_array($result1);
		?>
<!--	form food order	-->


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
					<div class="row col-md-6 col-xs-8" id="form-mid">
					
<h1> Confirm food order</h1><br>
<form action="place_food_order.php" method="post">
															 <?php echo "<b>Food Name:  </b>" . $food['food_name']; ?>
															  <div class="form-group">
															    
															    <input type="hidden" class="form-control" id="email" name="hotel_id" value="<?php echo $food['hotel_id'];  ?>">
															  </div>
															  <div class="form-group">
															    
															    <input type="hidden" class="form-control" id="pwd" name="product_id" value="<?php echo $food['food_id'];?>">
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
															    <label >Per order price :</label> <?php echo $food['food_price'];?>
															    <input type="hidden" class="form-control"  name="order_price" value="<?php echo $food['food_price']; ?>">
															  </div>
															  <div class="form-group">
															    <label >Serving Per order:</label> <?php echo $food['food_serving'];?>
															    
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