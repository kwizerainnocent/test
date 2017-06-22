<?php 
session_start();
require_once'../classes/DbClass.php';
$db  = new DbClass();
$db->connect();
 $userinfo =unserialize($_SESSION['skoolynkuser']);
 $alluserinfo = $db->select("student",  "email='".$userinfo['email']."'") ;

$x = $_POST['x'];
$y = $_POST['y'];
$width = $_POST['width'];
$height = $_POST['height'];

$type= $_POST['type'];
$name = $_POST['name'];
$size= $_POST['size'];
$temp= $_POST['temp'];

list($w, $h) = getimagesize($temp);
$img ="";

if($type == "png")
{
    $img = imagecreatefrompng($temp);
}
else if($type=="gif"){
	$img = imagecreatefromgif($temp);
}
else
{
	$img = imagecreatefromjpeg($temp);
}
$tci = imagecreatetruecolor($width, $height);
imagecopyresampled($tci, $img, 0, 0, $x, $y, $width, $height, $width, $height);
imagejpeg($tci, "uploads/".$name);
$where = " email ='".$alluserinfo['email']."'";
$data = array(
			"pic"=>"'uploads/".$name."'"
			);
 if($db->update($data, "student", $where)){
 	echo "successful";
 }else
 {
 	echo mysql_error();
 }
?>