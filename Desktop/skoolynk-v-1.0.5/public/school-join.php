<?php include("includes/header.php");?>
<?php
session_start();
$message = "";
$school = $_GET['skoolid'];
if(isset($_POST['loginnow'])){
	$email = $_POST['email'];
	$pass = sha1($_POST['password']);
if(!empty($email) && !empty($pass)){
	$getuser=mysql_query("SELECT *  FROM people WHERE email='$email' limit 1");
	$info=mysql_fetch_array($getuser);
	if($pass==$info['password'] ){
		if($info['position'] == "student"){
				$_SESSION['student_id'] = $info['id'];
				header("Location: school-students.php"); exit();
		}else if($info['position'] == "parent"){
				$_SESSION['parent_id'] = $info['id'];
				header("Location: school-parents.php"); exit();
		}else if($info['position'] == "teacher"){
				$_SESSION['teacher_id'] = $info['id'];
				header("Location: school-teachers.php"); exit();
		}
	}else{
		$message .= mysql_error();
	}
	
}else{
  $message .="please provide email and password";
}	
}else if(isset($_POST['joinschool'])){
	$name = $_POST['fname']." ".$_POST['sname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$position = $_POST['position'];
	$school_id = $_POST['school_id'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$location = $_POST['location'];
	$role = $_POST['role'];
	if($position == "student"){
			$verified = "yes";
		}else if($position == "parent"){ 
			$verified = "YES";
		}else if($position == "teacher"){
			$verified = "NO";
	}
	if(!empty($name) && !empty($gender) && !empty($email) && !empty($position)&& !empty($password)){
	$put = "INSERT INTO `people`(`school_id`, `name`, `password`, `position`, `role`, `dob`, `sex`, `location`,  `email`, `verified`) 
	                     VALUES ('$school_id', '$name', '$password', '$position', '$role', '$dob', '$gender', '$location', '$email', '$verified')";
	$insert = mysql_query($put);
	if($insert){
	    if($position== "student"){
				$_SESSION['student_id'] = $info['id'];
				header("Location: school-students.php"); 
				exit();
		}else if($position == "parent"){
				$_SESSION['parent_id'] = $info['id'];
				header("Location: school-parents.php"); 
				exit();
		}else if($position== "teacher"){
				$_SESSION['teacher_id'] = $info['id'];
				header("Location: school-teachers.php"); 
				exit();
		}
	}else{
		$message .= mysql_error();
	}
	}
}
?>
<div class="rows" id="main-rows">
<div class="col-md-3 col-sm-3 col-xs-12"  id="general-col-md-d-3">
<?php include("includes/side.php");?>
</div>
<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
<style>
#topwords{border-radius:0px;padding:10px;font-weight:bold;background:rgba(40,96,144,.4); color:#fff; margin-bottom:2px; box-shadow:none;}
#thumbs{border-radius:0px; padding:10px; margin-bottom:3px;}
#form-add input {border-radius:0;}
#people{background:#fff; text-align:center; color:#777;}
blockquote{font-size:13px; color:skyblue; font-weight:bold;}
</style>
		 <div class="thumbnail" id="topwords">JOIN <?php  echo strtoupper($rows['name']); ?></div>
         <div class="thumbnail" id="thumbs">
		 <div class="row">
			<div class="col-md-6">
				<blockquote>
					<font><i>Peolple already attached to <?php echo $rows['name']; ?></i></font><br/>
				</blockquote>
				<div class="rows">
					 <?php 
						$getallusers = mysql_query("select pic, id, name from people where school_id='{$rows['id']}'");  while($each = mysql_fetch_array($getallusers)){  ?>
						<div class="col-md-2">
									  <a href="#" class="thumbnail" title="<?php echo $each['name']; ?>">
									  <?php if($each['pic']==""){?>
										  <img src="images/userPro/def.png" alt="<?php echo $each['name']; ?>">
									 <?php  } else{?>
											<img src="images/userPro/<?php echo $each['pic']; ?>" alt="<?php echo $each['name']; ?>">
									 <?php } ?>
									  </a>
						 </div>
					  <?php } ?>
				</div>
			</div>
			<div class="col-md-6">
			 <?php if(!isset($_GET['signup'])){?>
		     <h4>Login to <?php echo $rows['name']; ?></h4><hr/>
			 <form action="" method="post" >
				<label>Email address: </label>									
				<div class="input-group">
					<span class="input-group-btn">
						<a class="btn btn-primary disabled" style="border:none; padding-bottom:10px; padding-top:10px;"><i class="fa fa-envelope"></i></a>
					</span>
					<input type="text"  name="email"  placeholder="Enter email address..." class="form-control"/>
				</div>
				<div id="free-10"></div>
				<label>Password: </label>
				<div class="input-group">
					<span class="input-group-btn">
						<a class="btn btn-success disabled" style="background:green; border:none; padding-bottom:10px;width:40px; padding-top:10px;"><i class="fa fa-lock"></i></a>
					</span>
					<input type="password" name="password" placeholder="Enter password.." class="form-control"/> 
				</div>
			 <div id="free-10"></div>
				<input type="submit" name="loginnow" class="btn btn-primary" value="Sign in" id="admin-login"/><br/><br/>
				
				    <?php if(isset($_POST['loginnow']) && isset($message)){?>
					   <div class="alert alert-danger alert-dismissable">
						   <button type="button" class="close" data-dismiss="alert" 
							  aria-hidden="true">
							  &times;
						   </button>
					       Error ! <?php echo $message; ?>
					   </div>
					   <?php  } ?>
				<p>
								</p>
				<font>Create your account now<a href="school-join.php?skoolid=<?php echo $rows['id']; ?>&signup"> Click here please</a></font>
			</form>
		 <hr/>
		 <?php } else {?>
		 <h4>Create your account with  <?php echo ucfirst($rows['name']); ?></h4><hr/>
		  <form action="" method="post">
					<div class="rows">
						<div class="col-md-6" style="padding:0px;">
						<label>First name </label>
							<input class="form-control" required type="text" name="fname" placeholder="First name"/>
						</div>
						<div class="col-md-6" style="padding-left:3px; padding-right:0px;">
						<label>Last name </label>
							<input class="form-control" required type="text" name="sname" placeholder="Surname"/>
						</div>
					</div>
					<div id="free-10"></div>
				    <label>Email address</td><td></label>									
				    <div class="input-group">
					<span class="input-group-btn">
						<a name="search" class="btn btn-info disabled" style="border-right:none; padding-bottom:9px; width:40px; padding-top:9px;"><i class="fa fa-envelope"></i></a>
					</span>
				   <input type="text" required name="email"  placeholder="Enter email address..." class="form-control"/>
				   </div><div id="free-10"></div>
				   <label>craete a password</td><td></label>
				   <div class="input-group">
					<span class="input-group-btn">
						<a name="search" class="btn btn-success disabled" style="border-right:none; padding-bottom:9px;width:40px; padding-top:9px;"><i class="fa fa-lock"></i></a>
					</span>
					<input type="password" required name="password" placeholder="Enter password.." class="form-control"/> 
					</div>
					<div id="free-10"></div>
					<label>Whats your position at <?php echo $rows['name']; ?></label>
					<div class="rows">
					<div class="col-md-6" style="padding:0px;">
						<select name="position" required class="form-control">
							<option value=""><br/>choose your position</option>
							<option value="teacher"><br/>Teacher</option>
							<option value="student"><br/>Student</option>
							<option value="parent"><br/>parent</option>
						</select>
					</div>
					<div class="col-md-6" style="padding:0px;">
						<select name="school_id" class="form-control" style="border-left:none;">
							<option style='color:#286090;' value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
						</select>
					</div>
					</div>
					<div id="free-10"></div>
					<select name="role" class="form-control">
							<option value="">whats your role at <?php echo $rows['name']; ?>?</option>
							<option value="Prefect">student leader</option>
							<option value="student ">student</option>
							<option value="class techaer">class tecaher</option>
					</select>
					<div id="free-10"></div>
				    <label>Birth Date</td><td></label>
					<div class="rows">
					<div class="col-md-12" style="padding:0px;">
						<input class="form-control" type="date" name="dob" placeholder="Birth Date"/>
					</div>
					</div>
					<div id="free-10"></div>
				    <label>Location <i>(like this</td><td>district , ciyt)</i></label> 
					<div class="rows">
					<div class="col-md-12" style="padding:0px;">
						<input class="form-control" type="text" name="location" placeholder="Kampala, kawempe"/>
					</div>
					</div>
					<div id="free-10"></div>
					<label>Select your gender</label>
					<div class="rows">
					
					<div class="col-md-3" style="padding:0px;">
						<input type="radio" name="gender"  required value="male"/> Male 
					</div>
					<div class="col-md-9" style="padding:0px;">
						<input type="radio" name="gender" required value="female"/> Female
					</div>
					</div>
					<div id="free-10"></div>
					<input type="submit" name="joinschool" class="btn btn-primary" value="Create acount now" id="admin-login"/><br/><br/>
					<?php if(isset($_POST['joinschool'])){echo $message;}?>
					Already have an account <a href="school-join.php?skoolid=<?php echo $rows['id']; ?>">Login to your account</a>
			</form>
		 <?php }?>
			</div>
		 </div>
		 </div>
	</div>
</div>
</div>
<?php include "includes/footer.php"; ?>