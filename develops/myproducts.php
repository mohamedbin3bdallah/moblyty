<?php
include('libs/database.php');

$select = 'products.id as id,products.title as title,products.description as description,products.price as price,products.discount as discount,products.active as active,departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle';
$where = ' inner join departments on products.departmentid = departments.id inner join shows on departments.showid = shows.id inner join cities on shows.cityid = cities.id where products.adminid = '.$_SESSION['userid'].' order by cities.title,shows.title,departments.title,products.title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('departments',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}

if(isset($_GET['id']) && $_GET['id'] != '')
{
	$row = getRowFromTable('products.title as title,products.description as description,products.price as price,products.discount as discount,products.departmentid as departmentid,products.active as active,departments.showid as showid,shows.cityid as cityid','products','inner join departments on products.departmentid = departments.id inner join shows on departments.showid = shows.id where products.adminid = '.$_SESSION['userid'].' and products.id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '' && !preg_match('/[^\p{Arabic}]+$/u',$_POST['title']))
	{
		if(isset($_POST['oldid']))
		{
			if(update('products',' set departmentid = '.$_POST['departmentid'].' , title = "'.$_POST['title'].'" , description = "'.$_POST['description'].'" , price = "'.$_POST['price'].'" , discount = "'.$_POST['discount'].'"',' where id = '.$_POST['oldid']))
			{
				if(!empty($_FILES))	uploadimgs($_POST['oldid']);
				echo '<div class="message" type="success"></div>';
			}
			else echo '<div class="message" type="somthingwrong"></div>';
		}
		else
		{
			unset($_POST['cityid'],$_POST['showid']);
			$_POST['time'] = time();
			$_POST['adminid'] = $_SESSION['userid'];
			$insertid = insertRow('products',$_POST);
			if($insertid)
			{
				if(!empty($_FILES)) uploadimgs($insertid);					
				echo '<div class="message" type="success"></div>';
			}
			else echo '<div class="message" type="somthingwrong"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>