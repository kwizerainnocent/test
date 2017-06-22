<?php  

include("includes/db_connection.php");

function school($id){
$getSchool = mysql_query('select * from school WHERE id='$id' and activated = 'yes');
$schoolInfo= mysql_fetch_array($getSchool);
return $schoolInfo;

}


?>