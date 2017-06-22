<?php 
session_start(); 
include_once("../classes/DbClass.php");
include_once("../classes/Mailer.php");
$db = new DbClass();
$db->connect();
$mail = new Mailer();
if(isset($_SESSION['skoolynk_admin']))
{
	$data =  unserialize($_SESSION['skoolynk_admin']);
	$schoolinfo = $db->select("schools", "name='".$data["name"]."'");
    $schoolinfo = $schoolinfo[0];
}
else
{
	header("Location: signup.php");
	exit();
}

if(isset($_POST['activate']))
{
	$code = $_POST["code"];

	if($code==$schoolinfo['code'])
	{
		$data = array("activated"=>"'yes'");
		if($db->update($data , "schools", "code='".$code."'")){
			header("Location:../admin/whoAreyou.php?mgs=Welcome to skoolynk.");
			exit();
		}
	}
	else
	{
	  $error = "Wrong activation code provided";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/skoolynk.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-fixed-top" role="navigation" id="header">
	<div style="width:80%; margin:auto;">
   <div class="navbar-header">
      <a class="navbar-brand" href="index.php" title="skoolynk"><img src="../images/skoolynks.png" height="28"/> </a>
   </div>
   <div>
		<ul class="nav navbar-nav navbar-right">
			<li><a id="top-link" href="index.php">Home</a></li>
			<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
			<li><a id="top-link" href="about-skoolynk.php">About skoolynk</a></li>
		</ul>
   </div>
   </div>
</nav>
<div class="container"  id="container">
	<div class="panel panel-default" id="admin-col" style="background:#fff; margin:30px auto; width:50%;">
		<div class="panel-heading"><h3 id="h5-colored-blue">Activate <?php echo $data['name'];?></h3></div>  
		<div class="panel-body">
		<p>Please enter the confirmation code here</p>
		<p>It was sent to your email address.<br/> 
		if you didnot recieve the code, please check your spam's folder.</p>
		
		    <form action="" method="POST">
				<input type='hidden' name='id' value=""/>
				<input type='text' name='code' class='form-control' placeholder='Enter your confirmation code here' style='background:#eee;'/><br/>
				<?php if(isset($error)) { ?>
                      <?php echo $error; ?> <p><a href='new-activation-code.php'>Request new code</a></p>
				<?php } ?>
		</div> 
		<div class='panel-footer'>
				<input type='submit' class='btn btn-success' name='activate' value='activate <?php echo $data['name'];?>' style='border-radius:0px; font-size:13px;'/>
			</form>
		</div>   	
	</div>     
</div>
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/simple_search.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>