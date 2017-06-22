<?php

include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
	if(isset($_POST['senderName'])){
	$name = $_POST['senderName'];
	$email = $_POST['email'];
	$school_id = $_POST['schoolId'];
	$message = $_POST['message'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$data = array("school_id"=>$school_id, "ip"=>$ip, "sender"=>$name, "email"=>$email, "message"=>$message);
	$send = $db->insert($data,"message");
	if($send){
		echo 1;
	}else{
		echo 2;
	}
}
			
?>