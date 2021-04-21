<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(update('contact','set address = "'.$_POST['address'].'",phone = "'.$_POST['phone'].'",mobile = "'.$_POST['mobile'].'",facebook = "'.$_POST['facebook'].'",twitter = "'.$_POST['twitter'].'",googleplus = "'.$_POST['googleplus'].'",linkedin = "'.$_POST['linkedin'].'",youtube = "'.$_POST['youtube'].'"',' where id = 1')) echo '<div class="message" type="success"></div>';
	else echo '<div class="message" type="somthingwrong"></div>';
}

$row = getRowFromTable('*','contact',' where id = 1','');

?>