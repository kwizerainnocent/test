<?php 
    include_once("includes/db-connection.php"); 
    $district = ($_POST['district']);
    $r = "select * from schools where ".$district." order by name ASC ";
	$get = mysql_query($r);
	    if($get){
		   $information = array();
		   while($rows = mysql_fetch_array($get)){
		   $school= stripslashes($rows['name']).":".$rows['id'].":".$rows['badge'].":".$rows['location'];
		   array_push($information, $school); 
		   }
		   $int = count($information);
		   if($int == 0){
		       echo "<div style='background:#ffa500; border-bottom-left-radius:50px; color:#fff; font-weight;lighter; padding:5px; text-align:center; '><h5><b>No School found </b></h5></div>";
		   }
		   else{
		   if($int == 1){
		    $list = "<div style='background:skyblue; color:#333; font-weight;bold; padding:5px;' ><h5><b>1 School found </b></h5></div>";
		   }else{
			   $list = "<div style='background:skyblue; color:#333; font-weight;bold; padding:5px;' ><h5>{$int} school(s) found</h5></div>";
		   }
			   $list .= "<ul class='nav' style='background:#eff; border-left:1px solid #eee;'>";
			   foreach($information as $skool){
			    $info =  explode(":" ,$skool); 
			   $list .=  "<li>
				<a href='school-timeline.php?skoolid=".$info[1]."' title='view ".$info['0']."'>
					<div class='rows'>";
						if(empty($info[2])){
							$name = $info[0];
				$list .= "<div class='col-md-2' style='padding-left:10px;'><div style='background:#69acff; border-radius:100%; font-size:16px; color:#fff; text-align:center; height:40px; width:40px; line-height:40px;'>".strtoupper($name[0])."</div></div>";
						}else{
							$list .= "<div class='col-md-2' style='padding-left:10px;'><img src='images/badges100/".$info[2]."' width='50'/></div>";
						}
						$list .= "<div class='col-md-10'>
								<font  style='font-size:12px; font-weight:bold; color:#555;'>".ucfirst($info['0'])."</font><br/>
								<i><font style='font-size:10px; color:#bbb;'>".$info['3']."</font></i>
						</div>
					</div>
					<div id='free-0'></div></a></li>";
			   }
			   $list .= "</ul>";
			   echo $list;
		   }
		}
	