<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->


<!--fonts-->
<!-- <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">



		<meta name="viewport" content="width=device-width, initial-scale=1">
		
<link rel="stylesheet" href="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/jquery-3.3.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/style/custom.css">

<script src="js/custom.js" type="text/javascript" charset="utf-8" async defer></script>

<!--fonts-->
<!-- <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/jquery-3.3.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/bootstrap.js"></script>



<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/style/custom.css">

<!--script src="custom.js" type="text/javascript" charset="utf-8" async defer></script-->

<!--fonts-->
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">


	<title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="row grad padding-md">
			<div class="col-md-2 col-md-2 col-xs-2">
				<h3 class="text-family">Linking U</h3>

			</div><!--end of col-md-4-->

			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 padding-top-sm">
				<form class="form-inline" method="post" action="<?php echo base_url();?>index.php/main/login">
			  		
			  		<div class="form-group has-error has-feedback">
				     <label for="email" >Email address:</label>
				      <input type="email" class="form-control" name="email" placeholder="Email"  value="<?php echo set_value('email')?>">
				      	<?php if(!empty(form_error('email')))
					      	{ echo "<span class='glyphicon glyphicon-remove form-control-feedback'></span>"; } 
					      ?>
				     
				    </div>
			  		
			  		<div class="form-group has-error has-feedback">
					     <label for="pwd" class="pwd_label">Password:</label>
					      <input type="password" class="form-control" name="password" placeholder="Password" >
					      <?php if(!empty(form_error('password')))
					      	{ echo "<span class='glyphicon glyphicon-remove form-control-feedback'></span>"; } 
					      ?>
					     

					   </div>
			  		<div class="checkbox padding-lf">
			    		<label><a href="forget_password" >Forget Password</a>
			  		</div>
			  		
			  			<input type="submit" class="btn bt-login-color " name="login">
					
				</form>

			</div><!--end of col-md-6-->
		</div><!--end of row-->
		


		<div class="row">
			<div class="col-md-4 col-sm-4 padding-top-md ">
				<img src="<?php echo base_url();?>theme/images/Social-Media-World.png"  class="img-responsive social" width="360" alt="">


			</div>

			<div class="col-md-8 col-sm-8">
				<div class="row">
					<div class="col-md-12 padding-top-sm-xs">
						<?php 	
						$result = $this->session->flashdata('success');
								if(!empty($result))
								{
									echo "<div class='alert alert-success alert-dismissible ' >
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Success!</strong> $result.
							</div>";
								}

								$error  = $this->session->flashdata('error');
								if(!empty($error))
								{
									echo "<div class='alert alert-danger alert-dismissible' >
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Success!</strong> $error.
							</div>";
								}

								$failed_login  = $this->session->flashdata('failed_login');
								if(!empty($failed_login))
								{
									echo "<div class='alert alert-danger alert-dismissible' >
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Warning!</strong> $failed_login.
							</div>";
								}

						?>

					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 padding-top-sm-768 padding-bottom-sm">
						<h1 class="text-family padding-top-sm">Register Now:</h1>
					</div>
				</div><!--end of row-->
				<div class="row padding-md padding-top-sm">
					<div class="col-md-12">
				<form class="form-horizontal" id="register_form" method="post" action="<?php echo base_url();?>index.php/main/Registration">
			  		<div class="form-group">
			    		<label class="control-label col-sm-2" for="fname">First Name</label>
			    		<div class="col-sm-10">
			      			<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo set_value('fname');?>">
			      			<span  style="color:red;"><?php echo form_error('fname');?></span>
			    		</div>
			  		</div>
			  	
			  

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email</label>
			    <div class="col-sm-10"> 
			      <input type="email" class="form-control" name="em" placeholder="Email" value="<?php echo set_value('em');?>">
			      <span style="color:red;"><?php echo form_error('em');?></span>
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="password">Password</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" id="password" name="pass" placeholder="Password" >
			      <span style="color:red;"><?php echo form_error('pass');?></span>
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="country">Country</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo set_value('country');?>">
			      <span style="color:red;"><?php echo form_error('country');?></span>
			    </div>
			  </div>

			  
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="bdy">Birthday</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="bdy" name="bdy" max="31-12-1990" value="<?php echo set_value('bdy');?>">
			      <span style="color:red;"><?php echo form_error('bdy');?></span>
			    </div>
			  </div>

			  <div class="form-group">
			  	<div class="col-sm-1 col-sm-offset-1  col-xs-offset-0">
			  		<label  class="label_gender">Gender</label>
			  	
			  	</div> 
			    <div class="col-sm-8 ">
			      <div class="radio">
			        <label><input type="radio" name="gender" value="male">Male</label>
			        <label><input type="radio" name="gender" value="female">Female</label>
			        <span style="color:red;"><?php echo form_error('gender');?></span>
			      </div>
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" name="submit" id="submit" class="btn btn-success btn-block" value="Register Now">
			    </div>
			  </div>
			</form>

		</div>

			</div><!--end of row-->
			
			</div><!--end of col-md-8-->



			
		</div><!--end of row-->
		
		<div class="row footer">
			<div class="col-md-12 ">
				<h4 class="text-center"> &copy; 2018-<?php echo date("Y");?></h4>
			</div>

		</div>
		
	</div><!--end of container fluid-->



</body>
</html>