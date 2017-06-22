<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
	<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
<?php include("includes/side.php");?>

	</div>
	<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
	<div class="thumbnail" id="toned-header">
	<h4>About <?php  echo ucfirst($rows['name']); ?></h4></div>	
		<div class="jumbotron" id="top-jumbotron-school" style="background:url(<?php echo $details['slider']; ?>); background-size:100%;">
			<div class="rows" id="outter-badge">
				<div id="innerDiv">
						<img src="<?php echo $rows['badge'];?>"/>	
				</div>
			</div>
		  <div class="rows">
			 <font style='text-shadow:1px 1px 1px #444;'>
			 <?php echo ucfirst($rows['name']);?>(<?php echo ucfirst($rows['district']);?>, <?php echo ucfirst($rows['location']);?>)
			 </font>
			<br/>
			<?php echo "<h6><b>Email :</b> <font style='font-size:12px; text-shadow:1px 1px 1px #444; color:#eee;'>".$rows['email']." </font></h6>";?>
		   </div>
		</div>
		<div class="thumbnail" id="white-thumbnail">
			<div class="media">
			<a class="pull-left" href="school-staff-directory.php?role=headmaster">
			<?php
				$my_id = $rows['id'];
				$get_person = mysql_query("select * from student where school_id='{$my_id}' AND cate='admin'");
				$rows_person = mysql_fetch_array($get_person);
				if(empty($rows_person['pic'])){
				echo "<img src='../images/people/male.png' style='width:100px;'/>";
				}else{
				echo "<img src='../images/people/".$rows_person['pic']."' style='width:100px;'/>";
				}
			?>
			</a>
			<div class="media-body thumbnail" style="padding:20px; background:snow; border-radius:0px;">
				<h5><u>A word from the Headteacher</u></h5>
				<p>
					<font>
						<?php
							$get_article = mysql_query("select * from articles where school_id='$skoolid'");
							if($get_article){
							$rows_article = mysql_fetch_array($get_article);
							echo $rows_article['word'];
							}
						?>
                    </font>
				</p>
			</div>
		</div>
		</div>
		<div class="thumbnail" id="white-thumbnail">
		<h5>Why choose us?</h5><hr/>
			<?php
			$vm = mysql_query("select * from schools where id='$skoolid'");
			$rows_vm = mysql_fetch_array($vm);
			echo "<div class='media'>
			<a class='pull-left' href='school-staff-directory.php?role=headmaster' style='font-size:40px; text-align:center; width:70px;'>
				<i class='fa fa-rocket'></i><br/>
			</a>
			<div class='media-body'>
				<h5><u>VISION</u></h5>
				<p>
					<font>";
					$vision = $rows_vm['vision'];
					echo $vision;
                   echo " </font>
				</p>
			</div>
		</div>";
		echo "<div class='media'>
			<a class='pull-left' href='school-staff-directory.php?role=headmaster' style='font-size:40px; text-align:center; width:70px;'>
				<i class='fa fa-mortar-board'></i><br/>
			</a>
			<div class='media-body'>
				<h5><u>MISSION</u></h5>
				<p>
					<font>";
					$mission = $rows_vm['mission'];
					echo $mission;
                   echo " </font>
				</p>
			</div>
		</div>";
		echo "<div class='media'>
			<a class='pull-left' href='school-staff-directory.php?role=headmaster' style='font-size:40px; text-align:center; width:70px;'>
				<i class='fa fa-globe'></i><br/>
			</a>
			<div class='media-body'>
				<h5><u>THEME</u></h5>
				<p>
					<font>";
					$mission = $rows_vm['mission'];
					echo $mission;
                   echo " </font>
				</p>
			</div>
		</div>";
			?>
			</div>
			<div id="free-10"></div>
		</div>
	</div>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>