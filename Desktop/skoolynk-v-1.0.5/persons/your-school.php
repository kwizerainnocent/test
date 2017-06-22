<?php include("includes/student-header.php"); ?>
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
		<div class="container"  id="container">
<div class="rows" id="main-rows">
	<div class="col-md-9 col-sm-9 col-xs-12" style="padding:0px;">
		<div class="rows" style="padding:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
			<div class="col-md-3" id="side-links" style="padding-right:10px;">
				<?php include("includes/students-side-links.php"); ?>
			</div>	

	<div class="col-md-9" id="general-col-md-d-9" style="padding:0px;">
		<div class="jumbotron" id="top-jumbotron-school" style="background:url(images/school-slider/<?php if(empty($details['slider'])){echo "default.jpg";}else{echo $details['slider'];} ?>); background-size:cover;">
			<div class="rows" id="outter-badge">
				<div id="innerDiv">
						<img src="images/badges100/<?php  
						if(empty($details['badge'])){
						echo "smile.png";
						}else{
						echo $details['badge']; 
						}
						?>" alt="<?php  echo strtoupper($rows['name']); ?>"/>	
				</div>
			</div>
		  <div class="rows">
			 <font style='text-shadow:1px 1px 1px #444;'>
			 <?php echo ucfirst($rows['name']);?>(<?php echo ucfirst($rows['district']);?>, <?php echo ucfirst($rows['location']);?>)
			 </font>
			<br/>
			<?php echo "<h6><b>Email :</b> <font style='font-size:12px; text-shadow:1px 1px 1px #444; color:#eee;'>".$rows['email']." </font></h6>";?>
		   </div>
		</div>

		<div class="thumbnail" id="thumbnail-zero-head">
		<div class="media">
			<a class="pull-left" href="school-staff-directory.php?role=headmaster">
			<?php
				$my_id = $rows['id'];
				$get_person = mysql_query("select * from people where school_id='{$my_id}' AND role='Headmaster'");
				$rows_person = mysql_fetch_array($get_person);
				if(empty($rows_person['pic'])){
				echo "<img src='images/userPro/male.png'/>";
				}else{
				echo "<img src='images/userPro/".$rows_person['pic']."'/>";
				}
			?>
			</a>
			<div class="media-body">
				<h5>A word from the Headteacher</h5>
				<p>
						<?php
							$get_article = mysql_query("select * from articles where school_id='$skoolid'");
							$rows_article = mysql_fetch_array($get_article);
							echo word_teaser($rows_article['word'],40);
							echo "<a href='school-about.php?skoolid=".$rows['id']."'> Continue Reading...</a>";
						?>
				</p>
			</div>
		</div>
		</div>
		
		<div class="thumbnail" id="white-thumbnail">
		<h5><?php echo ucfirst($rows['name']);?> Events</h5>
		<p>View events in <?php echo ucfirst($rows['name']);?></p>
			<?php
				$get_events = mysql_query("select * from events where school_id = '$skoolid' limit 4");
				while($rows_events = mysql_fetch_array($get_events)){
				echo "<div class='col-md-3 col-sm-6 col-xs-6'>
				<a title='".$rows_events['heading']."'>
				<div class='thumbnail'>
				<img src='images/events/".$rows_events['pic']."'/>
				<div class='caption'>
				<p>".ucfirst($rows_events['heading'])."
				<font>".ucfirst(word_teaser($rows_events['body'],15))."</font>
				</p>
				</div>
				</div>
				</a>
			</div>
				";
				}
			?>
			<div id="free-0"></div>
		</div>
		
		<div class="thumbnail" id="upcoming">
		<h5>Upcoming events</h5><hr/>
		<div class="row">
			<?php
				$get_events = mysql_query("select * from events where school_id = '$skoolid' limit 2");
				while($rows_events = mysql_fetch_array($get_events)){
				$date = date('d',$rows_events['date']);
				$month = date('M',$rows_events['date']);
				echo "<div class='col-md-6'>
					<div class='media'>
						<a class='pull-left' href='#'>
							".$date."<hr style='margin:0px;'/>
							<h6>".$month."</h6>							
						</a>
						<div class='media-body'>
							<h5>".ucfirst($rows_events['heading'])."</h5>
							<p>";
							$article =  $rows_events['body'];
							echo word_teaser($article,40);
							 echo "<br/><a href='school-events.php'><b>Continue Reading »</b></a>
							</p>
						</div>
					</div>
			</div>"; 
			}
			?>
		</div>
		</div>
		
		<div class="thumbnail" id="discover">
		<div class="rows">
			<div class="col-md-6" id="col-md-6-1">
				<div class="panel">
					<div class="panel-heading">Discover More</div>
					<div class="panel-body">
					<div id="free-20"></div>
						<h6 id="small-head">Join <?php echo ucfirst($rows['name']); ?>.</h6>
						<p>Get help online to join <font style="font-weight:bold; color:#333;"><?php echo ucfirst($rows['name']); ?></font>, find online admission forms here. Just a click away.</p><br/>
						<h6 id="small-head">Alumni</h6>
						<p>We are soon coming up with a page for alumni so that the former students of the great institute get to check out their former school.</p><br/>
						<h6 id="small-head">Follow us</h6>
						<p>Follow us and get to know more about <font style="font-weight:bold; color:#333;"><?php echo ucfirst($rows['name']); ?></font>. <br/> You can follow us on social media. </p>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="col-md-6-2">
				<div class="panel">
					<div class="panel-heading">Recent News</div>
					<div class="panel-body">
					<div id="free-10"></div>
					<?php
						$news = mysql_query("select * from posts where school_id = '$skoolid'");
						while($rows_news = mysql_fetch_array($news)){
						echo "
					<div class='media'>
						<a class='pull-left' href='#'>
							<img class='img-rounded' src='images/posts/".$rows_news['pic']."' alt='post'>
						</a>
						<div class='media-body'>";
						$article =  $rows_news['post']; 
							echo "<h5>".word_teaser($article,2)."</h5>
							<p>
							 ".word_teaser($article,20)."<br/>
							 <i>Posted on ".date('d M Y',$rows_news['date'])."</i>
							</p>
						</div>
					</div>";
						}
					?>
					</div>
				</div>
			</div>
		</div>
		<div id="free-0"></div>
		</div>
		<div class="thumbnail" id="bottom-timeline">
		<div class="rows" style="padding:0px;">
             <div class="col-md-6">
				<h4>Our facebook posts</h4><hr/>
			 </div>
             <div class="col-md-6">
			 <h4>Register for newsletters </h4><hr/>
			 <p id='success'>Register now for our newsletter and keep in touch and up to date with all activities</p><br/>
			<form>
				<div class="input-group">
				<input type="email"  id="email" class="form-control"  placeholder="example@email.com"/>
					<span class="input-group-btn">
					<input class="btn btn-info" type="submit" id="register" value="Register now" value="save changes"/>
					<input type="hidden" value="<?php echo $rows['id'];?>" name="id" id="skoolid"/>
					</span>
				</div>	
			</form>
			 </div>
			 <div id="free-0"></div>
		</div>
		</div>
	</div>
	<!--end of the col-md-9-->		
	</div>	
</div>	
	</div>
	<!--this is the div that will hold the side information for the col-md-3-->
	<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php	
	function all($table,$schoolid, $role){
	$new_table = $table;
		$query_all = mysql_query("select count(*) from {$new_table} where school_id='{$schoolid}' AND role='$role' ");
		while($all = mysql_fetch_array($query_all)){
		$count = $all[0];
		return $count;
	}
	}
	function total($table,$schoolid){
	$new_table = $table;
		$query_all = mysql_query("select count(*) from {$new_table} where school_id='{$schoolid}'");
		while($all = mysql_fetch_array($query_all)){
		$count = $all[0];
		return $count;
	}
	}
?>	


<?php
	$get_school_details = mysql_query("select * from school_details where school_id='{$id}'");
?>

	<div class="thumbnail" id="side-thumb">
	<div class="thumbnail" id="badge-top">
					<div class="media">
						<a class="pull-left" href="#">
						<img src="images/badges100/<?php  
						if(empty($details['badge'])){
						echo "smile.png";
						}else{
						echo $details['badge']; 
						}
						?>" alt="<?php  echo strtoupper($rows['name']); ?>" />						
						</a>
						<div class="media-body">
							<h5><?php  echo strtoupper($rows['name']); ?></h5>
							<i style="color:#286090;"><?php  echo ucfirst($rows['motto']); ?></font></i>
						</div>
					</div>
			<div id="free-0"></div>
	</div>
	<h6>NAVIGATE SCHOOL</h6><hr/>
        <ul class="nav">
			<li><a href="school-academics.php?skoolid=<?php  echo $rows['id']; ?>"><i class="fa fa-book"></i> Academics</a></li>
			<li><a href="school-events.php?skoolid=<?php  echo $rows['id']; ?>"><i class="fa fa-calendar"></i> Events and calendar</a></li>
			<li><a href="school-staff-directory.php?skoolid=<?php  echo $rows['id']; ?>"><i class="fa fa-users"></i> Staff directory</a></li>
			<li><a href="school-contact.php?skoolid=<?php  echo $rows['id']; ?>"><i class="fa fa-phone"></i> Contact information</a></li>
			<li><a href="school-about.php?skoolid=<?php  echo $rows['id']; ?>"> <i class="fa fa-sitemap"></i> About school</a></li>
		</ul>
			<div id="free-10"></div>
	</div>
	<div class="thumbnail" style="border-radius:3px; padding:0px; margin-bottom:5px;"><img src="images/ads/kaymu.jpg" width="100%"></div>
	<div class="thumbnail" id="status-info">
	<h6>SCHOOL STATUS INFO</h6><hr/>
	<h6><i class="fa fa-map-marker" style="font-size:23px;"></i> Located in <?php  echo ucfirst($rows['location']); ?>, <?php  echo ucfirst($rows['district']); ?> District.</h6>

		<?php
			$get_population = mysql_query("select * from ");
		?>
			<table class="table table-bordered table-striped">
				<tr><td colspan="2"><h6>POPULATION AND SIZE</h6></td></tr>
				<tr><th>Students</th><td><?php echo all('people', $rows['id'], 'student');?></td></tr>
				<tr><th>Teaching staff</th><td><?php echo all('people', $rows['id'], 'teacher');?></td></tr>
				<tr><th>Non Teaching staff</th><td> <?php echo all('people', $rows['id'], 'teacher');?></td></tr>
				<tr><th>Total Population</th><th><?php echo total('people', $rows['id']);?></th></tr>
			</table>
		<p><b>Distance</b></p> 
			<span>From town: 20 Kilometers</span><br/>
	</div>
	</div>


</div>

				<div class="rows" style="font-soze:10px; margin-top:20px; text-align:center; padding:20px; clear:both; border-top:1px solid #ccc; color:#aaa;">
					&copy copyright 2015 skoolynk All rights reserved.
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