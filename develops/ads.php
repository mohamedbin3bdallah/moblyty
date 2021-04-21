<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['code'] != '')
	{
		if(update('ads',' set code = "'.$_POST['code'].'"',' where id = 1')) echo '<div class="message" type="success"></div>';
		else echo '<div class="message" type="somthingwrong"></div>';
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}

$row = getRowFromTable('code','ads',' where id = 1','');

?>