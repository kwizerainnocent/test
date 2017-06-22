	<a href="students-profile-page.php?student_id=<?php echo $_SESSION['id']; ?>" title="return to home page" style="color:#eee; text-decoration:none; background:#286090; font-weight:bold; border:none; border-radius:2px;" class="thumbnail"><i class="fa fa-home" style="padding:0px 10px 0px;"></i> <?php echo ucwords($userinfo['first_name'] . " ".$userinfo['second_name'] );?></a>
	<h5>QUICK LINKS.</h5>
	<ul class="nav">
		<li><a href="your-school.php?skoolid=<?php echo $schoolInfo['id'];?>"><i class="fa fa-institution"></i> Your school</a></li>
		<li><a href="class.php"><i class="fa fa-calendar"></i> Calendar and events</a></li>
		<li><a href="welcome-to-uneb.php"><i class="fa fa-calendar"></i> UNEB</a></li>
		<li><a href="suggestion-box.php"><i class="fa fa-meh-o"></i> Suggestion box</a></li>
		<li><a href="suggestion-box.php"><i class="fa fa-meh-o"></i> Schools News</a></li>
	</ul>
	<br/>
	<h5>HELP & SETTINGS</h5>
	<ul class="nav">
		<li><a href=""><i class="fa fa-gear" ></i> Settings</a></li>
		<li><a href=""><i class="fa fa-gears" ></i> Account settings</a></li>
		<li><a href=""><i class="fa fa-lock" ></i> Privacy</a></li>
		<li><a href="help-and-support.php"><i class="fa fa-question" ></i> Help</a></li>
		<li><a href=""><i class="fa fa-certificate" ></i>  Terms and policies</a></li>
		<li><a href=""><i class="fa fa-info" ></i>  About</a></li>
		<li style="background:#286090; border-radius:2px; line-height:12px; padding:0px 10px 0px; color:#fff;"><a href="student-logout.php" style="color:#fff; background:none !important;"><i class="fa fa-sign-out" ></i> Log Out</a></li>
	</ul>
	<div class="rows" style="font-soze:10px; margin-top:20px; border-top:1px solid #ccc; color:#aaa;">
		&copy copyright 2015 skoolynk All rights reserved.
	</div>