<?php
session_start();
require_once '../classes/DbClass.php';
require_once '../classes/UserClass.php';
	$db = new DbClass();
	$db->connect();
	if(isset($_POST['createAccount'])){
		$data = array(
				"first_name"=>$_POST['fn'], 
				"second_name"=>$_POST['sn'], 
				"email"=>$_POST['e'], 
				"school_id"=>$_POST['s'],
				"password"=>password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost'=>12]),
				"gender"=>$_POST['g']
			  );
		if($db->insert($data, 'student')){
			$_SESSION['skoolynkuser'] = serialize($data);
			header("Location: ../persons/student-startup.php");
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>	
	<link rel="shortcut icon" href="../images/title.png"/>
	<title>Sign up with skoolynk, manage schools, search high schools, interact with students, teachers and parents.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
	<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../css/skoolynk.css" rel="stylesheet"/>
	<link href="../css/font-awesome.min.css" rel="stylesheet"/>
	</head>
<body style="background:url(../images/student-login.jpg) fixed; background-size:100%;">
	<nav class="navbar" role="navigation"  style="background:rgba(0,0,0, .2); box-shadow:none;  width:100%; z-index:2000; position:absolute; top:0; left:0;">
		<div class="container-fluid" style="width:75%; margin:0 auto;">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand  animated rubberband"><img src="../images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="../index.php">Home</a></li>
				<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
				<li><a id="top-link" href="../public/about-skoolynk.php">About skoolynk</a></li>
			</ul>
	   </div>
	   </div>
	</nav>

<div class="container"  id="container" style="margin-top:100px;">
	  <div class="rows">
			<div class="col-md-8" id="col5" style="color:#fff;">
	<?php if(isset($_GET['message'])){ ?>
		<div style="text-align:center;">
				<i style="font-size:50px; color:#eee;" class="fa fa-angellist"></i><br/>
				<h4 style="color:#eee;"><b><?php echo strtoupper($_GET['message']); ?></b></h4>
		</div>
	<?php }?> 
			<h1 style="color:cyan; text-shadow:1px 1px 1px #333;  font-family:century gothic;">Create your account now.</h1>
			<div id="free-10"></div>
				<h6>Just some simple information needed to get you started.</h6>
				<div id="free-20"></div>
				<p style="color:#eee;">
				"see the fun side of education, 
				<br/>a new learning experience<br/> brought to reality..."</p><br/>
			</div>
			<div class="col-md-4" id="col7" style="padding:20px; border-radius:7px;  box-shadow:none;">
			<div class="thumbnail" id="thumbnail-no-back">
				 <form action="" method="post">
				 <div class="rows">
					<div class="col-md-6" style="padding-left:0px; padding-right:2px;">
					<label id="signup-label">First Name</label>
					<input type="text" required class="form-control" name="fn"  placeholder="first name"/>
					<div class="form-error" id="first-name"></div>
					</div>
					<div class="col-md-6" style="padding-left:0px; padding-right:2px;">
					<label id="signup-label">Second Name</label>
					<input type="text" required class="form-control" name="sn"  placeholder="second name"/>
					<div class="form-error" id="second-name"></div>
					</div>
				 </div>
					<label id="signup-label">Email Address</label>
					<input type="email" required class="form-control" name="e" placeholder="email@example.com"/>
					<div class="form-error" id="email1"></div>
					
					<label id="signup-label">Re-enter Email Address</label>
					<input type="email" required class="form-control" placeholder="re-enter Email Adress"/>
					<div class="form-error" id="email2"></div>
					
					<label id="signup-label">Password  </label>
					<input type="password" required class="form-control" name="p" placeholder="enter password"/>
					<div class="form-error" id="password"></div>
					
					<label id="signup-label">Your school  </label><br/>
					<select name="s" class="form-control">
					<option>Select School</option>
						<?php
							$schools = $db->select("schools", "");
							foreach ($schools as $value) {
								echo "<option value='".$value['id']."'>".$value['name']."</option>";
							}
						?>
					</select>
					<div class="form-error" id="school"></div>
					
					<label id="signup-label">Gender  </label>
					<div class="rows">
					<div class="col-md-3" style="padding:0px;">
						<input type="radio" name="g" value="male"/> Male 
					</div>
					<div class="col-md-9" style="padding:0px;">
						<input type="radio" name="g" value="female"/> Female
					</div>
					</div>
					<div class="form-error" id="gender"></div>
					<br/>
					<h6><font color="grey"><br/>By accepting to 'Sign up' above with skoolynk , you confirm that you accept our </br><a href="terms-and-conditions.php" title="skoolynk terms of use">Terms of use.</a></font></h6>
					<input type="submit" name="createAccount" title="signup" value="Create your account" class="btn btn-primary" id="btn_signup" style="border-radius:3px;"/>
					<div id="free-10"></div>
					<?php 
					if(isset($_POST['signup']) && isset($error) ){
					 echo "<p style='color:red; padding:10px; background:#fff; font-weight:bold;'>".$error."</p>";
					 }
					?>
					</form>
			</div>
			
			<div id="free-0"></div>
			</div>
			</div>
			</div>
			<div id="free-40"></div>
<div style="color:#333; text-align:center; border-top:1px solid #aaa; font-weight:bold; padding:15px; background:#ccc;">
				&copy 2015 Skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com" title="xaexia" target="_blank">xaexia</a></div>
	</div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/student-validation.js"></script>
<script type="text/javascript" src="js/simple_search.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>