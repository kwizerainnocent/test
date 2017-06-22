<?php

function getcount($field, $value, $id){
	$get = mysql_query("select school_id,{$field} from admission where school_id= '$id' AND {$field}= '{$value}'");
	echo mysql_num_rows($get);
}

function all($table){
	$query_all = mysql_query("select count(id) from {$table}");
	while($all = mysql_fetch_array($query_all)){
		$count = $all[0];
		return $count;
	}
}
function notification($table, $id){
	$query_all = mysql_query("select count(id) from {$table} where school_id={$id} and seen='no'");
	while($all = mysql_fetch_array($query_all)){
		$count = $all[0];
		return $count;
	}
}