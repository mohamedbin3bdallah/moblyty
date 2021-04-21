<?php

function exist($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select count(*) as count from {$table} $where");
	$row = $result->fetch();
	include("libs/closedb.php");
	if($row['count'] == 0) return 0;
	else return 1;
}

function getNoOfRowsFromTable($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$row['count'] = 0;
	$result = $dbh->query("select count(*) as count from {$table} $where");
	if(!empty($result)) $row = $result->fetch();
	include("libs/closedb.php");
	return $row['count'];
}

function getRowFromTable($select,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select $select from {$table} $where $limit");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row;
}

function getAllDataFromTable($select,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select $select from {$table} $where $limit");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i] = $row;
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function insertRow($table,$row)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$fquery = "insert into {$table} (";
	$lquery = " values (";
	foreach ($row as $key => $value)
	{
		$fquery .= $key;
		$lquery .= "'".$value."'";
		$data  = array_keys($row);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = $dbh->prepare($query);
	if($result->execute()) return $dbh->lastInsertId();
	else return 0;
    /*include("libs/closedb.php");
	unset($data,$lastkey,$row,$fquery,$lquery,$query,$result);*/
}

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = $dbh->prepare("update {$table} $set $where");
	if($stmt->execute()) return 1;
	else return 0;
	include("libs/closedb.php");
}

function uploadimgs($folder)
{
	$image_director = "uploads/products/".$folder;
	if(!is_dir($image_director)) $create_image_director = mkdir($image_director);	
	for($i=0;$i<count($_FILES['file']['name']);$i++)
	{
		if($_FILES['file']['size'][$i] < 1024000)
		{
			$file_extn[$i] = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
			if($_FILES["file"]["type"][$i] == "image/jpg" || $_FILES["file"]["type"][$i] == "image/jpeg" || $_FILES["file"]["type"][$i] == "image/gif" || $_FILES["file"]["type"][$i] == "image/png")
			{
				$_FILES["file"]["name"][$i] = rand().'.'.$file_extn[$i];
				move_uploaded_file($_FILES["file"]["tmp_name"][$i], $image_director.'/'.$_FILES["file"]["name"][$i]);				
			}
		}
	}
}

function sendemail($person)
{
	require_once('../PHPMailer/class.phpmailer.php');
	require_once('../PHPMailer/class.smtp.php');
	require_once('../PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "smtp.secureserver.net";
	$mail->Host       = "localhost";
	//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
	//	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//	$mail->SMTPSecure = 'ssl';
	//	$mail->Port = 465;
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	//$mail->Username   = "";  // GMAIL username
	//$mail->Password   = "";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	$address = "info@moblyty.com";
	$mail->SetFrom($address, 'INFO');
	$mail->AddAddress($person['email']);
	$mail->Subject    = 'Activation';
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = 'Activation link: http://www.moblyty.com/active.php?email='.$person['email'].'&code='.$person['code'];
	if($mail->Send()) return 1;
	else return 0;
}


function sendemail_admin($email,$subject,$message)
{
	require_once('../PHPMailer/class.phpmailer.php');
	require_once('../PHPMailer/class.smtp.php');
	require_once('../PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "smtp.secureserver.net";
	$mail->Host       = "localhost";
	//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
	//	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//	$mail->SMTPSecure = 'ssl';
	//	$mail->Port = 465;
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	//$mail->Username   = "";  // GMAIL username
	//$mail->Password   = "";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	$address = "info@moblyty.com";
	$mail->SetFrom($address, 'INFO');
	$mail->AddAddress($email);
	$mail->Subject    = $subject;
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = $message;
	$mail->Send();
}

?>