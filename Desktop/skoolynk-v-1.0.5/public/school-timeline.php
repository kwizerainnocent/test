<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
	<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php include("includes/side.php");?>
	</div>

	<div class="col-md-9" id="general-col-md-d-9">
		<div class="jumbotron" id="top-jumbotron-school" style="background:url(<?php echo $details['slider'];?>); background-size:cover;">
			<div class="rows" id="outter-badge">
				<div id="innerDiv">
						<?php  
						if(empty($details['badge'])){
						echo "<img src='../images/badges100/smile.png'/>";
						}else{
						echo "<img src='".$details['badge']."'/>"; 
						}
						?>	
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
				$get_person = mysql_query("select * from student where school_id='{$my_id}' AND cate='admin'");
				$rows_person = mysql_fetch_array($get_person);
				if(empty($rows_person['pic'])){
				echo "<img src='../images/people/male.png'/>";
				}else{
				echo "<img src='../images/people/".$rows_person['pic']."'/>";
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
				<img src='../images/events/".$rows_events['pic']."'/>
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
							<img class='img-rounded' src='../images/posts/".$rows_news['pic']."' alt='post'>
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
</div>
		</div>
<?php include "includes/footer.php"; ?>