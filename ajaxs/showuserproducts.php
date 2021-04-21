<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'ar';
include('../languages/'.$lang.'.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select products.id as id,products.time as time,products.price as price,products.discount as discount,products.title as producttitle,
							products.description as description,products.active as active,departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle
							from products inner join departments on products.departmentid = departments.id
							inner join shows on departments.showid = shows.id
							inner join cities on shows.cityid = cities.id
							where products.adminid = '$id' order by products.title ASC");
	if($result->rowCount() > 0)
	{
		?>
		<div class="row" style="margin-top: 50px;">
			<div class="col-sm-12 table-responsive">
				<table class="table table-bordered table-striped" style="text-align: center;">
					<tr class="info">
						<th><?php language('product'); ?></th>
						<th><?php language('department'); ?></th>
						<th><?php language('description'); ?></th>
						<th><?php language('price'); ?></th>
						<th><?php language('discount'); ?></th>
						<th><?php language('time'); ?></th>
						<th><?php language('active'); ?></th>
						<th><?php language('images'); ?></th>
					</tr>
		<?php	for($i=0; $row = $result->fetch(); $i++) { ?>
					<tr>
						<td><?php echo $row['producttitle']; ?></td>
						<td><?php echo $row['citytitle'].'/'.$row['showtitle'].'/'.$row['departmenttitle']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['discount']; ?></td>
						<td><?php echo date('Y-m-d , h:i:sa', $row['time']); ?></td>
						<td><input type="checkbox" <?php if($row['active'] == 1) echo 'checked'; ?> disabled></td>
						<td>
						<?php 
							if(is_dir('../uploads/products/'.$row['id'])) {
							$pics[$i] = array_diff(scandir('../uploads/products/'.$row['id']), array('.','..'));
							for($j=2;$j<(count($pics[$i])+2);$j++)
							{
						?>
							<div class="col-sm-3" style="margin-bottom: 10px;">
								<img class="img-responsive" src="uploads/products/<?php echo $row['id']; ?>/<?php echo $pics[$i][$j]; ?>" style="width:55px;">
							</div>
							<?php } } else language('nodata'); ?>
						</td>
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