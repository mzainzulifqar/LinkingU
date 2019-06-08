<!doctype html>
<html>
<title>Wall</title>
</html>
			
<!--section--->


		

		<div class="row bg-section ">
			<div class="col-md-3  col-sm-3 col-xs-12 profile-div margin-bottom-md  ">
				<h3 class="text-center padding-top-sm">Profile</h3>
					<?php 
					for($i=0;$i<count($catagory['user']);$i++)
					{
						$id = $catagory['user'][$i]['id'];
						$fname = $catagory['user'][$i]['fname'];
						
						$login = $catagory['user'][$i]['last_login'];
						$country = $catagory['user'][$i]['country'];
						$reg = $catagory['user'][$i]['reg_date'];
						$now = date('h:i:sa');
						$image = $catagory['user'][$i]['image'];

							
					}
				?>

				<div class="row">
					<div class="col-md-10 col-md-offset-2 ">
					<img src="<?php echo base_url();?>theme/images/<?php echo $image;?>" class=" md-auto img-circle img-responsive" alt="">
				</div>		<!--end of col-->
			</div><!--end of row-->


						<div class="row info">
							<div class="col-md-8 col-md-offset-3 ">
						<ul class="list-unstyled">
							<li>Name:<span style="padding-left: 10px;"><?php echo $fname;?></span></li>
							<li>Country:<span style="padding-left: 10px;"><?php echo $country;?></span></li>
							<li>Active:<span style="padding-left: 10px;"><?php if(!empty($this->session->userdata('id'))){ echo "Active now";} else {echo timespan($login,$now)." ago";} ?></span></li>
							<li>Member Since:<span style="padding-left: 10px;"><?php echo $reg;?></span></li>
						</ul>
						<br>
						<h4 class="text-family">Personal Info:</h4>
						<ul class="list-unstyled message">
							<li><a  style="color: :black;" href="<?php echo base_url();?>main/message" >Messages:</a></li>
							<li><a href="<?php echo base_url();?>main/user_post/<?php echo $id;?>"> My No Posts:</a> <span></span></li>
						</ul>
					</div><!--end of col-->
					</div><!--end for row-->

			</div><!--end of div-->

		<div class="col-md-9">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="post-form">
				<h3 class="text-family ">Whats on Your Mind:</h3>

						<form action="<?php echo base_url();?>main/insert_post" method="post" >
							  <div class="form-group">
							  
							    <input type="text" class="form-control" id="email" name="title" placeholder="Title"><span style="color:red;"><?php echo form_error('title');?></span>
							    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
							    <input type="hidden" name="user_name" value="<?php echo $fname; ?>">
							  </div>
							  <div class="form-group">
							    
							 <textarea name="message" class="form-control" rows="5" cols="20" placeholder="Description"></textarea>
							 <span style="color:red;"><?php echo form_error('message');?></span>
							  </div>
							  <div class="form-group">
							  	<label for="">Catagory:</label>
							  	
							    <select class="form-control" name="catagory">
							    	<?php

							    		for($i=0;$i<count($catagory['catagory']);$i++)
							    		{
							    			$id =$catagory['catagory'][$i]['id'];
							    			$name = $catagory['catagory'][$i]['name'];
							    			echo "<option value='$id'>$name</option>";
							    		}
							    	?>
							    	
								</select>

							  </div>
							
							  <input type="submit" class="btn btn-warning" name="submit">
						</form>
					</div><!--end of div-->

				</div><!--end of div-->
				<div class="col-md-4 padding-top-md">
					<?php  $error = $this->session->flashdata('error'); 
					if(!empty($error))
						{ echo "<div class='alert alert-success alert-dismissible ' >
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Success!</strong> $error.
							</div>";
						}
						?>
				</div>
				
			</div><!--end of row-->

			<div class="row">
				<div class="col-md-12 post-form  margin-bottom-md ">
					<h1 class="text-family padding-bottom-sm">Recent Posts:</h1>
					
					<div class="panel-group">
								<?php
									if(is_array($catagory['post'])){
						for($i=0;$i<count($catagory['post']);$i++)
						{
							$title = $catagory['post'][$i]['title'];
							$post_id = $catagory['post'][$i]['id'];
							$user_id = $catagory['post'][$i]['user_id'];
							$user_name = $catagory['post'][$i]['user_name'];
							$content = $catagory['post'][$i]['content'];
							$date = $catagory['post'][$i]['date'];

							

							 echo "	
							 	<div class='panel panel-default post '>
								<div class='panel-heading text-family' style='background-color:skyblue;'>
									<h3>$title</h3>
									<h5>User: $user_name</h5>
								</div>
								<div class='panel-body' style='color:black;'><p>
									$content
								</p>
								</div>
					  			<div class='panel-footer'>
					  				<div class='row'>
					  					<div class='col-md-4'>
					  				<ul class='list-unstyled list-inline' style='color:black;'>
					  				<li >Date & Time: $date</li>
					  				
						  			</ul>
						  				</div>
						  			
						  				<div class='col-md-4 col-md-offset-2'>
						  					<a class='btn btn-warning btn-block' href='".base_url().'main/comments/'.$post_id."'>Comments</a>

						  				</div>

						  			</div>
					  		</div>
							
							</div>";
						}


					}
					else
					{
						echo "<h3 class='text-family text-center'>{ No Posts yet } </h3>";
					}

					?>
				
					</div>
					<?php
					echo $this->pagination->create_links();

					?>
					
				</div><!--end of col-md-12-->
			</div><!--end of row-->


			</div><!--end of col-md-9-->


		</div><!--end of row-->

		<?php
			include('footer.php');
		?>
	