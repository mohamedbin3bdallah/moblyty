<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$_GET['id'] = abs((int)($_GET['id']));
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/show.php');
?>
<!DOCTYPE html>
<html dir="rtl">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description_title; ?>">
	<meta name="keywords" content="<?php echo $description_title; ?>" />
    <meta name="author" content="webthemez">
    <title><?php echo $show_title; ?></title>
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
  
 <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown"><?php echo $show_title; ?></h2>
            </div>

            <div class="row">
				<?php if(isset($description_title) && $description_title != '') { ?>
                <div class="col-sm-12 wow fadeInRight">
                    <h3 class="column-title">الوصف</h3>
                    <p><?php echo $description_title; ?></p>
                </div>
				<?php } ?>
				
				<?php if(isset($branches_title) && $branches_title != '') { ?>
				<div class="col-sm-12 wow fadeInRight">
                    <h3 class="column-title">الفروع</h3>
                    <p><?php echo $branches_title; ?></p>
                </div>
				<?php } ?>
            </div>
        </div>
    </section><!--/#about-->
   
  <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">الاقسام</h2>
            </div>

            <div class="text-center">
                <ul class="portfolio-filter">
					<li><a class="active" href="#" data-filter="*">الكل</a></li>
					<?php  for($d=0;$d<count($showdepartments);$d++) { ?>
						<li><a href="#" data-filter=".<?php echo $showdepartments[$d]['departmenttitle']; ?>"><?php echo $showdepartments[$d]['departmenttitle']; ?></a></li>
					<?php } ?>
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="portfolio-items">
			<?php  for($p=0;$p<count($products);$p++) {
					if(isset($_GET['id']) && is_dir('uploads/products/'.$products[$p]['id'])) {	$productpics = array_diff(scandir('uploads/products/'.$products[$p]['id']), array('.','..')); }
			?>
                <div class="portfolio-item <?php echo $products[$p]['departmenttitle']; ?>">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="uploads/products/<?php echo $products[$p]['id']; ?>/<?php echo $productpics[2]; ?>" alt="">
                        <div class="portfolio-info"> 
                            <h2><?php echo $products[$p]['title']; ?></h2>
							<?php if(isset($_SESSION['userid']) && $_SESSION['dealer'] == 0) { ?>
								<br><h3><a class="" href="product.php?id=<?php echo $products[$p]['id']; ?>" rel="<?php echo $products[$p]['title']; ?>">طلب</a></h3>
							<?php } else { ?>
								<br><h3><a class="" href="login.php" rel="<?php echo $products[$p]['title']; ?>">طلب</a></h3>
							<?php } ?>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
				<?php } ?>
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

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
    <script src="js/custom-scripts.js"></script>
</body>
</html>
<?php } else header('Location: index.php'); ?>