<!--online-->
<!--<?php
//$con = mysql_connect("localhost", "skoolynk_user", "2015=skoolynk"); if(!$con) die("failed to make a db connection " .mysql_error());
//$select = mysql_select_db("skoolynk_db"); if(!$select) die("failed to make a db selection " .mysql_error());
?>-->

<!--offline-->
<?php
$con = mysql_connect("localhost", "root", ""); if(!$con) die("failed to make a db connection " .mysql_error());
$select = mysql_select_db("skoolynk_db"); if(!$select) die("failed to make a db selection " .mysql_error());
?>