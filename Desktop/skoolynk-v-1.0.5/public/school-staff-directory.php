<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
	<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php include("includes/side.php");?>

	</div>
	<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
	<div class="thumbnail"  id="toned-header">
	<h4><?php echo strtoupper($rows['name']);?> Staff Directory</h4></div>
		<?php
			
			if(isset($_GET['skoolid']) && isset($_GET['id'])){
			$id = preg_replace('#[^0-9]$#', '', $_GET['id']);
			$skoolid = preg_replace('#[^0-9]$#', '', $_GET['skoolid']);
					$staff = mysql_query("select * from student where (id='$id' AND school_id='$skoolid') AND cate='t'");
					$s = mysql_fetch_array($staff);?>
						<div class='thumbnail' id="staff">
									<div class="rows">
										<div class="col-md-2">
										<?php  
												echo "<img src='{$s['pic']}' style='width:100px; border:1px solid #ddd;'/>";
										?>
										</div>
										<div class="col-md-10">
											<h6><b>Name:</b> <?php echo "".strtoupper($s['first_name'])." ".$s['second_name']."";?></h6>
											<h6><b>Email:</b> <?php echo $s['email'];?></h6>
											<h6><b>Phone:</b> <?php echo $s['phone'];?></h6>
											<h6><b>Location :</b> <?php echo $s['location']?></h6>
											<h6><b>Gender:</b> <?php echo strtoupper($s['gender']);?></h6>
											<hr/>
										</div>
									</div>
									<div id='free-10'></div>
							</div>
				<?php } ?>
        <div class="thumbnail" id="directory">
                <h5 style="padding:10px; border-bottom:1px solid #eee;"><?php echo strtoupper($rows['name']);?> (Ordered In alphabetical Order)</h5>

               <?php
					global $skoolid;
					$teachers = mysql_query("select * from student where school_id='$skoolid' AND cate='t' order by first_name");
						while($teacher = mysql_fetch_array($teachers)){
            echo "
            <div class='col-md-3'>
            <a href='school-staff-directory.php?skoolid={$skoolid}&id=".$teacher['id']."'>
            <div class='thumbnail' style='border-radius:0px; padding:2px; position:relative;'>";
										echo "<img src='{$teacher['pic']}'  alt='".strtoupper($teacher['first_name'])." ".$teacher['second_name']."'/>";

            echo "<div class='caption' style='position:absolute; bottom:0px; color:#fff; background:rgba(0,0,0,.3); width:100%; left:0; padding:7px;'>".$teacher['first_name']." ".$teacher['second_name']."</div>
            </div>
            </a>
            </div>
            ";
						}
			   ?>
			   <div id="free-10"></div>
        </div>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>