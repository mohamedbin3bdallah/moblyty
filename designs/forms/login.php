<div class="col-md-6 col-md-offset-3">
<div class="index-label"><?php language('currentuser'); ?></div>
<div style="padding-top:75px;">
<form action="" method="POST">
	<table class="table" align="center">
		<tr><td id="noborder"><input type="text" class="form-control" name="myusername" id="myusername" placeholder="<?php language("username"); ?>" autocomplete="off" required/><input type="hidden" name="myusername-hidden" id="myusername-hidden" value="0" /><div id="myusername-validation"></div></td></tr>
		<tr><td id="noborder"><input type="password" class="form-control" name="passw0rd" id="passw0rd" placeholder="<?php language("password"); ?>" autocomplete="off" required/><input type="hidden" name="passw0rd-hidden" id="passw0rd-hidden" value="0" /><div id="passw0rd-validation"></div></td></tr>
		<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
		<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
		<tr><td id="noborder"><input type="submit" class="btn btn-info" name="loginsubmit" id="loginsubmit" class="greenButton" value="<?php language("login"); ?>" disabled/></td></tr>
	</table>
</form>
</div>
</div>