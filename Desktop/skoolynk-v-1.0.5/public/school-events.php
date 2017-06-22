<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
<div class="col-md-3 col-sm-3 col-xs-12"  id="general-col-md-d-3">
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
						<img src="<?php echo $rows['badge'];?>"/>					
						</a>
						<div class="media-body">
							<h5><?php  echo strtoupper($rows['name']); ?></h5>
							<i style="color:#286090;"><?php  echo ucfirst($rows['motto']); ?></font></i>
						</div>
					</div>
			<div id="free-0"></div>
	</div>
	</div>

</div>
	<div class="col-md-9 col-sm-6 col-xs-12" id="general-col-md-d-6">
	<div class="thumbnail" id="toned-header"><h4>Events</h4></div>
	<div class="thumbnail">
	<div class="well">
	<div class="rows">
			<?php
                $date  = time();
                $day   = date('d', $date);
                $month = date('m', $date);
                $year  = date('Y', $date);
                $first_day = mktime(0, 0, 0, $month, 1, $year);
                $title = date('F', $first_day);
                $day_of_week = date('D', $first_day);
                switch($day_of_week){
                    case "Sun": $blank=0; break;      
                    case "Mon": $blank=1; break;      
                    case "Tue": $blank=2; break;      
                    case "Wed": $blank=3; break;      
                    case "Thu": $blank=4; break;      
                    case "Fri": $blank=5; break;      
                    case "Sat": $blank=6; break;             
                }
                $days_of_months = cal_days_in_month(0,$month, $year);

             echo "<div class='col-md-7'>
			 <table class='table table-striped table-bordered'>
                  <tr><th colspan='7'>{$title} - {$year}</th></tr>
                  <tr><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>
             ";
                $day_count =1;
             echo "<tr>";
             while($blank=0){
               echo "<td></td>"; 
               $blank = $blank-1;
               $day_count++;
             }
           $day_num = 1;
		   $dates = array();
		   $event_on_current_day = array();
		   $d = mysql_query("select id, date from events where school_id='$skoolid'");
		   while($dat = mysql_fetch_array($d)){
		     $day1 = date('d',$dat['date']);
		     $mon = date('F',$dat['date']);
		     $yr = date('Y',$dat['date']);
			if($mon==$title && $yr==$year){
		      array_push($dates, $day1);
			}
			if($day1 = $day){
				array_push($event_on_current_day, $day1);
			}
		   }
            while($day_num <= $days_of_months){
                if(count($event_on_current_day)!=0 && $event_on_current_day[0]== $day && $event_on_current_day[0]== $day_num){
                    echo "
		<td style='color:#286090; font-weight:bold;'>{$day_num}</td>";
                  }else if(in_array($day_num, $dates) ){
                    echo "<td><a style='color:red; font-weight:bold;'>{$day_num}</a></td>";
				}else if( $day_num ==$day){
                    echo "<td><a style='color:maroon; font-weight:bold;'>{$day_num}</a></td>";
				}else{
                   echo "<td>{$day_num}</td>"; 
                }
				
                $day_count++;
                $day_num++;
                if($day_count>7){
                  echo "</tr><tr>";
                  $day_count=1;
                }
            }
           while($day_count>1 && $day_count<=7){
               echo "<td></td>";
               $day_count++;
           }
            echo "</tr>";
            echo "</table></div>
			";
     ?>
<div class='col-md-5'>
	<div class="thumbnail">
        <h5>Upcoming Event</h5><hr/>
		<ul class="nav">
		<?php
			$today = time();
			echo $day;
			$get_date = mysql_query("select * from events where school_id='$skoolid' and date='".strtotime($day_num)."'");
			while($dates = mysql_fetch_array($get_date)){
				echo "<li><a  href='#myModal' role='button' data-toggle='modal' title='".$dates['heading']."'><br>".$dates['body']."</a></li>";
			}
		?>
		</ul>
	</div>					
</div>
</div>
<div id="free-0"></div>
</div>
		<div class="rows" id="most-recent-events">
			<?php
				$get_events = mysql_query("select * from events where school_id = '$skoolid' limit 3");
				while($rows_events = mysql_fetch_array($get_events)){
				echo "<div class='col-md-4'>
				<a title='".$rows_events['heading']."'>
				<div class='thumbnail'>";
				if(empty($rows_events['pic'])){
				echo "<div id='free-0'></div>";
				}else{
				echo "<img src='../images/events/".$rows_events['pic']."'/>";
				}
				echo "<div class='caption'>
				<p>".ucfirst($rows_events['heading'])."</p>
				</div>
				</div>
				</a>
			</div>
				";
				}
			?>
		<div id="free-10"></div>
		</div>
	</div>
	<div class="thumbnail" id="thumbnail-details">
	<h5>Details of all events </h5>
			<?php
			$past = time();
			$get_events = mysql_query("select * from events where school_id='$skoolid' order by date asc");
			while($rows_events = mysql_fetch_array($get_events)){
			$date = date('d',$rows_events['date']);
			$month = date('F',$rows_events['date']);
			$year = date('Y',$rows_events['date']);
			$event_day = $rows_events['date'];
				echo "<div class='thumbnail'>
					<div class='media'>
						<a class='pull-left' href='#'>".$date."</a>
						<div class='media-body'>
							<h6>".ucfirst($rows_events['heading'])."</h6>
							<font>".$month." ".$year."</font>		
						</div>
					</div>	
					<div class='caption'><p>".ucfirst($rows_events['body'])."</p></div>
				</div>		
				";
			}
			?>
			<div id="free-0"></div>
	</div>
</div>
	<div class="col-md-3 col-sm-3 col-xs-12" id="right-col-md-3">


	</div>
	</div>
</div>
<?php
	
?>
<?php include "includes/footer.php"; ?>