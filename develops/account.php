<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['username'] != '' && !preg_match('/[^a-z]/',$_POST['username']))
	{
		$set = 'set username = "'.$_POST['username'].'"';
		if($_POST['password'] != '') {  $_POST['password'] = hash('sha256', $_POST['password'], FALSE); $set .= ',password = "'.$_POST['password'].'"'; }
		if(update('admin',$set,' where id = '.$_SESSION['admin'])) echo '<div class="message" type="success"></div>';
		else echo '<div class="message" type="somthingwrong"></div>';
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}

$row = getRowFromTable('username','admin',' where id = '.$_SESSION['admin'],'');

?>