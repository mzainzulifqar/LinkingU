<!doctype html>
<html>
<title>Wall</title>
</html>
			
<!--section--->


		

		<div class="row bg-section ">
			

		<div class="col-md-12">
			<div class="row">
				
				
				
			</div><!--end of row-->

			<div class="row">
				<div class="col-md-8 col-md-offset-2 post-form  margin-bottom-md ">
					
					
					<div class="panel-group">
								<?php
									if(is_array($catagory)){
						for($i=0;$i<count($catagory);$i++)
						{
							$title = $catagory[$i]['title'];
							$post_id = $catagory[$i]['id'];
							$user_id = $catagory[$i]['user_id'];
							$user_name = $catagory[$i]['user_name'];
							$content = $catagory[$i]['content'];
							$date = $catagory[$i]['date'];

							

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
				
					
				</div><!--end of col-md-12-->
			</div><!--end of row-->


			</div><!--end of col-md-9-->


		</div><!--end of row-->

		<?php
			include('footer.php');
		?>
	