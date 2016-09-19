<?php 
include 'header.php';

?>
<!-- Start Navigation BAr top-->
					<nav class="navbar navbar-default navbar-fixed-top " id="navbarchange"style="background-color:white;opacity:0.6;" >
				    <div class="container-fluid" >
				     <div class="navbar-header"> <a class="navbar-brand" href="index.php">Eat & Live.com</a>
				   <?php  	
				   session_start();
				   if (isset($_SESSION['flash_message'])) {
					echo $_SESSION['flash_message'];
					 unset($_SESSION['flash_message']);
					}
					?>

	
				    <button class="navbar-toggle" data-toggle="collapse" data-target="#navHeaderCollapse">
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
				    </button>
				</div>
				    <div class="collapse navbar-collapse " id="navHeaderCollapse">
				    	<ul class="nav navbar-nav navbar-right " >
							<?php
								
							
							

								
								include 'includes/modals.php';

								
								if (isset($_SESSION['client_signin'])) {
									$id=$_SESSION['client_id'];
									 
									echo   "<li><a href='includes/logout.php'>Logout</a></li>
									<li ><a  href='includes/client_display_room_orders.php?client_id=$id'>See rooms order</a></li>
									<li ><a  href='includes/client_display_food_orders.php?client_id=$id'>See food order</a></li>";

								}
								elseif(isset($_SESSION['hotel_signin'])){
									echo "<li ><a  href='includes/hotel_room.php'>See rooms</a></li>
									<li ><a  href='includes/hotel_food.php'>See food </a></li>
									<li ><a  href='includes/logout.php'>logout</a></li>
									";
								}
								elseif(isset($_SESSION['admin_signin'])){
									echo "<li ><a  href='includes/logout.php'>logout</a></li>";
								}
								else{ ?>

								       <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Sign Up</a>
<ul class="dropdown-menu">
<li>
<a href="includes/form_client_signup.php">Client signUp</a>
</li>
<li>
<a href="includes/form_hotel_signup.php">Hotel SignUp</a>
</li>

</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Log In</a>
<ul class="dropdown-menu">
<li>
<a href="includes/form_client_signin.php">Client LogIn</a>
</li>
<li>
<a href="includes/form_hotel_signin.php">Hotel LogIn</a>
</li>
<li>
<a href="includes/admin_login.php">Admin LogIn</a>
</li>
</ul>
</li>
<?php
								}
							?>
			 		</ul>
				    </div>
				    
					</div>
					</nav>
					<!-- End Navigation BAr top-->
			

			<?php
						if (isset($_SESSION['hotel_signin'])) {
							 //Hotel sign in
							include 'includes/hotel_orders.php';echo "<br>";
							include 'includes/hotel_food_orders.php';
						
							







						}
						elseif (isset($_SESSION['admin_signin'])) {
								//admin Signin-->
							echo "<br><br><br><br>";
								include 'includes/admin_display_hotels.php';
								include 'includes/admin_display_clients.php';	

						}
						else{ 
							include 'includes/functions.php';
							client_search_area();

							?>
						<div class="col-lg-12  col-md-12  col-xs-12  col-sm-12 " id="client_products_div">
								
								<div id="features" class="row">
									
									<?php
									include 'includes/search.php';
									if (isset($_GET['searchfood']) && isset($_GET['searchroom'])) {
										$search_food=$_GET['searchfood'];
										search_food($search_food);
										$search_room=$_GET['searchroom'];
										search_room($search_room);
									}
									elseif (isset($_GET['searchfood'])) {
										$search_food=$_GET['searchfood'];
										search_food($search_food);
									}
									elseif (isset($_GET['searchroom'])) {
										$search_room=$_GET['searchroom'];
										search_room($search_room);
									}elseif (isset($_GET['more_food'])) {
										display_all_food();
									}
									elseif (isset($_GET['search_hotel'])) {
										$search_hotel=$_GET['search_hotel'];
										search_hotel($search_hotel);
									}
									elseif (isset($_GET['more_room'])) {
										display_all_room();
									}
									elseif (isset($_GET['hotel_detail_id'])) {
										include 'includes/hotel_detail_display.php';
										$hotel_id=$_GET['hotel_detail_id'];
										display_hotel_food_details($hotel_id);?></div><div id="features" class="row"><?php
										display_hotel_room_details($hotel_id);

									}
									else{
										include 'includes/display_hotel.php';
									display_hotel();echo "<br>";
										?></div>
										<div id="features" class="row">
									<?php display_food(); 	echo "<br>";?> 
									
								</div>
								
								<div id="features" class="row">
									<?php
									display_room();
								
									}
									?>
								</div>
								
									

								




						</div>
							<?php
						}

					?>

	
<?php include 'footer.php';
?>
<script>


window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 650 || document.documentElement.scrollTop > 650) {
        document.getElementById("navbarchange").style.background = "black";
         document.getElementById("navbarchange").style.opacity = 1;
         document.getElementById("navbarchange").style.color = white;
    } 
 else if (document.body.scrollTop < 450 || document.documentElement.scrollTop < 450) {
        document.getElementById("navbarchange").style.background = "white";
         document.getElementById("navbarchange").style.opacity = 1;
    }
    
    else {
        document.getElementById("navbarchange").className = "transparent";
    }
}
</script>
    <script src="bootstrap/jquery/1.12.4/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
		</body>



	</html>