<style type="text/css">
	#eventsMenu li{ display: inline-block; margin-right:20px; font-weight:bold;}
	#vedEvent { list-style-type: none; margin-left:6px; }
	#vedEvent li { display: inline-block; margin-right:10px;   font-weight:100px; }
	#itemsChange{ border:2px solid #eef; padding:10px; border-radius: 4px; margin:10px auto; }
	#date{font-size:30px; color:#333; padding: 3px 9px 3px; margin-right: 10px; border-radius: 10px; border:2px solid #ddd; background: #eee; }
</style>
<?php include "includes/header.php"; ?>
<div id="page-wrapper" style="padding:2px;">
	<div class="container-fluid" style="margin:0px;">
		<div class="row">
			<div class="col-md-12">
				<h3 class="page-header">
				<div id="free-20"></div>
					Events and Holidays  <small>School events and activities</small>
				</h3>
			</div>
		</div>
		<div class="rows">
			<div class="col-md-12">
				<ul id="eventsMenu">
					<li>
						<a href="#" id="AddEvent" class="btn btn-primary btn-sm">
							Add New Event <i class="fa fa-plus"></i>
						</a>
					</li>
					<li>Change View : </li>
					<li><a href="#" id="list"><i class="fa fa-list"></i> List view </a></li>
					<li><a href="#" id="table"><i class="fa fa-th"></i>  Tabular View </a></li>
				</ul>
			</div>
			<div class="panel panel-primary" id="addEventForm" style="width:500px; right:300px; z-index: 1000; position: absolute; display: none;">
				<div class="panel-heading"> Add new event </div>
				<div class="panel-body">
				<form id="eventsForm" enctype="multipart/form-data" action="" method="post">
					<label>Event heading</label>
					<input type="text" name="heading" class="form-control"  placeholder="Enter event heading" /><br/>
					<label>Attach photo</label>
				    <input type="file" name="eventImage" id="eventImage"/><br/>
				    <label>Due date</label>
				    <input type="date" name="date" class="form-control"/><br/>
					<label>Events details if any</label>
					<textarea class="form-control" name="eventDetails" class="form-control"  rows="5" placeholder="Enter events details"></textarea><br/>
					<input type="hidden" name="operation" value="addEvents"/>
					<input type="submit" name="addEvents" value="Add event" class="btn btn-primary btn-sm" />
					<input type="submit" name="remove" id="removeBtn" value="close" class="btn btn-default btn-sm" />
				</form>
				</div>
				</div>
			</div>
			<hr/>
			<div id="allSchoolEvents">
			</div>
		</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>
<script type="text/javascript">
	$(document).ready(function()
		{
			var animated ="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

			$("#list").on("click", function(e)
				{
				   $("#allSchoolEvents #itemsChange").removeClass("col-md-4");
				   $("#allSchoolEvents #itemsChange").addClass("col-md-12");
                   e.preventDefault();
				}
			);

			$( "#table").on("click", function(e)
				{
					$(".rows #itemsChange").removeClass("col-md-12");
					$(".rows #itemsChange").addClass("col-md-4");
                    e.preventDefault();
				}
			);

			//showing ading event 

			$("#AddEvent").on("click", function(e){
				$("#addEventForm").show();
				var animated ="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
				$("#addEventForm").addClass("animated bounceIn").one(animated, function(){
					$(this).removeClass("animated bounceIn");
				});
				e.preventDefault();
			});

			$("#removeBtn").on("click",  function(e){
				$("#addEventForm").addClass("animated bounceOut").one(animated, function(){
					$(this).removeClass("animated bounceOut");
					$(this).hide();
					loadposts();
				});
				e.preventDefault();
			});
			// submitting form 
			$("#eventsForm").on("submit", function(e){
				var data = $(this).serialize();
				//alert(data);
				$.ajax({
					url:"eventsAutoloader.php",
					type:"post",
					data:data,
					success:function(info){
						if(info==1)
						{
							$("#addEventForm").addClass("animated bounceOut").one(animated, function(){
								$(this).removeClass("animated bounceOut");
								$(this).hide();
								loadposts();
							});
						}
						else
						{
							$("#addEventForm").html("..Network Error..");
						}
						
					}
				});
				e.preventDefault();
			});
			$(document).on("click", "#view", function(e){
				var id = $(this).attr("data-role");
					$.ajax({
					url:"eventsAutoloader.php",
					type:"post",
					dataType:"text",
					data:{view:"", id:id},
					success : function(info)
					{
						alert(info);
					}
				});
				e.preventDefault();
			});
			$(document).on("click", "#delete", function(e){
				var animated ="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
				var id1 = $(this).attr("data-role");
				$(this).parents("#itemsChange").css({"background":"red"});
				$(this).parents("#itemsChange").addClass("animated bounceOutRight").one(animated, function(){
					$(this).hide();
				})
				$.ajax({
					url:"eventsAutoloader.php",
					type:"post",
					dataType:"text",
					data:{deleteEvent:"", id:id1},
					success : function(info)
					{
											}
				});
				e.preventDefault();
			});
			//loading in posts for a single user
			loadposts();			
		}
	);
	function loadposts()
	{
		$.ajax({
				url:"eventsAutoloader.php", 
				type:"post", 
				dataType:"html", 
				data:{"loadEvents":""},  
				success:function (data)
				{
					$("#allSchoolEvents").html(data);
				}
		});}
</script>