<?php
require_once '../classes/DbClass.php';  
$db = new DbClass();
$db->connect();

if(isset($_GET['searchInDetails'])){
      $district = $_GET['districts'];
      $ownership = $_GET['ownership'];
      $school = $_GET['school'];
      $like="";
      if(!empty($district)){
         $like .="district LIKE '%".$district."%' && ";
      }
      if(!empty($ownership)){
         $like .="ownership LIKE '%".$ownership."%' && ";
      }
      if(!empty($school)){
         $like .="name LIKE '%".$school."%'";
      }
      if(empty($district) && empty($ownership) && empty($school)){
         header("Location:../index.php?message=please enter something to search");
      }
      $like = rtrim($like,' &&');
      $search_query = $db->select("schools", $like);
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
      <style type="text/css">
      .nav-tabs li a{
         color:green;
         font-weight: bold;
      }
      </style>
	</head>
	<body style="background: #fff;">
   <nav class="navbar navbar-fixed-top" role="navigation" id="header">
      <div class="container-fluid">
         <div class="navbar-header">
            <a href="../index.php" class="navbar-brand"><img src="../images/skoolynks.png" height="28"/></a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         <i class="fa fa-reorder" style="color:#fff; border:none;"></i>
               </button>
         </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <form class="navbar-form navbar-left" autocomplete="off" role="search">
         <input type="text" id="searchField"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:rgba(0,0,0,.1); border:1px solid #306088; height:28px; margin-top: 3px; color:#fff; font-size: 12px; width: 350px;"/>
            <div id="autoFill" class="cssarrow" style="background:snow; border-bottom: 1px solid #286090 text-align: left; display:none; width:350px; position:absolute; z-index:3000; top:50px; absolute; border-radius: 2px; padding: 3px 3px 3px; color:#286090;"></div>
        </form>
         <ul class="nav navbar-nav navbar-right">
            <!-- <li><a id="top-link" href="../index.php">Skoolynk Home</a></li> -->
         </ul>
      </div>
      </div>
   </nav>

	

</div>
<div class="thumbnail" style="border-radius:0px; background:#f1f1f1; margin-top:50px; margin-bottom: 5px;">
<div class="rows" style="width:75%; margin:auto;">
	<div class="col-md-10"><h5>Search Results</h5></div>
	<div class="col-md-2 animated tada" style="text-align:right; padding:0px;">
		<!-- <a href="../persons/index.php"  class="btn btn-primary" type="button"  style="text-decoration:none; border-radius:1px;">Join skoolynk</a> -->
	</div>
</div>
<div id="free-0"></div>
</div>

<div class="container"  id="container" style="margin-top:0px;  padding:20px;">

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#home" data-toggle="tab">Schools</a></li>
   <li><a href="#places" data-toggle="tab">Check Places</a></li>
   <li><a href="#students" data-toggle="tab">Students</a></li>
   <li><a href="#teachers" data-toggle="tab">Teachers</a></li>
</ul>
<div id="free-20"></div>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <?php
      if (count($search_query)==0) {
         echo"<h5>No school matched your search</h5>";
      }
      else{
      foreach($search_query as $schools){
            echo "
            <div class='col-md-2' style='padding:2px; text-align:center;'>
            <a href=school-timeline.php?skoolid=".$schools['id']."'>
            <div class='thumbnail' style='border-radius:0px; border:none; padding:0px; '>
               <img src='".$schools['badge']."' style='height:90px;'/>

            <div class='caption' style='bottom:0px; color:#286090; font-weight:bold; text-transform:capitalize; background:none; width:100%; left:0; padding:7px;'>".$schools['name']."</div>
            </div>
            </a>
            </div>
            ";
      }
   }

      ?>
   </div>

   <div class="tab-pane fade" id="places">
   </div>

   <div class="tab-pane fade" id="students">
      <?php
         foreach ($search_query as $studentGot ) {
      $students = $db->select("student", "school_id LIKE '%".$studentGot['id']."%' and cate='s'");
      foreach ($students as $student) {
            echo "
            <div class='col-md-2'>
            <a href='person.php?person=".$student['id']."'>
            <div class='thumbnail' style='border-radius:0px; padding:2px; position:relative;'>
               <img src='".$student['pic']."'/>

            <div class='caption' style='position:absolute; bottom:0px; color:#fff; background:rgba(0,0,0,.3); width:100%; left:0; padding:7px;'>".$student['first_name']." ".$student['second_name']."</div>
            </div>
            </a>
            </div>
            ";
      }
         }
      ?>
   </div>
   <div class="tab-pane fade" id="teachers">
      <?php
         foreach ($search_query as $studentGot ) {
      $students = $db->select("student", "school_id LIKE '%".$studentGot['id']."%' and cate='t'");
      foreach ($students as $student) {
            echo "
            <div class='col-md-2'>
            <a href='person.php?person=".$student['id']."'>
            <div class='thumbnail' style='border-radius:0px; padding:2px; position:relative;'>
               <img src='".$student['pic']."'/>

            <div class='caption' style='position:absolute; bottom:0px; color:#fff; background:rgba(0,0,0,.3); width:100%; left:0; padding:7px;'>".$student['first_name']." ".$student['second_name']."</div>
            </div>
            </a>
            </div>
            ";
      }
         }
      ?>
   </div>
</div>
	
<div class="free-20"></div>
</div>
</div>
			

		

	
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
   <script>
      $(function () { $(".popover-options a").popover({html : true });});
   </script>
   <script type="text/javascript">
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})


$('document').ready(function(){
   $('#searchField').keyup(function(){
      var user_search = $('#searchField').val();
      if(user_search.length==0){
         $('#autoFill').hide();
      }else{
      $('#autoFill').show();
      $.ajax({ type: 'GET', url: 'searchIn.php', data:{result: user_search}, success: function(info){
            $('#autoFill').html("<ul class='nav'>"+info+"</ul>");
            $('#autoFill').addClass('animated fadeIn');
            $('#error_search').addClass('animated tada');
      }
      });
   }
   });
});
</script>
<script src="../js/simple_search.js"></script>
<script src="../js/specific_search.js"></script>
</body>
</html>