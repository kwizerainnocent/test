<?php
$con = mysql_connect("localhost", "root", ""); if(!$con) die("failed to make a db connection " .mysql_error());
$select = mysql_select_db("skoolynk_db"); if(!$select) die("failed to make a db selection " .mysql_error());
		include_once("includes/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Namilyango college</title>
		<link rel="shortcut icon" href="images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/skoolynk.css" media="screen">
		<style type="text/css">
		.fileUpload{
			position:relative;
			overflow:hidden;
			margin:0px;
			border-radius:2px;  background-color: #517fa4;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#517fa4), to(#306088));
  background-image: -webkit-linear-gradient(top, #517fa4, #306088);
  background-image: -moz-linear-gradient(top, #517fa4, #306088);
  background-image: -o-linear-gradient(top, #517fa4, #306088);
  background-image: -ms-linear-gradient(top, #517fa4, #306088);
  background-image: linear-gradient(top, #517fa4, #306088);
			font-size:12px;
			line-height:12px;
		}

		#post{
			border-radius:2px;  background-color: #449d44;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#449d44), to(#573e23));
  background-image: -webkit-linear-gradient(top, #449d44, #573e23);
  background-image: -moz-linear-gradient(top, #449d44, #573e23);
  background-image: -o-linear-gradient(top, #449d44, #573e23);
  background-image: -ms-linear-gradient(top, #449d44, #573e23);
  background-image: linear-gradient(top, #449d44, #573e23);
			font-size:12px;
			line-height:12px;
		}
		.fileUpload input.upload{
			position:absolute;
			top:0; right:0; bottom:0;
			padding:0; margin:0;
			cursor:pointer;
			opacity:0;
			filter:alpha(opacity=0);
		}
		#comments{color:#999; text-decoration:none; font-weight:bold; transition-property:color; transition-duration:.4s;}
		#comments:hover{color:#555;}
		h5{font-size:12px;}
		#top-jumbotron{
		border-radius:0px;
		padding:0px;
		margin-bottom:5px;
		border:1px solid #ddd;
		background-size:100%;
		}
		#header-link{
		color:#eee;
		font-size:16px;
		}
		#top-thumb{
		background:rgba(0,0,0,.4);
		padding:20px;
		border:1px solid #555;
		color:#fff;
		}
		#main-rows{
		margin:0 auto;
		}
		#event-thumb{
		padding:2px;
		}
		#event-thumb img{
		width:100%;
		}
		.widget-title{
		color:#ddd;
		}
		.fa-2{
		color:#777;
		font-size:22px;
		margin:5px;
		transition-property:color;
		transition-duration:.4s;
		}
		.fa-2:hover{
		color:#ddd;
		}
		#col-md-4{
		padding:5px;
		font-size:10px;
		}
		#img1{
		width:100%;
		}
		#free-30{
		width:100%;
		clear:both;
		height:30px;
		}
		#free-20{
		width:100%;
		clear:both;
		height:20px;
		}
		#input-box{
		border-radius:0px;
		}
		#clip{
		padding:10px; background:orange; text-align:center; height:40px; transition-property:background; transition-duration:.4s;
		}
		#clip:hover{background:royalblue; cursor:pointer;
		}
		#share{
		padding:10px; background:lightseagreen; color:#eff; text-align:center; height:40px; transition-property:background; transition-duration:.4s;
		}
		#share:hover{background:royalblue; cursor:pointer;
		}
		#image-post{
		padding:10px; background:red; color:#eff; text-align:center; height:40px; transition-property:background; transition-duration:.4s;
		}
		#image-post:hover{background:royalblue; cursor:pointer;
		}
		#fa-post{
		color:#eff; font-size:20px; font-weight:lighter;
		}
		#emotions{
		font-size:14px;
		font-weight:lighter;
		text-decoration:none;
		color:#aaa;
		}
		.badge{
		font-size:9px;
		background:#aaa;
		}
		#side-links .nav li{
		padding:0px;
		}
		#side-links .nav li a{
		padding:0px;
		color:#444;
		line-height:30px;
		font-size:12px;
		}
		.dropdown-toggle{background:none !important;}
		.dropdown{background:none !important;}
		</style>
	</head>
	
	<body>
			<nav class="navbar navbar-fixed-top" id="header">
				<div class="container-fluid" style=" margin:0 auto;">
					<div class="navbar-header">
					<a href="#" class="navbar-brand"></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
						</button>
					</div>
					
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="index.php" title="Namilyango college" style="background:none;font-family:century gothic; padding-left:0px; font-size:18px;">
								<img src="images/badges100/ngo.png" alt="Namilyango College" style="height:20px;"/> <font style="font-weight:bold; color:#fff; text-shadow:1px 1px 1px #333;">Namilyango College</font>
							</a></li>
						</ul>
		  <form class="navbar-form navbar-left" autocomplete="off" role="search">
			<input type="text" id="name"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:#f1f1f1; border:1px solid #306088;"/>
			<div id="results" class="results"></div>
		  </form>
							<ul class="nav navbar-nav navbar-right">
							<li><a id="top-link" href="students-page.php">Home</a></li>
							<li><a id="top-link" href="student-profile.php">Your profile </a></li>
							<li><a id="top-link" href="academics.php">Academics</a></li>	
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="header-link"><i class="fa fa-comments"></i></a>
								<ul class="dropdown-menu nav">
									<li style="padding:5px; color:royalblue; font-weight:bold;">Online students</li>
									<li><a href="chat.php" title=""><i class="fa fa-circle" style="color:lime;"></i> Kwizera Innocent</a></li>
									<li><a href="chat.php" title=""><i class="fa fa-circle" style="color:lime;"></i> katende ivan</a></li>
									<li><a href="chat.php" title=""><i class="fa fa-circle" style="color:lime;"></i> Musoke glen</a></li>
									<li><a href="chat.php" title=""><i class="fa fa-circle" style="color:lime;"></i> kaganda ian</a></li>
									<li><a href="chat.php" title=""><i class="fa fa-minus-circle" style="color:orange;"></i> melchi</a></li>
									<li><a href="chat.php" title=""><i class="fa fa-circle" style="color:lime;"></i> rupert</a></li>

								</ul>
							</li>
							<li><a id="top-link" href="notifications.php"><i class="fa fa-bolt"></i></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="header-link"><i class="fa fa-gear"></i></a>
								<ul class="dropdown-menu nav">
									<li id='elearn'><a href='elearning.php?subject=".$name."'>Settings</a></li>
									<li id='elearn'><a href='elearning.php?subject=".$name."'>About skoolynk</a></li>
									<li id='elearn'><a href='elearning.php?subject=".$name."'>Help</a></li>
									<li id='elearn'><a href='elearning.php?subject=".$name."'>log out</a></li>
								</ul>
							</li>
							</ul>
					</div>
				</div>
			</nav>

		<div class="container"  id="container">
<div class="rows" id="main-rows">
	<div class="col-md-9 col-sm-9 col-xs-12" style="padding:0px;">
		<div class="rows" style="padding:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
			<div class="col-md-3" id="side-links" style="padding-right:10px;">
				<?php include("includes/students-side-links.php"); ?>
			</div>	

	<div class="col-md-9 col-sm-9 col-xs-12" style="background:none; padding:0px; border:none;">
		<div class="rows" style="padding:0px; margin:0px;">
		<div class="thumbnail" style="padding:15px; margin:0px;">
				<h3 style="margin:0px;">Help <font style="font-weight:lighter; color:green; font-size:14px;">(Allow us offer you help.)</font></h3><hr/>		
				
				<div class="rows">
					<div class="col-md-4" style="padding:2px;margin:0px; ">
						<div class="thumbnail" style="background:#69a6ff; border:none;margin:0px; height:140px;  border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-user" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">Learn the importance of skoolynk.</h6>
						</div>
					</div>
					<div class="col-md-4" style="padding:2px; margin:0px;">
						<div class="thumbnail" style="background:orange; border:none;  height:140px; margin:0px; border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-newspaper-o" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">See whats coming up on skoolynk.</</h6>
						</div>
					</div>
					<div class="col-md-4" style="padding:2px;margin:0px; ">
						<div class="thumbnail" style="background:#008c00; border:none;margin:0px;  height:140px; border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-institution" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">Discover schools all over Uganda.</h6>
						</div>
					</div>
					<div class="col-md-4" style="padding:2px;margin:0px; ">
						<div class="thumbnail" style="background:teal; border:none;margin:0px; height:140px;  border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-database" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">Become a programmer at XAEXIA.</h6>
						</div>
					</div>
					<div class="col-md-4" style="padding:2px;margin:0px; ">
						<div class="thumbnail" style="background:lightseagreen; border:none;margin:0px;  height:140px; border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-cube" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">Get to know what we offer.</h6>
						</div>
					</div>
					<div class="col-md-4" style="padding:2px;margin:0px; ">
						<div class="thumbnail" style="background:red; border:none;margin:0px; height:140px;  border-radius:0px; padding:20px;">
							<p style="text-align:center;"><i class="fa fa-exclamation-triangle" style="font-size:40px; color:#fff;"></i></p><br/>
							<h6 style="color:#fff; font-weight:lighter;">Report an issue (incase you are having challenges).</h6>
						</div>
					</div>
					<div id="free-20"></div>
					<h4>Frequently asked Topics.</h4>
					<p>We can not answer all your questions personally, thats why we keep you informed about the queries that your
					friends have asked before and let you see which matches you current problem.</p>
					<div class="rows">
						<div class="col-md-6">
							<ul class="nav">
								<li><a href="">Get started.</a></li>
								<li><a href="">Manage Account.</a></li>
								<li><a href="">Security.</a></li>
								<li><a href="">Privacy.</a></li>
								<li><a href="">Connecting.</a></li>
								<li><a href="">Popular Features.</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="nav">
								<li><a href="">Developers. (XAEXIA)</a></li>
								<li><a href="">Interested in Programming.</a></li>
								<li><a href="">Jobs.</a></li>
								<li><a href="">Related.</a></li>
								<li><a href="">Manage page.</a></li>
								<li><a href="">Report something.</a></li>
							</ul>
						</div>
					</div>
				</div>
			<div id="free-5"></div>
		</div>
		</div>
	</div>	
	<!--end of the col-md-9-->		
	</div>	
</div>	
	</div>


</div>
		</div>

    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
<script src="js/jquery.cycle.all.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$('.slideshow').cycle({
				fx: 'scrollUp' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});
		</script>  
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
	</body>
</html>