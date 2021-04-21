<?php
include('libs/menu.php');
include('libs/database.php');
$menu = menu();
$googlead = getRowFromTable('code','ads','where id = 1','');

$department = getRowFromTable('title','departments','where id = '.$_GET['id'],'');
if(empty($department)) header('Location: index.php');

if(isset($_GET['page'])) $page = (int) $_GET['page'];
else $page = 0;
	
if ($page < 1) $page = 1;
$resultsPerPage = 12;
$startResults = ($page - 1) * $resultsPerPage;
$noOfrows = getNoOfRowsFromTable('products','where departmentid = '.$_GET['id']);
$totalPages = ceil($noOfrows / $resultsPerPage);

$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;

$products = getAllDataFromTable('id,title as producttitle,price,discount','products','where active = 1 and departmentid = '.$_GET['id'].' order by title ASC',$limit);
?>