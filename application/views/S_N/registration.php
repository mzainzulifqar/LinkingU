<!DOCTYPE html>
<html lang="en">
<head>
	<title>Linking U</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>theme/login_page/images/icons/icons8-user-account-48.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/login_page/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>theme/login_page/images/bg-01.jpg');">


			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
				<form class="login100-form validate-form" method="post" action="<?php echo base_url();?>main/Registration">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

					
						<?php 	
						$result = $this->session->flashdata('success');
								if(!empty($result))
								{
									echo "<div class='alert alert-success' >
							  
							  <span>$result</span>;
							</div>";
								}

								$error  = $this->session->flashdata('error');
								if(!empty($error))
								{
									echo "<div class='alert alert-danger' >
							  
							  	<span> $error</span>
							</div>";
								}

								if(!empty(validation_errors()))
								{
									echo "<div  class='alert alert-danger' >";
									echo validation_errors();
									echo "</div>";
							  
							  
							
								}





								?>


			

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="fname" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

						
					</div>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="em" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

						
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
						 
					</div>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Country is required">
						<span class="label-input100">Country</span>
						<input class="input100" type="text" name="country" placeholder="Country Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

						
					</div>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Birthday is required">
						<span class="label-input100">Birthday</span>
						<input class="input100" type="date" name="bdy" placeholder="">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

						
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Gender is required">
						<span style="display:block;" class="label-input100">Gender</span>
						<input style="display:inline-block;padding-left:10px;    margin-left: 15px;
    						margin-top: 10px;" type="radio" name="gender" placeholder="" value="male"> &nbsp Male
						<input style="display:inline-block;padding-left:10px;    margin-left: 15px;
   						 margin-top: 10px;"  type="radio" name="gender" placeholder="" value="female"> &nbsp Female
						
						
					</div>

					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
							Sign Up
							</button>
						</div>
					</div>

				

					<div class="flex-col-c " style="padding-top:30px;">
						

						<a href="<?php echo base_url();?>main/index" style="display: block;font-family: Poppins-Bold;font-size: 22px;color: #333333; line-height: 1.2; text-align: center">
							Log In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>theme/login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>theme/login_page/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>theme/login_page/js/main.js"></script>

</body>
</html>