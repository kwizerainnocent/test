<?php
require_once 'variables.php';
class db_connection extends PDO{
	//online variables
	// protected $host = 'localhost';
	// protected $table = 'skoolynk_db';
	// protected $user ='skoolynk_user';
	// protected $password ='2015=skoolynk';	

	//offline variables
	protected $host = 'localhost';
	protected $table = 'skoolynk_db';
	protected $user ='root';
	protected $password ='';
	public static $dbh;
	function __construct(){
		parent::__construct("mysql:host=".$this->host."; dbname=".$this->table."", $this->user, $this->password);

	}
}

