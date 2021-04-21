	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#nondelivered"><?php language('nondelivered'); ?></a></li>
				<li><a data-toggle="tab" href="#delivered"><?php language('delivered'); ?></a></li>
			</ul>
			
			<div class="tab-content" style="margin-top: 25px;">
				<div id="nondelivered" class="tab-pane fade in active">
				<?php
					$data = getAllDataFromTable('orders.id as id,orders.time as time,users.username as username,users.address as address,users.phone as phone,products.title as product,departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle','orders',' inner join users on orders.userid = users.id inner join products on orders.productid = products.id inner join departments on products.departmentid = departments.id inner join shows on departments.showid = shows.id inner join cities on shows.cityid = cities.id where orders.delivered = 0 order by orders.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('address'); ?></th>
									<th><?php language('phone'); ?></th>
									<th><?php language('product'); ?></th>
									<th><?php language('department'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['address']; ?></td>
										<td><?php echo $data[$i]['phone']; ?></td>
										<td><?php echo $data[$i]['product']; ?></td>
										<td><?php echo $data[$i]['citytitle'].'/'.$data[$i]['showtitle'].'/'.$data[$i]['departmenttitle']; ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
										<td><input type="checkbox" class="checkdelivered" id="<?php echo $data[$i]['id'];?>"></td>										
									</tr>
								<?php	} ?>
							</table>
						</div>
					</div>
				<?php
					}
					else
					{
						echo '<div class="row">';
							echo '<div class="col-md-8 col-md-offset-2">';
							language('nodata');
							echo '</div>';
						echo '</div>';
					}
				?>
				</div>
				
				<div id="delivered" class="tab-pane fade">
				<?php
					$data = getAllDataFromTable('orders.id as id,orders.time as time,orders.dtime as dtime,users.username as username,users.address as address,users.phone as phone,products.title as product,departments.title as departmenttitle,shows.title as showtitle,cities.title as citytitle','orders',' inner join users on orders.userid = users.id inner join products on orders.productid = products.id inner join departments on products.departmentid = departments.id inner join shows on departments.showid = shows.id inner join cities on shows.cityid = cities.id where orders.delivered = 1 order by orders.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('address'); ?></th>
									<th><?php language('phone'); ?></th>
									<th><?php language('product'); ?></th>
									<th><?php language('department'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['address']; ?></td>
										<td><?php echo $data[$i]['phone']; ?></td>
										<td><?php echo $data[$i]['product']; ?></td>
										<td><?php echo $data[$i]['citytitle'].'/'.$data[$i]['showtitle'].'/'.$data[$i]['departmenttitle']; ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['dtime']); ?></td>
									</tr>
								<?php	} ?>
							</table>
						</div>
					</div>
				<?php
					}
					else
					{
						echo '<div class="row">';
							echo '<div class="col-md-8 col-md-offset-2">';
							language('nodata');
							echo '</div>';
						echo '</div>';
					}
				?>
				</div>
			</div>
			
		</div>
	</div>