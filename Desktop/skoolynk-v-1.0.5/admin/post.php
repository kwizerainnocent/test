	<?php
session_start();
header("contect-type; application/text");
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
    $data = unserialize($_SESSION['Administrator']);
    $schoolInfo = $db->select("schools", "id='".$data['school_id']."'");

	if(isset($_POST['heading'])){

		$date = time();
		$school_id = $data['school_id'];
		$badge = $schoolInfo[0]['badge'];
		$post = mysql_real_escape_string($_POST['post']);
		$heading = mysql_real_escape_string($_POST['heading']);
		$insertedPost = array('school_id' => $school_id, 'post' =>$post , 'date'=>$date,'pic' =>$badge,'heading'=>$heading );
		$insert = $db->insert($insertedPost,"posts");
		if ($insert) {
			echo true;
		}
	}