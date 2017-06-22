<?php
 include("includes/db-connection.php");
	if(isset($_GET['skoolid'])){
	$skoolid = (int)$_GET['skoolid'];
	$get_school = mysql_query("select * from schools where id='$skoolid'");
	if(mysql_num_rows($get_school)==0){
		header("Location:index.php");
		exit();
	}
	$rows = mysql_fetch_array($get_school);
	$id = $rows['id'];
	require_once('school_api.php');
	$json =  json_decode(school_info($id), true);
include_once("includes/count.php");
	}
include_once("includes/functions.php");
$school_detail_id = $rows['id'];
$get_school_details = mysql_query("select * from school_details where school_id='{$school_detail_id}'");
$details = mysql_fetch_array($get_school_details);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo ucfirst($rows['name']);?> , Best Schools in Uganda| skoolynk</title>
		<link rel="shortcut icon" href="images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/skoolynk.css" rel="stylesheet"/>
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
		
	
	
<style>
.clicked_link{
background:#dfdfdf;
padding:10px; 
text-transform:uppercase;
color:#286070;
}
</style>
	</head>
	
	<body style="background:#f1f1f1;">
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand"><img src="images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<i class="fa fa-reorder" style="color:#fff; border:none;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <form class="navbar-form navbar-left" autocomplete="off" role="search">
			<input type="text" id="searchField"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:rgba(0,0,0,.1); border:1px solid #306088; height:28px; margin-top: 3px; color:#fff; font-size: 12px; width: 350px;"/>
				<div id="autoFill" class="cssarrow" style="background:snow; border-bottom: 1px solid #286090 text-align: left; display:none; width:350px; position:absolute; z-index:3000; top:50px; absolute; border-radius: 2px; padding: 3px 3px 3px; color:#286090;"></div>
		  </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="index.php">Home</a></li>
				<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
				<li><a id="top-link" href="about-skoolynk.php">About skoolynk</a></li>
				<li><a href="signup.php" id="top-link-create">create school account</a></li>
			</ul>
	   </div>
	   </div>
	</nav>
<div class="container"  id="container">
