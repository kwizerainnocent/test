<?php
require_once 'db_connection.php';
class PersonSignup
{
	//function to carry out the signup
	function createYourAccount($info = array()){
		$db = new db_connection();
		try{
		$sql = "insert into people(school_id, name, password, email, sex) values(:school,:name,:password, :email,:gender)";
		$query = $db->prepare($sql);
		$query->execute([
			'school'=>$info['school'],
			'name'=>$info['fname']." ".$info['sname'], 
			'password'=>password_hash($info['password'], PASSWORD_DEFAULT, ['cost'=>12]), 
			'email'=> $info['email'],
			'gender'=> $info['gender'],
			]);
		}catch(PDOException $ex){
			echo "An internal error occured<hr/>";
			echo $ex->getMessage();
		}	//end of the try and catch statement.
		}	//closing the if statement.
}	//closing the class PersonSignup