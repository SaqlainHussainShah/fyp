<?php
function search_food($food){
	$searchq=$food;
	$searchq=preg_replace("#[^0-9 a-z]#i", "",$searchq);
	include('dbconnect.php');
	$query="SELECT * FROM food WHERE food_name LIKE '%$searchq%' OR food_location LIKE '%$searchq%'";
	$search_result=mysqli_query($conn,$query);


 if(mysqli_num_rows($search_result) > 0){
      
        while($food = mysqli_fetch_array($search_result)){
           
             $image=$food['food_image'];
             $food_id=$food['food_id'];
             $food_name=$food['food_name'];
             $food_price=$food['food_price'];
             $food_availability=$food['food_availability'];
             $hotel_id=$food['hotel_id'];
                  $hotel_name_query="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             $hotel_name_data=mysqli_query($conn,$hotel_name_query);
             $hotel_name_array=mysqli_fetch_array($hotel_name_data);
             $hotel_name=$hotel_name_array['hotel_name'];
             
								?>

								<div class="col-sm-3 feature">
										<div class="panel" >
											<div class="panel-heading">
												<h3 class="panel" id="panel-heading"><?php echo $food_name; ?></h3>
											</div><!-- end panel heading -->
											<img id="fade" src="includes/food_main_image/<?php echo $image; ?>.jpg" class=" img-circle img-responsive" style="min-height:235px;max-height:235px;min-width:100%; "alt="HTML5" />
											<p><b>Food Availability : </b><?php echo $food_availability; ?></p>
											<p><b>Food Price : </b><?php echo $food_price; ?></p>
											<p><b>Hotel_name : </b><?php echo $hotel_name; ?></p>
											<a href="order_food.php?food_id=<?php echo $food_id; ?>" target="_blank" class="btn btn-info btn-block">order</a>
										</div><!--  end panel -->
									</div><!-- end feature-->					

<?php
        }
        // Close result set
        mysqli_free_result($search_result);
    } else{
        echo "No records matching your query were found.";
    }}

function search_room($room){
	$searchq=$room;
	$searchq=preg_replace("#[^0-9 a-z]#i", "",$searchq);
	include('dbconnect.php');
	$query="SELECT * FROM room WHERE room_location LIKE '%$searchq%'";
	

	$search_result=mysqli_query($conn,$query);
	
	if(mysqli_num_rows($search_result) > 0){
      
        while($room = mysqli_fetch_array($search_result)){
           
             $image=$room['room_image'];
                 $room_id=$room['room_id'];
                 $room_location=$room['room_location'];
                 $room_type=$room['room_type'];
                 $room_price=$room['room_price'];
                 $room_availability=$room['room_availability'];
                 $hotel_id=$room['hotel_id'];
                  $hotel_name_query="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             	$hotel_name_data=mysqli_query($conn,$hotel_name_query);
             	$hotel_name_array=mysqli_fetch_array($hotel_name_data);
             	$hotel_name=$hotel_name_array['hotel_name'];
             
?>
							<div class="col-sm-4 feature">
								<div class="panel" >
									<div class="panel-heading">
										<h3 class="panel" id="panel-heading"><?php echo $room_type; ?></h3>
									</div><!-- end panel heading -->
									<img id="fade" src="includes/room_main_image/<?php echo $image; ?>.jpg" class=" img-circle img-responsive" style="min-height:235px;max-height:235px;min-width:100%; "alt="HTML5" />
									<p><b>Room Location : </b><?php echo $room_location; ?></p>
									<p><b>Room Availability : </b><?php echo $room_availability; ?></p>
									<p><b>Room Price : </b><?php echo $room_price; ?></p>
									<p><b>Hotel_name : </b><?php echo $hotel_name; ?></p>
									<a href="order_room.php?room_id=<?php echo $room_id; ?>" target="_blank" class="btn btn-info btn-block">order</a>
								</div><!--  end panel -->
							</div><!-- end feature-->				
		<?php
	        }
	        // Close result set
	        mysqli_free_result($search_result);
	    } else{
	        echo "No records matching your query were found.";
	    }}

function search_hotel($hotel){
	$searchq=$hotel;
	$searchq=preg_replace("#[^0-9 a-z]#i", "",$searchq);
	include('dbconnect.php');
	$query="SELECT * FROM hotel WHERE hotel_name LIKE '%$searchq%' OR hotel_location LIKE '%$searchq%'";
	$search_result=mysqli_query($conn,$query);


	if(mysqli_num_rows($search_result) > 0){?>
        <div class="col-12">
				<h2></h2>
					<p class="lead">
					<form action="" method="get">
							<input type='text' name="search_hotel" style="border-radius:15px; width:225px;height:40px" placeholder="   Search Your Favorite Hotel   " > &nbsp &nbsp
							<button type="submit" class="btn-primary btn" style="background-color:gray; margin-bottom:4px;"><icon class="glyphicon glyphicon-search" ></button>
					</form>
					</p>
		</div>
	<?php
       while ($data=mysqli_fetch_array($search_result)) {
		 $hotel_name=$data['hotel_name'];
		$hotel_contact=$data['hotel_contact'];
	 	$hotel_location=$data['hotel_location'];
		$hotel_main_image=$data['hotel_main_image'];
		$hotel_id=$data['hotel_id'];
	?>
			<div class="col-md-3 col-sm-4 col-xs-6 feature">
				<div class="panel" >
					<div class="panel-heading">
						<h3 class="panel" id="panel-heading"><?php echo $hotel_name; ?></h3>
					</div><!-- end panel heading -->
						<img src="includes/images/hotel_main_image/<?php echo $hotel_main_image; ?>.jpg" id="fade"class=" img-circle img-responsive" style="min-height:235px;max-height:235px;min-width:100%; "alt="HTML5" />
						<p><b>hotel_contact: </b><?php echo $hotel_contact; ?></p>
						<p><b>hotel_location : </b><?php echo $hotel_location; ?></p>
						<form action="index.php#features" method="get">
							<input type="hidden" name="hotel_detail_id" value="<?php echo $hotel_id; ?>"> 	
							<button type="submit" class="btn btn-primary btn-block">Hotel Details</button>
						</form>									
				</div><!--  end panel -->
			</div><!-- end feature-->	
		<?php
		        }
		        // Close result set
		        mysqli_free_result($search_result);
		    } else{
		    	echo "<br><br><br><br><br>";
		        echo "No Hotel with this name or location found. <a href='index.php'>  Go Back to main page. </a>";
		    }}

		    ?>


