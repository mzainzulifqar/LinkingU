<!DOCTYPE html>
<html>
<head>


	<title>Comments</title>
</head>
<body>
		
		<!--write your code  after h2 tag-->
		<div class="row bg-section">
			<div class="col-md-12">
					<h2 class="text-family padding-left-md">Posts</h2>

						<div class="panel panel-default post">
								<?php
							for($i=0;$i<count($details['post']);$i++)
							{
									$title = $details['post'][$i]['title'];
									$post_id = $details['post'][$i]['id'];
									$user_id = $details['post'][$i]['user_id'];
									$user_name = $details['post'][$i]['user_name'];
									$content = $details['post'][$i]['content'];
									$date = $details['post'][$i]['date'];

									 echo "	
							 
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
						  			
						  				

						  			</div>
					  		
							
							</div>";
							}

						?>	
							
						</div>

				<div class="row">
					<h2 class="text-family padding-left-md">Comments</h2>

					<div class="col-md-8 col-md-offset-1 margin-bottom-md padding-top-sm">
							
							<?php
								for($i=0;$i<count($details['user']);$i++)
								{
									$login_user_id = $details['user'][$i]['id'];
									$login_user_name = $details['user'][$i]['fname'];
									$image = $details['user'][$i]['image'];
								}

							?>

							<?php

							if(is_array($details['comment'])){
								for($i=0;$i<count($details['comment']);$i++)
								{
									$comment_auther = $details['comment'][$i]['comment_auther'];
									$date = $details['comment'][$i]['date'];
									$id = $details['comment'][$i]['id'];
									$user_id = $details['comment'][$i]['user_id'];
									$comment = $details['comment'][$i]['comment'];


									echo "<div class='media bg-default' style=''>
							  	<div class='media-left'>
							    	<img src=".base_url().'theme/images/default.jpg'." class='img-circle' style='width:60px;height:60px;'\>

							  	</div>

							  <div class='media-body' style='padding-top:10px;'>
							    <h4 class='media-heading' style='color:white;'> $comment_auther <small><i style='color:white;'> Posted on  Time $date</i></small></h4>
							    <p style='color:white;'>$comment</p>
							    <a href='".base_url().'main/delete_comment/'.$id.'/'.$user_id.'/'.$post_id."'>Delete</a>
							  </div>

							</div>";
								}

								
							}
							else
							{
								echo "<h3 class='text-family'>{ No Comments Yet}</h3>";
							}

							?>
							
							
							

						
					</div><!--end of col-md-12-->

					<div class="col-md-3">
						<?php
						 $error = $this->session->flashdata('error');
						 $success = $this->session->flashdata('success');
						if(!empty($error))
								
								{
									echo "<div class='alert' style='background-color:red;'>";
										echo 	$error;	
									echo "</div>";
								}
						if(!empty($success))
								
								{
									echo "<div class='alert alert-success'>";
										echo 	$success;	
									echo "</div>";
								}

						?>
						
					</div>
				</div><!--end of row-->

				<div class="row margin-bottom-md">
					<div class="col-md-6 col-md-offset-2">
						<form action="<?php echo base_url();?>main/add_comment" method="post">

							  <div class="form-group">
							    <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
							    <input type="hidden" name="login_user_id" value="<?php echo $login_user_id;?>">
							    <input type="hidden" name="login_user_name" value="<?php echo $login_user_name;?>">
							   <textarea name="comment" class="form-control" rows="5" cols="20" placeholder="Comments"></textarea>
							   <span style="color:red;"><?php if(form_error('comment') != ''){ echo form_error('comment');}?></span>
							  </div>
							  
							  <button type="submit" class="btn btn-success">Comment</button>
						</form>
							
							
						</form>

					</div>

				</div>


			</div><!--end of col-md-12-->


		</div><!--end of row-->







		<?php include('footer.php');

		?>
</body>
</html>