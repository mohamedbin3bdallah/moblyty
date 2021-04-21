<?php
if(isset($_GET['code'],$_GET['email']) && $_GET['code'] != '')
{
	$code = $_GET['code'];
	$email = $_GET['email'];
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * , count(*) as count from users where email = '$email'");
	$row = $result->fetch();
	//print_r($row);
	if($row['count'] == 1)
	{
		if($row['code'] == $code && $row['active'] == 0)
		{
			$stmt = $dbh->prepare("update users set active = '1',code = '' where code = '$code' and email = '$email' and active = 0");
			if($stmt->execute()) $message = 'm19';
			else $message = 'm2';
		}
		elseif($row['active'] == 1) $message = 'm16';
		elseif($row['code'] != $code) $message = 'm4';
		else $message = 'm5';
	}
	else $message = 'm2';
	include("libs/closedb.php");
	header('Location: login.php?message='.$message);
}
?>