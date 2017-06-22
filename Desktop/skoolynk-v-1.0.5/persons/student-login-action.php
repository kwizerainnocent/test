<?php
include("includes/db-connection.php");
if(isset($_POST['signup'])){
	$first_name = $_POST['first_name'];
	$second_name = $_POST['second_name'];
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$password = $_POST['password'];
	$hashed_password = md5($password);
	$date = time();
	$school_id = $_POST['school'];
	$gender = $_POST['gender'];
	if(!empty($first_name) && !empty($second_name) && !empty($email1) && !empty($email2) && !empty($password) && !empty($gender)){
		if($email1==$email2){
		$insert_student = mysql_query("insert into student(school_id,first_name,second_name,email,password,gender,date_joined) values('$school_id','$first_name','$second_name','$email2','$hashed_password','$gender','$date') ");
		if(!$insert_student){echo mysql_error();}
		else{header("Location:student-startup.php?name=".$first_name." ".$second_name."&email=".$email2."&password=".$hashed_password."");}
	}
	}
}
?>