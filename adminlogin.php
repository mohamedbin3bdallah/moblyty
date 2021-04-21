<?php
session_start();
if(!isset($_SESSION['admin']))
{
	include('libs/lang.php');
function login($myusername,$passw0rd)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$passw0rd = hash('sha256', $passw0rd, FALSE);
	$query1 = $dbh->query("select id from  admin where username = '$myusername' and password = '$passw0rd' and active = 1");
	$row = $query1->fetch();
	if(!empty($row))
	{
		$_SESSION['admin'] = $row['id'];
		return 1;
    }
	else return 0;
}
	//include('develops/register.php');
	if($lang == "ar")
	echo '<html xml:lang="ar" lang="ar" dir=rtl xmlns="http://www.w3.org/1999/xhtml">';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<title>Moblyty Admin</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/register<?php echo $lang; ?>.js"></script>
<script language="JavaScript">
$(document).ready(function(){
    $('#wrongaccount').show(function(){
        $('#wrongaccount').append('<br><h4 style="color:red;text-align:center;"><?php language('wronglogin');?></h4>');
	});
});
</script>
</head>
<body>
<div class="container">
<?php 
if(isset($_POST['loginsubmit'])) 
{
	unset($_POST['loginsubmit']);
	if($_POST['myusername'] != '' && $_POST['passw0rd'] != '')
	{
		$loginOp = login($_POST['myusername'],$_POST['passw0rd']);		
		if($loginOp == 1) echo header('location: admin.php?c=cities');
		elseif($loginOp == 0) echo '<div id="wrongaccount"></div>';
	}
}
include('designs/headers/index.php');
?>
</div>
</body>
</html>
<?php } else echo header('location: admin.php?c=cities'); ?>