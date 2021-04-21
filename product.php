<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$_GET['id'] = abs((int)($_GET['id']));
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/product.php');
?>
<!DOCTYPE html>
<html dir="rtl">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $product['description']; ?>">
	<meta name="keywords" content="<?php echo $product['description']; ?>">
    <meta name="author" content="webthemez">
    <title><?php echo $product['title']; ?></title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
	
        <link rel="stylesheet" type="text/css" href="css/slider-style-product.css" />
        <link rel="stylesheet" type="text/css" href="css/slider-custom-product.css" />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/logo.png">
	<script type="text/javascript" src="js/product.js"></script>
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
							<li class="scroll"><a href="register.php">التسجيل</a></li>
						<?php } ?>
						
						<?php include('designs/submenu.php'); ?>

                        <li class="scroll"><a href="index.php">الرئيسية</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
	
	<div class="container" style="margin-top: 150px;"><div class="row"><div class="col-md-12"><center><?php echo $googlead['code']; ?></center></div></div></div>
   
	<section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown"><?php echo $product['title']; ?></h2>
            </div>

            <div class="col-md-4">
				<?php 	if(is_dir('uploads/products/'.$_GET['id'])) {	?>
				<div id="slider" class="sl-slider-wrapper">
					<div class="sl-slider">
					<?php
						$pics = array_diff(scandir('uploads/products/'.$_GET['id']), array('.','..'));
						for($j=2;$j<(count($pics)+2);$j++)
						{
					?>
							<div class="sl-slide">
								<div class="sl-slide-inner">
									<img class="img-responsive" src="uploads/products/<?php echo $_GET['id']; ?>/<?php echo $pics[$j]; ?>" alt="<?php echo $product['title']; ?>">
								</div>
							</div>
					<?php } ?>
						<nav id="nav-dots" class="nav-dots">
							<span class="nav-dot-current"></span>
							<span></span>
							<span></span> 
						</nav>
					</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="col-md-8 wow fadeInRight animated">
				<div class="row">
					<div class="col-md-6">
						<?php if($product['discount'] != '') { ?>
							<h4><p>الخصم:   <?php echo $product['discount']; ?>   جم</p></h4>
						<?php } ?>
					</div>

					<div class="col-md-6">
						<?php if($product['price'] != '') { ?>
							<h4><p>السعر:   <?php echo $product['price']; ?>   جم</p></h4>
						<?php } ?>
					</div>					
				</div>
				<div class="row" style="margin-top: 25px;">
					<h5><p><?php echo $product['description']; ?></p></h5>
				</div>
				<div class="row" style="margin-top: 150px;">
					<center>
					<?php
						if(isset($_GET['message']) && $_GET['message'] == 1) echo '<div style="color: green;">تمت العملية بنجاح</div>';
						elseif(isset($_GET['message']) && $_GET['message'] == 2) echo '<div style="color: red;">يوجد خطا ما</div>';
					?>
					</center>
				</div>
				<div class="row">
					<form action="product.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<div class="col-md-2 col-md-push-8" style="margin-top: 9px;">
							<h5><p>الكمية</p></h5>
						</div>
						<div class="col-md-3 col-md-push-4">
							<h5><p><input type="number" name="quantity" min="1" class="form-control" required></p></h5>
						</div>
						<div class="col-md-3 col-md-pull-2">
							<h5><p><input type="submit" name="submit" class="form-control" style="background-color: #ff9a23; color: #fff;" value="طلب"></p></h5>
						</div>
					</form>
				</div>
			</div>
			
        </div><!--/.container-->
    </section><!--/#portfolio-->
	
	<div class="container" style="margin-top: 50px; margin-bottom: 50px;"><div class="row"><div class="col-md-12"><center><?php echo $googlead['code']; ?></center></div></div></div>

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
<?php } else header('Location: index.php'); ?>