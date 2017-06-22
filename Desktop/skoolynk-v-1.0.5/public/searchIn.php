<?php
require_once '../classes/DbClass.php';  
$db = new DbClass();
$db->connect();
		if(isset($_REQUEST['result'])){
		$result = $_REQUEST['result'];

		$resultArray = $db->select("schools", "name LIKE '%".$result."%' or location LIKE '%".$result."%'");
		foreach ($resultArray as $search_result) {
		echo "<li id='unique'><a href='school-timeline.php?skoolid=".$search_result['id']."' style='font-size:13px; color:#222; padding:7px;'>".$search_result['name']."</a></li>";
		}
		if(count($resultArray)==0){
			echo "<li id=\"error_search\" style='text-align:center;'><a style='font-size:13px; color:red;  padding:7px;'>No results for ".$result."</a></li>";
		}
	}
		
?>