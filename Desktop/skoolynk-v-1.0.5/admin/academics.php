<?php 
 include "includes/header.php"; 
 include "../classes/excel_reader.php"; 
define('TIMETABLES','adminuploads/TimeTables/');
$excel = new PhpExcelReader;
?>
<style type="text/css">
  .panel-collapse { padding:18px;  }
</style>
<div id="page-wrapper">
	<div class="container-fluid" style="margin:0px;">
		<div class="rows">
			<div class="col-md-12">
				<h3 class="page-header">
				<br/>
					Academics <small>Data concerning academics in <?php echo $schoolInfo['name'];?></small>
				</h3>
        
			</div>
		</div>
		<div class="rows">
			<div class="col-md-12">
			<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          About academics in <?php echo $schoolInfo['name'];?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

      

      <?php 
            if(@$_GET["level"]=="success")
                {
                  echo '<div class="alert alert-success animated bounceInLeft">gggg</div>';
                }
      ?>
      <span id="spaned"><a href='#' id='topic'>Add topic form</a></span>
      <form class="form-group"  action='acadmicsfun.php' method='post' enctype='multipart/form-data' id="topic_form" style="display:none;">
          <label>Academic topic: </label>
          <input type="text"  name="academicTopic" placeholder="Academic topic"  class="form-control"/>
          <label>attach file: </label>
          <input type="file"  name="file" placeholder="Academic topic"  class="form-control"/>
          <label>Details: </label>
          <textarea name="academicDetails" rows="5" placeholder="Enter details here" class="form-control"></textarea><br>
          <input type="submit" value='Add topic' name='topic' class="btn btn-primary"/>
      </form>
      <hr/>

      <?php
            $posts = $db->select("actopics", "skoolID='".$data['school_id']."'");
          
            foreach ($posts as $post) { ?>

                 <div class = "media">
                    <a class = "pull-left" href = "#">
                       <img class = "media-object" style="width:60px; height:60px;" src = "<?php echo $post['acfile'];  ?>">
                    </a>
                    
                    <div class = "media-body">
                       <h5 class = "media-heading"><?php echo $post["actopic"]?></h5>
                       <p><?php echo $post["acdetails"];  ?></p>
                    </div>
                    
         </div>
           <?php } ?>
      
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          subjects and combinations offered at <?php echo $schoolInfo['name'];?>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="rows">
              <div class="col-md-6">
                <p>Add a new subject to list</p>
                <form action='acadmicsfun.php' method='post'>
                    <?php
                    $subst=array();
                    $touts=$db->select("subtaught","school_id='".$schoolInfo['id']."'");
                    if(count($touts)!=0)
                    {
                        $subst= explode(',',$touts[0]['subjects']);
                    }
                        $result=$db->select("subjects","id!=0");
                     
                     foreach ($result as $key) {
                       if (!in_array($key['name'],$subst)) {
                      echo"<input type='checkbox' name='sub[]' value='".$key['name']."' /><label>".$key['name']."</label><br>";
                       }
                        }
                    
                      


                    ?>
                    <input type="submit" name="subjects" value="add subject" class="btn btn-primary btn-xs" />
                </form>
                <hr/>
                <p>Add a new combination to list</p>
              <div class="rows" style="border:2px solid #eee;">
              <table>
              <tr style="font-weight:bold;text-align:left;"><td>Majors</td><td>Stroks</td></tr>
              <tr><td>
              <form>


              <?php 
                    $subjects=$db->select("secondary_subjects","");
                    foreach($subjects as $title){
                  echo"
                      <div class='col-md-12'><input type='checkbox' value='".substr($title['subject'], 0,1)."' id='clicka'>
                      <span><a href='#' rel='".$title['subject']."' >".$title['subject']."</a></span>
                      </div>";

                    }?>
                </td><td>
                <?php    
                    $stroks=mysql_query("SELECT strok FROM secondary_subjects");
                    while($row = mysql_fetch_array($stroks)){
                    if(!empty($row['strok'])){
                  echo"
                      <div class='col-md-12'><input type='checkbox' value='".$row['strok']."' id='clicka'>
                      <span><a href='#' rel='".$row['strok']."' >".$row['strok']."</a></span>
                      </div>";}
                      
                    }
                     ?> 
                     </td></tr>                 
                </form>
              </table>
              </div><br>
                <div class="rows">
                  <form>
                  <div class="col-md-9"><input type="text" name="generated_comb" id="generated_comb" class="form-control"></div>
                  <span id='status' style="color:green;"></span>
                </form>
                </div>

                </div>
                </div>
              
              <div class="col-md-6">

              
                  <?php
                  if(count($subst)!=0){
                   echo" </hr>All subjects taught<ol>";
                    foreach ($subst as $key=>$value) {
                      if(!empty($value))
                      {
                         echo "<li>".$value."</li>";

                        if($key==5){
                          break;}
                      
                    }
                  }
                  echo" </ol>
                <a href='#'>See more</a>";
                }
                  ?>
                 
               
                
                <?php
                    $combinations=$db->select("subtaught","school_id='".$schoolInfo['id']."'");
                    if(empty($touts[0]['combination'])){}
                    else{
                    echo"<hr/>";
                    $subst= explode(',',$touts[0]['combination']);
                    echo"All combinations offered";
                    echo"<ol id='combine'>";
                        foreach ($subst as $combination) {
                          if(!empty($combination)){
                          echo "<li>".$combination."</li>";
                        }
                        }
                        
                      echo"</ol>";
                      echo"<a href='#'>See more</a>";
              }
              ?>
                <hr/>
              </div>
              <div id="free-5"></div>
            </div>
    </div>
  </div>

 

  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          A day in <?php echo $schoolInfo['name'];?> for a student
        </a>
      </h4>
    </div>
    <div id="collapseThree" style="padding:5px !important; " class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
    <div class="">
        <div class="col-md-6">
           <form name="excel" class="form-group" action="acadmicsfun.php" method="post" enctype="multipart/form-data" onsubmit="return file_upload()" class="form-group" >
            <?php
                    $sec="SELECT *FROM schools WHERE id='".$schoolInfo['id']."'";
                    $qry=mysql_query($sec);
                    $array=mysql_fetch_array($qry);
                    $xls=$array['timetable'];
                    if(empty($xls)){}
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
                <label>UPload xls file of your general school time table.</label>
                <p>NOTE: <i>Create an excel file with two field one called duration and activity for example</i>
                </p>
                
                <input type="file" name="timetable"  class="form-control"  id="xcl" onchange=""/><br/>
                <div id="error_log" style="color:red;"></div>
                <input type="submit" name="uploadData" value="upload file" id="uplod"class="btn btn-primary btn-sm"/>
           </form>
        </div>
        <div class="col-md-6"></div>
        <div id="free-10"></div>
    </div>
    </div>
  </div>
</div>
	</div>
	</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>