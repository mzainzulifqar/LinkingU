<!DOCTYPE html>
<html>
<head>

		<!-- Latest compiled and minified CSS -->

		<meta name="viewport" content="width=device-width, initial-scale=1">
		
<link rel="stylesheet" href="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/css/bootstrap.min.css">

<link rel="icon" type="image/png" href="<?php echo base_url();?>theme/login_page/images/icons/icons8-user-account-48.png"/>

<!-- jQuery library -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/jquery-3.3.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo base_url();?>theme/bootstrap-3.3.7-dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/style/custom.css">

<script src="js/custom.js" type="text/javascript" charset="utf-8" async defer></script>

<!--fonts-->
<!-- <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">


	<title></title>
</head>

<body>
	
	<div class="container-fluid">
		<div class="row ">
				<?php 

					for($i=0;$i<count($user);$i++)
					{
						$id = $user[$i]['id'];
						// $fname = $catagory['user'][$i]['fname'];
						
						// $login = $catagory['user'][$i]['last_login'];
						// $country = $catagory['user'][$i]['country'];
						// $reg = $catagory['user'][$i]['reg_date'];
						// $now = date('h:i:sa');

					}
				?>
				<nav class="navbar navbar-inverse">
				  
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span> 
				      </button>
				      <a class="navbar-brand text-family" href="<?php echo base_url();?>main/wall"><h3 style="padding:0px;margin:0px;line-height: 30px;">Linking U</h3></a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li><a href="<?php echo base_url();?>main/wall">Home</a></li>

				        <li><a href="<?php echo base_url();?>main/members">Members</a></li> 
				       				      </ul>
				      <form class="navbar-form navbar-left"  action="<?php echo base_url();?>main/search_result">
						  <div class="form-group" >
						    <input type="text" class="form-control" name="search" placeholder="Search">
						    <div class="input-group-btn">
						      
						    </div>
						  </div>
						</form>
						
				      <ul class="nav navbar-nav navbar-right">
				      	 <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
					       <span class="glyphicon glyphicon-user"></a>
					        <ul class="dropdown-menu">
					          <li><a href="<?php echo base_url();?>main/edit_account">Edit Account Settings</a></li>
					          
					         
					        </ul>
					     </li>
				      	
				        <li><a href="<?php echo base_url();?>main/logout"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
				      </ul>
				    </div>
				
				</nav>
				
				</div><!--end of row-->