<?php
require_once 'db_connection.php';
$connect = new db_connection;
$db = $connect->connect();
$query = $db->prepare("select * from student where id=:id");
$query->execute(['id'=>6]);
$rows = $query->fetch();
echo $rows['email'];