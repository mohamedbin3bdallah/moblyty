<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['username'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		if(!exist('users','where username like "'.$_POST['username'].'" and id <> '.$_SESSION['userid']))
		{
			if(!exist('users','where email like "'.$_POST['email'].'" and id <> '.$_SESSION['userid']))
			{
				$set = 'set username = "'.$_POST['username'].'",email = "'.$_POST['email'].'",address = "'.$_POST['address'].'",phone = "'.$_POST['phone'].'"';
				if($_POST['password'] != '') {  $_POST['password'] = hash('sha256', $_POST['password'], FALSE); $set .= ',password = "'.$_POST['password'].'"'; }
				if(update('users',$set,' where id = '.$_SESSION['userid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invaliduseremail"></div>';
		}
		else echo '<div class="message" type="invalidusername"></div>';
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}

$row = getRowFromTable('username,email,address,phone','users',' where id = '.$_SESSION['userid'],'');

?>