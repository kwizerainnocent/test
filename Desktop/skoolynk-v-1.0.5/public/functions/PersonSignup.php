<?php
require_once 'db_connection.php';
class PersonSignup
{
	public $username;
	public $password;
	public $email;
	public $school;
	public $gender;
			
	//function to carry out the signup
	function createYourAccount($info = array()){
	$connect_to_db = new db_connection();
		$this->username =  $info['fname']." ".$info['sname'];
		$this->password = $info['password'];
		$this->email = $info['email'];
		$this->school = $info['school'];
		$this->gender = $info['gender'];
		$hashed_password = password_hash($this->password, PASSWORD_DEFAULT, ['cost'=>12]);
		try{
		$db = $connet_to_db->connect();
		$db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "insert into people(school_id, name, password, email, sex) values(:school,:name,:password, :email,:gender)";
		$query = $db->prepare($sql);
		$query->execute([
			'school'=>$this->school,
			'name'=>$this->username, 
			'password'=>$this->hashed_password, 
			'email'=>$this->email,
			'gender'=>$this->gender,
			]);
		}catch(PDOException $ex){
			echo "An internal error occured<hr/>";
			echo $ex->getMessage();
		}	//end of the try and catch statement.
		}	//closing the if statement.
	}	//closing the class PersonSignup