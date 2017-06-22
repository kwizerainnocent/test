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
							<li><a id="top-link" href="students-profile-page.php">Your profile </a></li>
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

		<div class="thumbnail" style="padding:5px; margin-bottom:5px; border-bottom:2px solid #ccc; border-radius:3px;">
		<div class="rows" style="clear:both; padding:0px; margin:0px;">
			<div class="col-md-1" style="padding:0px;">
				<img src="images/inno.jpg" class="img-rounded" alt="inno" title="kwizera innocent" style="width:50px; height:50px; border-radius:3px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-11" style="padding:0px 10px; 0px">
			<h5 style="margin-top:5px;">Kwizera Innocent</h5>
			<h6 style="margin-top:5px;">ziwktrance@gmail.com</h6>
			</div>
		</div>
		<div id="free-0"></div>
		</div>


		<h4 class="thumbnail" style="font-family:century gothic; color:#eff; background:#008c00; border-radius:0px; font-weight:lighter; margin:0px;">YOUR ACADEMIC REPORT.</h4>
		<div class="rows">
		<div class="thumbnail" style="border-radius:0px; padding:10px;  margin-bottom:5px;">
			<div class="thumbnail" style="border:none; margin:0px;">
				<table class="table table-bordered table-striped">
					<tr><th>Class</th><td><a href="" title="see your class teacher's profile">Seniour 3 (East)</a></td></tr>
					<tr><th>House</th><td><a href="" title="see your class teacher's profile">Doyle</a></td></tr>
					<tr><th>Class Teacher</th><td><a href="" title="see your class teacher's profile">Mr. Muwanga Solomon</a></td></tr>
					<tr><th>Place of Residence</th><td><a href="" title="house">House x</a></td></tr>
				</table>
			</div>
			<h4 style="color:#286090;">Your Performance over the years.</h4>
			<div class="rows">
				<div class="col-md-2" style="padding:0px; padding:1px;">
					<a href="" title="seniour 1" class="btn btn-success" style="width:100%; border-radius:0px; padding:0px;">S1<hr style="margin:5px;"/>80% AV<br/>Third term</a>
				</div>
				<div class="col-md-2" style="padding:0px; padding:1px;">
					<a href="" title="seniour 1" class="btn btn-info" style="width:100%; border-radius:0px; padding:0px;">S2<hr style="margin:5px;"/>70% AV<br/>Third term</a>
				</div>
				<div class="col-md-2" style="padding:0px; padding:1px;">
					<a href="" title="seniour 1" class="btn btn-danger" style="width:100%; border-radius:0px; padding:0px;">S3<hr style="margin:5px;"/>55% AV<br/>Third term</a>
				</div>
				<div class="col-md-2" style="padding:0px; padding:1px;">
					<a href="" title="seniour 1" class="btn btn-danger" style="width:100%; border-radius:0px; padding:0px;">S4<hr style="margin:5px;"/>50% AV<br/>second term</a>
				</div>
				<div class="col-md-4" style="padding:0px; padding:1px;">
				<div class="thumbnail" style="border-radius:0px;">
					<h5 style="text-decoration:underline;">Key.</h5>
					<p>
						<div><font class="btn btn-success" style="border-radius:0%;"></font> <font>Good progress</font></div>
						<div><font class="btn btn-info" style="border-radius:0%;"></font> <font>Fairly good progress</font></div>
						<div><font class="btn btn-primary" style="border-radius:0%;"></font> <font>Fair progress</font></div>
						<div><font class="btn btn-danger" style="border-radius:0%;"></font> <font>Poor progress</font></div>
					</p>
				</div>
				</div>
			</div>
			<div id="free-0"></div>
			</div>
			<h5 style="color:teal;">Most Recent Results.</h5>
		<div class="thumbnail" style="border-radius:0px; padding:10px; margin-bottom:5px;">
			<p style="color:#555;text-align:center;">
				<h4 style="color:#286090;text-align:center; font-weight:lighter;">NAMILYANGO COLLEGE</h4>
				<img src="images/badges100/ngo.png" alt="Namilyango College" style="height:50px;"/>
			</p>
			<h6 style="color:#555;text-align:center;">MID TERM 2 REPORT</h6>
			<h6 style="color:teal; text-align:center;">20th Aug 2015</h6><hr/>
			<table class="table table-bordered table-striped">
				<tr style="color:#333; "><th>SUBJECT</th> <th>RESULT</th> <th>AGGREGATE</th> <th>TEACHER</th></tr>
				<tr><th>Agriculture</th> <td>78</td> <td>D2</td> <th>Muwanguzi R</th></tr>
				<tr><th>Biology</th> <td>54</td> <td>C5</td> <th>Robert K</th></tr>
				<tr><th>English</th> <td>68</td> <td>C4</td> <th>Namusoke N</th></tr>
				<tr><th>Chemistry</th> <td>50</td> <td>C4</td> <th>Katende I</th></tr>
				<tr><th>Commerce</th> <td>80</td> <td>D1</td> <th>Musoke M</th></tr>
				<tr><th>CRE</th> <td>78</td> <td>D2</td> <th>Muwanguzi R</th></tr>
				<tr style="color:red;"><th>History</th> <td>39</td> <td>F9</td> <th>Robert K</th></tr>
				<tr><th>Geography</th> <td>68</td> <td>C4</td> <th>Namusoke N</th></tr>
				<tr><th>Mathematics</th> <td>50</td> <td>C4</td> <th>Katende I</th></tr>
				<tr><th>Physics</th> <td>80</td> <td>D1</td> <th>Musoke M</th></tr>
				<tr><td colspan="4">
				<div class="rows">
					<div class="col-md-4">
				<h5>Position in class</h5>
				<p>20th out of 104 students</p>
					</div>
					<div class="col-md-4">
				<h5>Class Teacher's Remarks</h5>
					<div style="border-bottom:1px dotted #aaa; padding-bottom:3px; width:100%; clear:both;">you are not set man</div>
					</div>
					<div class="col-md-4">
				<h5><font color="#111">Head Teacher's Remarks</font></h5>
					<div style="border-bottom:1px dotted #aaa; padding-bottom:3px; width:100%; clear:both;">Get out!!!</div>
					</div>
				</div>
				</td></tr>
			</table>
			</div>
		<div class="thumbnail" style="border-radius:0px; padding:10px;">
			<h5>About your Class</h5>
				<table class="table table-bordered" style="text-align:left;">
					<tr><th colspan="2"><h4>S3 East</h4></th></tr>
					<tr><th>Class Teacher</th><td><a href="" title="see your class teacher's profile">Mr. Muwanga Solomon</a></td></tr>
					<tr><th>Class representative(s)</th><td>Alinda Martin</td></tr>
					<tr><th>Number of students</th><td>104 (<a href="" title="view all students">View all classmates</a>)</td></tr>
				</table>
			<br style="clear:both;"/>
		</div>
		</div>
		</div>
			<br style="clear:both;">
			
		</div>
		</div>
	</div>	
	<!--end of the col-md-9-->	
	<!--this is the div that will hold the side information for the col-md-3-->
	<div class="col-md-3 col-sm-3 col-xs-12" style="background:none; border:1px solid #ddd; padding-left:10px; border:none;">
	<div class="thumbnail" style="padding:10px; margin-bottom:5px;">
				<h6 style="color:green; margin:0px; font-weight:bold; color:#999;">SCHOOLS IN UGANDA.</h6>
			<hr style="clear:both; margin-bottom:5px; margin-top:5px;"/>
			<div class="rows" style="padding:0px; border-radius:0px;">
			<?php
				$schools = mysql_query("select * from schools,school_details where schools.id = school_details.school_id order by rand() limit 8");
				if(!$schools){echo mysql_error();}
				while($school_rows = mysql_fetch_array($schools)){
					echo "<div class='col-md-3' style='padding:2px;'><a href='' title='".$school_rows['name']."'><img src='images/badges100/".$school_rows['badge']."' alt='".$school_rows['name']."' style='height:40px;'></a></div>";
				}
			?>
				<a href="" title="see all schools available" style="clear:both; display:block;">view all schools <i class="fa fa-caret-right"></i></a>
			</div>	
<hr/>
				<h6 style="color:green; margin:0px; font-weight:bold; color:#999;">LATEST NEWS IN SCHOOLS.</h6>
				<?php 
					$events = mysql_query("select * from events order by date desc limit 3");
					while($events_rows = mysql_fetch_array($events)){
					$posted_on = date('d M',$events_rows['date']);
						echo "<div class='media'>
				<a class='pull-left' href='#'>
					<img src='images/events/".$events_rows['pic']."' style='width:40px; height:40px; border-radius:3px; border:1px solid #ddd;'/>
				</a>
				<div class='media-body'>
					<h6 style='font-size:11px; margin:0px; font-weight:bold; color:#286090;'>".(word_teaser($events_rows['heading'],10))."</h6>
					<p style='font-size:11px; color:#555; margin-bottom:0px;'>".(word_teaser($events_rows['body'],10))."</p>
					<i style='font-size:10px; margin:0px; padding:0px; color:#bbb;'>Posted on ".$posted_on."</i>
				</div>
				</div>";
					}
				?>
	</div>
	<div class="thumbnail" style="border-radius:3px; padding:0px; margin-bottom:5px;"><img src="images/ads/mtn.jpg" width="100%"></div>
	<div class="thumbnail" style="padding:10px; border-radius:0px; border:none;">
				<h6 style="color:green;">STATS</h6>
			<div class="rows" style="padding:0px; border-radius:0px;">
				<div class="col-md-4" style="padding:2px;text-align:center; color:royalblue;"><a href="" title="kwizera innocent"><h3 style="color:royalblue;">2000</h3><font style="font-size:12px; color:royalblue;">RANK</font></a></div>
				<div class="col-md-4" style="padding:2px;text-align:center;"><a href="" title="kwizera innocent"><h3>23562</h3><font style="font-size:12px; ">Friends</font></a></div>
				<div class="col-md-4" style="padding:2px;text-align:center;"><a href="" title="kwizera innocent"><h3>243</h3><font style="font-size:12px; ">Posts</font></a></div>
			</div>
<hr style="clear:both;"/>
				<div class="thumbnail" style="font-size:11px; padding:10px;">The rank above is based on your paticipation to answering your fellow students questions. <br/><a href="help">continue reading...</a></div>

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