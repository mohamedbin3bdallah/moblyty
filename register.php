<?php
session_start();
if(!isset($_SESSION['userid']))
{
include('libs/database.php');
include('libs/menu.php');
$menu = menu();
$googlead = getRowFromTable('code','ads','where id = 1','');
$page = getRowFromTable('*','pages','where page like "register.php"','');

$lang = 'ar';
include('languages/'.$lang.'.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['password'] != '')
	{
		if(exist('users','where username like "'.$_POST['username'].'"')) header('Location: register.php?message=m9');
		if(exist('users','where email like "'.$_POST['email'].'"')) header('Location: register.php?message=m13');
		
		$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
		$_POST['code'] = uniqid(mt_rand(111111111,999999999));
		$_POST['time'] = time();
		if(insertRow('users',$_POST))
		{
			sendemail($_POST);
			header('Location: register.php?message=m18');
		}
		else header('Location: register.php?message=m2');
	}
	else header('Location: register.php?message=m5');
}
?>
?>
<!DOCTYPE html>
<html dir="rtl">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php if(isset($page['description'])) echo $page['description']; ?>">
	<meta name="keywords" content="<?php if(isset($page['keywords'])) echo $page['keywords']; ?>" />
    <meta name="author" content="webthemez">
    <title><?php if(isset($page['title'])) echo $page['title']; ?></title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
	
        <link rel="stylesheet" type="text/css" href="css/slider-style.css" />
        <link rel="stylesheet" type="text/css" href="css/slider-custom.css" />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/logo.png">
</head> 

<body id="home">
    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
						<li class="scroll"><a href="index.php">اتصل بنا</a></li>
						<?php if(isset($_SESSION['userid']) && $_SESSION['dealer'] == 1) { ?>
							<li class="scroll"><a href="logout.php">الخروج</a></li>
							<li class="scroll"><a href="dealer.php?c=myproducts">المنتجات</a></li>
						<?php } elseif(isset($_SESSION['userid']) && $_SESSION['dealer'] == 0) { ?>
							<li class="scroll"><a href="logout.php">الخروج</a></li>
							<li class="scroll"><a href="myorders.php">الطلبات</a></li>
						<?php } else { ?>
							<li class="scroll"><a href="login.php">الدخول</a></li>
							<li class="scroll active"><a href="register.php">التسجيل</a></li>
						<?php } ?>
						
						<?php include('designs/submenu.php'); ?>

                        <li class="scroll"><a href="index.php">الرئيسية</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
	
	<div class="container" style="margin-top: 150px;><div class="row"><div class="col-md-12"><center><?php echo $googlead['code']; ?></center></div></div></div>
  
  <section id="contact-us">  
        <div class="container">
            <div class="container contact-info">
			<div class="row">
                    <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
						<?php if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h4 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h4>'; } ?>
					</div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                        <div class="contact-form">                       
                            <form id="main-contact-form" name="contact-form" method="post" action="register.php">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" maxlength="100" pattern="[a-zA-Z]{5,}" placeholder="<?php language('username'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="<?php language('email'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" maxlength="100" placeholder="<?php language('address'); ?>" required>
                                </div>
								<div class="form-group">
                                    <input type="text" name="phone" class="form-control" pattern="[0-9]{8,11}" placeholder="<?php language('phone'); ?>" required>
                                </div>
								<div class="form-group">
                                    <input type="password" name="password" class="form-control" pattern="{8,}" placeholder="<?php language('password'); ?>" required>
                                </div>
								<div class="form-group">
                                    <input type="checkbox" name="dealer" value="1"><?php language(' '); language('dealer'); ?>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary"><?php language('register'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
   </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 موبايليتى <a target="_blank" href="http://onetrusted.com" title="">تصميم وبرمجة وان تراستيد</a>
                </div>
                <div class="col-sm-6">
                    <?php include('socialnetworks.php'); ?>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="js/jquery.slitslider.js"></script>
	<script type="text/javascript" src="js/slitslider-custom.js"></script>
    <script src="js/custom-scripts.js"></script>
</body>
</html>
<?php
}
else header('Location: index.php');
?>