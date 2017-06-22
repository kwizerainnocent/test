<?php include "includes/header.php"; ?>
<style type="text/css">
	#viewOptions li { display: inline-block; font-size:14px; font-weight: lighter; margin-right:10px; }
</style>
<?php
$school_id = unserialize($_SESSION['Administrator']);
$people = $db->select("student", "(cate!='s' OR cate!='d') AND school_id='".$school_id['school_id']."'");
?>
<style type="text/css">
	.form-control{
		border-radius: 1px;
		margin-bottom: 4px;
		background: #fff;
		font-size: 12px;
		color:green;
	}
</style>
<div id="page-wrapper" style="padding:2px;">
	<div class="container-fluid" style="margin:0px;">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">
				<div id="free-20"></div>
					Edit Staff <a id="addStaff" style="float:right; font-size:14px; cursor: pointer; font-weight: bold;">Add staff</a>
					</h4>
					<br/>
					<ul id="viewOptions">
						<li><a href="#" id="listView"><i class="fa fa-list"></i> <font style="font-family: tahoma;">List View</font></a></li>
						<li><a href="#" id="tableView"><i class="fa fa-th"> <font style="font-family: tahoma;">Tabular View</font></i></a></li>
					</ul>
			</div>
		</div>
		<div id="showStaff" class="thumbnail" style="border-radius: 0px; display:none; background:#f9f9f9; padding:10px; ">
			<div class="col-md-2">
			<img  class="img-circle" id="img" width="100%">
				</div>
				<div class="col-md-5">
					<h5 style="margin-top: 0px;" id="heading">About Kwizera Innocent</h5>
					<h6><b>Name :</b> <font id="name"></font></h6>
					<h6><b>Email:</b>  <font id="email"></font></h6>
					<h6><b>Contact:</b> <font id="tell"></font></h6>
					<h6><b>Address:</b> <font id="location"></font></h6>
				</div>
				<div class="col-md-5">
					<h5 style="margin-top: 0px;">Responsibilities</h5>
					<h6 id="cate"></h6>
					<h6 id="resp"></h6>
				</div>
				<div id="free-10"></div>
		</div>
		<div class="thumbnail" id="addThem" style="background:snow; border-radius: 1px; box-shadow: -1px 5px 30px #aaa; display:none; z-index:200; width:50%; top:108px; left:50; position: absolute;">
		<h5 style="padding-left: 15px;">Add a new Staff Member.
			<a id="close" style="font-size:15px; color:#fff; width: 20px; border-radius:100%; height: 20px; line-height: 20px; text-align: center; font-weight:lighter; background:#286090; float: right; text-decoration: none; cursor: pointer; margin-right: 20px;">X</a></h5>
			<form action="autoLoader.php" method="post">
			<div class="rows">
				<div class="col-md-6">
					<label id="signup-label">First Name  </label>
					<input type="text"  name="fname" class="form-control" placeholder="Enter first name" />
					<label id="signup-label">Email  </label>
					<input type="email"  name="email" class="form-control" placeholder="Enter Email" />
					<label id="signup-label">Location  </label>
					<input type="text"  name="location" class="form-control" placeholder="Location" />
					<label id="signup-label">Phone Number  </label>
					<input type="text"  name="phone" class="form-control" placeholder="Enter Phone Number" />
				</div>
				<div class="col-md-6">
					<label id="signup-label">Surname  </label>
					<input type="text"  name="sname" class="form-control" placeholder="Enter second name" />
					<label id="signup-label">Category  </label>
					<select name="cate" class="form-control">
						<option>Staff category</option>
						<option value="t">Teacher</option>
						<option value="admin">Administrator</option>
					</select>
					<label id="signup-label">Responsibility  </label>
					<input type="text"  name="responsibility" class="form-control" placeholder="Enter Responsibility" />
					<label id="signup-label">Category  </label>
					<label id="signup-label">Gender  </label>
					<div class="rows">
					<div class="col-md-3" style="padding:0px;">
						<input type="radio" name="gender" value="male"/> Male 
					</div>
					<div class="col-md-9" style="padding:0px;">
						<input type="radio" name="gender" value="female"/> Female
					</div>
					</div>
					<div id="free-10"></div>
					<input type="submit" name="addStaff" value="Add Staff" class="btn btn-primary btn-sm" />

				</div>
			</div>
			</form>
			<div id="free-10"></div>
		</div>
		<div class="rows" style="padding:5px; border-radius:0px;">
		<?php  foreach ($people as $person) { ?>
			<div class="col-md-4" id="peopleList" style="padding:5px;">
			<div class="thumbnail" style="border:1px solid #eef; margin-top: 5px; background: #f9f9f9; border-radius: 0px; padding:10px; height:170px;">
				<div class="media">
				   <a class="pull-left" href="#">
				      <img class="media-object" src="<?php echo $person['pic']; ?>" style="width:50px;">
				   </a>
				   <div class="media-body" style="font-size: 12px;">
				      <h5 class="media-heading"><?php  echo $person['first_name'] ." ". $person['second_name'] ; ?></h5>
				      <p style="font-size: 12px">Teacher / <?php echo $person['responsibility']; ?></p>
					  <p style="font-size: 12px; font-weight:bold;"><?php echo $person['email']; ?></p>
					  <p><a href="#"  data="<?php echo $person['id']; ?>" id="editShow"class="btn btn-primary btn-xs">View / Edit</a> <a href="" class="btn btn-danger btn-xs">Delete</a></p>
				   </div>
				</div>
			</div>
			</div>
		<?php } ?>	
		</div>	
	</div>
</div>
<?php include "includes/footer.php"; ?>
<script type="text/javascript">
	$(document).ready(function()
	{   
		
		$("p #editShow").on("click", function(e)
		{

			var userId = $(this).attr("data");
			$.ajax({
				url:"autoLoader.php",
				type:"post",
				data:{userId:userId},
				dataType:"json",
				success : function(data)
				{
					$("#name").html(data.first_name +" "+ data.second_name);
					$("#heading").html("About " + data.first_name +" "+ data.second_name);
					$("#email").html(data.email);
					$("#location").html(data.location);
					$("#tell").html(data.phone);
					$("#cate").html("Teacher");
					$("#resp").html(data.responsibility);
					$('#img').attr("src", data.pic);
				}
			});
			var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'; 
			$("#showStaff").show();
			$("#showStaff").addClass("animated bounceIn").one(animationEnd, function()
			{
				$(this).removeClass("animated bounceIn");

			});

			e.preventDefault();
		});
		//changing view on click
		$("#listView").on("click", function(e){
			$(".rows #peopleList").removeClass("col-md-4");		
			$(".rows #peopleList").addClass("col-md-12");
			e.preventDefault();	
		});

		$("#tableView").on("click", function(e){
			$(".rows #peopleList").removeClass("col-md-12");
			$(".rows #peopleList").addClass("col-md-4");
			e.preventDefault();
		});
	});
</script>