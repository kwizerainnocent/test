<?php
session_start();
define('UPATH', "adminuploads/");define('TIMETABLES','adminuploads/TimeTables/');
include_once("../classes/DbClass.php");

$db = new DbClass();
$db->connect();

    $data = unserialize($_SESSION['Administrator']);
    $schoolInfo = $db->select("schools", "id='".$data['school_id']."'");
    $schoolInfo = $schoolInfo[0];
    echo$data['school_id'];
if (isset($_POST['topic'])) {
    $actopic=@$_POST['academicTopic'];


    $acfile=@$_FILES['file']['name'];
    $ext = explode("/", $_FILES['file']['type'])[1];


    $acdetails=@$_POST['academicDetails'];

    $targ=UPATH.time().".".$ext;

    	
    	
    $table="actopics";

    //if(!empty($acfile)){
	  move_uploaded_file(@$_FILES['file']['tmp_name'],$targ);

	  $data= array("skoolID"=>$schoolInfo['id'],"actopic"=>$actopic,"acdetails"=>$acdetails,"acfile"=> $targ);
	  $result=$db->insert($data,$table);

	  if($result==true){
	  	header("location:academics.php?level=success");
}
}

        if (isset($_POST['subjects'])) {
         $subs= implode(',',  @$_POST['sub']);
         $data= array("school_id"=>$schoolInfo['id'],"subjects"=>$subs);
         $touts=$db->select("subtaught","school_id='".$data['school_id']."'");

        if(count($touts)==0){
        $db->insert($data,"subtaught");
         header("location:academics.php?level=inserted"); 
        }
        else{

           $data = array("subjects"=>"'".$touts[0]['subjects'].",".$subs."'");

            $tt=$db->update($data, "subtaught", "school_id='".$schoolInfo['id']."' ");

            if($tt){
                header("location:academics.php?level=updated"); 
            }
        }

         

        }

         if (@$_POST['SECONDARY']=="set") {
        $combination=mysql_real_escape_string(@$_POST['combination']);

         $exist=$db->select("subtaught","school_id='".$data['school_id']."'");
         
         if(count($exist)==1)
         {

          $touts=$db->select("subtaught","school_id='".$data['school_id']."'");
            if(empty($touts[0]['combination']))
            {
                $insert=mysql_query("UPDATE subtaught SET combination='".$combination."' WHERE school_id='".$schoolInfo['id']."' ")or die(mysql_error());
                echo$insert;

                if($insert==1){ echo 1;}else{ echo 2;}
            }
            else{
                $touts=$db->select("subtaught","school_id='".$data['school_id']."'");
                echo $add=$touts[0]['combination'].",".$combination;
                $update=mysql_query("UPDATE subtaught SET combination='".$add."' WHERE school_id='".$schoolInfo['id']."' ")or die(mysql_error());
                echo$update;
                            if($update==1){ echo 1;}else{ echo 2;}

                }

        }
        else{

            $insert=mysql_query("INSERT INTO subtaught(school_id,combination) VALUES('".$schoolInfo['id']."','".$combination."')")or die(mysql_error());
            echo$insert;
            if($insert==1){ echo 1;}else{ echo 2;}
              
        }
     }

     if (isset($_POST['uploadData'])) {
        $xcel=@$_FILES['timetable']['name'];
        $data=$schoolInfo['id'].$xcel;
        $per=TIMETABLES.$data;
        if(!empty($xcel)){
        $select="SELECT timetable from schools where id='".$schoolInfo['id']."'";
        $my=mysql_query($select);
        $oldfile=mysql_fetch_assoc($my);
        $delfile=$oldfile['timetable'];
        if(empty($delfile)){        move_uploaded_file($_FILES['timetable']['tmp_name'],$per);
}
        else{
        if(unlink(TIMETABLES.$delfile)){
        move_uploaded_file($_FILES['timetable']['tmp_name'],$per);
        }
    }
        $result="UPDATE schools SET timetable='".$data."' WHERE id='".$schoolInfo['id']."'";
        $qry=mysql_query($result)or die(mysql_error());
        if($qry){
            header("location:academics.php");
        }
        else{
            header("location:academics.php?error=An error occured,try again");

        }
            
                
            }
         }
?>