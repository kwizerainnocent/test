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
				<img src="images/userPro/<?php echo $student_information['pic']; ?>" class="img-rounded" alt="inno" title="kwizera innocent" style="width:50px; height:50px; border-radius:3px; border:1px solid #ddd;"/>
			</div>
			<div class="col-md-11" style="padding:0px 10px; 0px">
			<h5 style="margin-top:5px;"><?php echo ucwords($_SESSION['username']);?></h5>
			</div>
		</div>
		<div id="free-0"></div>
		</div>
		
		<div class="rows" style="padding:0px; margin:0px;">
		<div class="thumbnail" style="padding:0px; margin:0px; background:none; border:none; border-radius:0px;">
<div class="media">
   <a class="pull-left" href="#">
      <img src="images/icons/suggestion-box.png" />
   </a>
   <div class="media-body">
	<div id="free-10"></div>
      <h4 class="media-heading" style="color:#286090;">Your suggestion box</h4>
	<div id="free-5"></div>
	Please feel free to post your suggestions to the ones in charge. <div id="free-10"></div>
	<p style="color:red;"><i class="fa fa-exclamation-triangle"></i> Note, what you post here is viewed by the administrators. Please be appropriate <br/></p>
	<p style=""><i class="fa fa-asterisk"></i>You choose to display your personal information in your suggestion.</p>
   </div>
</div>		
		</div>
		</div>
		<div class="thumbnail" style="padding:15px; margin:0px; border-radius:3px;">
		<div class="rows" style="clear:both; padding:0px; margin:0px;">
		<h5>Post your suggestion</h5>
			<form action="" method="post">
				<input type="text" name="heading" placeholder="Your subject" class="form-control"/><br/>
				<textarea name="suggestion" class="form-control" placeholder="post your suggestion" style="border-radius:2px;"></textarea>
				<div id="free-5"></div>
				<div class="rows">
				<div class="col-md-9" style="padding:0px;"><label>I dont want the admin to know i sent this <font color="red">(Hide Identity)</font></label>
				<input type="hidden" name="show" value="no" />
				<input type="checkbox" name="show" value="yes" /></div>
				<div class="col-md-3" style="padding:0px;"><input type="submit"  name="suggest" value="post suggestion" class="btn btn-primary" id="post"/></div>
				</div>
			</form>
			<?php
				if(isset($_POST['suggest'])){
					$student = $_SESSION['id'];
					$suggestion = $_POST['suggestion'];
					$heading = $_POST['heading'];
					$check = $_POST['show'];
					$date = time();
					if($check=='no'){
						$privacy = '0';
						$post_it = mysql_query("insert into students_suggestions(student_id,heading,suggestion,date,privacy) values('$student','$heading','$suggestion','$date','$privacy')");
						if(!$post_it){echo mysql_error();}
					}else{
						$privacy = '1';
						$post_it = mysql_query("insert into students_suggestions(student_id,heading,suggestion,date,privacy) values('$student','$heading','$suggestion','$date','$privacy')");
						if(!$post_it){echo mysql_error();}
					}
				}
			?>			
		</div>
		<div id="free-0"></div>
		</div>
	</div>	
	<!--end of the col-md-9-->		
	</div>	
</div>	
	</div>
	<!--this is the div that will hold the side information for the col-md-3-->
	<div class="col-md-3 col-sm-3 col-xs-12" style="background:none; border:1px solid #ddd; padding-left:10px; border:none;">
	<div class="thumbnail" style="padding:10px; margin-bottom:5px; max-height:550px; overflow:auto;">
				<h6 style="color:green; margin:0px; font-weight:bold; color:#999;">YOUR PREVIOUS SUGGESTIONS.</h6>
			<hr style="clear:both; margin-bottom:5px; margin-top:5px;"/>
			<?php
				$get_suggestions = mysql_query("select * from students_suggestions where student_id='".$_SESSION['id']."' limit 10");
				while($suggestions = mysql_fetch_array($get_suggestions)){
					echo "
					<h5 style='margin-bottom:2px; text-decoration:underline;'>".$suggestions['heading']."</h5>
					<p>".$suggestions['suggestion']."</p>
					";
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