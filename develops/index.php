<?php
include('libs/menu.php');
include('libs/database.php');
$menu = menu();
$page = getRowFromTable('*','pages','where page like "index.php"','');
$lastproducts = getAllDataFromTable('id','products','where active = 1 order by time desc',' limit 8');

if(!empty($lastproducts))
{
	for($lp=0;$lp<count($lastproducts);$lp++)
	{
		$images = glob('uploads/products/'.$lastproducts[$lp]['id'].'/*');
		$lastimages[] = $images[rand(0, count($images) - 1)];
	}
}

/*foreach($menu['cities'] as $cityid => $cities)
{
	echo $cities['id'].' - '.$cities['title'];
	foreach($cities['shows'] as $showid => $shows)
	{
		echo $shows['id'].' - '.$shows['title'];
		foreach($shows['departments'] as $departmentid => $departments)
		{
			echo $departments['id'].' - '.$departments['title'];
		}
	}
}*/
?>