<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['message'] != '')
	{
		$message = 'Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'];
		sendemail_admin('info@moblyty.com',$_POST['subject'],$message);
		header('Location: index.php?message=m1#main-contact-form');
	}
	else header('Location: index.php?message=m5#main-contact-form');
}
?>