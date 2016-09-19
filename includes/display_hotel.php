<?php
function display_hotel(){
$query="SELECT * FROM hotel";
include 'dbconnect.php';

$sql=mysqli_query($conn,$query);
if (mysqli_num_rows($sql)>0) {?>
	  <div class="col-12">
										<h2>
											<u>Our Hotels</u>
										</h2>
										<p class="lead">
										<form action="#features" method="get">
											<input type='text' name="search_hotel" style="border-radius:15px; width:225px;height:40px" placeholder="   Search Your Favorite Hotel   " > &nbsp &nbsp
											<button type="submit" class="btn-primary btn" style="background-color:gray; margin-bottom:4px;"><icon class="glyphicon glyphicon-search" ></button>
										</form>
										</p>

									</div>
									<?php
	while ($data=mysqli_fetch_array($sql)) {
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
	
}
else{
	echo "sorry no hotel available";
}
}


?>