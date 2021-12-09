<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 223px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -111px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

    <div class="container">
    	<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<?php display_message(); ?>
					<?php validate_supplier_registration();	 ?>		
			</div>
		</div>
   <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<br>
				<div class="wrapper">
					<button class="button5"><h1 class="text-center">BECOME A SELLER NOW!</h1></button>
				</div>
				<br>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="supplierlogin.php">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="supplierregister.php" class="active" id="">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="post" role="form" enctype="multipart/form-data">

									<div class="form-group">
										<input type="text" name="company_name" id="company_name" tabindex="1" class="form-control" placeholder="Your Company" value="" required autocomplete="off">
									</div>
									<div class="form-group col-md-11" style="padding-left: 0px;padding-right: 0px;" onclick="myFunction()">

										<input type="email" name="email_address" id="email_address" tabindex="1" class="form-control" placeholder="Email Address" value=""  required autocomplete="off">
									</div>
									<div class="form-group col-md-1" style="padding-left: 0px;padding-right: 0px;">
										<div class="popup" onclick="myFunction()" style="margin-left: 10px;margin-top: 10px;">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve" width="25px" height="25px" class=""><g><path style="fill:#25B7D3;" d="M496.158,248.085c0-137.022-111.069-248.082-248.075-248.082C111.07,0.003,0,111.063,0,248.085  c0,137.001,111.07,248.07,248.083,248.07C385.089,496.155,496.158,385.086,496.158,248.085z" data-original="#25B7D3" class=""/><g>
											<path style="fill:#FFFFFF" d="M315.249,359.555c-1.387-2.032-4.048-2.755-6.27-1.702c-24.582,11.637-52.482,23.94-57.958,25.015   c-0.138-0.123-0.357-0.348-0.644-0.737c-0.742-1.005-1.103-2.318-1.103-4.015c0-13.905,10.495-56.205,31.192-125.719   c17.451-58.406,19.469-70.499,19.469-74.514c0-6.198-2.373-11.435-6.865-15.146c-4.267-3.519-10.229-5.302-17.719-5.302   c-12.459,0-26.899,4.73-44.146,14.461c-16.713,9.433-35.352,25.41-55.396,47.487c-1.569,1.729-1.733,4.314-0.395,6.228   c1.34,1.915,3.825,2.644,5.986,1.764c7.037-2.872,42.402-17.359,47.557-20.597c4.221-2.646,7.875-3.989,10.861-3.989   c0.107,0,0.199,0.004,0.276,0.01c0.036,0.198,0.07,0.5,0.07,0.933c0,3.047-0.627,6.654-1.856,10.703   c-30.136,97.641-44.785,157.498-44.785,182.994c0,8.998,2.501,16.242,7.432,21.528c5.025,5.393,11.803,8.127,20.146,8.127   c8.891,0,19.712-3.714,33.08-11.354c12.936-7.392,32.68-23.653,60.363-49.717C316.337,364.326,316.636,361.587,315.249,359.555z" data-original="#FFFFFF" class="active-path"/>
											<path style="fill:#FFFFFF" d="M314.282,76.672c-4.925-5.041-11.227-7.597-18.729-7.597c-9.34,0-17.475,3.691-24.176,10.971   c-6.594,7.16-9.938,15.946-9.938,26.113c0,8.033,2.463,14.69,7.32,19.785c4.922,5.172,11.139,7.794,18.476,7.794   c8.958,0,17.049-3.898,24.047-11.586c6.876-7.553,10.363-16.433,10.363-26.393C321.646,88.105,319.169,81.684,314.282,76.672z" data-original="#FFFFFF" class="active-path"/>
										</g></g> </svg>
										  	<span class="popuptext" id="myPopup">
										  		<div class="container-fluid">
										  		<strong style="margin-right: 99px;">Make sure you:</strong>
										  		<br>
										  		1. Turn off your 2 step verification.
										  		2. Turn on less secure app access at
		 										<a style="color: orange;"href="https://myaccount.google.com/security">
		 										myaccount.google.com/security
										  		</a>	
										  		</div>
										  		

										  	</span>
										</div>
									</div>									
									<div class="form-group">
										<input type="text" name="contact_number" id="contact_number" tabindex="1" class="form-control" placeholder="Contact Number" value="" required autocomplete="off">
									</div>
									<div class="form-group">
										<input type="text" name="address" id="address" tabindex="2" class="form-control" placeholder="Address" required autocomplete="off">
									</div>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Username" required autocomplete="off">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required autocomplete="off">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password" required autocomplete="off">
									</div>
									<!-- <div class="form-group">
								        <label for="product-title">Profile picture</label>
								        <input type="file" name="file" required>
								    </div> -->

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Submit">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
   