<!DOCTYPE html>
<html>
<head>
	<title>Edit your profile </title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="shortcut icon" href="img/icons/hr.jpg" type="image/jpg">
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/meethr.css"/>
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
	</style>
</head>
<body>
<header class="rows"  style="background:teal; color:#fff; padding:20px;">
	<div style="width:80%; margin:auto; clear:both;">
	<div id="free-10"></div>
	<nav class="navbar" role="navigation" id="header" style=" border-top:1px solid lightseagreen;">
		<div class="container-fluid" style="width:100%; padding-left:20px; margin:0 auto;">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Meet your hr</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
				</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="index.php">Home</a></li>
				<li><a id="top-link" href="about-meet-your-hr.php">profile</a></li>
				<li><a id="top-link" href="contact-hr.php"><i class="fa fa-bolt"></i></a></li>
				<li><a id="top-link" href="insign.php"><i class="fa fa-gear"></i></a></li>
			</ul>
	   </div>
	   </div>
	</nav>
	</div>
	<div id="free-0"></div>
</header>
	<div class="container" id="container">
	<h3 style="font-size:17px; margin-left: 30px; color:red;">Latest Job Posts</h3>
		<div id="free-10"></div>
		<div class="rows" id="main-posts">
		<div class="col-md-10">
		<div class="rows" style="clear:both;  margin:0px auto; padding:0px 15px 0px;">
		<div class="thumbnail" style="padding:7px; margin-bottom:8px;">
			<div class="col-md-1">
				<img src="img/xaexia.jpg" class="img-rounded" alt="inno" title="kwizera innocent" style="width:50px; height:50px; border-radius:3px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-11" style="padding:0px 10px; 0px">
			<h6 style="margin-top:5px; font-size:13px; font-weight:bold;">Kwizera innocent</h6>
				<form action="" method="post" enctype="multipart/form-data" style="padding:0px; margin:0px;">
					<textarea class="form-control" id="input-box" name="studentPost" rows="1" placeholder="post something on your page" style="background:none; border-radius:2px; border-bottom:1px solid #eee; border-top:none;  border-right:none;  border-left:none; box-shadow:none; font-size:11px; margin-bottom:10px;"></textarea>
				<div class="rows" style="margin:0px;">
						<div class="col-md-8" style="padding:0px;">
						<input type="submit"  name="sendPost" value="post" class="btn btn-success" id="post"/></div>
					<div class="col-md-4" style="padding:0px; text-align:right;">
						<div class="fileUpload btn btn-primary">
							<span><i class="fa fa-paperclip" style="padding-right:10px;"></i> Attach file</span>
							<input type="file" name="file" class="upload"/>
						</div>
					</div>
				</div>
				</form>
			</div>
		<div id="free-0"></div>
		</div>
		</div>
		<div id="free-0"></div>
			<div class="rows" style="clear: both;">
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img18.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img1.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img2.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
			</div>
			<div class="rows" style="clear: both;">
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img4.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img9.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
				<div class="col-md-4">
				<div class="thumbnail">
					<h5>this is gonna be so amazing man, trust me</h5>
					<h6>Posted by <font color="red">Mozey</font> | 7hrs ago</h6>
					<img src="img/posts/img13.jpg" style="width:100%;">
					<hr/>
					<div>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus.</div>
				</div>
			</div>
			</div>
		</div>

			<div class="col-md-2" style="padding:0px;" id="side-home-links">
				<h5>About you</h5>
				<ul class="nav">
					<li><a href="">your cv</a></li>
					<li><a href="">profile</a></li>
					<li><a href="">friends</a></li>
					<li><a href="">Education</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
				</ul>
				<h5>Quick links</h5>
				<ul class="nav">
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
					<li><a href="">Available Jobs</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>