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
		<div class="thumbnail" style="padding:5px; margin:0px; border-bottom:2px solid #ccc; border-radius:3px;">
		<div class="rows" style="clear:both; padding:0px; margin:0px;">
			<div class="col-md-1" style="padding:0px;">
				<img src="<?php echo $userinfo['pic']; ?>" class="img-rounded" alt="inno" title="kwizera innocent" style="width:50px; height:50px; border-radius:3px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-11" style="padding:0px 10px; 0px">
			<h5 style="margin-top:5px;"><?php echo ucwords($userinfo['first_name'] . " ".$userinfo['second_name'] );?></h5>
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
		
		<!--this is the section that has the divs divided into two sections after the featured events-->
		<div style="color:#777; clear:both; border-radius:0px; padding:0px; margin-top:10px; margin-bottom:5px; " class="thumbnail">
		<button style="float:left; padding:6px; font-weight:bold;font-size:12px; color:green; border-radius:0px; background:none;" class="btn btn success">People's posts</button>
		<a href="your-school.php?skoolid=<?php echo $schoolInfo['id'];?>" title="<?php echo $schoolInfo['name'];?>" style="float:right; text-shadow:1px 1px 1px #555; font-size:12px; border-radius:0px;" class="btn btn-success">View your school profile</a>
		<div style="clear:both; height:0px;"></div>
		</div>

		<div class="rows" style="padding:0px; margin:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
		
		<!--this is the left hand side with the col-md-6-->
			<div class="col-md-6" id="col-md-6" style="padding:0px;">
				<?php 
				$events_at_school  = $db->select("events", "school_id= '". $schoolInfo['id']."'");
				//echo json_encode($events_at_school);
				//die();
				for($int=0; $int<count($events_at_school); $int++){
			echo "
			<div class='thumbnail' style='margin-right:5px; margin-bottom:5px; padding:0px; border-radius:0px;'>
				<div class='caption'>
				<h5 style='color:royalblue; margin:0px;'><img src='../images/badges100/".$schoolInfo['badge']."' style='width:40px; height:40px; margin-right:10px;'><a href='' style='color:#286090;'>".$schoolInfo['name']."</a></h5>
				<h6><b>".$events_at_school[$int]['heading']."</b></h6>
				<p>".$events_at_school[$int]['body']."</p>
				<font style='color:#999; display:block; margin-top:5px; font-size:11px;'>posted on ".date('d M',$events_at_school[$int]['date'])."</font>
				</div>
				<table class='table' style='margin-bottom:0px; background:#eef;'>
					<tr>
						<td><a href='' title='like post' id='comments'><i class='fa fa-smile-o' id='emotions'></i> <font class='badge badge-info'>100</font></a></td>
						<td><a href='' title='dislike post' id='comments'><i class='fa fa-frown-o' id='emotions'></i> <font class='badge badge-danger'>0</font></a></td>
						<td><a href='' title='comment on post' id='comments'>comments</a></td>
						<td><a href='' id='comments'><i class='fa fa-share' id='emotions'></i> share</a></td>
					</tr>
				</table>
			</div>						
						";
				   }
			
					
				?>
			</div>		

			
			<div class="col-md-6" id="col-md-6" style="padding:0px;">
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
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.cycle.all.js"></script>
   <script>
      $(function () { $(".popover-options a").popover({html : true });});
   </script>
    <script type="text/javascript" src="../js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="../js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
	</body>
</html>