


		<div class="row bg-section padding-bottom-sm">
			<div class="col-md-12">


				<h2 class="text-family margin-bottom-md padding-top-sm">Members:</h2>
				<div class="row ">
						<?php
						if(is_array($members)){
						for($i=0;$i<count($members);$i++)
						{
							$name = $members[$i]['fname'];
							$id = $members[$i]['id'];
							$about_yourself = $members[$i]['about_yourself'];
							$image = $members[$i]['image'];

							echo "<div class='col-md-3 col-sm-3  col-xs-12 padding-bottom-sm profile-card' style='margin-bottom:80px;max-height:400px;'>
						<img src='".base_url().'theme/images/'.$image."' class='' alt=''>
						<h3 class='text-center text-family'>$name</h3>
						<p>$about_yourself </p>
						<div class='row'>
							<div class='col-md-12 col-sm-12'>
								<a href='". base_url().'main/view_profile/'.$id."' class='btn btn-primary btn-block'>View Profile</a>
								<a href='". base_url().'main/send_message/'.$id."' class='btn btn-success btn-block' >Send Message</a>
								
							</div>
							
						</div><!--end of row-->


					</div>";
						}
					}
					else
					{
						echo "<h3 class='text-family text-center'>{ No Members Registered Yet }</h3>";
					}

				?>


				</div><!--end of row-->

				<div class="row">
					<div class="col-md-4 col-md-offset-8">
					<?php
					 echo $this->pagination->create_links();

					?>
				</div>
				</div>
			</div><!--end of col-12-->
		</div><!--end of row-->


	
		<?php
			include('footer.php');
		?>

		
