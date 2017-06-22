<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Best school management system in uganda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/skoolynk.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-fixed-top" role="navigation" id="header">
	<div style="width:80%; margin:auto;">
   <div class="navbar-header">
      <a class="navbar-brand" href="index.php" title="skoolynk"><img src="images/skoolynks.png" height="28"/></a>
   </div>
   <div>
      <form class="navbar-form navbar-left" autocomplete="off" role="search" >
            <input type="text" id="name"  placeholder="search school, by name, location , motto, ..."  class="form-control"/>
			<div id="results"></div>
      </form>
		<ul class="nav navbar-nav navbar-right">
			<li><a id="top-link" href="index.php">Home</a></li>
			<li><a id="top-link" href="http://www.xaexia.com" target="_blank">Developers</a></li>
			<li><a id="top-link" href="about-skoolynk.php">About skoolynk</a></li>
			<li><a href="signup.php" id="top-link"><button class="btn btn-default" style="font-size:12px; font-weight:bold; color:purple;border-radius:2px; margin:0px; padding-top:7px; line-height:7px;">Create account</button></a></a></li>
		</ul>
   </div>
   </div>
</nav>
	<div class="container"  id="container">
        <div class="panel panel-default" id="admin-col" style="background:#fff; margin:30px auto; width:50%;">
			<div class="panel-heading"><h3 id="h5-colored-blue">Request new activation code</h3></div>  
			<div class="panel-body">			          
<?php 
if(isset($_GET['id'])){ 
    include_once("includes/db-connection.php");
    $id = preg_replace('#[^0-9]#', '', $_GET['id']);
    $activate = mysql_query("select * from schools WHERE id='$id' and activated='NO' ");
    $skoolinfo = mysql_fetch_array($activate);
    $email = explode("@", $skoolinfo['email']);
    $oldemail = $skoolinfo['email'];
    $name = $skoolinfo['name'];
echo"<p><h3></h3>Request for new confirmation code </h3></p>
<p>An email will be sent the compelete email address that<br/> you are going to provide below</p>
<form action='' method='POST'>
	<label>Complete the email address you used for signing up.</label><br/>
									<div class='input-group'  style='width:300px;'>
										<input type='text' name='email' class='form-control' placeholder='example'/>
										<span class='input-group-btn'>
											<a type='submit' name='search' class='btn btn-default disabled'>@".$email[1]."</a>
										</span>
									</div>
	</div>       
	<div class='panel-footer'>
	<input type='submit' name='request'class='btn btn-success' value='Send Request' style='border-radius:0px; cusor:pointer;font-size:13px;'/><br/>
</form>";
}

if(isset($_POST['request'])){
   $email = $_POST['email']."@".$email[1];
   $id = $id;
   $codeGen = sha1(time());
   $code = substr($codeGen, 0, 7);
    if($email==$oldemail){
        $newcode = mysql_query("update schools set confCode='$code' Where id='$id'"); 
        header("Location: activate-account-now.php?skool=".$name."&message=New code was sent to your email address");
        exit();
    }else{
       echo "<br/><h6>The Email <font style='color:orange;'>({$email})</font> you entered is wrong</h6>";    
    }
}
?>
</div>
</div>        
	</div>

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/simple_search.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>