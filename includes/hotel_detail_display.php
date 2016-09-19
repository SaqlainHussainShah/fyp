<?php
		function display_hotel_food_details($hotel_id){
			include 'dbconnect.php';
			$hotel_id=$hotel_id;
			$sql="SELECT * FROM food WHERE hotel_id=$hotel_id";
			
			if ($result=mysqli_query($conn,$sql)) {
				if (mysqli_num_rows($result)>0) {
					?>
	  <div class="col-12">
										<h2><br>
											<u>Foods Offerred by this Hotel</u>
										</h2>
									<p></p><br>

									</div>
									<?php
					  while($food = mysqli_fetch_array($result)){
           include 'dbconnect.php';
             $image=$food['food_image'];
             $food_id=$food['food_id'];
             $food_name=$food['food_name'];
             $food_price=$food['food_price'];
             $food_availability=$food['food_availability'];
             $hotel_id=$food['hotel_id'];
             $getnumber="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             $number=mysqli_query($conn,$getnumber);
             $arraynumber=mysqli_fetch_array($number);
             $hotel_number=$arraynumber['hotel_contact'];
             $hotel_name_query="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             $hotel_name_data=mysqli_query($conn,$hotel_name_query);
             $hotel_name_array=mysqli_fetch_array($hotel_name_data);
             $hotel_name=$hotel_name_array['hotel_name'];
             
								?>

								<div class="col-md-3 col-sm-4 col-xs-6 feature">
										<div class="panel" >
											<div class="panel-heading">
												<h3 class="panel" id="panel-heading"><?php echo $food_name; ?></h3>
											</div><!-- end panel heading -->
											<img src="includes/food_main_image/<?php echo $image; ?>.jpg" class=" img-circle img-responsive" id="fade"style="min-height:235px;max-height:235px;min-width:100%; "alt="HTML5" />
											<p><b>Food Availability : </b><?php echo $food_availability; ?></p>
											<p><b>Food Price : </b><?php echo $food_price; ?></p>
											<p><b>Contact Number : </b><?php echo $hotel_number; ?></p>
											<p><b>Hotel Name : </b><?php echo $hotel_name; ?></p>
											
											<a href="order_food.php?food_id=<?php echo $food_id; ?>" target="_blank" class="btn btn-info btn-block">order here</a>
										</div><!--  end panel -->
									</div><!-- end feature-->
									

<?php
        }
				}
				else{
					echo "<br><br><br><br>";
					echo "No Food Offerred by this hotel";
				}
			}
			else{
				echo "Database not responding refresh page";
			}

		}
		// end function  display hotel food details 


		// function  display hotel room details 

function display_hotel_room_details($hotel_id){
			include 'dbconnect.php';
			$hotel_id=$hotel_id;
			$sql="SELECT * FROM room WHERE hotel_id=$hotel_id";
			
			if ($result=mysqli_query($conn,$sql)) {
				if (mysqli_num_rows($result)>0) {
					?>
	  <div class="col-12">
										<h2><br>
											<u>Rooms Offerred by this Hotel</u>
										</h2>
									<p></p><br>

									</div>
									<?php
					  while($room = mysqli_fetch_array($result)){
            include 'dbconnect.php';
                 $image=$room['room_image'];
                 $room_id=$room['room_id'];
                 $room_location=$room['room_location'];
                 $room_type=$room['room_type'];
                 $room_price=$room['room_price'];
                 $room_availability=$room['room_availability'];
                  $hotel_id=$room['hotel_id'];
             $getnumber="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             $number=mysqli_query($conn,$getnumber);
             $arraynumber=mysqli_fetch_array($number);
             $hotel_number=$arraynumber['hotel_contact'];
             $hotel_name_query="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
             $hotel_name_data=mysqli_query($conn,$hotel_name_query);
             $hotel_name_array=mysqli_fetch_array($hotel_name_data);
             $hotel_name=$hotel_name_array['hotel_name'];
								?>

							<div class="col-md-3 col-sm-4 col-xs-6 feature">
										<div class="panel" >
											<div class="panel-heading">
												<h3 class="panel" id="panel-heading"><?php echo $room_type; ?></h3>
											</div><!-- end panel heading -->
											<img src="includes/room_main_image/<?php echo $image; ?>.jpg" id="fade"class=" img-circle img-responsive" style="min-height:235px;max-height:235px;min-width:100%; "alt="HTML5" />
											<p><b>Room Location : </b><?php echo $room_location; ?></p>
											<p><b>Room Availability : </b><?php echo $room_availability; ?></p>
											<p><b>Room Price : </b><?php echo $room_price; ?></p>
											<p><b>Contact Number : </b><?php echo $hotel_number; ?></p>
											<p><b>Hotel Name : </b><?php echo $hotel_name; ?></p>

											<a href="order_room.php?room_id=<?php echo $room_id; ?>" target="_blank" class="btn btn-info btn-block">Book Now</a>
										</div><!--  end panel -->
									</div><!-- end feature-->
									
<br>
<?php
        }
				}
				else{
					echo "<br><br><br><br>";
					echo "No Room Offerred by this hotel";
				}
			}
			else{
				echo "Database not responding refresh page";
			}

		}// function  display hotel food details end







?>