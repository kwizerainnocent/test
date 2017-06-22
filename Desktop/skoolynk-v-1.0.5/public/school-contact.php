<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php include("includes/side.php");?>
</div>
	<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
	<div class="thumbnail" id="toned-header">
	<h4>Contact <?php  echo ucfirst($rows['name']); ?></h4></div>
		<!--this is the thumbnail holding the map-->
		<div class="thumbnail" id="top-relative">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:289px;width:800px;'><div id='gmap_canvas' style='height:289px;width:800px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://prchecker.io/'></a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6c89b1c08be952be6d5d8da11abab94f6efaab96'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(0.3475964,32.582519700000034),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(0.3475964,32.582519700000034)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br><br> kampala<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		<div id="contact-content">
			Visit <?php echo strtoupper($rows['name']); ?> Located in <?php echo strtoupper($rows['district']); ?> District.
		</div>
		</div>
		<!--this is the end of the thumbnail holding the map-->

		<div class="thumbnail" id="white-thumbnail">
		<h5>Quick contacts to our offices</h5><hr/>
		<div class="row">
			<div class="col-md-5">
				<h5>School info</h5><hr/>
				<p><b>Tell:</b> <?php  echo ucfirst($rows['phone']); ?></p>
				<p><b>Email:</b> <?php  echo ucfirst($rows['email']); ?></p>
				<p><b>Website:</b> <?php  echo ucfirst($rows['website']); ?></p>
				<p><i class="fa fa-map-marker"></i> Located <?php  echo ucfirst($rows['location']); ?>, <?php  echo ucfirst($rows['district']); ?> District.</p>
			</div>
			<div class="col-md-7" id="send-message">
		<div class="thumbnail">
		<h5>Send us a message</h5>
		<form method="post" id="sendMessageForm">
			<input type="text" class="form-control" name="senderName" id="senderName" placeholder="Enter your full name" required style=" width:100%; margin-bottom:10px; " />
			<input type="email"  class="form-control" name="email" id="senderEmail" placeholder="Enter your email" style=" width:100%;  margin-bottom:10px;"/>
			<input type="hidden" name="schoolId" value="<?php echo $rows['id'];?>">
			<textarea class="form-control" id="sendMessageForm"  rows="4" name="message"></textarea><br/>
			<input type="submit" id="sendMessage" name="send" class="btn  btn-info" value="Send Message"/>
			<div id="error" class="animated bounceIn" style="color:red;"></div>
		</form>
		</div>
			</div>
		</div>
		<hr/>
		<a href="school-staff-directory.php?skoolid=<?php echo $rows['id']; ?>">See more contacts on staff directory</a>
		</div>
		<?php

			if(isset($_GET['message'])){
				$returned = $_GET['message'];
				echo "
				<div id='confirmation'>
					<div class='thumbnail'>
						<h4>Confirmation</h4>
						<a href='school-contact.php?skoolid=".$get_school['id']."'><i class='fa fa-close'></i></a>
						<hr>
						".$returned."
					</div>
				</div>";
			}
		?>
	</div>
</div>
</div>
<?php include "includes/footer.php"; ?>