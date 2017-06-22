<?php  
    include_once("includes/db-connection.php");
	if(isset($_POST[''])){
		    $ip = $_SERVER['REMOTE_ADDR'];
			$joined = time();
			$name = mysql_real_escape_string($_POST['name']);
			$motto = mysql_real_escape_string($_POST['motto']);
			$website = mysql_real_escape_string($_POST['website']);
			$location = mysql_real_escape_string($_POST['location']);
			$district = mysql_real_escape_string($_POST['district']);
			$password = sha1($_POST['password']);
			$email = mysql_real_escape_string($_POST['email']);
			$headmaster = mysql_real_escape_string($_POST['headmaster']);
			$contact= mysql_real_escape_string($_POST['contact']); 
			$codeGen = sha1(time());
			$code = substr($codeGen, 0, 7);
			if(!empty($name) && !empty($email) && !empty($district)){
				$registerSchool = mysql_query("insert into schools(ipaddress, joined, name, motto, website, location, district, password, email, contact, headmaster, confCode, activated) 
				values('$ip','$joined', '$name', '$motto', '$website', '$location',  '$district', '$password', '$email', '$contact', '$headmaster', '$code', 'NO')");
				setcookie("school_name", $name, time()+(604800), "/");
				if ($registerSchool){
					echo "successful";
				}else{
					echo "unsuccessful";
				}
			}
	}else{
		header("Location: ");
	}
   
?>