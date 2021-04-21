<?php
if(isset($_POST['id'],$_POST['delivered']))
{	
	$id = $_POST['id'];
	$delivered = $_POST['delivered'];
	$dtime = time();
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = $dbh->prepare("update orders set delivered = 1 , dtime = '$dtime' where id = '$id'");
	if($stmt->execute()) echo 1;	
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>