<?php
function client_search_area(){
	?>
<!-- Main Div -->
	<div id="background">
		
		 <div id="slider" style="width: 100%;
			   		height: 700px;">
        
            <a href="" target="">  <!--This image is having a link on it.Use <a href="www.link.com" /a> -->
                <img src="images/image-slider-1.jpg"  id="bg_img"/>
            </a>
            
            <img src="images/image-slider-2.jpg"id="bg_img" alt="" />

            <img src="images/image-slider-3.jpg"id="bg_img" alt="" />
            
       </div>
<!-- end slider -->
	</div>
		<div id="page">
    <form id="searchForm" action="index.php#features" method="get" style="text-align:center;">

    	<h2>
    	<br>
    		<b style="color:floralwhite;
     background-color:red;border-radius: 15px 50px;padding:5px 10px 0px 10px;">Search Your Favorite Food</b></h2>
		<fieldset  style="padding:20px 15px 0px 15px; background-color:#e8e7e7; border-radius: 0px 50px 5px 30px">
        
           	   <input type="text" class="form-control" id="s" name="searchfood" placeholder="Search food">
       
            	<input type="submit" value="Submit" id="submitButton" />
        
                        
            <ul class="icons">
            </ul>
            
        </fieldset >
    </form><form id="searchForm" action="index.php#features" method="get" style="top:-500px; text-align:center;"><h2 ><b style="color:floralwhite;
     background-color:red;border-radius: 15px 50px;padding:5px 10px 0px 10px;margin-bottom:5px;
    ">Search Your Desired Room</b></h2>
		<fieldset   style="padding:20px 15px 0px 15px; background-color:#e8e7e7; border-radius: 0px 50px 5px 30px ">
        
            
						    <input type="text" class="form-control"id="s" name="searchroom" placeholder="Search Room by location">
            <input type="submit" value="Submit" id="submitButton" />
            
           <ul class="icons">
            </ul>
                        
            
        </fieldset>
    </form>

    <div id="resultsDiv"></div>
    
</div>

<!--		<div id="content">
			
				<div class="vertical-align" id="search_area" >
					<form role="form" class="form-inline" action="index.php" method="get">
						  <div class="form-group">
						    <label for="food">Food:</label>
						    <input type="text" class="form-control" id="food" name="searchfood" placeholder="Search food">
						  </div>
						
						  
						  <button class="btn btn-info btn-lg" type="submit" name="search_food">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
					</form><br>
					<form role="form" class="form-inline" >
						  <div class="form-group">
						    <label for="room">Room:</label>
						    <input type="text" class="form-control" name="searchroom" placeholder="Search Room by location">
						  </div>
						
						  
						  <button class="btn btn-info btn-lg" type="submit" name="search_room">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
					</form>
					
				</div>
				
		</div>-->
	<?php

}


// Retrieve food
					function retrieve_food(){ 
					include('dbconnect.php');
					if (!isset($_GET['food_page_number'])) {
						$_GET['food_page_number']=0;
					}
					$page=$_GET['food_page_number'];
					if ($page==0 || $page==1) {
						$page1=0;
					}else{
						$page1=($page*10)-10;
					}

						$sql = "SELECT * FROM food limit $page1,10 ";
				if($result = mysqli_query($conn, $sql)){
				  return $result;
				} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}
			}

//retrieve room

				function retrieve_room(){ 
							include('dbconnect.php');
							if (!isset($_GET['room_page_number'])) {
						$_GET['room_page_number']=0;
					}
								$page=$_GET['room_page_number'];
					if ($page=="" || $page==1) {
						$page1=0;
					}else{
						$page1=($page*10)-10;
					}
								$sql = "SELECT * FROM room limit $page1,10";
						if($result = mysqli_query($conn, $sql)){
						  return $result;
						} else{
						    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}

					}

// display food
				function display_food(){

					$result=retrieve_food();
					
  if(mysqli_num_rows($result) > 0){
      ?>
<div class="row" id="featuresHeading" >
									<div class="col-12">
										<h2>
											<u>Eat with Us</u>
										</h2>
										<p class="lead">Have a look on our deals....</p>

									</div>
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
											
											<a href="order_food.php?food_id=<?php echo $food_id; ?>" target="_blank" class="btn btn-info btn-block">order deal</a>
										</div><!--  end panel -->
									</div><!-- end feature-->
									

<?php
        }
        
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
    include('dbconnect.php');
    $query="SELECT * FROM food ";
					$result=mysqli_query($conn,$query);
					$count1=mysqli_num_rows($result);
					$count1=$count1/10;
					$count1=ceil($count1);
echo "<p><br> <br></p>";   
    	?>
    	<b><a href="index.php?more_food=1#features" style="text-decoration:none;">More</a></b>
    	<?php

    
				}

//display room
				function display_room(){
			$result=retrieve_room();
			$count=mysqli_num_rows($result);
  if(mysqli_num_rows($result) > 0){?>
       <div class="col-12">
										<h2>
											<u>Stay at our hotels</u>
										</h2>
										<p class="lead">Here are differrent rooms and their details</p>

									</div>
<?php        while($room = mysqli_fetch_array($result)){
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

<?php
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
     include('dbconnect.php');
    $query="SELECT * FROM room ";
					$result=mysqli_query($conn,$query);
					$count=mysqli_num_rows($result);
					$count=$count/10;
					$count=ceil($count);
echo "<p><br> <br></p>";   
    	?>
    	<b><a href="index.php?more_room=1#features" style="text-decoration:none;">More</a></b>
    	<?php

    }
// End display room

// display all
    function display_all_food(){
    	$sql="SELECT * FROM food";
    	include 'dbconnect.php';
    	$result=mysqli_query($conn,$sql);
    	if(mysqli_num_rows($result) > 0){
      ?>
<div class="row" id="featuresHeading" >
									<div class="col-12">
										<h2>
											Eat with Us
										</h2>
										<p class="lead">Have a look on our deals....</p>

									</div>
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
        
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No food were found.";
    }
    }
    function display_all_room(){
    	$sql="SELECT * FROM room";
    	include 'dbconnect.php';
    	$result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){?>
       <div class="col-12">
										<h2>
											Stay at our hotels
										</h2>
										<p class="lead">Here are differrent rooms and their details</p>

									</div>
<?php        while($room = mysqli_fetch_array($result)){
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

<?php
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No rooms were found.";
    }
    }



?>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


