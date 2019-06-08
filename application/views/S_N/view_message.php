<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	

	<div class="row">
		<div class="col-md-6 padding-top-sm">
			<h2 class="text-family">Message:</h2>
			<div class="panel panel-info">
				<div class="panel-heading">
						<h3 class="text-family">Subject:</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do e</p>

				</div>
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-4">
						Date: <?php echo date("d/m/y");?>
					</div>
					<div class="col-md-4 col-md-offset-4">
						<a href="<?php echo base_url();?>index.php/main/send_message" class="btn btn-info btn-block" title="">Reply</a>
					</div>
				</div>

				</div>


			</div>



		</div>



	</div>



	<?php include('footer.php');?>

</body>
</html>