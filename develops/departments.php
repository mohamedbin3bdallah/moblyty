<?php
include('libs/database.php');

$select = 'departments.id as id,departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle';
$where = ' inner join shows on departments.showid = shows.id inner join cities on shows.cityid = cities.id order by cities.title,shows.title,departments.title ASC';

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
	$row = getRowFromTable('departments.title as title,departments.showid as showid,shows.cityid as cityid','departments','inner join shows on departments.showid = shows.id where departments.id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '' && !preg_match('/[^\p{Arabic}]+$/u',$_POST['title']))
	{
		if(isset($_POST['oldid']))
		{
			if(!exist('departments',' where showid = '.$_POST['showid'].' and title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if(update('departments',' set showid = '.$_POST['showid'].' , title = "'.$_POST['title'].'"',' where id = '.$_POST['oldid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
		else
		{
			if(!exist('departments',' where showid = '.$_POST['showid'].' and title like "'.$_POST['title'].'"'))
			{
				unset($_POST['cityid']);
				if(insertRow('departments',$_POST)) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>