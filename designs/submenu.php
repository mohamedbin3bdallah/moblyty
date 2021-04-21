				<?php if(!empty($menu)) { ?>
					<?php	foreach($menu['cities'] as $cityid => $cities) { ?>
						 <li class = "dropdown">
							<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
								معارض <?php echo $cities['title']; ?> 
								<b class = "caret"></b>
							</a>            
							<ul class = "dropdown-menu" style="border-radius:25px; min-width:555px;">
								<center>
								<?php	foreach($cities['shows'] as $showid => $shows) { ?>
								<div class="/*col-sm-4*/">
									<br>
									<li><a style="color:#fff;" href = "show.php?id=<?php echo $shows['id']; ?>"><?php echo $shows['title']; ?></a>
										<center><ul style="text-align:center;">
											<?php	foreach($shows['departments'] as $departmentid => $departments) { ?>
												<li style="list-style-type:none; float:right; margin-left:45px;"><a style="color:yellow;" href = "department.php?id=<?php echo $departments['id']; ?>"><?php echo $departments['title']; ?></a></li>
											<?php } ?>
										</ul></center>
									</li>
									<br><br>
								</div>
								<?php } ?>
								</center>
							</ul>
						</li>
					<?php } ?>
				<?php } ?>