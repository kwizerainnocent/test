<?php 
	require_once'DbClass.php';
	
	class UserClass{
		public $id;
		public $username;
		public $email;
		public $school_id;
		public $name;
		public $gender;
		public $user_class;
		public $hashedPassword;
		public $joinDate;
		
		//Constructor is called whenever a new object is created. Takes an associative array with the DB row as an argument.
		function __construct($data) 
		{
			$this->id = (isset($data['id'])) ? $data['id'] : "";
			$this->school_id = (isset($data['school_id'])) ? $data['school_id'] : "";
			$this->username = (isset($data['username'])) ? $data['username'] : "";
			$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
			$this->email = (isset($data['email'])) ? $data['email'] : "";
			$this->name = (isset($data['name'])) ? $data['name'] : "";
			$this->gender = (isset($data['gender'])) ? $data['gender'] : "";
			$this->gender = (isset($data['gender'])) ? $data['gender'] : "";
			$this->user_class = (isset($data['user_class'])) ? $data['user_class'] : "";
			$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
		}
		//this function is user to create or change users' info, if te arg is set to true the a new user is being created
		public function saveInfo($isNewUser = false){
			$db = new DBClass(); //objet of the db class since we are going to use some funcions in it
			if(!$isNewUser) {
			//set the data array
			$data = array(
				"email" => "'$this->email'",
				"username" => "'$this->username'",
				"user_class" => "'$this->user_class'",
				"email" => "'$this->email'"
			);
			
			//update the row in the database where id = $this->id;
			$db->update($data, 'users', 'id = '.$this->id);
			}else {
				//if the user is being registered for the first time.
			$data = array(
				"username" => "'$this->username'",
				"name" => "'$this->name'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'",
				"join_date" => "'".date("Y-m-d H:i:s",time())."'"
			);
			
			$this->id = $db->insert($data, 'users');
			$this->joinDate = time();
		}
		}
	}
?>