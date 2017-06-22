<?php
session_start();
require_once'StaffFunctions.php';
$staff = new StaffFunctions();
$school_id = unserialize($_SESSION['Administrator']);
if(isset($_POST['addStaff'])){
	$CollectedData = array(
		"first_name"=>$_POST['fname'],
	   "second_name"=>$_POST['sname'], 
	   "email"=>$_POST['email'],
	   "school_id"=>$school_id['school_id'],
	   "location"=>$_POST['location'], 
	   "pic"=>'../uploads/male.png', 
	   "gender"=>$_POST['gender'], 
	   "phone"=>$_POST['phone'], 
	   "cate"=>$_POST['cate'], 
	   "responsibility"=>$_POST['responsibility'] 
	 ); 
	if($staff->createStaff($CollectedData))
	{
      header("Location:staff.php");
      exit();
	}
}
if(isset($_POST['userId']))
{
  echo  $staff->getUser($_POST['userId']);
}

?>