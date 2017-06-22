<?php include "includes/header.php"; ?>
<?php
$posts = $db->select("posts", "school_id='".$data['school_id']."' limit 5");
$events = $db->select("events", "school_id='".$data['school_id']."' order by date desc limit 1");



?>
<style type="text/css">
	.form-control{
		border-radius: 0px; 
		box-shadow: none;
		font-size: 12px;
	}
</style>
<div id="page-wrapper" style="padding:2px;">
	<div class="container-fluid" style="margin:0px;">
		<div class="rows">
			<div class="col-lg-12">
				<h4 class="page-header">
				<div id="free-20"></div>
					Dashboard <small>Statistics Overview</small><!-- 
					<h5>Stats</h5> -->
				</h4>
<!-- 				<ol class="breadcrumb" style="border:1px solid #ccc; color:red; border-radius: 1px; padding-top:5px; padding-bottom: 5px;">
					<li class="active">
						564 Visitors
					</li>
					<li class="active">
						56% Perfomance
					</li>
					<li class="active">
						89% Relevancy of posts
					</li>

					<li class="active">
						89% Profile
					</li>
				</ol> -->
			</div>
		</div>

			<div class="rows">
		<div class="col-md-6">
			<form method="post">
				<label>post something about your school</label>
				<input type="text" id="heading" name="heading" placeholder="heading or topic" class="form-control" /><br/>
				<textarea class="form-control" id="post" placeholder="post something here" name="schoolPost" rows="3" id="schoolPost"></textarea> 
   <div id="progressbar2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="display: none;"></div>


				<br/>
				<div id="error" style="display: none; color:red; font-weight: bold;">Please fill in the missing fields</div>
				<input type="submit" id="postIT" name="sendPost" value="post Now" class="btn btn-info btn-sm"/>
			</form>
			<hr/>
			<h5>Latest school posts</h5>
				   <?php
				   		foreach ($posts as $posted) {
				   			echo "
								<div class='date-text'>
								<div class='media'>
								   <a class='pull-left' href='#'>
								      <img src='".$posted['pic']."' class='media-object' style='width:50px; height:50px; background:#fff; padding:5px; border:1px solid green;'/>
								   </a>
								   <div class='media-body'>
								      <h5 class='media-heading'>".ucfirst($posted['heading'])."</h5>
								      ".$posted['post']."
									  <br/><i style='color:#aaa;'>".date('d M Y', $posted['date'])."</i>
								   </div>
								</div>	<div id='free-10'></div>
									</div>

				   			";
				   		}
				   ?>
			<hr/>
		</div>
		<div class="col-md-6">
			<h5><img src="../images/icons/time.jpg"/> Next Event</h5>
		   <hr style="margin-top: 5px;" />
			<div class="thumbnail" style="border:none;">
				<div class='media'>
				   <a class='pull-left' id='date' href='#' style="font-size: 40px; font-weight: lighter;">
				      <?php 
				      if(count($events)!=0){
				      echo date('d',$events[0]['date']); 
				  }else{
				  	echo"No events yet";
				  }
				      ?>
				   </a>
				   <div class='media-body'>
				      <h5 class='media-heading'> <?php
				      if(count($events)!=0){

				       echo $events[0]['heading']."</h5>";
				       echo $events[0]['body']; 
				   }?>
				   </div>
				</div>
			</div>
		   <hr/>
		</div>
		</div>

	</div>
</div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/activeLink.js"></script>
    <script type="text/javascript">
    	$("#addStaff").click(function(){
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    		$("#addThem").show();
    		$("#addThem").addClass('animated bounceIn').one(animationEnd, function(){
                $('#addThem').removeClass('animated bounceIn'); 
            });
            $('#close').click(function(){
                $('#addThem').addClass('animated bounceOut').one(animationEnd, function(){
                $('#addThem').removeClass('animated bounceOut'); 
                $('#addThem').hide(); 
            });
            });
    	});
    	$('document').ready(function(){
    		$('#postIT').click(function(e){
    			$('#progressbar2').show();
    			var heading = $('#heading').val();
    			var post = $('#post').val();
    			if(heading=="" || post==""){
    				$('#error').show();
    				$('#error').addClass('animated bounceIn');
    			}else{
    			$.ajax({url:"post.php", type:"post",dataType:"text", data:{"heading":heading, "post":post},success: function(back){
    				if(back){
    					$('#progressbar2').hide();
    				$('#error').show();
    				$('#error').addClass('animated bounceIn');
    					$('#error').html('your post was successfull');
    					$('#error').delay(3000).fadeOut();
    				}else{
    					alert(back);
    				}
    			}
    			});
    		}

    			e.preventDefault();

    		});

    	});
    </script>
   <script language="javascript">
      document.querySelector('#progressbar1').addEventListener('mdl-componentupgraded', function() {
         this.MaterialProgress.setProgress(44);
      });
      document.querySelector('#progressbar3').addEventListener('mdl-componentupgraded', function() {
         this.MaterialProgress.setProgress(33);
         this.MaterialProgress.setBuffer(87);
      });
   </script>
</body>
</html>
