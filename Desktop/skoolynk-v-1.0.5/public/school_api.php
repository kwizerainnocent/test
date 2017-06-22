<?php
 function school_info($id){
	$school_info = "{";
	$info = mysql_query("select * from schools where id='$id'");
		while($sinfo= mysql_fetch_array($info)){
			$school_info .= "
						\"id\":\"{$sinfo['id']}\",
						\"name\":\"{$sinfo['name']}\",
						\"motto\":\"{$sinfo['motto']}\",
						\"website\":\"{$sinfo['website']}\",
						\"address\":\"{$sinfo['location']}\",
						\"district\":\"{$sinfo['district']}\",
						\"phone\":\"{$sinfo['phone']}\",
						\"email\":\"{$sinfo['email']}\",
						\"ownership\":\"{$sinfo['ownership']}\",
						\"religion\":\"{$sinfo['religion']}\",
						\"gender\":\"{$sinfo['gender']}\",
						\"vision\":\"{$sinfo['vision']}\",
						\"mission\":\"{$sinfo['mission']}\",
						\"badge\":\"{$sinfo['badge']}\",
						\"slider\":\"{$sinfo['slider']}\",
						\"centerNo\":\"{$sinfo['centerNo']}\",
						\"boarding\":\"{$sinfo['boarding']}\",
				";
	}
	$info = mysql_query("select * from articles where school_id='$id' order by date desc limit 1");
		while($sinfo= mysql_fetch_array($info)){
			$school_info .= "
						\"theme\":\"{$sinfo['theme']}\",
						\"word\":\"{$sinfo['word']}\",
						\"date\":\"{$sinfo['date']}\"
				";
	}
	$school_info .= "}";
	return  $school_info;
 }

