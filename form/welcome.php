<?php

?>
<?php
//include'index.php';

require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
	<link rel="stylesheet" href="css/usersidebar.css">
</head>
<body>

<?php include('navbar.php');?>

	

	
<div class="container" style="backgroud:#CD232D ;">
 <div class="page-header">
	  <a class="navbar" style="color:#FFFFFF" href="#">Hello <?php echo"ShamolDas" ?></a>
        
    </div>
</div>
	
	
<div class="container" style="backgroud:#CD232D ;">
    <div class="row">
		<div class="col-md-3" >
		
			<div class="sidenav">

					<div class="list-group">
			
					   
						<a href="welcome.php" class="list-group-item list-group-item-action"><i class="glyphicon glyphicon-home"></i>
							Overview </a>
						<a href="welcome.php?page=blogpost" class="list-group-item list-group-item-action">BlogPost</a>
						<a href="welcome.php" class="list-group-item list-group-item-action">MyBlogPost</a>
						<a href="welcome.php"  class="list-group-item list-group-item-action">Profile</a>
						<a href="#" class="list-group-item list-group-item-action">Settings</a>
						<a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
			  


				
			  
					</div>
					
			</div>
		</div>
		
		<!--
			<div class="profile-sidebar">
		
				
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="userblogpost.php?page=userblogpost">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="welcome.php?page=profile">
							<i class="glyphicon glyphicon-user"></i>
							Profile </a>
						</li>
						<li>
							<a href="welcome.php?page=profile_update">
							<i class="glyphicon glyphicon-user"></i>
							Profile Update </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						
						<li>
							<a href="welcome.php?page=blogpost">
							<i class="glyphicon glyphicon-user"></i>
							Blog Post </a>
						</li>
						<li>
							<a href="welcome.php?page=myblogpost">
							<i class="glyphicon glyphicon-user"></i>
							My Blog Post </a>
						</li>
						
						<li>
							<a href="dashboard.php">
							<i class="glyphicon glyphicon-user"></i>
							Dashboard </a>
						</li>
						
						<li>
							<a href="practices.php" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks Practices </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
						
						
						
						<li>
							<a href="logout.php">
							<i class="glyphicon glyphicon-flag"></i>
							Logout </a>
						</li>
					</ul>
				</div>
				-->
				<!-- END MENU -->
		
				<div class="col-md-9">
					  <!-- container-->
					  <?php 
						@$page=  $_GET['page'];
					  if($page!="")
					  {
						if($page=="blogpost")
						{
							include('blogpost.php');
						
						}
						elseif($page=="profile")
						{
							include('profile.php');
						}
						elseif($page=="userblogpost")
						{
							include('userprofile.php');
						}
						elseif($page=="profile_update")
						{
							include('profile_update.php');
						}
						elseif($page=="myblogpost")
						{
							include('myblogpost.php');
						}
						else
						{
							include('default.php');
						}
					  }
					  
					 
						
					?>
						
				</div>
		
	</div>

</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>













<center>
<strong>Powered by <a href="http://shamoldastk.000webhost.com" target="_blank">ShamolDas</a></strong>
</center>
<br>
<br>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>