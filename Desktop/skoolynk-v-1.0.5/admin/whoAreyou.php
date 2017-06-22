<?php 
session_start();
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
if(isset($_SESSION['skoolynk_admin']))
{
	$info = unserialize($_SESSION['skoolynk_admin']);
	$schoolinfo = $db->select("schools", "name='".$info["name"]."'");
    $schoolinfo = $schoolinfo[0];
}
else
{
   header("Location:index.php");
   exit();
}

if(isset($_POST['finished']))
{
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$position = $_POST['position'];
	if(isset($_POST['gotIt']) && $_POST['gotIt']=="yes" )
	{
    $dataCollected = array("school_id"=>$schoolinfo['id'],
    	 "first_name"=>$fname, "second_name"=>$sname, "email"=>$email, "password"=>$password, "cate"=>"admin");
    if($db->insert($dataCollected, "student"))
    {
       $_SESSION['Administrator'] = serialize($dataCollected);
       header("Location: home.php");
       exit();   
    }
	}
	else
	{
	 $error = "not checked";
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
	<div class="panel panel-default" id="admin-col" style="background:#fff; margin:0px auto; width:50%;">
		<div class="panel-heading"><h4 id="h5-colored-blue">Let Skoolynk know About you</h4></div>  
		 <form action="" method="POST">
		<div class="panel-body">
			<b><font color="red">NOTE !</font> You are going to be the main Administrator of <font color="red"><?php echo $info['name']; ?></font> on skoolynk. As you let us know about you,  the Email and password are going to be your credentails for logining into admin dashboard thank you.<br/>
			<b> Is this clear to you ? <input type="checkBox" value="yes" name="gotIt" /></b>
			<?php if(isset($error))
				{
					echo "<br/><p style='color:red; font-weight:bold;'>Error ! Have your read this section?</p>";
				}
			?>
			</b>
		<hr/>
		   
		    	<label>Full name</label>
		    	<div class="rows">
		    		<div class="col-md-6">
		    			<input type='text' name='fname' class='form-control' placeholder='Enter first name'/>
		    		</div>
		    		<div class="col-md-6">
		    			<input type='text' name='sname' class='form-control' placeholder='Enter seconf name'/>
		    		</div>
		    		<div id="free-10"></div>
		    	</div>
				<label>Email Address</label>
				<input type='email' name='email' class='form-control' placeholder='Enter Email'/><br/>
				<label>Password</label>
				<input type='password' name='password' class='form-control' placeholder='Enter password'/><br/>
				<label>Confirm password</label>
				<input type='password' name='pasword1' class='form-control'/><br/>
				<label>Position At <?php echo $info['name']; ?></label>
				<input type='text' name='position' class='form-control' placeholder='Enter Position'/><br/>
		</div> 
		<div class='panel-footer'>
				<input type='submit' class='btn btn-success' name='finished' value='Finished' style='border-radius:0px; font-size:13px;'/>
			</form>
		</div>   	
	</div>     
</div>
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/simple_search.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>