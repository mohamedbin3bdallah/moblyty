<?php
include('libs/menu.php');
include('libs/database.php');
$menu = menu();
$googlead = getRowFromTable('code','ads','where id = 1','');

$product = getRowFromTable('*','products','where active = 1 and id = '.$_GET['id'],'');
if(empty($product)) header('Location: index.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	
	$_POST['userid'] = $_SESSION['userid'];
	$_POST['productid'] = $product['id'];
	$_POST['price'] = $product['price'];
	$_POST['discount'] = $product['discount'];
	$_POST['total'] = ($product['price']-$_POST['discount'])*$_POST['quantity'];
	$_POST['time'] = time();

	if(insertRow('orders',$_POST)) header('Location: product.php?id='.$_GET['id'].'&message=1');
	else header('Location: product.php?id='.$_GET['id'].'&message=2');
}
?>