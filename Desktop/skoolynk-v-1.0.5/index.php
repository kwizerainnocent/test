<?php
require_once 'classes/DbClass.php';  
$db = new DbClass();
$db->connect();

//query to pull all districts from the database
$districts = $db->select("districts", "id!='0' order by district asc");
	//function to select anything and count it
		include_once("includes/functions.php");

		function districts($region){
		global $db;
		$districtsCat = $db->select("districts", "region = '{$region}'");
		foreach($districtsCat as $district){
			echo "<li style='display:none;'><a href='public/schools.php?district=".trim($district['district'])."'>".trim($district['district'])."</a></li>";
		}
		}

//collect all schools details.
		$schools_around = $db->select("schools", "id!='0' order by rand() limit 4");
		$posts = $db->select("posts", "id!='0' order by rand() limit 10");
		$events = $db->select("events,schools", "events.school_id=schools.id order by rand() limit 2");


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
		<title>Best schools in uganda</title>
		<link rel="shortcut icon" href="images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/animate.css" rel="stylesheet"/>
		<link href="css/skoolynk.css" rel="stylesheet"/>
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
	</head>
	<body style="background:url(images/header-bg.jpg); background-size:100%; background-attachment: fixed;">
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand  animated rubberband"><img src="images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
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
				<li><a id="top-link" href="public/about-skoolynk.php">About skoolynk</a></li>
				<li><a  href="public/signup.php" id="top-link-create">create school account</a></li>
			</ul>
	   </div>
	   </div>
	</nav>
	
<div id="div-slider" style="height:360px; clear:both; background:url(images/banner.jpg); background-size:100%; ">
	<div style="width:35%; margin:0 auto; clear:both; position:relative; text-align:center;">
	<div id="free-50"></div>
				<div id="free-20"></div>
		<h3 style="color:#fff;">Which school are you looking for?</h3>
				<div id="free-20"></div>
		<form action="public/search-results.php" method="get">
		<div class="rows">
				<div class="col-md-6" style="padding-left:0px;">
					<select name="districts" class="form-control" style="line-height:10px; font-size:14px; background:rgba(253,253,253,.1); color:#bbb; border:1px solid #777; height:40px; border-radius:40px;">
						<option value="0" style="border-radius:10px; background:#286090; color: #fff; ">Select District</option>
						<?php
		foreach($districts as $district){
			echo "<option value='".trim($district['district'])."' style='color:#286090; border-radius:3px; padding:5px; font-size: 12px; color:green;'>".$district['district']."</option>";
		}
						?>
					</select>
				</div>
				<div class="col-md-6" style="padding-right:0px;">
					<select name="ownership" class="form-control"  style="line-height:10px; font-size:14px; background:rgba(253,253,253,.1); color:#bbb; border:1px solid #777; height:40px; border-radius:40px;">
						<option value="0" style="border-radius:10px; background:#286090; color: #fff; ">Ownership</option>
						<option value="government" style="color:#286090; border-radius:3px; padding:5px; font-size: 12px; color:green;">Government</option>
						<option value="private" style="color:#286090; border-radius:3px; padding:5px; font-size: 12px; color:green;">Private</option>
					</select>
				</div>
		</div>
				<div id="free-20"></div>
				<input type="text" name="school" placeholder="Type a school..." class="form-control" style="background:rgba(253,253,253,.1); color:#fff; border:1px solid #777; height:40px; border-radius:40px;"/>
				<div id="free-20"></div>
				<input type="submit" name="searchInDetails" class="btn btn-danger" value="search" style="border-radius:40px; height:40px; border-bottom:2px solid red; padding-right:30px; padding-left:30px;"/>
				<?php
					if(isset($_GET['message'])){
						echo "<div class='animated tada' style='margin-top:20px; color:orange; font-size:16px;'>".$_GET['message']."</div>";
					}
				?>
		</form>
	</div>
</div>
<div class="thumbnail" id="small-thumbnail" style="border-radius:0px; background:#f1f1f1;">
<div class="rows" style="width:75%; margin:auto;">
	<div class="col-md-8"><h5>Schools in Kampala</h5></div>
	<div class="col-md-2 animated tada" style="text-align:right; float:right; padding:0px;">
		<a href="admin/index.php"  class="btn btn-success" type="button"  style="text-decoration:none; border-radius:1px;">Manage your school</a>
	</div>
	<div class="col-md-2 animated tada" style="text-align:right; padding:0px;">
		<!-- <a href="persons/index.php"  class="btn btn-primary" type="button"  style="text-decoration:none; border-radius:1px;">Join skoolynk</a> -->
	</div>
<!-- 	<div class="col-md-2" style="text-align:center; padding:0px 10px 0px;"><h5>
							<div class="popover-options">
      <a href="#" type="button" style="color:royalblue; width:400px; text-decoration:none;" title="<h5>Login</h5>" data-container="body" data-placement="top" data-toggle="popover"
	  data-content="
	<p>
							<form method='post' id='login' action='login/login.php'>
									<input type='email' name='title' placeholder='example@email.com' class='form-control' style='box-shadow:none; border-radius:2px; font-size:12px;'/><br/>
									<input type='password' name='author' placeholder='password' class='form-control' style='box-shadow:none; border-radius:2px;  font-size:12px;'/><br/>
									<input type='submit' name='login' value='Sign in' class='btn btn-primary' style='width:100%; border-radius:2px; font-size:12px;'/>
							</form>
	</p>">
         
      </a>							
							</div>   	
	
	</h5></div> -->
</div>
<div id="free-0"></div>
</div>
<div class="container"  id="container" style="margin-top:10px;">
<div class="rows" id="main-rows">
<?php
foreach ($schools_around as $key => $all_schools){
	echo "
	<div class='col-md-3 animated fadeIn' style='text-align:center;'><div class='thumbnail' style='padding:0px;background:#f9f9f9; border-bottom:1px solid #ddd;'>
		<img src='".ltrim($all_schools['slider'],'\.\./')."' style='border-bottom:2px solid royalblue;'>
		<div id='caption' style='position:relative;'>
		<div style=' position:absolute; z-index:10; top:-40px; right:10px;'>
		<a href='public/school-timeline.php?skoolid=".$all_schools['id']."'><img src='".ltrim($all_schools['badge'],'\.\./')."' class='img-rounded' style='width:50px; height:50px; background:#fff; padding:5px; border:1px solid royalblue;'/></a></div>
		<div id='free-5'></div>
			<a href='public/school-timeline.php?skoolid=".$all_schools['id']."'><h6 style='color:red; font-weight:bold; font-size:11px; text-transform:uppercase;  text-align:left; margin-left:10px;'>".$all_schools['name']."</h6></a>
		<font style='font-size:11px; display:block; text-align:left; margin-left:10px;'>".$all_schools['motto']."</font>
		<div id='free-5'></div>
		</div>
	</div>
	</div>
	";
}
?>
</div>

<div class="rows" id="main-rows" style="clear:both;">
		<h4 style="color:#286090; margin-left:20px;">School Events</h4>
<div id="free-0"></div>
<?php
	foreach ($events as $event) {
		echo "
	<div class='col-md-6'><div class='thumbnail' style='padding:0px;background:#f9f9f9; height:270px; border-bottom:1px solid #ddd;'>
		<img src='images/events/".$event['pic']."' style='border-bottom:2px solid green; width:100%;'>
		<div id='caption' style='position:relative; padding:10px;'>
		<div style=' position:absolute; z-index:10; top:-30px; left:10px;'>
		<a href='public/school-timeline.php?skoolid=".$event['id']."'><img src='".ltrim($event['badge'],'\.\./')."' class='img-rounded' style='width:50px; height:50px; background:#fff; padding:5px; border:1px solid green;'/></a></div>
		<div id='free-10'></div>
			<h5>".strtoupper($event['name'])."</h5>
			<p>".word_teaser($event['body'],'20')."<a href=''><i>...Read more</i></a></p>
		<div id='free-5'></div><i style='color:#aaa;'>".date('d M Y', $event['date'])."</i>
		</div>
	</div>
	</div>

		";
	}
?>
</div>
	
<div class="free-20"></div>


<?php $schools = $db->select("schools" ,"");?>

<div id="dragable" style="padding:20px;">
<table border="2" class="compare table table-bordered table-striped" style="width:100%; border-radius:10px;" cellspacing="3" cellpadding="3">
	<tr><th colspan="4"><h5>COMPARE SCHOOLS USING OUR COMPARE TOOL</h5></th></tr>
	<tr><th id="name">Scool name</th><th id="moto">Religion</th><th id="phone">Gender</th><th id="website">Category</th></tr>
</table>
<hr/>

<h4 style="color: #286090;">Use <font color="orange">drag and drop</font> to add school</h4>
<div class="schoolsList" style="width:100%; padding-top:10px;">
<?php
	foreach($schools as $school)
	{
		echo "<a href='#' rel=".$school['id']."><img src='".ltrim($school['badge'],'\.\./')."' style='background:#fbfbfb; border:1px solid #eee; padding:4px; width:80px; height:80px; margin:3px;'></a>";
	}
?>
</div>
</div>

<div class="rows" style="clear:both;">
			<div class="col-md-4">
		<div class="panel panel-default" style="border-bottom-left-radius:0; border-top-left-radius:0; height:305px;background:#f9f9f9; overflow:hidden;">
				   <div class="panel-heading"><font style="font-weight:bold; color:green;">Latest News</font></div>
				   <div class="panel-body" style="padding:10px;">	 

						<div class="news-grids-bottom">
							<!-- date -->
							<div id="design" class="date">
								<div id="cycler">   
				   <?php
				   		foreach ($posts as $posted) {
				   			echo "
									<div class='date-text'>
								<div class='media'>
								   <a class='pull-left' href='#'>
								      <img src='".ltrim($posted['pic'],'\.\./')."' class='media-object' style='width:50px; height:50px; background:#fff; padding:5px; border:1px solid green;'/>
								   </a>
								   <div class='media-body'>
								      <h5 class='media-heading'>".ucfirst($posted['heading'])."</h5>
								      ".word_teaser($posted['post'],'30')."
									  <br/><i style='color:#aaa;'>".date('d M Y', $posted['date'])."</i>
								   </div>
								</div>	<div id='free-10'></div>
									</div>

				   			";
				   		}
				   ?>
								</div>
							</div>
							<!-- //date -->
						</div>

				   </div>
				</div>		
			</div>
<!-- <div class="col-md-4">
<div class="thumbnail animated fadeIn" style="background:snow; padding:7px 10px 5px; border:1px solid bisque;">
	<h5>Events Calendar</h5>
	<hr style="margin-top:5px; margin-bottom:5px; border:0; height:2px; background-image:linear-gradient(to right, orange, #fff);"/>
	<div class="panel panel-primary" style="border-radius:8px; border:none; background:url(images/10.png); margin-top: 40px; position:relative;">
		<div style="font-size: 40px; color:#333; padding: 7px 13px 7px; position: absolute; top: -30px; left: 15px; background: -moz-linear-gradient(0deg, #A8A2A2 15%, #F2F0F0 56%);/* FF3.6+ */
background: -webkit-gradient(linear, 0deg, color-stop(15%, A8A2A2), color-stop(56%, F2F0F0));/* Chrome,Safari4+ */
background: -webkit-linear-gradient(0deg, #A8A2A2 15%, #F2F0F0 56%);/* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(0deg, #A8A2A2 15%, #F2F0F0 56%);/* Opera 11.10+ */
background: -ms-linear-gradient(0deg, #A8A2A2 15%, #F2F0F0 56%);/* IE10+ */
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1301FE', endColorstr='#F4F60C', GradientType='1'); /* for IE */
background: linear-gradient(0deg, #A8A2A2 15%, #F2F0F0 56%);/* W3C */ border-radius: 10px; border:1px solid #ddd;">28</div>
		<div class="panel-heading" style="color: #fff; background:rgba(40,96,144,.9); border-top-left-radius: 6px; border-top-right-radius: 6px; text-align: right; padding:7px 10px 7px;">Thur, 7 Apr</div>
		<div style="margin-top: 20px; padding:0px 15px 0px;">
			<h5 style="color: #eee; font-weight: lighter; text-decoration: underline;">Ngo day</h5>	
			<p style="color:#ccc;">Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta.</p>
		</div>	
		<div id="free-5"></div>	
	</div>
	<p>Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
<div id="free-10"></div>
	<hr style="margin-top:5px; margin-bottom:10px; border:0; height:1px; background-image:linear-gradient(to right, #eef, #eef);"/>
<a href="" class=" btn btn-primary" style="width:100%; line-height:12px; font-size:12px; border-radius:3px;">More schools</a>
<div id="free-10"></div>
</div>
</div> -->

</div>

<div class="col-md-4">
<div class="thumbnail animated bounceInRight" style="background:snow; padding:7px 10px 5px; border:1px solid bisque;">
	<h5>Job Vacancies</h5>
	<hr style="margin-top:5px; margin-bottom:5px; border:0; height:2px; background-image:linear-gradient(to right, red, #fff);"/>
	<h6><b>Teacher needed</b></h6>
	<p>Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
	<h6><b>Program at skoolynk</b></h6>
	<p>Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
	<h6><b>Learn at xaexia</b></h6>
	<p>Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
<div id="free-10"></div>
	<hr style="margin-top:5px; margin-bottom:10px; border:0; height:1px; background-image:linear-gradient(to right, #eef, #eef);"/>
<a href=""  class=" btn btn-primary" style="width:100%; line-height:12px; font-size:12px; border-radius:3px;">More about Jobs</a>
<div id="free-10"></div>
</div>
</div>
<div id="free-10"></div>





<div id="free-0"></div>
</div>
		</div>
		
	<div class="container" style="background:#f1f1f1; width:100%; margin-top:-30px; clear:both;">	
				<div id="free-10"></div>
			<div class="row" id="bottom-districts">

			<div class="col-md-10 col-sm-10 col-xs-12" style="padding:0px;">
			<div class="rows">
					<div class="col-md-3 col-xs-6">
						<div class="site-links">
							<h2>Central Uganda</h2>
							<ul class="nav" id="myList">
							<?php districts('central');?>
							</ul>
							<i id="loadMore" class="fa fa-angle-down btn btn-primary"></i><i id="showLess" class="fa fa-angle-up btn btn-default"></i>
						</div>
					</div>					
					<div class="col-md-3 col-xs-6">
						<div class="site-links">
							<h2>Western Uganda</h2>
							<ul class="nav" id="myListSec">
							<?php districts('western');?>
							</ul>
							<i id="loadMoreSec" class="fa fa-angle-down btn btn-primary"></i><i id="showLessSec" class="fa fa-angle-up btn btn-default"></i>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="site-links">
							<h2>Eastern Uganda</h2>
							<ul class="nav" id="myListThr">
							<?php districts('eastern');?>
							</ul>
							<i id="loadMoreThr" class="fa fa-angle-down btn btn-primary"></i><i id="showLessThr" class="fa fa-angle-up btn btn-default"></i>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="site-links">
							<h2>Northern Uganda</h2>
							<ul class="nav" id="myListFor">
							<?php districts('northern');?>
							</ul>
							<i id="loadMoreFor" class="fa fa-angle-down btn btn-primary"></i><i id="showLessFor" class="fa fa-angle-up btn btn-default"></i>
						</div>
					</div>	
			
			</div>
			</div>

					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="site-links">
							<h2>Site Links</h2>
							<ul class="nav">
								<div class="col-md-12 col-xs-6">
								<li><a href="#" title="developers">Developers</a></li>
								<li><a href="index.php" title="skoolynk">Home</a></li>
								<li><a href="about-skoolynk.php" title="about skoolynk">About</a></li>
								<li><a href="contact.html">Contact</a></li>
								</div>
								<div class="col-md-12 col-xs-6">
								<li><a href="#">FAQs</a></li>
								<li><a href="help-and-support.php">Help</a></li>
								<li><a href="contact.html">Privacy policy</a></li>
								<li><a href="signup.php"><b>Sign up</b></a></li>	
								</div>			
							</ul>
						</div>
					</div>
			</div>
				
				
				<div id="free-30"></div>
				<div class="rows" id="social-media-rows">
					<div class="col-md-3 col-xs-3"><font color="#3c5b9b"><a href="https://www.facebook.com/skoolynk" title="skoolynk facebook" target="_blank"><i class="fa fa-facebook-square"></i></font><h6>Skoolynk</h6></a></div>
					<div class="col-md-3 col-xs-3"><a href="https://twitter.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#2daae1" title="skoolynk twitter" target="_blank"><i class="fa fa-twitter-square"></i></font><h6>@skoolynk</h6></a></div>
					<div class="col-md-3 col-xs-3"><a href="https://instagram.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#517fa4"><i class="fa fa-instagram"></i></font><h6>skoolynk</h6></a></div>
					<div class="col-md-3 col-xs-3"><a href="https://google plus.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#f5230a"><i class="fa fa-google-plus-square"></i></font><h6>skoolynk</h6></a></div>
				</div>
				<div id="free-20"></div>
	</div>
		
	<footer>
		<div class="footer2">
					<div style="text-align:center;">
					Copyright &copy; 2016 skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com/" target="_blank" rel="designer" title="xaexia"><font color="#fff">XAEXIA</font></a>
					</div>
		</div>

	</footer>		

		

	
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
   <script>
      $(function () { $(".popover-options a").popover({html : true });});
   </script>
 <script type="text/javascript" src="js/autoFill.js"></script>
 <script type="text/javascript" src="js/loadMore.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
	$('.schoolsList a').draggable({helper:"clone"}); 
	$('.compare').droppable({
		drop:function(event, ui){
			var id = $(ui.draggable).attr('rel');
			$.ajax({url:"public/getschool.php", type:"post", dataType:"json",  data:{id:id}, 
			success: function(data)
			{
			$('table').append('<tr><td id="name">'+data.name+'</td><td id="moto">'+data.religion+'</td><td id="phone">'+data.gender+'</td><td id="website">'+data.boarding+'</td></tr>');
			$(ui.draggable).remove()
			}
		});
		}
	});
}); 
</script>
<!------this uses click to add schools -------------->
<script type="text/javascript">
$('document').ready(function(){
	$('#dragable #laugh').on('click', function(e){
		var id = $(this).attr('rel');
		$(this).remove();
		$.ajax({url:"public/getschool.php", type:"post", dataType:"json",  data:{id:id}, 
			success: function(data)
			{
			$('table').append('<tr><td id="name">'+data.name+'</td><td id="moto">'+data.religion+'</td><td id="phone">'+data.gender+'</td><td id="website">'+data.boarding+'</td></tr>');
			}
		});
		e.preventDefault();
	});
	});
</script>
<!------this uses drag and drop to add schools -------------->

<script type="text/javascript">
$('document').ready(function(){
	loadMore();
});
function loadMore(){
	setTimeout(function(){
		$('#ads').addClass('animated hinge');
	},3000);
}

</script>

								<script>
									function cycle($item, $cycler){
										setTimeout(cycle, 4000, $item.next(), $cycler);
										
										$item.slideUp(1000,function(){
											$item.appendTo($cycler).show();        
										});
						
										}
									cycle($('#cycler div:first'),  $('#cycler'));
								</script>
</body>
</html>