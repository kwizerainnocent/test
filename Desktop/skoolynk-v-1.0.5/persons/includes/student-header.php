<?php
session_start();
require_once '../classes/DbClass.php';
$db = new DbClass();
$db->connect();
$id = $_SESSION['skoolynkuserid'];
$userinfo = $db->select("student", "id= '".$id."'");
$school_id = $userinfo ['school_id'];
$schoolInfo= $db->select("schools, school_details", "schools.id= '".$school_id."' and school_details.school_id='".$school_id."' ");
// print_r($userinfo);
// echo "<hr/>";
// print_r($schoolInf0);
// die();



function word_teaser($string,$count){
	$original_string = $string;
	$words = explode(' ',$original_string);
	if(count($words) > $count){
		$sliced = array_slice($words,0,$count);
		$final = implode(' ', $sliced);
		return $final;
	}else{
		return $original_string;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo ucwords($schoolInfo['name']);?></title>
		<link rel="shortcut icon" href="images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/skoolynk.css" media="screen">
	<style type="text/css">
		body{background:#f1f1f1;}
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
		#comments{color:#777; text-decoration:none; font-weight:bold; transition-property:color; transition-duration:.4s;}
		#comments:hover{color:#444;}
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
		color:#777;
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
				<div class="container-fluid" style="width:75%;  margin:0 auto;">
					<div class="navbar-header">
					<a href="#" class="navbar-brand"></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
						</button>
					</div>
					
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="your-school.php?skoolid=<?php echo $schoolInfo['id'];?>" title="<?php echo ucwords($schoolInfo['name']);?>" style="background:none;font-family:century gothic; padding-left:0px; font-size:18px;">
								<img src="../images/badges100/<?php echo $schoolInfo['badge'];?>" alt="<?php echo ucwords($schoolInfo['name']);?>" style="height:20px;"/> <font style="font-weight:bold; color:#fff; text-shadow:1px 1px 1px #333;"><?php echo ucwords($schoolInfo['name']);?></font>
							</a></li>
						</ul>
		  <form class="navbar-form navbar-left" autocomplete="off" role="search">
			<input type="text" id="name"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:#f1f1f1; border:1px solid #306088;"/>
			<div id="results" class="results"></div>
		  </form>
							<ul class="nav navbar-nav navbar-right">
							<li><a id="top-link" href="students-page.php">Home</a></li>
							<li><a id="top-link" href="students-profile-page.php">Your profile </a></li>
							<li><a id="top-link" href="students-academics.php">Academics</a></li>	
							<li class="popover-options">
      <a href="#" type="button"id="top-link" title="<p>Title</p>" data-container="body" data-placement="bottom" data-toggle="popover"
	  data-content="<h4>Some content in Popover-options method</h4>
	<p>The popover is similar to tooltip, offering an extended view complete with a heading. For the popover to activate, a user just
	needs to hover the cursor over the element. The content of the popover can be populated entirely using the Bootstrap Data API. This method requires a tooltip.</p>">
        <i class="fa fa-comments"></i>
      </a>							
							</li>   
							
							<li class="popover-options">
      <a href="#" type="button"id="top-link" title="<p>Title</p>" data-container="body" data-placement="bottom" data-toggle="popover"
	  data-content="<h4>Some content in Popover-options method</h4>
	<p>The popover is similar to tooltip, offering an extended view complete with a heading. For the popover to activate, a user just
	needs to hover the cursor over the element. The content of the popover can be populated entirely using the Bootstrap Data API. This method requires a tooltip.</p>">
         <i class="fa fa-bolt"></i>
      </a>							
							</li>   

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="header-link"><i class="fa fa-gear"></i></a>
								<ul class="dropdown-menu nav">
									<li id='elearn'><a href='elearning.php?subject=".$name."'>Settings</a></li>
									<li id='elearn'><a href='elearning.php?subject=".$name."'>About skoolynk</a></li>
									<li id='elearn'><a href='elearning.php?subject=".$name."'>Help</a></li>
									<li id='elearn'><a href="student-logout.php">log out</a></li>
								</ul>
							</li>
							</ul>
					</div>
				</div>
			</nav>
