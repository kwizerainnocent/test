<?php 
session_start();
//header("Content-Type: application/json");
$school_id = unserialize($_SESSION['Administrator']);
include_once "eventsController.php";
$events = new eventsController();

if(isset($_POST['operation']))
{
	
	$head = mysql_real_escape_string($_POST['heading']);
	$body = mysql_real_escape_string($_POST['eventDetails']);
	$date = strtotime($_POST['date']);
	$data = array("heading"=>$head, "body"=>$body, "school_id"=>$school_id['school_id'], "date"=>$date);
	if($events->createEvents($data))
	{
		echo  1;
	}
}

if(isset($_POST['loadEvents'])){
	$id = $school_id['school_id'];
	$data = $events->getEvents($id);
	$html = "";
	foreach ($data as $event) {
		$html .="<div class='col-md-12' id='itemsChange'>
					        <div class='media'>
							   <a class='pull-left' style='font-size:17px;' href='#'>
							   ".date("dS", $event['date'])."<hr style='margin-top:2px; margin-bottom:2px;'>".date("M", $event['date'])."
							   </a>
							   <div class='media-body'>
							    <h5 class='media-heading'>".$event['heading']."</h5>
							      ".$event['body']."</div>
							   <hr/>
							   <ul id='vedEvent'>
								  	 <li><a href='#' id='view' data-role='".$event['id']."'><i class='fa fa-eye'></i> View</a></li>
								  	 <li><a href='#'  id='delete' data-role='".$event['id']."'><i class='fa fa-trash'></i> Delete</a></li> 
								  </ul>
							</div>
					    </div>";
	}

	echo $html;}



if(isset($_POST['deleteEvent']))
{
	$id = $_POST['id'];
	if($events->deleteEvent($id))
	{
		echo 1;
	}else
	{
		echo mysql_error();
	}

}
if(isset($_POST['view']))
{

	$id = $_POST['id'];
	if($events->viewEvent($id))
	{
		echo "hkeh";
	}
}


?>
