<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		
			<div class="row bg-section">

				<div class="col-md-3  col-sm-3 col-xs-12 profile-div margin-bottom-md  ">
				<h3 class="text-center padding-top-sm">Profile</h3>


						<?php 
					for($i=0;$i<count($details['user']);$i++)
					{
						$id = $details['user'][$i]['id'];
						$fname = $details['user'][$i]['fname'];
						
						$login = $details['user'][$i]['last_login'];
						$country = $details['user'][$i]['country'];
						$reg = $details['user'][$i]['reg_date'];
						$now = date('h:i:sa');
						$image = $details['user'][$i]['image'];

							
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
							<li>Active:<span style="padding-left: 10px;"><?php   echo timespan($login,$now)." ago"; ?></span></li>
							<li>Member Since:<span style="padding-left: 10px;"><?php echo $reg;?></span></li>
						</ul>
						<br>
						
					</div><!--end of col-->
					</div><!--end for row-->

			</div><!--end of div-->

			<div class="col-md-9">
				<div class="row">
				<div class="col-md-12 post-form  margin-bottom-md ">
					<h1 class="text-family padding-bottom-sm">User Recent Posts:</h1>
					<div class="panel-group ">
										<?php

										if(is_array($details['post'])){
						for($i=0;$i<count($details['post']);$i++)
						{
							$title = $details['post'][$i]['title'];
							$post_id = $details['post'][$i]['id'];
							$user_id = $details['post'][$i]['user_id'];
							$user_name = $details['post'][$i]['user_name'];
							$content = $details['post'][$i]['content'];
							$date = $details['post'][$i]['date'];

							

							 echo "	
							 	<div class='panel panel-default post' >
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
					  				<li>Date & Time: $date</li>
					  				
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
						echo "<h3 class='text-family text-center'>:No Post Yet:</h3>";
					}

					?>							
					</div><!--end of panel group-->
				
				</div><!--end of col-md-12-->
			</div><!--end of row-->


			</div>

			</div><!--end of row-->







		<?php include("footer.php");?>
</body>
</html>