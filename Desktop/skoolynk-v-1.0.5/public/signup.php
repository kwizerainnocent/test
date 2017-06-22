<?php  
	session_start();
    include_once("../classes/DbClass.php");
    include_once("../classes/Mailer.php");
	$db = new DbClass();
	$mail = new Mailer();
	$db->connect();
	$districts = $db->select("districts", "id!='0' order by district aSC"); 
	$error = "";
	if(isset($_POST['signup'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$name = mysql_real_escape_string($_POST['name']);
		$motto = mysql_real_escape_string($_POST['motto']);
		$ownership = mysql_real_escape_string($_POST['ownership']);
		$location = mysql_real_escape_string($_POST['location']);
		$district = mysql_real_escape_string($_POST['district']);
		$email = mysql_real_escape_string($_POST['email']);
		$opened = mysql_real_escape_string($_POST['opened']);
		$codeGen = sha1(time());
		$code = substr($codeGen, 0, 7);
		$data = array("ipadress"=>$ip, "name"=>$name, "motto"=>$motto , "ownership"=>$ownership, "location"=>$location,
					"district"=>$district, "email"=>$email, "code"=>$code, "opened"=>$opened);
		if($db->insert($data, "schools"))
		{
			$mail->sendMail($email, $code);
			$_SESSION['skoolynk_admin'] = serialize($data);
			header("Location:activate-account-now.php");
			exit();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>	<link rel="shortcut icon" href="../images/title.png"/>
		<title>Sign up with skoolynk, manage schools, search high schools, interact with students, teachers and parents.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="../css/bootstrap.min.css" rel="stylesheet"/>
		<link href="../css/skoolynk.css" rel="stylesheet"/>
	</head>
<body>
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand"><img src="../images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<i class="fa fa-reorder" style="color:#fff; border:none;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="../index.php">Home</a></li>
				<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
				<li><a id="top-link" href="about-skoolynk.php">About skoolynk</a></li>
				<li><a href="signup.php" id="top-link-create">create school account</a></li>
			</ul>
	   </div>
	   </div>
	</nav>
<div class="container"  id="container">
	  <div class="rows">
			<div id="free-10"></div>
			<h1 id="signup-h1">Create your School account now.</h1>
			<div id="free-10"></div>
			<div class="col-md-5" id="col5">
				<h4>Add your school to skoolynk </h4>
				<h6>Just some simple information needed to get you started.</h6>
				<div id="free-20"></div>
				<p>
				"see the fun side of education, 
				<br/>a new learning experience<br/> brought to reality..."</p><br/>
				<h6><font color="#69a5ff">Get info about a school from anywhere in the world.</font></h6>
				<img src="../images/skoolynk-everywhere.png" alt="skoolynk" width="70%"/>
				<div style="color:#aaa;">
				<hr/>&copy 2015 Skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com" title="xaexia" target="_blank">xaexia</a></div>
			</div>
			<div class="col-md-7" id="col7">
			<div class="thumbnail" id="thumbnail-no-back">
				<div class="rows">	
			<div class="col-md-6" style="padding:10px;">
			<div class="thumbnail" id="thumbnail-no-back">
				 <form action="" method="post">
					<label id="signup-label">School Name</label>
					<input type="text" required class="form-control" name="name"  placeholder="your school name"/>
					
					<label id="signup-label">Motto</label>
					<input type="text" required class="form-control" name="motto"  placeholder="your school motto"/>
					
					<label id="signup-label">Ownership </label> <i>(eg. Private / Government)</i> 
					<select name="ownership" class="form-control" required>
							<option value="private">Privately owned</option>
							<option value="government">Government school</option>
					</select>
					
					<label id="signup-label">District</label>
					<select name="district" class="form-control" required>
					<option>Your district</option>
						<?php
							foreach($districts as $district)
							{
								echo "<option value=".$district['district'].">".$district['district']."</option>";
							}
						?>
					</select>
					
					<label id="signup-label">Location/Address</label>
					<input type="text" required class="form-control"  name="location" i placeholder="kampala 3029"/><br/>
					</div>
			</div>
			<div class="col-md-6" style="padding:10px;">
					<div class="thumbnail" id="thumbnail-no-back">
							<label id="signup-label">Start Date</label>
							<input type="date" required class="form-control" name="opened"/>
							
							<label id="signup-label">School Email Address</label>
							<input type="email" required class="form-control" name="email" placeholder="example@gmail.com"/>
							
							<br/>
							<h6><font color="grey"><br/>By accepting to 'Sign up' above with skoolynk , you confirm that you accept our </br><a href="terms-and-conditions.php" title="skoolynk terms of use">Terms of use.</a></font></h6>
							<input type="submit" name="signup" title="signup" value="Create your account" class="btn btn-success" id="btn_signup"/>
							<div id="free-10"></div>
							<?php 
							   if(isset($_POST['signup']) && isset($error) ){
								   echo "<p style='color:red; padding:10px; background:#fff; font-weight:bold;'>".$error."</p>";
							   }
							?>
					</form>
					</div>
			</div>
			</div>
			<div id="free-0"></div>
			</div>
			</div>
			</div>
	</div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/simple_search.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>