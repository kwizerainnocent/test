<?php include "includes/header.php"; ?>
<div id="page-wrapper" style="padding:2px;">
	<div class="container-fluid" style="margin:2px;">
	<style type="text/css">
	#leftMenu{
		background:#f8f8f8;
		padding:0;
		border:1px solid #eee;
	}
	#leftMenu li a{
		padding:4px 10px 4px;
		color:#286090;
	}
	#leftMenu li{
		border-bottom:1px solid #eee;
	}
	#sendReply{
		cursor: pointer;
		text-decoration: none;
		padding:4px;
		border-radius:1px;

	}
	#sendMessage{
		display:none;
		border-radius:0px;
		box-shadow: none;
		background:#f7f7f7;
		margin-top:5px;
	}
	</style>
		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">
				<div id="free-20"></div>
					Inbox <small>All messages sent to <?php echo $schoolInfo['name']; ?></small>
				</h4>
			</div>
		</div>


		<div class="rows">
				<div class="col-md-3" id="leftMenu">
					<ul class="nav">
						<?php
							$get_emails = mysql_query("select * from message where school_id='{$data['school_id']}' group by email order by email asc");
						if(mysql_num_rows($get_emails)==0){
							echo "<li><a>No messages yet</a></li>";
						}else{
					while($rows_emails = mysql_fetch_array($get_emails)){
					echo "<li><a href='inbox.php?email=".$rows_emails['email']."&school_id=".$rows_emails['school_id']."'>".$rows_emails['email']."</a></li>";
								}
							}
						?>
					</ul>
				</div>
				<div class="col-md-9" style="background:url(../images/icons/message.PNG) no-repeat; background-size: 30%; background-position: center; max-height: 500px; overflow: auto;">
					<?php
						if(isset($_GET['email'])){
						$email = $_GET['email'];
						$school_id = $_GET['school_id'];
						$getTheMessages = mysql_query("select * from message where email='{$email}' and school_id='{$school_id}'");
						while($messages = mysql_fetch_array($getTheMessages)){
							echo "<div class='thumbnail' style='padding:10px; border-radius:0px; background:rgba(200,200,200,.1);'>
								<h5>".$messages['sender']."</h5>
								<h6>".$messages['email']."</h6>
								<p>".$messages['message']."</p>
								<div id='free-0'></div>
								<a class='btn btn-primary' id='sendReply' data-role='".$school_id."'><i class='fa fa-reply'></i> Reply</a>
								<textarea name='messageText' placeholder='type message here' class='form-control animated bounceIn' id='sendMessage' data-role='".$messages['id']."'></textarea>
							</div>";
						}
						}
					?>
				</div>
	
		</div>
	</div>
</div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/activeLink.js"></script>
    <script type="text/javascript">
    $('document').ready(function(){
    	$(document).on('click','#sendReply',function(){
    		var school_id = $(this).attr('data-role');
    		$(this).next('#sendMessage').show();
    	});


    });
    </script>
</body>
</html>
