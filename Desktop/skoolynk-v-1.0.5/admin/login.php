<?php 
session_start();
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
 if(isset($_POST['email']))
 {
 	$email = $_POST["email"];
 	$password = sha1($_POST["password"]);
 	$data = $db->select("student", "email='".$email."'");
  	if(count($data)==1)
 	{
 		$data =$data[0];
 		if(($data['password']==$password) && ($data['cate']=="admin"))
 		{
 			$_SESSION['Administrator'] = serialize($data);
            // header("Location:home.php");
            echo 1;
            exit();
 		}else{
 			echo 2;
 		}
 	}
 }