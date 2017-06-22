<?php
include_once '../classes/DBClass.php';
$db = new DBClass();
$db->connect();
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$school= $db->select("schools", "id='".$id."'");
	foreach ($school as $sch) {
	echo json_encode($sch);
	}
}
 ?>