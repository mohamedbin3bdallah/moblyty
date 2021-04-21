<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(!empty($_POST['email']) && $_POST['message'] != '')
	{
		for($i=0;$i<count($_POST['email']);$i++)
		{
			sendemail_admin($_POST['email'][$i],$_POST['subject'],$_POST['message']);
		}
		echo '<div class="message" type="success"></div>';
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>