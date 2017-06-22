<?php 
session_start();
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();

    $data = unserialize($_SESSION['Administrator']);
    $schoolInfo = $db->select("schools", "id='".$data['school_id']."'");
    $schoolInfo = $schoolInfo[0];

    if(isset($_POST['name'])&& isset($_POST['value'])){
		$field = urldecode($_POST['name']);
		$value = urldecode($_POST['value']);
		updateSchool($field, $value);
    }


function updateSchool($field,$value){
global $schoolInfo;
	$id = $schoolInfo['id'];
	$theSql = "UPDATE schools SET $field = '".$value."' WHERE id='{$id}' ";
	$sql = mysql_query($theSql);	
	if($sql){
		echo true;
	}else{
		echo mysql_error();
	}	
}

if(isset($_POST['change_vm'])){
	$v = $_POST['vision'];
	$m = $_POST['mission'];
	$theSql = "UPDATE schools SET vision = '".$v."', mission='".$m."' WHERE id='{$schoolInfo['id']}' ";
	$sql = mysql_query($theSql);
	if($sql){
		header("Location:schoolProfile.php");
	}else{
		echo mysql_error();
	}	
}
if(isset($_POST['addword'])){
	$theme = $_POST['heading'];
	$head_word = $_POST['word'];
	$id = $schoolInfo['id'];
	$date = time();
	$sql = mysql_query("insert into articles(school_id, word, theme,date) values('$id','$head_word','$theme','$date')");
	if($sql){
		header("Location:schoolProfile.php");
	}else{
		echo mysql_error();
	}
}