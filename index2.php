<?php 
include 'header.php';

?>
<!-- Start Navigation BAr top-->
					<nav class="navbar navbar-default navbar-fixed-top navbar-transparent " id="myP">
				    <div class="container-fluid" >
				     <div class="navbar-header"> <a class="navbar-brand" href="#">Gardan</a>

	
				    <button class="navbar-toggle" data-toggle="collapse" data-target="#navHeaderCollapse">
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
				    </button>
				</div>
				    <div class="collapse navbar-collapse " id="navHeaderCollapse">

<!---->

			


<!---->
				    	<ul class="nav navbar-nav navbar-right " >




							<?php
								session_start();
							
							

								
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
									include 'includes/functions.php';
									if (isset($_GET['more_room'])) {
									display_all_room();
									}
									elseif (isset($_GET['more_food'])) {
										display_all_food();
									}
									else{
									header('Location: index.php');} 
									?>
								</div>
								
								
								




						</div>
							<?php
						}

					?>

<script type="text/javascript" >
window.onscroll = function() {myFunction()};

function myFunction() {


   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
   document.getElementById('myP').style.background='white'
    } else {
        document.getElementById("myP").style.background = 'transparent'
    }
}
</script>
    <script src="bootstrap/jquery/1.12.4/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
		</body>



	</html>