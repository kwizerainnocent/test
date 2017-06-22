<?php
  session_start();
  require_once '../classes/DbClass.php';
  $db = new DbClass();
  $db->connect();
  $userinfo =unserialize($_SESSION['skoolynkuser']);
  $alluserinfo = $db->select("student",  "email='".$userinfo['email']."'") ;
 
  if(isset($_POST['finish']))
  {
  		$formInfo = array(
  			"phone"=>"'".$_POST['phone']."'",
  		 	"cate"=>"'".$_POST['cate']."'", 
  			"location"=>"'".$_POST['location']."'",
  		 	"dob"=>"'".$_POST['dob']."'"
  		 	 );
  		if($db->update($formInfo, 'student', "id='".$alluserinfo['id']."'"))
  		{
  			$_SESSION['skoolynkuserid'] = $alluserinfo['id'];
  			header("location: students-page.php");
  			exit();
  		}
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>	<link rel="shortcut icon" href="../images/title.png"/>
		<title>Welcome <?php echo ucwords($userinfo['first_name']." ".$userinfo['second_name']); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="../css/bootstrap.min.css" rel="stylesheet"/>
		<link href="../css/skoolynk.css" rel="stylesheet"/>
		<link href="../css/font-awesome.min.css" rel="stylesheet"/>
		<link href="../css/jquery-ui.css" rel="stylesheet"/>
		<style type="text/css">
			#box{position:absolute;
			opacity:.5;
			top:0;
			left: 0;
			width:150px;
			height:150px;
			display:none;
			background:#fff;
		}
		</style>
	</head>
<body style="background:#fff;">
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid" style="width:80%; margin:0 auto;">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand"><img src="../images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
					</button>
			</div>
	   </div>
	</nav>
<div class="container"  id="container">
	  <div class="rows">
		<div class="thumbnail" style="width:70%; border-radius:2px; background:snow; margin:30px auto; padding:20px;">
			<h1 style="text-transform:capitalize; color:#286090; font-size:25px; margin:0px; text-align:center;">welcome <?php echo ucwords($userinfo['first_name']." ".$userinfo['second_name']); ?></h1>
				<hr style="margin-top:5px; margin-bottom:5px; border:0; height:1px; background-image:linear-gradient(to right, #fff, #286090, #fff);"/>
				<div class="rows">
				<div id="free-20"></div>
					<div class="col-md-3" style="padding:0px;">
					<div class="thumbnail" style="padding:3px; position:relative; border-radius:2px; background:snow; width:150px;">
				     <?php 
				     	if($alluserinfo['pic']=="")
				     	{
 							echo "<img src='../images/userPro/def.png'/>";
				     	}else
				     	{
				     		echo "<img src='{$alluserinfo['pic']}'/>";
				     	}
				     ?>
				<a href="#myModal" role="button" class="btn btn-default" title="advertise with skoolynk" data-toggle="modal" style="position:absolute; right:0; bottom:0; border-radius:0; border-right:none; border-bottom:none;"><i class="fa fa-pencil"></i></a>
					</div>
					</div>
					<div class="col-md-9" style="padding:0px;">
					
				<hr style="margin-top:5px; margin-bottom:5px; border:0; height:1px; background-image:linear-gradient(to right,cyan, #fff);"/>
					</div>				
				</div>
			<div id="free-0"></div>
					<h5>Please complete your registration to continue!</h5>
			<form action="" method="post">
				<div class="rows">
					<div class="col-md-6">
					<label id="signup-label">Location</label>
					<input type="text" class="form-control" name="location" placeholder="location"/><br/>
					<label id="signup-label">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="phone number"/>
					</div>
					<div class="col-md-6">
					<label id="signup-label">Date of birth</label>
					<input type="date" class="form-control" name="dob" placeholder="date of birth"/><br/>
					<label id="signup-label">Teacher/ student / parent</label><br/>
					<select name="cate" class="form-control">
						<option>Select category</option>
						<option value="t">Teacher</option>
						<option value="s">Student</option>
						<option value="p">Parent</option>
					</select><br/>
					<input type="submit" class="btn btn-info" name="finish" value="continue" style="border-radius:1px; float:right; font-size:12px; line-height:12px; "/>
					</div>
				</div>
			</form>
			<div id="free-0"></div>
		</div>
	</div>
	</div>
	<div id="free-40"></div>
<div style="color:#333; text-align:center; border-top:1px solid #aaa; font-weight:bold; padding:15px; background:#ccc;">
				&copy 2015 Skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com" title="xaexia" target="_blank">xaexia</a></div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="border-radius:2px;">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">x
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Upload your profile picture
            </h4>
         </div>
	 <form action="student-startup.php" method="post" enctype="multipart/form-data">
         <div class="modal-body">
         <div class="rows">
         	<div class="col-md-7" id="tempImg" style="position:relative; padding:0px;">
         		<img id="preview">
         		<div id="box"></div>
         	</div>
         	<div class="col-md-5"></div>
         	<div id="free-10"></div>
         </div>


		<input type="file" name="file" id="uploadimage"/><br/>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:1px; line-height:12px; font-size:12px;">cancel</button>          
              <button type="button" class="btn btn-primary" id="upload" style="border-radius:1px; line-height:12px; font-size:12px;">Upload</button>
         </div>
	 </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script src="../js/simple_search.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/cropImage.js"></script>
</body>
</html>