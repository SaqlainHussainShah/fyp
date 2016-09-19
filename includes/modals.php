<!-- client sign up -->
					 <div class="modal fade" id="client_signup">
								      		<div class="modal-dialog">
								      			<div class="modal-content">
										      			<div class="modal-header">Client Signup</div>
										      			<div class="modal-body">
										      				<form action="includes/create_client.php" method="post">
															 <div class="form-group">
															    <label for="name">Name:</label>
															    <input type="text" class="form-control" name="client_name" id="name">
															  </div>
															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="client_email">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Password:</label>
															    <input type="password" class="form-control" id="pwd" name="client_password">
															  </div>
															   <div class="form-group">
															    <label for="tel">Telephone:</label>
															    <input type="tel" class="form-control" id="tel" name="client_contact">
															  </div>
  



										      				<button type="submit" type="button"name="submit" class="btn btn-prinmary" > Save </button>
										      				<button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
										      				</form>
										      			</div>
										      	</div>
								      		</div>
						</div>
						<!-- client sign in -->
						<div class="modal fade" id="client_signin">
								      		<div class="modal-dialog">
								      			<div class="modal-content">
										      			<div class="modal-header">Client Signin</div>
										      			<div class="modal-body">
										      				<form action="includes/client_signin.php" method="post">
															 
															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="client_signin_email">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Password:</label>
															    <input type="password" class="form-control" id="pwd" name="client_signin_password">
															  </div>
															   
  



										      				<button type="submit" type="button"name="submit" class="btn btn-prinmary" > Save </button>
										      				<button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
										      				</form>
										      			</div>
										      	</div>
								      		</div>
						</div>
							<!-- hotel sign in -->
						<div class="modal fade" id="hotel_signin">
								      		<div class="modal-dialog">
								      			<div class="modal-content">
										      			<div class="modal-header">Client Signin</div>
										      			<div class="modal-body">
										      				<form action="includes/hotel_signin.php" method="post">
															 
															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="hotel_signin_email">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Password:</label>
															    <input type="password" class="form-control" id="pwd" name="hotel_signin_password">
															  </div>
															   
  



										      				<button type="submit" type="button"name="submit" class="btn btn-prinmary" > Save </button>
										      				<button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
										      				</form>
										      			</div>
										      	</div>
								      		</div>
						</div>
							<!-- hotel sign up -->
						<div class="modal fade" id="hotel_signup">
								      		<div class="modal-dialog">
								      			<div class="modal-content">
										      			<div class="modal-header">Hotel signup</div>
										      			<div class="modal-body">
										      				<form action="includes/create_hotel.php" method="post"  enctype="multipart/form-data">
															 



															  <div class="form-group">
															    <label for="name">Name</label>
															    <input type="text" class="form-control" id="name" name="hotel_name">
															  </div>

															  <div class="form-group">
															    <label for="email">Email</label>
															    <input type="email" class="form-control" id="email" name="hotel_email">
															  </div>
															  <div class="form-group">
															    <label for="pwd">Password:</label>
															    <input type="password" class="form-control" id="pwd" name="hotel_password">
															  </div>
															   <div class="form-group">
															    <label for="location">Location:</label>
															    <input type="text" class="form-control" id="location" name="hotel_location">
															  </div>
															  <div class="form-group">
															    <label for="tel">contact # :</label>
															    <input type="tel" class="form-control" id="tel" name="hotel_number">
															  </div>
															  <div class="form-group">
															    <label for="main_image">Upload Picture :</label>
															    <input type="file" class="form-control" id="main_image" name="main_image"  >
															  </div>





										      				<button type="submit" type="button"name="submit" class="btn btn-prinmary" > Save </button>
										      				<button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
										      				</form>
										      			</div>
										      	</div>
								      		</div>
						</div>
			<!-- END MOdals -->