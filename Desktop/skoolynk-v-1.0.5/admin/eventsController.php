<?php
include_once "../classes/DbClass.php";
class eventsController{
		public $db; 

		function __construct()
		{
			$this->db = new DbClass();
			$this->db->connect();
		}

		function getEvents($id)
		{
			return $this->db->select("events", "school_id='".$id."' order by date DESC");
		}

		function createEvents($data)
		{
			if(isset($data))
			{
				if($this->db->insert($data, "events"))
				{
					return true;
				}
			}
			
		}

		function deleteEvent($id)
		{
			if(isset($id))
			{
				if(mysql_query("DELETE FROM events WHERE id={$id}"))
				{
					return true;
				}
			}
		}

		function viewEvent($id)
		{
			if(isset($id))
			{
				if($this->db->select("events", "id='".$id."'"))
				{
					return true;
				}
			}
		}

	}
	?>