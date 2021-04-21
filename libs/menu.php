<?php

function menu()
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select cities.id as cityid,cities.title as citytitle,shows.id as showid,shows.title as showtitle
							,departments.id as departmentid,departments.title as departmenttitle  from cities
							inner join shows on cities.id = shows.cityid
							inner join departments on shows.id = departments.showid");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows['cities'][$row['cityid']]['id'] = $row['cityid'];
			$allrows['cities'][$row['cityid']]['title'] = $row['citytitle'];
			$allrows['cities'][$row['cityid']]['shows'][$row['showid']]['id'] = $row['showid'];
			$allrows['cities'][$row['cityid']]['shows'][$row['showid']]['title'] = $row['showtitle'];
			$allrows['cities'][$row['cityid']]['shows'][$row['showid']]['departments'][$row['departmentid']]['id'] = $row['departmentid'];
			$allrows['cities'][$row['cityid']]['shows'][$row['showid']]['departments'][$row['departmentid']]['title'] = $row['departmenttitle'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

?>