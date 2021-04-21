					<?php
						$contact = getRowFromTable('*','contact','where id = 1','');
					?>
					<ul class="social-icons">
                        <?php if($contact['facebook'] != '') { ?><li><a href="#"><i class="fa fa-facebook"></i></a></li><?php } ?>
                        <?php if($contact['twitter'] != '') { ?><li><a href="#"><i class="fa fa-twitter"></i></a></li><?php } ?>
                        <?php if($contact['googleplus'] != '') { ?><li><a href="#"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                        <?php if($contact['linkedin'] != '') { ?><li><a href="#"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                        <?php if($contact['youtube'] != '') { ?><li><a href="#"><i class="fa fa-youtube"></i></a></li><?php } ?>
                    </ul>