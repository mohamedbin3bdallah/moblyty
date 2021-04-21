<?php
include('libs/database.php');

$select = 'shows.id as id,shows.cityid as cityid,shows.title as showtitle,shows.description as description,shows.branches as branches,cities.title as citytitle';
$where = ' inner join cities on shows.cityid = cities.id order by cities.title,shows.title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('shows',$where);
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
	$row = getRowFromTable('cityid,title,description,branches','shows',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '' && !preg_match('/[^\p{Arabic}]+$/u',$_POST['title']))
	{
		if(isset($_POST['oldid']))
		{
			if(!exist('shows',' where cityid = '.$_POST['cityid'].' and title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if(update('shows',' set cityid = '.$_POST['cityid'].' , title = "'.$_POST['title'].'" , description = "'.$_POST['description'].'" , branches = "'.$_POST['branches'].'"',' where id = '.$_POST['oldid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
		else
		{
			if(!exist('shows',' where cityid = '.$_POST['cityid'].' and title like "'.$_POST['title'].'"'))
			{
				if(insertRow('shows',$_POST)) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>