<?php

require_once 'UserClass.php';
require_once 'DbClass.php';

class UserOperationClass {
	//Log the user in. First checks to see if the 
	//username and password match a row in the database.
	//If it is successful, set the session variables
	//and store the user object within.
	public function login($email, $password, $table)
	{
		$sql = mysql_query("SELECT * FROM student WHERE email='".$email."'");
		if(mysql_num_rows($sql) == 1)
		{
			$info = mysql_fetch_assoc($sql);
			if($info['password'] == sha1($password))
			{
				$_SESSION["skoolynkuser"] = serialize($info); 
				return true;

			}else{
                return false;
			}
		}else{
			return false;
		}

		return true;
	}
	
	//Log the user out. Destroy the session variables.
	public function logout() {
		unset($_SESSION['skoolynkuserid']);
		unset($_SESSION['skoolynkuser']);
		session_destroy();
	}
	//this function is used to poste new posted by the user
	public function makePost($data, $table){
		$db = new DBClass();
		return $db->insert($data, $table);
	}
	//this function will be posting images 
	public function makeImagePost($filesArray, $desnt){
		$imgpro = new ImageProcessing($filesArray);
	}
	
	//Check to see if a username exists.
	//This is called during registration to make sure all user names are unique.
	public function checkUsernameExists($username) {
		$result = mysql_query("select id from users where username='$username'");
    	if(mysql_num_rows($result) == 0)
    	{
			return false;
	   	}else{
	   		return true;
		}
	}
	
	//get a user
	//returns a User object. Takes the users id as an input
	public function get($id)
	{
		$db = new DBClass();
		$result = $db->select('users', "id = $id");
		return new User($result);
	}
	
}

