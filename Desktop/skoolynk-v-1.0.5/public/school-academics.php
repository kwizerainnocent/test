<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
	<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php include("includes/side.php");
include "../classes/excel_reader.php"; 
define('TIMETABLES','../admin/adminuploads/TimeTables/');
$excel = new PhpExcelReader;
?>

	</div>
	<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
	<div class="thumbnail" id="toned-header"><h4>Academics</h4></div>
	
		<div class="rows">
			<h5>Subjects Offered.</h5>
			<div class="col-md-6">
				<div class="panel panel-default">
				   <div class="panel-heading">Subject offered </div>
				   <div class="panel-body">
				   
				   
				   <?php
                              $id = $_GET['skoolid'];
							  $get = mysql_query("SELECT * FROM `subtaught` WHERE school_id='$id'");
							  $subjects  =  mysql_fetch_array($get);	
                              $schsub = explode(",", $subjects['subjects']);	
                               foreach($schsub as $key=>$sbj){
                               	$num = rand(000000,999999);
                               	
								 echo "<label style='background-color:#".$num.";padding:5px;color:white;'>{$sbj}</label>&nbsp;"; 
                                  // if($key==5){
                                  //       break;echo"<a>See more</a>";} 
							   }		

						?>
				   </div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
				   <div class="panel-heading">Combinations allowed</div>
				   <div class="panel-body">
				   
				   
				   <?php
                              $id = $_GET['skoolid'];
							  $get = mysql_query("SELECT * FROM `subtaught` WHERE school_id='$id'");
							  $subjects  =  mysql_fetch_array($get);	
                              $schsub = explode(",", $subjects['combination']);	
                               foreach($schsub as $key=>$sbj){
                               	$num = rand(000000,999999);
                               	
								 echo "<label style='background-color:#".$num.";padding:5px;color:white;'>{$sbj}</label>&nbsp;"; 
                                  // if($key==5){
                                  //       break;echo"<a>See more</a>";} 
							   }		

						?>
				   </div>
				</div>
			</div>

			
<!-- 		<div class="thumbnail" id="white-thumbnail">
		<div class="rows"><div class="col-md-6" id="col-md-6-zero"><h5>Facilities</h5></div>
			<div class="col-md-6" id="col-md-6-zero"><a title="more facilities" id="right-link">View more..</a></div>
		</div>
		<div class="rows" id="rows-facilities">
		<?php 
		$id = $_GET['skoolid'];
		$facilities = mysql_query("SELECT * FROM `facilities` WHERE school_id='$id' limit 4");
		while($facs = mysql_fetch_array($facilities))
		{$name = explode("_", $facs['name']); ?>
		<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/facilities/<?php echo $facs['file']; ?>" alt="<?php echo $name[1]; ?>"/>
						<div class="caption"><b><?php echo $name[1]; ?></b></div>
					</div>
				</div>
		<?php } ?>
			</div>
			<div id="free-10"></div>
		</div> -->
		<div class="thumbnail" id="white-thumbnail">
            <div class="col-md-12" id="col-academics-2">
				  <div class="thumbnail" id="thumb-striped"> TIME TABLES 2016</div>
           <?php
                    $sec="SELECT * FROM schools WHERE id='".$id."'";
                    $qry=mysql_query($sec);
                    $array=mysql_fetch_array($qry);
                    $xls=$array['timetable'];
                    if(empty($xls)){
                    	echo"<h4>No timetables yet</h4>";
                    }
                      else{
                    $excel->read(''.TIMETABLES.$xls.'');
                        }
                    function sheetData($sheet) {
                      $re = '<table class="table table-striped table-bordered">';     // starts html table

                      $x = 1;
                      while($x <= $sheet['numRows']) {
                        $re .= "<tr>\n";
                        $y = 1;
                        while($y <= $sheet['numCols']) {
                          $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
                          $re .= " <td>$cell</td>\n";  
                          $y++;
                        }  
                        $re .= "</tr>\n";
                        $x++;
                      }

                      return $re .'</table>';   
                    }

                    $nr_sheets = count($excel->sheets);     
                    $excel_data = '';              

                    for($i=0; $i<$nr_sheets; $i++) {
                      $excel_data .= '<h4>Sheet '. ($i + 1) .' (<em>'. $excel->boundsheets[$i]['name'] .'</em>)</h4>'. sheetData($excel->sheets[$i]) .'<br/>';  
                    }
                  
                      echo $excel_data;
                ?>         
		</div>
                <!-- <p><b>Students' Examination Results</b></p> -->
                <!-- <p>You can not view these results unless you are connected to this school either as a student, parent or guardian.</p> -->
			<!-- <a  title="more facilities" id="exists" class="btn btn-primary disabled">Log in to view more</a> -->
			<div id="free-0"></div>
		</div>
	</div>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>