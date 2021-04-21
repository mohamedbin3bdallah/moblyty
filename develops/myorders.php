<?php
include('libs/menu.php');
include('libs/database.php');
$menu = menu();
$googlead = getRowFromTable('code','ads','where id = 1','');
$page = getRowFromTable('*','pages','where page like "myorders.php"','');

if(isset($_GET['page'])) $page = (int) $_GET['page'];
else $page = 0;
	
if ($page < 1) $page = 1;
$resultsPerPage = 10;
$startResults = ($page - 1) * $resultsPerPage;
$noOfrows = getNoOfRowsFromTable('orders','where userid = '.$_SESSION['userid']);
$totalPages = ceil($noOfrows / $resultsPerPage);

$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;

$myorders = getAllDataFromTable('orders.quantity as quantity,orders.price as price,orders.discount as discount,orders.total as total,orders.time as time,orders.dtime as dtime,products.title as title','orders','inner join products on orders.productid = products.id where orders.userid = '.$_SESSION['userid'].' order by orders.time DESC',$limit);
?>