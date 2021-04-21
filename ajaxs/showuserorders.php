<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'ar';
include('../languages/'.$lang.'.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select orders.quantity as quantity,orders.total as total,orders.time as time,orders.dtime as dtime,
							orders.price as price,orders.discount as discount,products.title as producttitle,
							departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle
							from orders inner join products on orders.productid = products.id
							inner join departments on products.departmentid = departments.id
							inner join shows on departments.showid = shows.id
							inner join cities on shows.cityid = cities.id
							where orders.userid = '$id' order by products.title ASC");
	if($result->rowCount() > 0)
	{
		?>
		<div class="row" style="margin-top: 50px;">
			<div class="col-sm-12 table-responsive">
				<table class="table table-bordered table-striped" style="text-align: center;">
					<tr class="info">
						<th><?php language('product'); ?></th>
						<th><?php language('department'); ?></th>
						<th><?php language('quantity'); ?></th>
						<th><?php language('price'); ?></th>
						<th><?php language('discount'); ?></th>
						<th><?php language('total'); ?></th>
						<th><?php language('time'); ?></th>
						<th><?php language('dtime'); ?></th>
					</tr>
		<?php	for($i=0; $row = $result->fetch(); $i++) { ?>
					<tr>
						<td><?php echo $row['producttitle']; ?></td>
						<td><?php echo $row['citytitle'].'/'.$row['showtitle'].'/'.$row['departmenttitle']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['discount']; ?></td>
						<td><?php echo $row['total']; ?></td>
						<td><?php echo date('Y-m-d , h:i:sa', $row['time']); ?></td>
						<td><?php echo date('Y-m-d , h:i:sa', $row['dtime']); ?></td>
					</tr>
		<?php } ?>
				</table>
			</div>
		</div>
		<?php
	}
	else language('nodata');
	exit;
}
?>