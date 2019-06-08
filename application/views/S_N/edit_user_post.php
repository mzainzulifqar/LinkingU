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
				<div class="col-md-6 col-md-offset-2 post-form  margin-bottom-md ">
					<h3 class="text-family">Edit Post:</h3>


					
					
					<div class="panel-group">
						 		<?php
						 			if(is_array($details)){
						 				echo "<table class='table table-responsive'>

						 				<tr>
						 				<th>Title</th>
						 				<th>Content</th>
						 				<th>Delete</th>
						 				</tr>




						 				";


						 for($i=0;$i<count($details);$i++)
						{
							 $title = $details[$i]['title'];
							 $post_id = $details[$i]['id'];
							 $user_id = $details[$i]['user_id'];
							 $user_name = $details[$i]['user_name'];
							 $content = $details[$i]['content'];
							 $date = $details[$i]['date'];

							 	 echo "<tr>
							 	 		<td>$title</td>
							 	 		<td>$title</td>
							 	 		<td><a class='btn btn-danger' href='".base_url().'main/delete_post/'.$post_id.'/'.$user_id."'>Delete</a></td>



							 	 </tr>

							 	 ";
							

							
							
						}

						echo "</table>";

					}
					else
					{
						echo "<h3 class='text-family text-center'>{ No Posts yet } </h3>";
					}

					?> 
				
					</div>
				
					
				</div><!--end of col-md-12-->
				<div class="col-md-3 padding-top-md">
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


			</div><!--end of col-md-9-->


		</div><!--end of row-->

		<?php
			include('footer.php');
		?>
	