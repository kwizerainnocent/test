<?php 
class DBClass {
	//online varialble
	// private $db_name = 'skoolynk_db';
	// private $db_user = 'skoolynk_user';
	// private $db_pass = 'skoolynk2015';
	// private $db_host = 'localhost';	

	//offline variables
	private $db_name = 'skoolynk_db';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_host = 'localhost';

	//open a connection to the database. Make sure this is called
	//on every page that needs to use the database.
	public function connect() 
	{
		$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		mysql_select_db($this->db_name);
		return true;
	}
	//Select rows from the database.
	//returns a full row or rows from $table using $where as the where clause.
	//return value is an associative array with column names as keys.
	public function select($table, $where) 
	{
		if(empty($where))
		{
			$sql = "SELECT * FROM $table";
		}
		else
		{
			$sql = "SELECT * FROM $table WHERE $where";
		}
		
		$result = mysql_query($sql);
		$selected = array();
		while($rows = mysql_fetch_assoc($result)){
        	array_push($selected, $rows);
		}
		return $selected;
	}

	//Updates a current row in the database.
	//takes an array of data, where the keys in the array are the column names
	//and the values are the data that will be inserted into those columns.
	//$table is the name of the table and $where is the sql where clause.
	public function update($data, $table, $where) {
		foreach ($data as $column => $value) {
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysql_query($sql) or die(mysql_error());
		}
		return true;
	}

	//Inserts a new row into the database.
	//takes an array of data, where the keys in the array are the column names
	//and the values are the data that will be inserted into those columns.
	//$table is the name of the table.
	public function insert($data, $table) {

		$columns = "";
		$values = "";

		foreach ($data as $column => $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .= "'".$value."'";
		}

		$sql = "insert into $table ($columns) values ($values)";

		$inserted = mysql_query($sql) or die(mysql_error());
		if($inserted)
		{
			return true;
		}
		//return the ID of the user in the database.
		//return mysql_insert_id();

	}
	public function deteleRecord($table, $whereClause){
		$sql ="DELETE FROM $table $whereClause";
		mysql_query($sql) or die(mysql_error());
		return true;
	}

}

?>