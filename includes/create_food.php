<?php

function create_food(){
	include('dbconnect.php');

	if (isset($_POST)) {
		 if (!empty($_POST['food_name']) && !empty($_POST['food_availability']) && !empty($_POST['food_serving']) && 
		 	!empty($_POST['food_price']) && !empty($_POST['food_location']) && !empty($_FILES['food_image']) ) {
		 			session_start();
		 		 $hotel_id=$_SESSION['hotel_id'];
				 $food_name=$_POST['food_name'];
				 $food_availability=$_POST['food_availability'];
				 $food_serving=$_POST['food_serving'];
				 $food_price=$_POST['food_price'];
				 $food_location=$_POST['food_location'];
			 	


//----------Image handling ----
		 	$tmp_name=$_FILES['food_image']['tmp_name'];
			$file_name=$_FILES['food_image']['name'];
			$size=$_FILES['food_image']['size'];
			$type=$_FILES['food_image']['type'];
			$extension=strtolower(substr($file_name,strpos($file_name, '.')+1 ));
			$max_size=5300000;
			if (isset($tmp_name)) {
			if (!empty($tmp_name)) {

					if (($extension=='jpg'||$extension=='jpeg') && $type=='image/jpeg' && $size<=$max_size) {
						$locate='food_main_image/';
						$rand_name=rand();
						if(move_uploaded_file($tmp_name, $locate.$rand_name.".jpg")){
							echo "uploaded file <br />";
							}
						else{
							die(" upload file fail");
							}
					}
					else{
						die("type must pe jpg/jpeg with size less than 5 MB.");
					}
					

				}
			else{
					die(" Select file");

				}

			}
//------End image handling----
$query="INSERT INTO food(food_name,food_location,food_serving,food_availability,food_price,food_image,hotel_id) 
		VALUES ('$food_name','$food_location','$food_serving','$food_availability','$food_price','$rand_name','$hotel_id')";			
		if (mysqli_query($conn,$query)) {
			header('Location: hotel_food.php');
		}
		else{
			echo "cannot add food";

		}

	}

}

}
create_food();


?>