<?php 
session_start();
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
if(isset($_SESSION['Administrator']))
 {
   header("Location:home.php");
   exit();
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport"  content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/skoolynk.css" rel="stylesheet">
		<link href="../css/animate.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<style>
		#login{width:500px; padding-left:30px; padding-right:30px; background:none; border:none; margin:auto;}
		body{ background:url(../images/student-login.jpg); background-size: 100%;}
		#sideSection{ color:#eee; }
		.col-md-6 b a{color:#fff;}
		</style>
	</head>
<body>
	<nav class="navbar" role="navigation"  style="background:rgba(0,0,0, .1); box-shadow:none;  width:100%; z-index:2000; position:absolute; top:0; left:0;">
		<div class="container-fluid">
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
			</ul>
	   </div>
	   </div>
	</nav>

<div class="container"  id="container">
<div id="free-100"></div>
<div class="rows">
<div class="col-md-6" id="sideSection">
  <h1>Administrator Login</h1>
  <h4>Welcome to skoolynk</h4>
  <p>How well does skoolynk enable you to admit students and get admitted to your dream school online? 
  If ready you can even get your admission online, make school fees transactions and many others. 
  This process is made smooth by our brain heads, 
  the programmers that have made education an enjoyable enterprise in our society through skoolynk. <a href="../public/about-skoolynk.php">Read more...</a></p>
</div>
<div class="col-md-6">
	<br/><div class="thumbnail" id="login" style="background:rgba(253,253,253,.8); width:400px; border:1px solid #ddd; border-radius:0px;">
		<br/><form method="post" id="loginForm" >
			<label>Email address: </label>									
			<div class="input-group">
				<span class="input-group-btn">
					<a class="btn btn-primary disabled" style="border:none; padding-bottom:10px; padding-top:10px;"><i class="fa fa-envelope"></i></a>
				</span>
				<input type="text" name="email" id="email" placeholder="Enter email address..." class="form-control"/>
			</div>
				<div id="emailError"></div>
		<div id="free-20"></div>
			<label>Password: </label>
			<div class="input-group">
				<span class="input-group-btn">
					<a class="btn btn-success disabled" style="background:green; border:none; padding-bottom:10px;width:40px; padding-top:10px;"><i class="fa fa-lock"></i></a>
				</span>
				<input type="password" name="password" id="password" placeholder="Enter password.." class="form-control"/>
			</div>
				<div id="passwordError"></div> 
		 <div id="free-20"></div>
		 <input type="submit" name="login" class="btn btn-primary" value="Sign In to dashboard" id="adminLogin"/><br/>
		</form>
				<div>
					<?php
					if(isset($_GET['message'])){
						echo "<p class='animated bounceIn' style='color:red;'>".$_GET['message']."</p>";
					}
					?>
				</div>
		<hr/>
	</div>
	<div id="free-20"></div>
		<div style="width:400px;" id="login"><b><a href="forgot.php">Forgot Password ?</a></b>
		&nbsp; &nbsp; |&nbsp; &nbsp;
		<b><a href="../public/signup.php">Create school Account</a></b>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/simple_search.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(){
		$('#adminLogin').on("click",function(e){
            e.preventDefault();
            var login = false;
			var password = $('#password').val();
       		var emailReg  = /\S+@\S+\.\S+/;

        if($("#email").val()=="" || $("#password").val()=="")
            {
              $("#passwordError").html("<p class='animated bounceIn' style='color:red; font-weight:bold; padding:5px;'>All fields are required</p>"); 
            }
            else if(!emailReg.test($("#email").val())) 
            {
              $("#emailError").html("<p class='animated bounceIn' style='color:red; font-weight:bold; padding:5px;'>please check you email should be like email@example.com</p>");
            } else 
            {
              login = true; 
            }
            
        if(login)
        {
        	var formData = $('#loginForm').serialize();
            $.ajax({url:"login.php", type:"post", data:formData, success: function(info){
              if(info==1)
              {
                window.location="home.php";
              }
              else if(info==2)
              {
                window.location="index.php?message=! wrong username and password combination please try again !";
              }
            }});
        }

		});




	});
</script>
</body>
</html>