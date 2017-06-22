<?php include("includes/student-header.php"); ?>
		<div class="container"  id="container">
<div class="rows" id="main-rows">
	<div class="col-md-9 col-sm-9 col-xs-12" style="padding:0px;">
		<div class="rows" style="padding:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
			<div class="col-md-3" id="side-links" style="padding-right:10px;">
				<?php include("includes/students-side-links.php"); ?>
			</div>	

	<div class="col-md-9 col-sm-9 col-xs-12" style="background:none; padding:0px; border:none;">

		<div class="thumbnail" style="padding:0px; margin-bottom:5px; background-size:100%; height:155px; border:1px solid #ccc; border-radius:3px;">
		<div class="rows" style="clear:both; padding:10px; background:skyblue; height:80px; margin:0px;">
			<div class="col-md-3">
				<img src="<?php echo $userinfo['pic']; ?>" class="img-rounded" alt="inno" title="<?php echo ucwords($userinfo['first_name']." ". $userinfo['second_name']);?>" style="width:130px; background:rgba(253,253,253,.5); padding:3px; height:130px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-5" style="padding:0px 15px; 0px">
			<h4 style="margin-top:5px; font-family:century gothic; color:#fff;"><?php echo ucwords($userinfo['first_name']." ". $userinfo['second_name']);?></h4>
			<h6  style="color:#286090; font-weight:bold;"><?php echo $userinfo['email']; ?></h6>
			</div>
			<div class="col-md-4" style="padding:0px 20px; 0px">
			<h4 style="margin-top:5px; color:#fff; text-shadow:1px 1px 1px #286090; float:right;"><?php echo ucwords($userinfo['class']); ?></h4>
			<h6  style="color:#286090; font-weight:bold;"></h6>
			</div>
		</div>
		<a href="" class="btn btn-primary" style="border-radius:1px; margin:20px; font-size:12px; line-height:12px;"><i class="fa fa-edit"></i> Edit info</a>
		<div id="free-0"></div>
		</div>
		
		
		<div class="thumbnail" style="padding:5px; margin-bottom:5px; border-radius:3px;">
		<div class="rows" style="clear:both; padding:0px; margin:0px;">
			<div class="col-md-1" style="padding:0px;">
				<img src="<?php echo $userinfo['pic']; ?>" class="img-rounded" alt="inno" title="kwizera innocent" style="width:50px; height:50px; border-radius:3px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-11" style="padding:0px 10px; 0px">
			<h5 style="margin-top:5px;"><?php echo ucwords($userinfo['first_name']." ". $userinfo['second_name']);?></h5>
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
				<?php
					if(isset($_GET['message'])){
					$message = $_GET['message'];
						echo "<div id='free-10'></div>
								<div class='alert alert-info alert-dismissable' style='clear:both; padding:6px; margin:0px; border-radius:2px;'>
							   <button type='button' class='close' data-dismiss='alert' 
								  aria-hidden='true'>
								  &times;
							   </button>
							   ".$message."
							</div>";
					}
				?>
			</div>
		</div>
		<div id="free-0"></div>
		</div>
		

		<div class="rows" style="padding:0px; margin:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
			<div class="col-md-6" id="col-md-6" style="padding-left:0px; padding-right:10px;">
			<div class="thumbnail" style="padding:5px 15px 15px; border-radius:0px; margin-bottom:5px;">
				<h5>About <?php echo ucwords($userinfo['first_name']." ". $userinfo['second_name']);?></h5><hr/>
				<h6>Personal Info</h6>
				<h5>Full Name</h5>
				<p> <?php echo ucwords($userinfo['first_name']." ". $userinfo['second_name']);?></p>
				<h5>Email</h5>
				<p><?php echo $userinfo['email']; ?></p>
				<h5>Current School</h5>
				<p><?php echo ucwords($schoolInfo['name']);?></p>
				<h5>Location</h5>
				<p><?php echo $userinfo['location']; ?></p>
				<h5>Contacts</h5>
				<p><?php echo $userinfo['phone']; ?></p>
				<h5>Class</h5>
				<p><?php echo $userinfo['class']; ?></p>
			</div>

			<div class="thumbnail" style="padding:5px 15px 15px; border-radius:0px; margin-bottom:5px;">
				<h5>Your class mates</h5><hr/>
				<div class="rows">
					<?php
						$get_class_mates = $db->select("student", "school_id='".$schoolInfo['id']."' AND class='".$userinfo['class']."'");

						for($stu=0; $stu<count($get_class_mates); $stu++){
							echo "<div class='col-md-2' style='padding:1px;'>
							<a href='students-profile-page.php?student_id=".$get_class_mates[$stu]['id']."'>";
							if($get_class_mates[$stu]['pic']==""){
								echo "<img src='uploads/def.png' style='width:100%; height:45px;'/>";
							}
							else
							{
								echo "<img src='".$get_class_mates[$stu]['pic']."' style='width:100%; height:45px;'/>";
							}
							
							echo"</a></div>";
						}
					?>
				</div>
				<div id='free-0'></div>
			</div>
			</div>
			<div class="col-md-6" id="col-md-6" style="padding-right:0px; padding-left:0px;">
				<?php 
					$posts_by_you = $db->select('students_posts', "student_id = '".$userinfo['id']."'");
					for($counter =0; $counter<count($posts_by_you); $counter++)
					{
			echo "
					
			<div class='thumbnail' style='margin-right:5px; margin-bottom:5px; padding:0px; border-radius:0px;'>
					<h5 style='color:royalblue; margin:5px;'><img src='".$userinfo['pic']."' style='width:40px; height:40px; margin-right:10px; border-radius:3px;'><a href='' style='color:#286090;'>".$userinfo['first_name']." ". $userinfo['second_name']." </a></h5>
				";
				if(!empty($posts_by_you[$counter]['file'])){
				echo "<img src='../images/posts/".$posts_by_you[$counter]['file']."' style='width:100%;'/>";
				}
				echo "
				<div class='caption'>
				".$posts_by_you[$counter]['post']."
				<font style='color:#999; display:block; margin-top:5px; font-size:11px;'>posted on ".date('d M',$posts_by_you[$counter]['date'])."</font>
				</div>
				<table class='table' style='margin-bottom:0px; background:#eef;'>
					<tr>
						<td><a href='' title='like post' id='comments'><i class='fa fa-smile-o' id='emotions'></i> <font class='badge badge-info'>".$posts_by_you[$counter]['likes']."</font></a></td>
						<td><a href='' title='dislike post' id='comments'><i class='fa fa-frown-o' id='emotions'></i> <font class='badge badge-danger'>".$posts_by_you[$counter]['dislikes']."</font></a></td>
						<td><a href='' title='comment on post' id='comments'>comments</a></td>
						<td><a href='' id='comments'><i class='fa fa-share'></i> share</a></td>
					</tr>
				</table>
			</div>						
						";
					}
											
				?>
			</div>
			<br style="clear:both;">
		</div>
		</div>
	</div>	
	<!--end of the col-md-9-->		
	</div>	
</div>	
	</div>
	<!--this is the div that will hold the side information for the col-md-3-->
	<div class="col-md-3 col-sm-3 col-xs-12" style="background:none; border:1px solid #ddd; padding-left:10px; border:none;">
	<div class="thumbnail" style="padding:10px; margin-bottom:5px;">
				<h6 style="color:green; margin:0px; font-weight:bold; color:#999;">SCHOOLS IN UGANDA.</h6>
			<hr style="clear:both; margin-bottom:5px; margin-top:5px;"/>
			<div class="rows" style="padding:0px; border-radius:0px;">
			<?php

				$schools=$db->select("schools , school_details", "schools.id = school_details.school_id order by rand() limit 8");
				 for($var=0; $var<count($schools); $var++){
					echo "<div class='col-md-3' style='padding:2px;'><a href='your-school.php?skoolid=".$schools[$var]['id']."' title='".$schools[$var]['name']."'><img src='../images/badges100/".$schools[$var]['badge']."' alt='".$schools[$var]['name']."' style='height:40px;'></a></div>";
				     }
				?>
				<a href="" title="see all schools available" style="clear:both; display:block;">view all schools <i class="fa fa-caret-right"></i></a>
			</div>	
<hr/>
				<h6 style="color:green; margin:0px; font-weight:bold; color:#999;">LATEST NEWS IN YOUR SCHOOL.</h6>
				<?php 

				$events = $db->select('events', "");
					for($counter =0; $counter<count($events); $counter++)
					{
						echo "<div class='media'>
						<a class='pull-left' href='#'>
							<img src='../images/events/".$events[$counter]['pic']."' style='width:40px; height:40px; border-radius:3px; border:1px solid #ddd;'/>
						</a>
						<div class='media-body'>
							<h6 style='font-size:11px; margin:0px; font-weight:bold; color:#286090;'>".(word_teaser($events[$counter]['heading'],10))."</h6>
							<p style='font-size:11px; color:#555; margin-bottom:0px;'>".(word_teaser($events[$counter]['body'],10))."</p>
							<i style='font-size:10px; margin:0px; padding:0px; color:#bbb;'>Posted on ".date('d M',$events[$counter]['date'])."</i>
						</div>
						</div>";
					}
				?>
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