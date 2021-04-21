	<div class="row">	
		<div class="col-sm-8 col-sm-offset-2">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'">';
				?>
				<div class="form-group">
					<label for="city" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('city'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<?php 	$cities = getAllDataFromTable('id,title','cities','order by title ASC','');	?>
						<select name="cityid" id="cityid" table="shows" field="cityid" class="form-control">
							<option value=""><?php language('select'); ?></option>
							<?php for($i=0;$i<count($cities);$i++) { ?><option value="<?php echo $cities[$i]['id']; ?>" <?php if(isset($_GET['id']) && $row['cityid'] == $cities[$i]['id']) echo 'selected'; ?>><?php echo $cities[$i]['title']; ?></option><?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="show" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('show'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<select name="showid" id="showid" table="departments" field="showid" class="form-control">
							<option value=""><?php language('select'); ?></option>
							<?php
							if(isset($_GET['id']) && $_GET['id'] != '')
							{
								$shows = getAllDataFromTable('id,title','shows','where cityid = '.$row['cityid'].' order by title ASC','');
								for($i=0;$i<count($shows);$i++) { ?><option value="<?php echo $shows[$i]['id']; ?>" <?php if(isset($_GET['id']) && $row['showid'] == $shows[$i]['id']) echo 'selected'; ?>><?php echo $shows[$i]['title']; ?></option><?php }
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="department" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('department'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<select name="departmentid" id="departmentid" class="form-control">
							<option value=""><?php language('select'); ?></option>
							<?php
							if(isset($_GET['id']) && $_GET['id'] != '')
							{
								$departments = getAllDataFromTable('id,title','departments','where showid = '.$row['showid'].' order by title ASC','');
								for($i=0;$i<count($departments);$i++) { ?><option value="<?php echo $departments[$i]['id']; ?>" <?php if(isset($_GET['id']) && $row['departmentid'] == $departments[$i]['id']) echo 'selected'; ?>><?php echo $departments[$i]['title']; ?></option><?php }
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('title'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($row['title'])) echo $row['title']; ?>" maxlength="20" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('description'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<textarea class="form-control" name="description" rows="5"><?php if(isset($row['description'])) echo $row['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="price" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('price'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="price" value="<?php if(isset($row['price'])) echo $row['price']; ?>" pattern="[-+]?([0-9]*\.[0-9]+|[0-9]+)" maxlength="20" placeholder="<?php language("price"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="discount" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('discount'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="discount" value="<?php if(isset($row['discount'])) echo $row['discount']; ?>" pattern="[-+]?([0-9]*\.[0-9]+|[0-9]+)" maxlength="20" placeholder="<?php language("discount"); ?>" autocomplete="off"/>
					</div>
				</div>
				<div class="form-group">
					<label for="images" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<?php 
						if(isset($_GET['id']) && is_dir('uploads/products/'.$_GET['id'])) {
							$productpics = array_diff(scandir('uploads/products/'.$_GET['id']), array('.','..'));
							for($k=2;$k<(count($productpics)+2);$k++)
							{
						?>
							<div id="productimgdel-<?php echo $k; ?>" class="col-sm-3">
								<a class="" href="#" data-toggle="modal" data-target="#productimg-<?php echo $k; ?>">
									<img class="img-responsive" src="uploads/products/<?php echo $_GET['id']; ?>/<?php echo $productpics[$k]; ?>" style="width:75px;">								
								</a>
								<i id="<?php echo $k;?>" path="../uploads/products/<?php echo $_GET['id']; ?>/<?php echo $productpics[$k]; ?>" style="color:red;" class="productimgdel glyphicon glyphicon-remove-circle"></i>
							</div>
							<div id="productimg-<?php echo $k; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<br>
        								</div>
										<div class="modal-body">
											<img src="uploads/products/<?php echo $_GET['id']; ?>/<?php echo $productpics[$k]; ?>" class="img-responsive">
										</div>
									</div>
								</div>
							</div>
						<?php } } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="images" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('images'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" name="file[]" class="form-control" <?php if(!isset($_GET['id']) || $_GET['id'] == '') { echo 'required'; } ?> multiple />
					</div>
				</div>
				<div class="form-group">
					<label for="active" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('active'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="checkbox" name="active" <?php if(isset($row['active']) && $row['active'] == '1') { echo 'checked'; } ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="submit" class="btn btn-info" name="submit" id="submit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
$data = getAllDataFromTable($select,'products',$where,$limit);
if(!empty($data))
{
?>
	<div class="row" style="margin-top: 50px;">
		<div class="col-sm-12 table-responsive">
			<table class="table table-bordered table-striped" style="text-align: center;">
				<tr class="info">
					<th><?php language('city'); ?></th>
					<th><?php language('show'); ?></th>
					<th><?php language('department'); ?></th>
					<th><?php language('title'); ?></th>
					<th><?php language('description'); ?></th>
					<th><?php language('price'); ?></th>
					<th><?php language('discount'); ?></th>
					<th></th>
					<th><?php language('active'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['citytitle']; ?></td>
						<td><?php echo $data[$i]['showtitle']; ?></td>
						<td><?php echo $data[$i]['departmenttitle']; ?></td>
						<td><?php echo $data[$i]['title']; ?></td>
						<td><?php echo $data[$i]['description']; ?></td>
						<td><?php echo $data[$i]['price']; ?></td>
						<td><?php echo $data[$i]['discount']; ?></td>
						<td width="40%">
						<?php 
							if(is_dir('uploads/products/'.$data[$i]['id'])) {
								$pics[$i] = array_diff(scandir('uploads/products/'.$data[$i]['id']), array('.','..'));
								for($j=2;$j<(count($pics[$i])+2);$j++)
								{
						?>
							<a class="col-md-3" style="margin-bottom: 10px;" href="#" data-toggle="modal" data-target="#productimage-<?php echo $i.$j; ?>">
								<img class="img-responsive" src="uploads/products/<?php echo $data[$i]['id']; ?>/<?php echo $pics[$i][$j]; ?>" style="width:100px;">
							</a>
							<div id="productimage-<?php echo $i.$j; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<br>
        								</div>
										<div class="modal-body">
											<img src="uploads/products/<?php echo $data[$i]['id']; ?>/<?php echo $pics[$i][$j]; ?>" class="img-responsive">
										</div>
									</div>
								</div>
							</div>
							<?php } } ?>
						</td>
						<td><input type="checkbox" <?php if($data[$i]['active'] == 1) echo 'checked'; ?> disabled></td>
						<td><a href="admin.php?c=<?php echo $_GET['c']; ?>&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i id="<?php echo $data[$i]['id'];?>" style="color:red;" class="del glyphicon glyphicon-remove-circle"></i>
							<div id="del-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php language('deletemodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" onclick="mydelete('<?php echo $data[$i]['id'];?>','productid','products','orders')" data-dismiss="modal"><?php language('agree'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
					
				<?php	} ?>
			</table>
		</div>
	</div>
						
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
				</ul>
			</nav>
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



<!-----------Start Some Models---------------->
<div id="success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: green;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('success'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="cantdelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('cantdelete'); language('orders'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="somthingwrong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m2'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="inputnotcorrect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m3'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="invalidinput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m4'); ?>
				</center>
			</div>
		</div>
	</div>
</div>
<!-----------End Some Models---------------->