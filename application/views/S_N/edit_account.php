<!DOCTYPE html>
<html>
<head>
	<title>Edit Account</title>
</head>
<body>


		<div class="row bg-section">

			<?php
				for($i=0;$i<count($details);$i++)
				{
					$id  = $details[$i]['id'];
					$name  = $details[$i]['fname'];
					$about_yourself  = $details[$i]['about_yourself'];
					$password  = $details[$i]['password'];
					$verification_code  = $details[$i]['verification_code'];
					$image  = $details[$i]['image'];



				}


			?>
			<div class="col-md-4">
					<h3 class="text-family padding-bottom-sm padding-top-sm ">Edit Account Settings:</h3>

					<div class="row margin-bottom-md padding-top-sm-xs">
						<div class="col-md-11 col-md-offset-1" style="border:1px solid white;border-style: dotted;padding-bottom: 10px">
							<h2 class="text-family">Security:</h2>
						<h3 class="text-family padding-top-sm">Delete Your Account:</h3>
						<a href="<?php echo base_url();?>main/delete_account/<?php echo $id;?>" title="" class="btn btn-danger">Delete Account</a>
						<h4 class="padding-top-sm">This is Your Password Reset Code Dont Share it with others</h4>
						<input type="text" name="" class="form-control" value="<?php echo $verification_code;?>" readonly>
						</div>
					</div>

					
			</div>

			
			<div class="col-md-6 col-md-offset-2 ">
						<h3 class="text-family text-center">Update Info:</h3>
					<div class="row padding-md padding-top-sm margin-bottom-md">
					<div class="col-md-12 ">
				<form class="form-horizontal padding-top-sm " method="post" action="<?php echo base_url();?>main/update_user_data" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php  echo $id;?>">
			  		<div class="form-group">
			    		<label class="control-label col-sm-2" for="fname">First Name</label>
			    		<div class="col-sm-10">
			      			<input type="text" class="form-control" id="" name="fname" placeholder="First Name" value="<?php echo $name;?>">
			      			<span style="color:red;"><?php echo form_error('fname');?></span>
			    		</div>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label col-sm-2" for="about_yourself">About Yourself</label>
							    <div class="col-sm-10">
							 <textarea name="about_yourself" class="form-control" rows="5" cols="10" placeholder="Say Something About Yourself" value=""><?php echo $about_yourself;?></textarea>
							</div>
							  
					</div>
			  

			  

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="password">Password</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" value="<?php echo $password;?>">
			     <span><?php echo validation_errors();?> </span>
			    </div>
			  </div>

			  <!--div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Country</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="pwd" name="country" placeholder="Country">
			    </div>
			  </div-->

			 
			  
			  <!--div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Birthday</label>
			    <div class="col-sm-10"> 
			      <input type="date" class="form-control" id="pwd" name="bdy">
			    </div>
			  </div-->

			  
			   <div class="form-group">
			    <label class="control-label col-sm-2" for="password"> Profile Picture</label>
			    <div class="col-sm-10"> 

			      <input type="file" class="form-control" id="file" name="image" value="zain">
			      <span><?php if(!empty($this->session->flashdata('file_upload'))){ echo $this->session->flashdata('file_upload');;}?></span>
			    </div>
			  </div>

			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="submit" class="btn btn-info btn-block">Update Now</button>
			    </div>
			  </div>
			</form>

		</div>

			</div><!--end of row-->


			</div>
		</div><!--end of row-->







<!--footer-->


<?php
		include('footer.php');
?>

</body>
</html>