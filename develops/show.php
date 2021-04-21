<?php
include('libs/menu.php');
include('libs/database.php');
$menu = menu();
$googlead = getRowFromTable('code','ads','where id = 1','');

$showdepartments = getAllDataFromTable('shows.title as showtitle,shows.description as description,shows.branches as branches,departments.id as id,departments.title as departmenttitle','shows','inner join departments on shows.id = departments.showid where shows.id = '.$_GET['id'],'');
if(empty($showdepartments)) header('Location: index.php');
else
{
	$show_title = $showdepartments[0]['showtitle'];
	$description_title = $showdepartments[0]['description'];
	$branches_title = $showdepartments[0]['branches'];
	
	$products = getAllDataFromTable('products.id as id,products.title as title,departments.title as departmenttitle','products','inner join departments on products.departmentid = departments.id inner join shows on departments.showid = shows.id where products.active = 1 and shows.id = '.$_GET['id'],'');
}
?>