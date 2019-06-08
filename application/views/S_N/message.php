<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
</head>
<body>

	



		<div class="row bg-section">
			<div class="col-md-12">
					<h2 class="text-family">Messages:</h2>

				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#home">Sent</a></li>
				  <li><a data-toggle="tab" href="#menu1">Received</a></li>
				  
				</ul>

				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active">
				  	
				   			<?php  if(count($messages['sent']) > 0){  ?>

				   				<div class="row">
						  			<div class="col-md-4  padding-bottom-sm padding-top-sm">
						  				<label for="text">Search Message</label>
						  				
						  	  			<input class="form-control input-sm" id="myInput" type="text" placeholder="Search..">
						  			</div>
						  		</div>

				<table class="table tbale-responsive">
					<thead>

						<tr>

							<th>Receiver Name</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Date</th>
						
						
						</tr>
					</thead>
				<tbody id="myTable">

						<?php 

						
							for($i=0;$i<count($messages['sent']);$i++)
							{
								$id = $messages['sent'][$i]['id'];
								$sender_id = $messages['sent'][$i]['sender_id'];
								$sendername = $messages['sent'][$i]['sender_name'];
								$receiver_name = $messages['sent'][$i]['receiver_name'];
								$message = $messages['sent'][$i]['msg'];
								$msg_sub = $messages['sent'][$i]['msg_sub'];
								$sendername = $messages['sent'][$i]['sender_name'];
								$date = $messages['sent'][$i]['date']; 


								echo 
								"<tr>
							<td>$receiver_name</td>
							<td>$msg_sub</td>
							<td>$message</td>
							<td>$date</td>
							
						</tr>";
							}
						}
						else
						{
							echo "<h3 class='text-family text-center'>InboX is Empty</h3>";
						}

						?>
						
						
					</tbody>
				</table>
				  </div>
				  <div id="menu1" class="tab-pane fade">
				    		<?php  if(count($messages['received']) > 0){  ?>


				    			<div class="row">
						  			<div class="col-md-4  padding-bottom-sm padding-top-sm">
						  				<label for="text">Search Message</label>
						  				
						  	  			<input class="form-control input-sm" id="myInput2" type="text" placeholder="Search..">
						  			</div>
						  		</div>
				<table class="table tbale-responsive">
					<thead>
						<tr>

							<th>Sender Name</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Date</th>
						
							<th>Action</th>
						
						</tr>
					</thead>
						<tbody id="myTable2">
						<?php 

						
							for($i=0;$i<count($messages['received']);$i++)
							{
								$id = $messages['received'][$i]['id'];
								$sender_id = $messages['received'][$i]['sender_id'];
								$sendername = $messages['received'][$i]['sender_name'];
								$message = $messages['received'][$i]['msg'];
								$msg_sub = $messages['received'][$i]['msg_sub'];
								$sendername = $messages['received'][$i]['sender_name'];
								$date = $messages['received'][$i]['date']; 


								echo 
								"<tr>
							<td>$sendername</td>
							<td>$msg_sub</td>
							<td>$message</td>
							<td>$date</td>
							<td><a href='".base_url().'main/send_message/'.$sender_id."' class='btn btn-info' >Reply</a></td>
						</tr>";
							}
						}
						else
						{
							echo "<h3 class='text-family text-center'>InboX is Empty</h3>";
						}

						?>
						
						
					</tbody>
				</table>
				  </div>
				 
				</div>
				
				

			</div>


		</div><!--end of row-->


		<script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>


		<script>
			$(document).ready(function(){
			  $("#myInput2").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable2 tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>













	<?php include('footer.php');?>

</body>
</html>