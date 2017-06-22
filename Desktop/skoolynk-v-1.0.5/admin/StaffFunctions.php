<?php
include_once "../classes/DbClass.php";
class StaffFunctions
{
	public $db;

	public function __construct()
	{
		$this->db = new DbClass();
		$this->db->connect();

	}

	public function createStaff($data){
		if($this->db->insert($data, "student"))
		{
			return true;
		}
	}

	public function getUser($id)
	 {
	 	$info = $this->db->select("student", "id='".$id."'");
	 	return json_encode($info[0]);
	 }
}
