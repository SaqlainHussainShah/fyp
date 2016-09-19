<?php



	include('dbconnect.php');
//if(isset($_POST['submit']) && !empty($_POST['submit'])){

	
	$name=$_POST['hotel_name'];
	$email=$_POST['hotel_email'];
	$password=$_POST['hotel_password'];
	$contact=$_POST['hotel_number'];
	$location=$_POST['hotel_location'];
//--------Image Upload------------/////

$tmp_name=$_FILES['main_image']['tmp_name'];
$file_name=$_FILES['main_image']['name'];
$size=$_FILES['main_image']['size'];
$type=$_FILES['main_image']['type'];
$extension=strtolower(substr($file_name,strpos($file_name, '.')+1 ));
$max_size=5300000;
if (isset($tmp_name)) {

			if (!empty($tmp_name)) {

					if (($extension=='jpg'||$extension=='jpeg') && $type=='image/jpeg' && $size<=$max_size) {

						$locate='images/hotel_main_image/';
						$rand_name=rand();
						if(move_uploaded_file($tmp_name, $locate.$rand_name.".jpg")){
							$hotel_confirm_code=rand();
														$sql="INSERT INTO hotel(hotel_confirm_code,hotel_name,hotel_email,hotel_password,hotel_contact,hotel_location,hotel_main_image)
									 VALUES ('$hotel_confirm_code','$name','$email','$password','$contact','$location','$rand_name')";
								if (mysqli_query($conn,$sql)) {
									//include 'confirm_hotel_email.php';
									//confirm_hotel_email($email,$hotel_confirm_code);
									session_start();
									$_SESSION['flash_message']="Sign up completed";
									header('Location: form_hotel_signin.php');
							     
							} else {
							 echo "hello";
						session_start();
						$_SESSION['flash_message']="Database error";
						header('Location:form_hotel_signup.php');
							}
							}
						else{

							header('Location:../index.php ');
							}}
					else{
						echo "hello";
						session_start();
						$_SESSION['flash_message']="Size shoud be less than 5 mb with jpg format";
						header('Location:form_hotel_signup.php');
						}
					

				}
			else{
					
						session_start();
						$_SESSION['flash_message']="Select a file";
						header('Location:form_hotel_signup.php');

				}

}
else{
	session_start();
	$_SESSION['flash_message']="file upload fail Use fast internet";
	header('Location:form_hotel_signup.php');

}


	//--------End Image Upload---------//////

	
//}

//else{
//echo "fill all fiedls";

//}





?>