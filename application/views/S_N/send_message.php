<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


			<div class="row bg-section padding-bottom-lg">

					<div class="col-md-6">
						<div class="post-form padding-bottom-sm">
				<h3 class="text-family ">Send a Message:</h3>

					<?php

					//receiver data 
					
								for($i=0;$i<count($results['receiver_data']);$i++)
								{
									$receiver_name = $results['receiver_data'][$i]['fname'];
									$receiver_id = $results['receiver_data'][$i]['id'];
									$member_since = $results['receiver_data'][$i]['reg_date'];
									$login = $results['receiver_data'][$i]['last_login'];
									$image = $results['receiver_data'][$i]['image'];
									
									
									$last_login  = timespan($login,date('h:i:sa'));
									
								}


								//sender data

								for($i=0;$i<count($results['receiver_data']);$i++)
								{
									$name = $results['sender_data'][$i]['fname'];
									$id = $results['sender_data'][$i]['id'];
								}



							?>


						<form action="<?php echo base_url();?>main/send" method="post">
							  <div class="form-group">
						
							    <input type="text" class="form-control" id="email" name="title" placeholder="Message Subject">
							    <span style="color:red;"><?php if(form_error('title') != ''){ echo form_error('title');}?></span>

							    <input type="hidden" name="receiver_id" value="<?php echo $receiver_id;?> ">
							    <input type="hidden" name="receiver_name" value="<?php echo $receiver_name;?> ">
							    <input type="hidden" name="sender_name" value="<?php echo $name;?> ">
							    <input type="hidden" name="sender_id" value="<?php echo $id;?> ">
							  </div>
							  <div class="form-group">
							    
							 <textarea name="message" class="form-control" rows="5" cols="20" placeholder="Message"></textarea>
							 <span style="color:red;"><?php if(!empty(form_error('message'))){ echo form_error('message');}?></span>
							  </div>
							  
							
							  <input type="submit" class="btn btn-success" name="submit">
						</form>
					</div><!--end of div-->

					</div><!--end of col-md-6-->


					<div class="col-md-3 col-md-offset-1 message_profile">
						<h3 class="text-family ">Profile</h3>

						<img src="<?php echo base_url();?>theme/images/<?php echo $image;?>" class="img-responsive img-circle" width="200px" height="298px" alt="">

							<div class="infoo">
						<ul class="list-unstyled">
							<li>Name: &nbsp<?php echo $receiver_name;?></li>
							<li>Member Since: &nbsp<?php echo $member_since;?></li>
							<li>Last Login: &nbsp<?php echo $last_login;?></li>
						</ul>

					</div>

				</div>
		</div><!--end of row-->



	<?php
		include('footer.php');
	?>


</body>
</html>