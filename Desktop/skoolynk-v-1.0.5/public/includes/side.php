<?php	

	function total($table,$schoolid){
	$new_table = $table;
		$query_all = mysql_query("select count(*) from {$new_table} where school_id='{$schoolid}'");
		while($all = mysql_fetch_array($query_all)){
		$count = $all[0];
		return $count;
	}
	}
?>	


<?php
	$get_school_details = mysql_query("select * from school_details where school_id='{$id}'");
?>

	<div class="thumbnail" id="side-thumb">
	<div class="thumbnail" id="badge-top">
					<div class="media">
						<a class="pull-left" href="#">
						<?php
						if(empty($details['badge'])){
						echo "<img src='../images/badges100/smile.png'/>";
						}else{
						echo "<img src='".$details['badge']."'/>"; 
						}
						?>					
						</a>
						<div class="media-body">
							<h5><?php  echo strtoupper($rows['name']); ?></h5>
							<i style="color:#286090;"><?php  echo ucfirst($rows['motto']); ?></font></i>
						</div>
					</div>
			<div id="free-0"></div>
	</div>
			<div id="free-0"></div>
	</div>
	