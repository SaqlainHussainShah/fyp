<?php
if (isset($_POST['hotel_id']) && isset($_POST['product_id']) && isset($_POST['client_id']) && isset($_POST['product_quantity']) && isset($_POST['order_price'])) {
	 $hotel_id=$_POST['hotel_id'] ;
	 $product_id=$_POST['product_id'];
	 $client_id=$_POST['client_id'] ;
	 $product_quantity=$_POST['product_quantity'];
	 $order_price=$_POST['order_price'];
	 $order_total=$order_price*$product_quantity;
	 $sql="INSERT INTO order_food(product_id,hotel_id,client_id,product_quantity,order_total,order_price)
									 VALUES ('$product_id','$hotel_id','$client_id','$product_quantity','$order_total','$order_price')";
									 include 'dbconnect.php';
	if (mysqli_query($conn,$sql)) {
						include '../textsms.php';
						$message="You ordered $product_quantity deals of food  with id: $product_id for RS. $order_total  ";
								
// get client number
						$querygetnumber="SELECT * FROM client WHERE client_id=$client_id";
						$datanumber=mysqli_query($conn,$querygetnumber);
						
						$numberdata=mysqli_fetch_array($datanumber);
						$number=$numberdata['client_contact'];

//send client message
						textsms($number,$message);
 // get client number
						$querygetnumberhotel="SELECT * FROM hotel WHERE hotel_id=$hotel_id";
						$datanumberhotel=mysqli_query($conn,$querygetnumberhotel);
						$numberdatahotel=mysqli_fetch_array($datanumberhotel);
						
				$hotel_email=$numberdatahotel['hotel_email'];
						$messagehotel="$product_quantity order for product $product_id by client with id $client_id for Rs $order_total";

//send client message
					
						if(mail($hotel_email, "New Order", $messagehotel)){
							echo "good";}
							else{
								echo "sorry";
							}
							session_start();
							$_SESSION['flash_message']="Food ordered successfully";
						    header('Location: ../index.php'); 


								
							}else{
								session_start();
								$_SESSION['flash_message']="sorry we are having some issues";
								 header('Location: ../index.php'); 
							}
}
else{
	header('Location: ../index.php');
}

?>