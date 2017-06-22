<?php 
session_start(); 
ob_start();
include_once("includes/db-connection.php");
 
if(isset($_GET['id'])){
$id =$_GET['id'];	
$getinfo = mysql_query("select * from schools where id='$id'");
$data = mysql_fetch_array($getinfo);
}
 
 
 
if(isset($_POST['addinfo'])){
$id=$data['id'];
$gender=$_POST['gender'];
$name=$_POST['fname']." ".$_POST['sname'];
$location=$_POST['location'];
$dob=$_POST['dob'];
$role=$_POST['role'];
$school_id=$_POST['school_id'];
$position=$_POST['position'];
$password=sha1($_POST['password']);
$email	=$_POST['email'];
$add = mysql_query("INSERT INTO people(school_id, name, position, dob, sex, location, email, verified, password, role)VALUES ('$id', '$name', '$position', '$dob', '$gender', '$location' ,'$email', 'YES', '$password', '$role')");
if($add){
	header("Location: admin-home.php");
	exit();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/skoolynk.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<style>
			#knowuform{margin:10px auto; width:900px; padding:0px;}
			#welcome5{ background:#eef; padding:10px; border-radius:0px;}
			#welcome7{padding:10px; border-radius:0px;}
		</style>
	</head>
	<body>
<nav class="navbar navbar-fixed-top" role="navigation" id="header">
	<div style="width:80%; margin:auto;">
   <div class="navbar-header">
      <a class="navbar-brand" href="index.php" title="skoolynk"><img src="images/skoolynks.png" height="28"/></a>
   </div>
   <div>
      <form class="navbar-form navbar-left" autocomplete="off" role="search" >
            <input type="text" id="name"  placeholder="search school, by name, location , motto, ..."  class="form-control"/>
			<div id="results"></div>
      </form>
		<ul class="nav navbar-nav navbar-right">
			<li><a id="top-link" href="index.php">Home</td></tr>
			<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</td></tr>
			<li><a id="top-link" href="about-skoolynk.php">About skoolynk</td></tr>
			<li><a href="signup.php" id="top-link"><button class="btn btn-default" style="font-size:12px; font-weight:bold; color:purple;border-radius:2px; margin:0px; padding-top:7px; line-height:7px;">Create account</button></a></td></tr>
		</ul>
   </div>
   </div>
</nav>
<div class="container"  id="container">
   <div class="thumbnail" id="knowuform">
      <div class="row">
	      <div class="col-md-5" style="padding-right:0px;">
			  <div class="thumbnail" id="welcome5">
			  <h3>Thank you joing skoolynk!</h3><hr/>
			    <img src="images/badges100/smile.png"/>
			<hr/>
			<table class="table">
			   <caption>Basic Information you have added to skoolynk</caption>
			   <tbody>
				<tr><td>Name</td><td><?php echo ucfirst($data['name']); ?></td></tr>
				<tr><td>Motto</td><td><?php  echo ucfirst($data['motto']); ?></td></tr>
				<tr><td>Location</td><td><?php echo ucfirst($data['district'])." , ".ucfirst($data['location']); ?></td></tr>
				<tr><td>Website</td><td><?php echo $data['website']; ?></td></tr>
				<tr><td>Email</td><td><?php echo $data['email']; ?></td></tr>
				<tr><td>Opened</td><td><?php echo $data['opened']; ?></td></tr>
			   </tbody>
			</table><hr/>
			you will edit whtas missing
		 </div>
		  </div>
	      <div class="col-md-7" style="padding-left:0px;">
		    <div class="thumbnail" id="welcome7">
				<h4>please let us know who you are by filling the form below.</h4>
				<hr/>
				    <form action="" method="post">
					<div class="rows">
						<div class="col-md-6" style="padding:0px;">
							<input class="form-control" type="text" name="fname" placeholder="First name"/>
						</div>
						<div class="col-md-6" style="padding-left:3px; padding-right:0px;">
							<input class="form-control" type="text" name="sname" placeholder="Surname"/>
						</div>
					</div>
					<div id="free-10"></div>
				    <label>Email address</td><td></label>									
				    <div class="input-group">
					<span class="input-group-btn">
						<a name="search" class="btn btn-info disabled" style="border-right:none; padding-bottom:9px; width:40px; padding-top:9px;"><i class="fa fa-envelope"></i></a>
					</span>
				   <input type="text" required name="email"  placeholder="Enter email address..." class="form-control"/>
				   </div><div id="free-10"></div>
				   <label>craete a password</td><td></label>
				   <div class="input-group">
					<span class="input-group-btn">
						<a name="search" class="btn btn-success disabled" style="border-right:none; padding-bottom:9px;width:40px; padding-top:9px;"><i class="fa fa-lock"></i></a>
					</span>
					<input type="password" required name="password" placeholder="Enter password.." class="form-control"/> 
					</div>
					<div id="free-10"></div>
					<div class="rows">
					<div class="col-md-6" style="padding:0px;">
						<select name="position" class="btn btn-default form-control">
							<option value="admin">Administrator</option>
						</select>
					</div>
					<div class="col-md-6" style="padding:0px;">
						<select name="school_id" class="form-control" style="border-left:none;">
							<option style='color:#286090;' value="<?php echo $id; ?>"><?php echo $data['name']; ?></option>
						</select>
					</div>
					</div>
					<div id="free-10"></div>
					<select name="role" class="form-control">
							<option value="">whats your role at <?php echo $data['name']; ?>?</option>
							<option value="Headmaster">Headmaster</option>
							<option value="D.O.S">D.O.S</option>
							<option value="Bursur">Bursur</option>
							<option value="Deputy Head Teacher">Deputy Head Teacher</option>
					</select>
					<div id="free-10"></div>
				    <label>Birth Date</td><td></label>
					<div class="rows">
					<div class="col-md-12" style="padding:0px;">
						<input class="form-control" type="date" name="dob" placeholder="Birth Date"/>
					</div>
					</div>
					<div id="free-10"></div>
				    <label>Location <i>(like this</td><td>district , ciyt)</i></label> 
					<div class="rows">
					<div class="col-md-12" style="padding:0px;">
						<input class="form-control" type="text" name="location" placeholder="Kampala, kawempe"/>
					</div>
					</div>
					<div id="free-10"></div>
					<div class="rows">
					<div class="col-md-3" style="padding:0px;">
						<input type="radio" name="gender" value="male"/> Male 
					</div>
					<div class="col-md-9" style="padding:0px;">
						<input type="radio" name="gender" value="female"/> Female
					</div>
					</div>
					<div id="free-10"></div>
					<input type="submit" name="addinfo" class="btn btn-primary" value="Add information" id="admin-login"/><br/>
			</form>
			</div>
		  </div>
	   </div>
   </div>
</div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/simple_search.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>