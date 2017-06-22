<?php
require_once '../classes/DbClass.php';  
$db = new DbClass();
$db->connect();


if(isset($_GET['person'])){
	$person = $_GET['person'];
	$get_person = mysql_query("select * from student where id='{$person}'");
	$rows_person = mysql_fetch_array($get_person);
	$get_person_school = mysql_query("select * from schools where id = '{$rows_person['school_id']}'");
	$gotten_sch =  mysql_fetch_array($get_person_school);
}
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best schools in uganda</title>
		<link rel="shortcut icon" href="../images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="../css/bootstrap.min.css" rel="stylesheet"/>
		<link href="../css/animate.css" rel="stylesheet"/>
		<link href="../css/skoolynk.css" rel="stylesheet"/>
		<link href="../css/font-awesome.min.css" rel="stylesheet"/>
	</head>
	<body style="background: #fff;">
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid" style="width:75%; margin:0 auto;">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand  animated rubberband"><img src="../images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <form class="navbar-form navbar-left" autocomplete="off" role="search">
			<input type="text" id="name"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:#f1f1f1; border:1px solid #306088;"/>
			<div id="results" class="results"></div>
		  </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="../index.php">Return Home</a></li>
			</ul>
	   </div>
	   </div>
	</nav>
	

</div>
<div class="thumbnail" style="border-radius:0px; background:#f1f1f1; margin-top:50px; margin-bottom: 5px;">
<div class="rows" style="width:75%; margin:auto;">
	<div class="col-md-10"><h5><?php echo ucfirst($rows_person['first_name'])." ".ucfirst($rows_person['second_name']);?></h5></div>
	<div class="col-md-2 animated tada" style="text-align:right; padding:0px;">
		<a href="../persons/Persons-login.php"  class="btn btn-primary" type="button"  style="text-decoration:none; border-radius:1px;">Join skoolynk</a>
	</div>
</div>
<div id="free-0"></div>
</div>

<div class="container"  id="container" style="margin-top:0px;">
<div class="rows" id="main-rows">
<div id="free-20"></div>
<div class="col-md-2">
	<div class="thumbnail" style="border-radius: 0px;">
	<?php echo "<img src='".$rows_person['pic']."' style='width:100%;'/>"; ?>
	</div>
</div>
<div class="col-md-7">
		<table class="table table-bordered table-striped">
		   <thead>
		      <tr>
		         <th>Name</th>
		         <th><?php echo ucfirst($rows_person['first_name'])." ".ucfirst($rows_person['second_name']);?></th>
		      </tr>
		   </thead>
		   <tbody>
		      <tr>
		         <th>School</th>
		         <td><a href='../public/school-timeline.php?skoolid=<?php echo $rows_person['school_id'];?>'><?php echo "".ucfirst($gotten_sch['name']) ." (<a href='http://".$gotten_sch['website']."' title='".ucfirst($gotten_sch['name']) ."' target='_blank'>".$gotten_sch['website']."</a>)"; ?></td>
		      </tr>
		      <tr>
		         <th>Category</th>
		         <td><?php 
		         if ($rows_person['cate']=='s') {
		         	echo 'Student';
		         }elseif ($rows_person['cate']=='t') {
		         	echo 'Teacher';
		         }elseif ($rows_person['cate']=='p') {
		         	echo 'Parent';
		         }elseif ($rows_person['cate']=='d') {
		         	echo 'Member';
		         }else{
		         	echo ucfirst(member);
		         }
		         ?>
		         </td>
		      </tr>
		      <tr>
		         <th>Location</th>
		         <td><?php echo ucfirst($rows_person['location']); ?></td>
		      </tr>
		      <tr>
		         <th>Gender</th>
		         <td><?php echo ucfirst($rows_person['gender']); ?></td>
		      </tr>
		   </tbody>
		</table>
</div>
<div class="col-md-3">
<div class="alert alert-success" style="background:#b848ff; color:#fff; border:none; ">
   <a href="#" class="close" data-dismiss="alert">
      &times;
   </a>
	we choose to display only alittle information about our users for privacy, please create an account with skoolynk to aquire better access.
</div>
</div>
<div id="free-10"></div>
<div class="rows" style="clear:both; padding:20px;">
      <h5><u>Other People in the same school</u></h5>
      <?php
      	$school = $gotten_sch['id'];
      	$get_students = mysql_query("select * from student where school_id='{$school}' and id!='{$rows_person['id']}'");
      	while($rows_students = mysql_fetch_array($get_students)){
      		echo "
      		<div class='col-md-1' style='padding:2px;'>
      		<a href='person.php?person=".$rows_students['id']."'>
      		<div class='thumbnail' style='border-radius:0px; padding:2px; position:relative;'>
      			<img src='".$rows_students['pic']."'/>

      		<div class='caption' style='position:absolute; bottom:0px; color:#fff; background:rgba(0,0,0,.3); width:100%; left:0; padding:2px 4px; 2px'>".ucfirst($rows_students['first_name'])."</div>
      		</div>
      		</a>
      		</div>
      		";
      	}
      ?>	
</div>
<div class="col-md-1"></div>
</div>
	
<div class="free-20"></div>
</div>
</div>
			

		

	
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
   <script>
      $(function () { $(".popover-options a").popover({html : true });});
   </script>
<script src="../js/simple_search.js"></script>
<script src="../js/specific_search.js"></script>
</body>
</html>