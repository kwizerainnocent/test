<?php 
session_start();
include_once("includes/db-connection.php");
if(isset($_SESSION['teacher_id'])){
	$id = $_SESSION['teacher_id'];
	$getuserinfo = mysql_query("SELECT * FROM `people` WHERE id='{$id}'");
	$data = mysql_fetch_array($getuserinfo);	
}else{
	header("Location: index.php"); 
	exit();
} 

echo $_SESSION['teacher_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/skoolynk.css" rel="stylesheet"/>
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
	</head>
	<body>
<div class="container"  id="container">
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid" style="width:80%; margin:0 auto;">
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><img src="images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <form class="navbar-form navbar-left" autocomplete="off" role="search" >
			<input type="text" id="name"  placeholder="Search teachers, students, events and more..."  class="form-control"/>
			<div id="results"></div>
		  </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="administration.php">Hi,seeta high school main campus</a></li>
				<li><a id="top-link" href="notifications.php">
				<span class="badge" style="background:red;">
					none				</span> Notifications</a></li>
				
				
				<li class="dropdown">
            <a href="#" class="dropdown-toggle"id="top-link" data-toggle="dropdown">
               <i class="fa fa-gear"></i> Settings <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="admin-school.php">Profile</a></li>
               <li><a href="admin-settings.php">Settings</a></li>
               <li><a href="admin-help.php">Help</a></li>
               <li class="divider"></li>
               <li><a href="admin-logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
            </ul>
         </li>
				</ul>
	   </div>
	   </div>
	</nav>	
  <div class="rows" id="main-rows">
<div class="col-md-3 col-sm-3 col-xs-12" style="background:none; border:1px solid #ddd; padding:0px; border:none;">
    <div class="thumbnail" style="border-radius:0px;padding:10px;font-weight:bold;background:rgba(40,96,144,.6); color:#fff; margin-bottom:2px; box-shadow:none;">
	DASHBOARD
	</div>
    <div class="thumbnail" style="border-radius:0px;padding:10px;font-weight:bold; color:#286090; margin-bottom:2px; box-shadow:none;">
		<div class="media">
			<a class="pull-left" href="#">
				<img src="images/userpro/def.png" class="img-circle img-responsive" style="height:40px; width:40px;"/>					
			</a>
			<div class="media-body">
				<h5 style="margin-top:2px; margin-bottom:2px;">KATEX VAX</h5>
				<font>Headmaster</font>
			</div>
		</div>
	</div>
     <div class="thumbnail" id="side-thumb" style="padding-top:10px; margin-bottom:5px; border-radius:0px;">
        <ul class="nav">
		<style>
		#active{text-transform:uppercase; background:#eee;}
		</style>
			            <li id="active"><a href="administration.php"><i class="fa fa-home"></i>Home</a></li>
			<li ><a href="admin-school.php"><i class="fa fa-user"></i>school information</a></li>
			<li ><a href="admin-academics.php"><i class="fa fa-book"></i>Academics</a></li>
			<li ><a href="admin-events.php"><i class="fa fa-pencil-square"></i>Events and holidays</b></a></li>
			<li ><a href="admin-teachers.php"> <i class="fa fa-group"></i>Staff directory</a></li>
			<li ><a href="admin-admission.php"><i class="fa fa-upload"></i>Admissions </a></li>
			<li><a href="admin-logout.php"><i class="fa fa-sign-out" id="fa-sign-out"></i><font color="#222">Logout</font></a></li>
		</ul>
	</div>
    <div class="thumbnail" style="padding:10px; border-radius:0px; height:200px; clear:both;">
					<h5>School profile completeness.</h5><hr style="margin-bottom:8px;"/>
					<label>School profile 32% <a href="admin-school.php?imcomplete">complete</a></label>
					<div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-primary" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 32%; height:10px;">
					   </div>
					</div>
					<label>Page Details 0%<a href="admin-statistics">complete</a></label>
					<div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-success" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 0%; height:10px;">
					   </div>
					</div>
				</div>
	</div><div class="col-md-9 col-sm-9 col-xs-12" style="padding-left:2px;">
	<div class="thumbnail" style="border-radius:0px; padding:10px; font-weight:bold;background:rgba(40,96,144,.6); color:#fff; margin-bottom:2px; box-shadow:none;">
		Welcome to Seeta high school main campus <font style="float:right;">Sun, 10 Jan 2016 09:38:37 +0100</font>
	</div>	
	<div class="thumbnail" style="border-radius:0px; padding:5px; background:#fff; margin-bottom:2px; box-shadow:none;">
	<div class="row">
         <div class="col-md-3 col-sm-6 col-xs-6">
				<div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
				   <a class="pull-left" href="#">
					  <i class="fa fa-flag" style="font-size:35px; padding:0;"></i>
				   </a>
				   <div class="media-body">
					  <h3 style="display:inline; ">
					  13					  </h3><br/>
					  <b>visitors / views</b>
				   </div>
				   <font style="color:#777;">Shows the visitors to your page</font><br/><font color="blue">1.3%</font>...
				   <div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-primary" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 1.3%; height:10px;">
					   </div>
					</div>
				</div>
			</div>
         <div class="col-md-3 col-sm-6 col-xs-6">
				<div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
				   <a class="pull-left" href="#">
					  <i class="fa fa-users" style="font-size:35px; padding:0; color:#3c763d; "></i>
				   </a>
				   <div class="media-body">
					  <h3 style="display:inline;">
					    2					  </h3><br/>
					  <b>All users</b>
				   </div>
				   <font style="color:#777;">Shows users like teachers and students <font color="blue">2%</font>...</font>
				   <div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-success" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 2%; height:10px;">
					   </div>
					</div>
				</div>
			</div>
         <div class="col-md-3 col-sm-6 col-xs-6">
				<div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
				   <a class="pull-left" href="#">
					  <i class="fa fa-folder-open" style="font-size:35px; padding:0; color:#8a6d3b;"></i>
				   </a>
				   <div class="media-body">
					  <h3 style="display:inline; ">
					  0</h3><br/>
					  <b>files shared</b>
				   </div>
				   <font style="color:#777;">These files include notes, posts, pictures etc <font color="blue">0%</font>....</font>
				   <div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-warning" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 0%; height:10px;">
					   </div>
					</div>
				</div>
			</div>
         <div class="col-md-3 col-sm-6 col-xs-6">
				<div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
				   <a class="pull-left" href="#">
					  <i class="fa fa-line-chart" style="font-size:35px; padding:0; color:#337ab7;"></i>
				   </a>
				   <div class="media-body">
					  <h3 style="display:inline;">2</h3><br/>
					  					  <b>Page ranking</b>
				   </div>
				   <font style="color:#777;">Shows how your page is performing <font color="blue">0.2%</font>.... </font>
				   <div class="progress progress-striped" style="height:10px;">
					   <div class="progress-bar progress-bar-primary" role="progressbar" 
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 	
						  style="width: 0.2%; height:10px;">
					   </div>
					</div>
				</div>
			</div>
    </div>
	</div>
	<div class="thumbnail" style="border-radius:0px; border:none; background:none; margin-bottom:2px; box-shadow:none;">
		<div class="row">
				<div class="col-md-7" style="padding-right:2px;">
						<div class="row"> 
							<div class="col-md-6 col-sm-6 col-xs-6" >
								<div class="thumbnail" style="margin-bottom:5px;">
									<div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
									   <a class="pull-left" href="#">
										  <i class="fa fa-calendar" style="font-size:30px; padding:0; color:#337ab7;"></i></a>
									   <div class="media-body">
										  <h4 style="display:inline;">10</h4><sup>th</sup><br/>
										  <b>Sunday</b><br/>
										  <b>January-2016</b>
									   </div>
									 </div> 
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="thumbnail" style="margin-bottom:5px;">
								  <div class="media" style="background:#fff; padding:10px; border-radius:2px; color:#000;">
									   <a class="pull-left" href="#">
											<i class="fa fa-calendar" style="font-size:30px; padding:0; color:#337ab7;"></i>
									   </a>
									   <div class="media-body">
										  <h4 style="display:inline;">01-Jan</h4><br/>
										  <b>Next event</b><br/>
										  <b><a href="admin-events.php"></a></b>
									   </div>
									 </div> 
								</div>
							</div>
						</div>
						<div class="thumbnail" style="margin:0px;">
							<form method="post">
									<textarea class="form-control" id="input-box" name="post" rows="2" placeholder="Post something on your school" style="background:none; border:none; box-shadow:none; font-size:13px; margin-bottom:10px;"></textarea>
																		<hr style="margin-top:0px; margin-bottom:5px; border:2px solid #eee;"/>
									<div class="row" >
										<div class="col-md-4">
											<p><b>Whats in school today?..</b></p>
										</div>
										<div class="col-md-4">
											<a href="#postPhoto" role="button" data-toggle="modal">
												<b><i class="fa fa-image"></i> Add / share photos</b>
											</a>
										</div>
										<div class="col-md-4">
											<input type="submit"  name="send-post" value="update school status" class="btn btn-primary" style=" float:right; border-radius:0px; font-size:12px; line-height:10px;"/>
										</div>
									</div>
							</form>
						</div>
				<div class="thumbnail" style="margin:2px auto; background:midnightblue; color:white;">Most recent posts from school</div>
								</div>
				<div class="col-md-5" style="padding-left:2px;">
				<div class="panel panel-primary" style="border:none;">
					<div class="panel-heading" style="border-radius:0px;">Approve Teachers</div>
					<div class="panel-body">
						<h3 class="panel-title">List of exiting teachers..</h3>
					</div>
					<table class="table">
					No teachers here					</table>
					
					<div class="panel-footer">
					your list is empty					</div>
					</div>
					<div class="panel panel-danger">
					<div class="panel-heading">Students admission</div>
					<div class="panel-body">
						<h3 class="panel-title">List of exiting students..</h3>
					</div>
					<table class="table">
					<tr><td><a>No requests</a></td></tr>					</table>
					<div class="panel-footer"><a href="admin-admission.php">Check out admission list</a></div>
					</div>				
					<div class="panel panel-default">
					   <div class="panel-heading">newsletter subscriptions</div>
						  <div class="panel-body">
							 <p>0  Subscribers </p>
					   </div>
					   <ul class="list-group">
						  					   </ul>
					</div>
				</div>
		</div>	
	</div>
<div id="postPhoto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color:royalblue;"><img src="images/skoolynk.png" style="height:30px;" alt="skoolynk ads"/></h4>
            </div>
            <div class="modal-body">
				<h5 style="color:#286090; font-weight:bold;">Add or share photo</h5>
					<form method="post" enctype="multipart/form-data">
						<div class="input-group">
							<input type="file"  name="file" class="form-control" style="border-radius:0px;"/>
							<span class="input-group-btn">
								<input type="submit" name="postPhoto" class="btn btn-info" style="border-radius:0px; font-size:12px; line-height:20px;" value="upload photo">
							</span>
						</div>	
					</form>
				<br/>
            </div>
            <div class="modal-footer">
                <h6 style="color:#888; font-size:11px;">&copy skoolynk 2015 All rights reserved</h6>
            </div>
        </div>
    </div>
</div>
	<footer>
		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="widget-body">
							<p class="simplenav">
								<a href="http://www.xaexia.com" id="bottom-link" title="developers">Developers</a> |
								<a href="about-skoolynk.php" id="bottom-link">Contact</a> |
								<a href="help-and-support.php" id="bottom-link">Help</a> |
								<a href="terms-and-conditions.php" id="bottom-link">Terms and Condition/ Disclaimer</a> |
								<a href="privacypolicy.php" id="bottom-link">Privacy policy</a> |
								<a href="site map" id="bottom-link">Site map</a> |
								<b><a href="signup.php" id="bottom-link">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6">
						<div class="widget-body">
							<p>
								Copyright &copy; 2016 skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com/" target="_blank" title="xaexia"><font color="#fff">XAEXIA</font></a>
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/simple_search.js"></script>
<script src="js/register.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/activeLink.js"></script>
</body>
</html>