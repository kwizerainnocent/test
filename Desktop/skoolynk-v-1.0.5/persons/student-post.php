<?php
$con = mysql_connect("localhost", "root", ""); if(!$con) die("failed to make a db connection " .mysql_error());
$select = mysql_select_db("skoolynk_db"); if(!$select) die("failed to make a db selection " .mysql_error());
if(isset($_POST['sendPost'])){
	$post = $_POST['studentPost'];			
	$id = $_SESSION['id'];			
	$likes = '0';
	$dislikes = '0';
	$share = '0';
	$file = $_FILES["file"]["name"];
	$size = $_FILES["file"]["size"];
	$type = $_FILES["file"]["type"];
	$date = time();
	$tmp_name = $_FILES["file"]["tmp_name"];
	move_uploaded_file($_FILES['file']['tmp_name'], 'images/posts/'.$file);
	$insert_post = mysql_query("insert into students_posts(student_id,post,file,date,likes,dislikes,share) values('$id','$post','$file','$date','$likes','$dislikes','$share')");
	if(!$insert_post){echo mysql_error();}
	else{
	echo "<h6>your post was successfully uploaded.</h6>";
	header("Location:students-page.php?message=you post was successful");
	}
;}
?>