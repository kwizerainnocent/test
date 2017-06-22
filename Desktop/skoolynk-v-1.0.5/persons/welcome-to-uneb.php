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

		<div class="thumbnail" style="padding:5px; margin-bottom:7px; border-bottom:2px solid #ccc; border-radius:3px;">
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
		
		<div class="thumbnail" style="padding:0px; margin:0px; border-radius:3px;">
		<div class="thumbnail" style="padding:15px; border:none;">
		<div style="clear:both; padding:0px; margin:0px;">
		<h5 style="text-align:center;">WELCOME TO UNEB</h5>
		<p style="text-align:center;"><img src="images/uneb.png" alt="UNEB" /></p>
		<div id="free-40"></div>
		<p style="text-align:center;"><a href="" class="btn btn-primary" style="text-transform:uppercase; font-size:12px; line-height:14px;" id="post">about Uneb</a></p>
		<div id="free-10"></div>
		<div class="rows">
				<hr style="margin-top:5px; margin-bottom:5px; border:0; height:1px; background-image:linear-gradient(to right,#fff,#ccc, #fff);"/>
		<div class="col-md-6">
		<h5>Ntinda Office</h5>
		<h6>36 Martyrs Way, Ntinda</h6>
		<h6>P.O. BOX 7066</h6>
		<h6>Kampala-Uganda</h6>
		<h6>Tel: 256-414-286635/6/7/8</h6>
		<h6>Fax: 256-414-289397</h6>
		<h6>Email: uneb@uneb.ac.ug</h6>
		</div>
		<div class="col-md-6">
		<h5>Kyambogo Office</h5>
		<h6>8-13 Kyambogo Road</h6>
		<h6>Tel: 256-312-260753/256-414-286173</h6>
		<h6>Fax: 256-414-287832</h6>
		<h6>Email: uneb@uneb.ac.ug</h6>
		</div>
		</div>
		
		</div>
		<div id="free-30"></div>
		</div>
		<div class="thumbnail" style="background:#f1f1f1; margin:0px; position:absolute; bottom:0; right:0; left:0; border-radius:0px;">
		<h6 style="text-align:center; font-weight:bold;">Website: <a href="http://www.uneb.ac.ug" target="_blank" title="uganda national examination board">www.uneb.ac.ug</a></h6>
		</div>
		</div>
	</div>	
	<!--end of the col-md-9-->		
	</div>	
</div>	
	</div>
	<!--this is the div that will hold the side information for the col-md-3-->
	<div class="col-md-2 col-sm-3 col-xs-12"id="side-links" style="background:none; border:1px solid #ddd; padding-left:10px; border:none;">
	<p title="return to home page" style="color:#eee; text-decoration:none; padding-left:20px; background:green; margin-bottom:0px; font-weight:bold; border:none; border-radius:2px;" class="thumbnail">UNEB</p>
	<div class="thumbnail" style="border-radius:0px; margin-top:7px; padding:10px;">
	<ul class="nav">
		<li><a href="class.php">Departments</a></li>
		<li><a href="results.php">Performance</a></li>
		<li><a href="class.php">Publications</a></li>
		<li><a href="welcome-to-uneb.php">News</a></li>
		<li><a href="suggestion-box.php">Timetables</a></li>
		<li><a href="suggestion-box.php">About Us</a></li>
		<li><a href="suggestion-box.php">Contacts</a></li>
		<li><a href="suggestion-box.php">Downloads</a></li>
	</ul>
	<br/>
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