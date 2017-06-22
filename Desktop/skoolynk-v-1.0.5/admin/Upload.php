<?php 
session_start();
require_once '../classes/DbClass.php';
$db = new DbClass();
$db->connect();
    $data = unserialize($_SESSION['Administrator']);
    $schoolInfo = $db->select("schools", "id='".$data['school_id']."'");
    $schoolInfo = $schoolInfo[0];

	$x = $_POST['x'];
	$y = $_POST['y'];
	$width = $_POST['width'];
	$height = $_POST['height'];
	$type= $_POST['type'];
	$name = $_POST['name'];
	$size= $_POST['size'];
	$temp= $_POST['temp'];
	$ext = split('/', $type);

	list($w, $h) = getimagesize($temp);
	$img ="";

	if($type == "image/png" || $type == "image/PNG")
	{
	    $img = imagecreatefrompng($temp);
	}
	else if($type=="image/gif" || $type =="image/GIF"){
		$img = imagecreatefromgif($temp);
	}
	else if($type=="image/JPEG" || $type =="image/jpeg"){

		$img = imagecreatefromjpeg($temp);
	}
	$tci = imagecreatetruecolor($width, $height);
	imagecopyresampled($tci, $img, 0, 0, $x, $y, $width, $height, $width, $height);
	imagejpeg($tci, "../images/badges100/".sha1($name).".".$ext[1]);
	$where = " id ='".$data['school_id']."'";
	$data = array("badge"=>"'../images/badges100/".sha1($name).".".$ext[1]."'");
	 if($db->update($data, "schools", $where)){
	 	echo "successful";
	 }else
	 {
	 	echo mysql_error();
	 }
?>