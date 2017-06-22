<?php
require_once '../includes/db-connection.php';
	//function to select anything and count it
if(isset($_GET['district'])){
	$district = $_GET['district'];
	function sch_dist($district){
		$get_districts = mysql_query("select * from schools where district='{$district}' order by name asc");
		if(mysql_num_rows($get_districts) == 0){ echo "<div id='free-10'></div><h4 style='color:red;'><i class='fa fa-exclamation-triangle'></i> No registered schools from ".$_GET['district']." district</h4><div id='free-10'></div>";
		}else{
		while($rows_district = mysql_fetch_array($get_districts)){
			echo "
			<div class='col-md-2 col-sm-3 col-xs-6' style='padding:5px;'>
			<div class='thumbnail' style='text-align:center; box-shadow:5px 5px 10px #bbb; border-radius:2px; padding:10px 7px 2px; width:96%; background:#fff; border:1px solid #ccc;'>
			<img src='".$rows_district['badge']."' alt='' style='height:120px;'/><h6><a href='school-timeline.php?skoolid=".$rows_district['id']."' style='font-weight:bold; color:#286090; text-transform:capitalize;' title=''>".$rows_district['name']."</a></h6>
			</div>
			</div>
			";		
		}
	}}
	}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best schools in uganda</title>
		<link rel="shortcut icon" href="images/title.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="skoolynk, schools, uneb, O'level, A'level, Teachers, Education, High schools, college, Admissions, Alumni, Advertisement, school events, students"/>
		<meta name="description" content="Sign up on skoolynk, manage your school, interact with administrators, teachers, students and parents. find schools, results, and join school forums."/>
		<link href="../css/bootstrap.min.css" rel="stylesheet"/>
		<link href="../css/skoolynk.css" rel="stylesheet"/>
		<link href="../css/font-awesome.min.css" rel="stylesheet"/>
		
<style>
.cssarrows {
	position: relative;
	background: rgba(253,253,253,.9);
	z-index:500;
	top:130px;
	left:21%;
	width:350px;
	height:100px;
	border-radius:4px;
	padding:0px;
	border: 1px solid #A9F0F5;
}
.cssarrows:after,
.cssarrows:before {
	top: 100%;
	left: 32px;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.cssarrows:after {
	border-color: rgba(136, 183, 213, 0);
	border-top-color:#f1f1f1;
	border-width: 15px;
	margin-left: 0px;
}
.cssarrows:before {
	border-color: rgba(194, 225, 245, 0);
	border-top-color: #f1f1f1;
	border-width: 18px;
	margin-left: -3px;
}
</style>
	</head>
	<body>
	<nav class="navbar navbar-fixed-top" role="navigation" id="header">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand  animated rubberband"><img src="../images/skoolynks.png" height="28"/></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<i class="fa fa-ellipsis-v" style="color:#fff;"></i>
					</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <form class="navbar-form navbar-left" autocomplete="off" role="search">
			<input type="text" id="searchField"  placeholder="search school, by name, location , motto, ..."  class="form-control" style="background:rgba(0,0,0,.1); border:1px solid #306088; height:28px; margin-top: 3px; color:#fff; font-size: 12px; width: 350px;"/>
				<div id="autoFill" class="cssarrow" style="background:snow; border-bottom: 1px solid #286090 text-align: left; display:none; width:350px; position:absolute; z-index:3000; top:50px; absolute; border-radius: 2px; padding: 3px 3px 3px; color:#286090;"></div>
		  </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a id="top-link" href="../index.php">Home</a></li>
				<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
				<li><a id="top-link" href="about-skoolynk.php">About skoolynk</a></li>
				<li><a  href="signup.php" id="top-link-create">create school account</a></li>
			</ul>
	   </div>
	   </div>
	</nav>
		<div class="jumbotron" id="top-jumbotron" style="width:100%; background:url(../images/banner.jpg); background-size:100%; height:300px; margin:0px; position:relative;">
                    <div class="cssarrows">
						<?php
							if(isset($_GET['district'])){
								$current_district = $_GET['district'];
								echo "<h5 style='margin:0px; padding:5px; 10px 5px'>".$current_district." District</h5>
								<div style='padding:10px; background:#fff;'>Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</div>
								";
							}
						?>
					</div>
<div style="width:100%;  margin:0px; clear:both; position:absolute; bottom:0px; right:0px; left:0px; ">
<div class="rows" style="width:71%; padding:8px 0px 8px; border-top-right-radius:5px; border-top-left-radius:5px; border-right:1px solid #222; border-left:1px solid #aaa; border-top:1px solid #555; background:rgba(0,0,0,.5); margin:auto;">
	<div class="col-md-9"><h4 style="padding:0px 0px 0px; color:#ddd; text-shadow:1px 1px 1px #333; margin:0px; font-weight:lighter;">
	Schools in <?php echo $_GET['district'];?> District (Uganda)</h4></div>
	<div class="col-md-3">
	</div>
	<div id="free-0"></div>
</div>
</div>
		</div>
<div class="container" id="container" style="margin-top:0; padding-left: 25px; padding-right: 25px; width:75%;">
<div class="rows" id="main-rows">
<div id="free-20"></div>
	<?php sch_dist($_GET['district']);?>

</div>
<div id="free-0"></div>
<h5>View other schools in other districts</h5>
		</div>
	
		
		<?php
		//function to echo districts based on regions
								$central = "Buikwe, Bukomansimbi,Butambala,Buvuma,Gomba,Kalangala,Kalungu,Kampala,Kayunga,Kiboga,Kyankwanzi,Luweero,Lwengo,Lyantonde,Masaka,Mityana,Mpigi,Mubende,Mukono,Nakaseke,Nakasongola,Rakai,Sembabule,Wakiso";
								$western = "Buhweju,Buliisa,Bundibugyo,Bushenyi,Hoima,Ibanda,Isingiro,Kabale,Kabarole,Kamwenge,Kanungu,Kasese,Kibaale,Kiruhura,Kiryandongo,Kisoro,Kyegegwa,Kyenjojo,Masindi,Mbarara,Mitooma,Ntoroko,Ntungamo,Rubirizi,Rukungiri,Sheema";
								$eastern = "Amuria,Budaka,Bududa,Bugiri,Bukedea,Bukwa,Bulambuli,Busia,Butaleja,Buyende,Iganga,Jinja,Kaberamaido,Kaliro,Kamuli,Kapchorwa,Katakwi,Kibuku,Kumi,Kween,Luuka,Manafwa,Mayuge,Mbale,Namayingo,Namutumba,Ngora,Pallisa,Serere,Sironko,Soroti,Tororo";
								$northern = "Abim,Adjumani,Agago,Alebtong,Amolatar,Amudat,Amuru,Apac,Arua,Dokolo,Gulu,Kaabong,Kitgum,Koboko,Kole,Kotido,Lamwo,Lira,Maracha,Moroto,Moyo,Nakapiripirit,Napak,Nebbi,Nwoya,Otuke,Oyam,Pader,Yumbe,Zombo";

								function districts($region){
								$district_array = explode(',', $region);
								$count = count($district_array);
								foreach($district_array as $district){
									echo "<li><a href='schools.php?district=".trim($district)."'>".trim($district)."</a></li>";
								}
								}
		?>
	<div class="container" style="background:#d9dfe3;margin-top:0; width:100%; clear:both;">	
				<div id="free-0"></div>
			<div class="row" style="margin:0px auto; width:75%;">
					<div class="col-md-2">
						<div class="site-links">
							<h2>Site Links</h2>
							<ul class="nav">
								<li><a href="#" title="developers">Developers</a></li>
								<li><a href="index.php" title="skoolynk">Home</a></li>
								<li><a href="about-skoolynk.php" title="about skoolynk">About</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="help-and-support.php">Help</a></li>
								<li><a href="sidebar-right.html">Disclaimer</a></li>
								<li><a href="contact.html">Privacy policy</a></li>
								<li><a href="signup.html">Site map</a></li>
								<li><a href="signup.php"><b>Sign up</b></a></li>				
							</ul>
						</div>
					</div>

			<div class="col-md-10">
			<div class="rows">
					<div class="col-md-3">
						<div class="site-links">
							<h2>Central Uganda</h2>
							<ul class="nav">
							<?php districts($central);?>
							</ul>
						</div>
					</div>					
					<div class="col-md-3">
						<div class="site-links">
							<h2>Western Uganda</h2>
							<ul class="nav">
							<?php districts($western);?>
							</ul>
						</div>
					</div>

					<div class="col-md-3">
						<div class="site-links">
							<h2>Eastern Uganda</h2>
							<ul class="nav">
							<?php districts($eastern);?>
							</ul>
						</div>
					</div>

					<div class="col-md-3">
						<div class="site-links">
							<h2>Northern Uganda</h2>
							<ul class="nav">
							<?php districts($northern);?>
							</ul>
						</div>
					</div>	
			
			</div>
			</div>
			</div>
				
				
				<div id="free-30"></div>
				<div class="rows" id="social-media-rows">
					<div class="col-md-3"><font color="#3c5b9b"><a href="https://www.facebook.com/skoolynk" title="skoolynk facebook" target="_blank"><i class="fa fa-facebook-square"></i></font><h6>facebook</h6></a></div>
					<div class="col-md-3"><a href="https://twitter.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#2daae1" title="skoolynk twitter" target="_blank"><i class="fa fa-twitter-square"></i></font><h6>twitter</h6></a></div>
					<div class="col-md-3"><a href="https://instagram.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#517fa4"><i class="fa fa-instagram"></i></font><h6>instagram</h6></a></div>
					<div class="col-md-3"><a href="https://google plus.com/skoolynk" title="skoolynk facebook" target="_blank"><font color="#f5230a"><i class="fa fa-google-plus-square"></i></font><h6>google plus</h6></a></div>
				</div>
				<div id="free-20"></div>
	</div>
		
	<footer>
		<div class="footer2">
					<div style="text-align:center;">
					Copyright &copy; 2016 skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com/" target="_blank" rel="designer" title="xaexia"><font color="#fff">XAEXIA</font></a>
					</div>
		</div>

	</footer>		

		

		

<?php include "includes/footer.php"; ?>