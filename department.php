<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$_GET['id'] = abs((int)($_GET['id']));
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/department.php');
?>
<!DOCTYPE html>
<html dir="rtl">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $department['title']; ?>">
	<meta name="keywords" content="<?php echo $department['title']; ?>">
    <meta name="author" content="webthemez">
    <title><?php echo $department['title']; ?></title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
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
                <h2 class="section-title wow fadeInDown"><?php echo $department['title']; ?></h2>
            </div>

            <?php
			if(!empty($products))
			{
				for($pr=0;$pr<count($products);$pr++)
				{
				?>
					<div class="col-sm-3 <?php if(($pr%4) == 0) echo 'col-sm-push-9'; elseif(($pr%4) == 1) echo 'col-sm-push-3'; elseif(($pr%4) == 2) echo 'col-sm-pull-3'; else echo 'col-sm-pull-9'; ?>">
					<?php 	
					if(is_dir('uploads/products/'.$products[$pr]['id']))
					{
						$pics[$pr] = array_diff(scandir('uploads/products/'.$products[$pr]['id']), array('.','..'));
					?>
						<div class="thumbnail">
							<img class="img-responsive" src="uploads/products/<?php echo $products[$pr]['id']; ?>/<?php echo $pics[$pr][2]; ?>" alt="<?php echo $products[$pr]['producttitle']; ?>">
							<div class="caption">
								<center>
								<h3><?php echo $products[$pr]['producttitle']; ?></h3>
								<p>السعر: <?php echo $products[$pr]['price']; if($products[$pr]['discount'] != '') { ?> - الخصم: <?php echo $products[$pr]['discount']; } ?></p>
								<p>
								<?php if(isset($_SESSION['userid']) && $_SESSION['dealer'] == 0) { ?>
									<a href="product.php?id=<?php echo $products[$pr]['id']; ?>" class="form-control" style="background-color: #ff9a23; color: #fff;" role="button">طلب</a>
								<?php } else { ?>
									<a href="login.php" class="form-control" style="background-color: #ff9a23; color: #fff;" role="button">طلب</a>
								<?php } ?>
								</p>
								</center>
							</div>
						</div>
					<?php } ?>
					</div>
				<?php	}	?>
				
	<div class="row">
		<div class="col-sm-4 col-sm-push-8">
		</div>
		<div class="col-sm-8 col-sm-pull-4">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $totalPages; ?>">الاخير</a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page > 1) { ?><li><a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a style="color: #ff9a23;" href="department.php?id=<?php echo $_GET['id']; ?>&page=1">الاول</a></li><?php } ?>
				</ul>
			</nav>
		</div>
	</div>
	
			<?php	} else echo '<div class="wow fadeInRight animated">لا توجد بيانات</div>';	?>

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