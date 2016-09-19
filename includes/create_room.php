<?php
function create_room(){
include('dbconnect.php');
	if (isset($_POST)) {
		if(!empty($_POST['room_location']) &&!empty($_POST['room_price']) && !empty($_POST['room_availability']) && !empty($_POST['room_type']) && !empty($_FILES['room_image'])){
			session_start();
			$hotel_id=$_SESSION['hotel_id'];
			$room_price=$_POST['room_price'];
			$room_location=$_POST['room_location'];
			$room_availability=$_POST['room_availability'];
			$room_type=$_POST['room_type'];
			//----------Image handling ----
		 	$tmp_name=$_FILES['room_image']['tmp_name'];
			$file_name=$_FILES['room_image']['name'];
			$size=$_FILES['room_image']['size'];
			$type=$_FILES['room_image']['type'];
			$extension=strtolower(substr($file_name,strpos($file_name, '.')+1 ));
			$max_size=5300000;
			if (isset($tmp_name)) {
				if (!empty($tmp_name)) {
					if (($extension=='jpg'||$extension=='jpeg') && $type=='image/jpeg' && $size<=$max_size){
							$locate='room_main_image/';
							$rand_name=rand();
							$destination=$locate.$rand_name.".jpg";
							if(move_uploaded_file($tmp_name, $destination)){
							echo " file uploaded <br />";

							
							}
						else{
							die(" upload file fail");
							}
					}
					else{
						echo "file type must pe jpg/jpeg with size less than 5 mb";
					}

				}
				else{
				echo "Select a File";
			}
			//------End image handling----
			$query="INSERT INTO room(room_type, room_availability,room_image,room_price,hotel_id,room_location) 
					VALUES ('$room_type','$room_availability','$rand_name','$room_price','$hotel_id','$room_location')";
					
					if(mysqli_query($conn,$query)) {
						header('Location: hotel_room.php');
					}
					else{
						echo "cannot add room";
					} 
			}		
		}
		else{

			echo "fill all fields";
		}
	}
	else{
		echo "form not posted";

	}


}


create_room();

?>