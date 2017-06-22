<?php include("includes/db-connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		<style type="text/css">
		body{
		font-size:13px;
		background:#ededed;
		}
		#container{
		background:#ededed;
		width:75%;
		margin:75px auto;
		padding:0px;
		}
		#header{
		background:#fff; 
		border-bottom:1px solid #ddd;
		margin:0px; 
		width:100%;
		border-radius:0px;
		}
		#top-link{
		color:#56a5ec;
		background:none;
		transition-property:color;
		transition-duration:.4s;
		}
		#bottom-link{
		color:#aaa;
		background:none;
		transition-property:color;
		transition-duration:.4s;
		}
		#top-link:hover{
		color:blue;
		}
		#top-jumbotron{
		border-radius:0px;
		padding:0px;
		margin-bottom:5px;
		border:1px solid #ddd;
		background-size:100%;
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
		footer{
		font-size:10px;
		background:#232323;
		}
		.footer2{
		background:#191919;
		color:#ddd;
		font-size:10px;
		padding:10px;
		border-top:1px solid #333;
		}
		
		footer1{
		background:#232323;
		color:#888;
		padding:10px;
		font-size:11px;
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
		</style>
	</head>
	
	<body>
		<div class="container"  id="container">
			<nav class="navbar navbar-fixed-top" id="header">
				<div class="container-fluid" style="width:75%; margin:0 auto;">
					<div class="navbar-header">
					<a href="#" class="navbar-brand"></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="index.php" title="skoolynk" style="background:none;"><img src="images/skoolynk signup.png" style="height:35px; clear:both;"></a></li>
						</ul>
							<ul class="nav navbar-nav navbar-right">
							<li><a id="top-link" href="school-home.php" style="font-weight:bold; color:royalblue;">school name here</a></li>
							<li><a id="top-link" href="help-and-support.php" style="font-weight:bold; color:royalblue;">Notification</a></li>
							<li><a href="signup.php" id="top-link" style="font-weight:bold; color:royalblue;">Login for students</a></a></li>
							<li><a href="index.php" id="top-link" style="font-weight:bold; color:royalblue;">Back to skoolynk</a></a></li>
							</ul>
					</div>
				</div>
			</nav>

<div class="rows" id="main-rows">
	<div class="col-md-3 col-sm-3 col-xs-12" style="background:none; border:1px solid #ddd; padding:0px; border:none;">
		<div class="thumbnail" style="padding:0px;border-radius:0px; margin-bottom:3px;">
		<div id="free-20"></div>
	<h3 style="text-align:center; color:#444;">Seeta high school</h3>
		<p style="text-align:center;"><img src="images/badges/badges100/ngo.png" height="70" width="70" alt="seeta high school"/></p>
	<p style="text-align:center; color:royalblue;">"Nisi Dominus"</p>
	<hr style="clear:both;"/>
        <ul class="nav">
			<li><a href="school-timeline.php"><i class="fa fa-institution"></i> Seeta high sch...</a></li>
			<li><a href="school-academics.php"><i class="fa fa-book"></i> Academics</a></li>
			<li><a href="school-events.php"><i class="fa fa-calendar"></i> Events and calendar</a></li>
			<li><a href="school-staff-directory.php"><i class="fa fa-users"></i> Staff directory</a></li>
			<li><a href="school-alumni.php"><i class="fa fa-mortar-board"></i> Alumni Page</a></li>
			<li><a href="school-contact.php"><i class="fa fa-phone"></i> Contact information</a></li>
			<li><a href="school-about.php"> <i class="fa fa-sitemap"></i> About school</a></li>
			<li><a href="school-students-life.php"><i class="fa fa-child"></i> Students' Life</a></li>
			<li><a href="school-admission.php"><i class="fa fa-envelope"></i> Admissions</a></li>
		</ul>
	</div>
	<div class="thumbnail" style="border-radius:0px; margin:0px; padding:15px;">
		<h4>School status Info:</h4>
		<p><b>Population and size</b></p> 
	<p><i class="fa fa-map-maker"></i>Located Mukono, Seeta Jinja road</p><br/>
			<span>Students: 200000</span><br/>
			<span>Teachers: 20</span> 
		<p><b>Distance</b></p> 
			<span>Form town: 20 Kilometers</span><br/>
		<hr/>
	</div>
	
	</div>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<div class="jumbotron" id="top-jumbotron">
        <!-- Start Home Page Slider -->
        <section id="home">
            <!-- Carousel -->
            <div id="main-slide" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slide" data-slide-to="1"></li>
                    <li data-target="#main-slide" data-slide-to="2"></li>
                    <li data-target="#main-slide" data-slide-to="3"></li>
                </ol>
                <!--/ Indicators end-->

                <!-- Carousel inner -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="images/slider/bg1.png" alt="slider">
                    </div>
                    <!--/ Carousel item end -->
                    <div class="item">
                        <img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">
                    </div>
                    <!--/ Carousel item end -->
                    <div class="item">
                        <img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">
                    </div>  
					<!--/ Carousel item end -->
                    <div class="item">
                        <img class="img-responsive" src="images/slider/bg4.jpg" alt="slider">
                    </div>
                    <!--/ Carousel item end -->
                </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
            <!-- /carousel -->
        </section>
		</div>		
		<!--this is the section that has the divs divided into two sections after the featured events-->
		<div style="background:#eef; border-radius:0px; color:orange; padding:10px; margin-top:10px; margin-bottom:5px; " class="thumbnail">
		POSTS AT SCHOOL NAMES PAGE
		</div>
		<div class="rows" style="padding:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
		
		<!--this is the left hand side with the col-md-6-->
			<div class="col-md-6" id="col-md-6" style="padding:0px;">
			<div class="thumbnail" style="margin:5px; padding:0px; border-radius:0px;">
				<img src="images/event1.jpg" alt="" id="img1">
				<div class="caption"><h5><b>view our latest videos</b></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				</p>
				</div>
			</div>	
			<div class="thumbnail" style="margin:5px; padding:0px; border-radius:0px;">
				<img src="images/red.jpg" alt="" id="img1">
				<div class="caption"><h5><b>view our latest videos</b></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....</p>
				</div>
			</div>	
			</div>		

			
			<div class="col-md-6" id="col-md-6" style="padding:0px;">
			
			<!--this is the left left side with the col-md-6-->
			<div class="thumbnail" style="margin:5px; padding:0px; border-radius:0px;">
				<img src="images/video.png" alt="" id="img1">
				<div class="caption"><h5><b>view our latest videos</b></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....</p>
				</div>
			</div>
			<div class="thumbnail" style="margin:5px; padding:0px; border-radius:0px;">
				<img src="images/video.png" alt="" id="img1">
				<div class="caption"><h5><b>view our latest videos</b></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....</p>
				</div>
			</div>
			<div class="thumbnail" style="margin:5px; padding:0px; border-radius:0px;">
				<img src="images/amer.jpg" alt="" id="img1">
				<div class="caption"><h5><b>view our latest videos</b></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusda....
				</p>
				</div>
			</div>	
			</div>
			<br style="clear:both;">
		</div>
		</div>
	</div>
	<!--end of the col-md-9-->
	
	<!--this is the div that will hold the side information for the col-md-3-->


</div>
</div>
	<footer>
		<div id="footer1">
			<div id="free-30"></div>
			<div class="container" style="width:75%; margin:0 auto;">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h4 class="widget-title"><img src="images/skoolynk1.png" style="height:27px; clear:both;"></h4>
						<div class="widget-body">
							<p>+256 565 98425<br>
								<a href="mailto:#"><font color="#eee">xaexia@gmail.com</font></a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>	
						</div>
					</div>

					<div class="col-md-3">
						<h4 class="widget-title">Follow us on</h4>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-linkedin fa-2"></i></a>
								<a href=""><i class="fa fa-instagram fa-2"></i></a>
								<a href=""><i class="fa fa-google-plus fa-2"></i></a>
								<a href=""><i class="fa fa-pinterest fa-2"></i></a>
								<a href=""><i class="fa fa-skype fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6">
						<h4 class="widget-title">Text widget</h4>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem
							amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto
							vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
			<div id="free-30"></div>
		</div>

		<div class="footer2">
			<div class="container" style="width:75%; margin:0 auto;">
				<div class="row">
					
					<div class="col-md-8">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#" id="bottom-link" title="developers">Developers</a> | 
								<a href="index.php" id="bottom-link" title="skoolynk">Home</a> | 
								<a href="about-skoolynk.php" id="bottom-link" title="about skoolynk">About</a> |
								<a href="contact.html" id="bottom-link">Contact</a> |
								<a href="#" id="bottom-link">FAQs</a> | 
								<a href="help-and-support.php" id="bottom-link">Help</a> |
								<a href="sidebar-right.html" id="bottom-link">Disclaimer</a> |
								<a href="contact.html" id="bottom-link">Privacy policy</a> |
								<a href="signup.html" id="bottom-link">Site map</a> |
								<b><a href="login.php" id="bottom-link">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2016, skoolynk. Designed by <a href="http://www.xaexia.com/" rel="designer" title="xaexia"><font color="#fff">XAEXIA</font></a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
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