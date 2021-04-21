<?php
	session_start();
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/index.php');
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
						<li class="scroll"><a href="#main-contact-form">اتصل بنا</a></li>
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

                        <li class="scroll active"><a href="#home">الرئيسية</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    
	<?php if(!empty($lastproducts)) { ?>
	<section class="demo-2">
           <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
					<?php if(isset($lastproducts[0])) { ?>
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
							<div class="bg-img" style="background-image: url(<?php echo $lastimages[0]; ?>);"></div>
							 
						</div>
					</div>
					<?php } ?>
					<?php if(isset($lastproducts[1])) { ?>
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
						<div class="sl-slide-inner">
							<div class="bg-img" style="background-image: url(<?php echo $lastimages[1]; ?>);"></div>
							 
						</div>
					</div>
					<?php } ?>
					<?php if(isset($lastproducts[2])) { ?>
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="bg-img" style="background-image: url(<?php echo $lastimages[2]; ?>);"></div>
							 
						</div>
					</div>					
				</div><!-- /sl-slider -->
				<?php } ?>

				<nav id="nav-dots" class="nav-dots">
					<?php if(isset($lastproducts[0])) { ?><span class="nav-dot-current"></span><?php } ?>
					<?php if(isset($lastproducts[1])) { ?><span></span><?php } ?>
					<?php if(isset($lastproducts[2])) { ?><span></span><?php } ?>
				</nav>

			</div><!-- /slider-wrapper -->

    </section><!--/#main-slider-->
	<?php } ?>

 <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown">خدماتنا</h2>
                <p class="wow fadeInDown">خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته</h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-flag-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته</h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته </h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-crosshairs"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته</h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-university"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته</h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">موبايليتى ومميزاته</h4>
                                <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->

  
 <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown">عن الشركة</h2>
                <p class="wow fadeInDown">خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث <br> خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="images/about.jpg" alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">موبايليتى وماتقدمه لكم</h3>
                    <p> خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
 <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
 <p>خدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاثخدماتنا ومانقوم به لللافراد المقبلين على الزواج ومعارض الاثاث</p>
<ul class="listarrow">
<li><i class="fa fa-angle-double-right"></i>غرف النوم</li>
<li><i class="fa fa-angle-double-right"></i>غرف الأثاث</li>
<li><i class="fa fa-angle-double-right"></i>غرف السفر</li>
<li><i class="fa fa-angle-double-right"></i>غرف الصالون</li> 
<li><i class="fa fa-angle-double-right"></i>غرف الأطفال</li>
</ul> 

                </div>
            </div>
        </div>
    </section><!--/#about-->
<section id="hero-action-section" class="hero-action-section">
		<!-- .Container -->
		<div class="container ow-section">
			<h3 class="hero-action-subtitle">تطبيق موبايليتى للاثاث</h3>
			<h4 class="hero-action-title">شاهد جميع معارض الاثاث فى مصر مع تطبيق موبايليتى</h4>
			<p class="hero-action-description"> شاهد جميع معارض الاثاث فى مصر مع تطبيق موبايليتى شاهد جميع معارض الاثاث فى مصر مع تطبيق موبايليتى شاهد جميع معارض الاثاث فى مصر مع تطبيق موبايليتى
			</p>
			<p><a href="#" class="get-started">حمل التطبيق</a></p>
		</div><!-- /.Container -->
	</section>
   
	<?php if(!empty($lastproducts)) { ?>
	<section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">احدث الاثاث المضاف</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>

            <div class="text-center" style="display:none;">
                <ul class="portfolio-filter">
                    <li><a class="active" href="#" data-filter="*">All Works</a></li>
                    <li><a href="#" data-filter=".designing">Kitchen</a></li>
                    <li><a href="#" data-filter=".mobile">Master Bedrooms</a></li>
                    <li><a href="#" data-filter=".development">Living Room</a></li>
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="portfolio-items">
				<?php for($lm=0;$lm<count($lastimages);$lm++) { ?>
                <div class="portfolio-item designing">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="<?php echo $lastimages[$lm]; ?>" alt="منتج موبليتي الجديد">
                        <div class="portfolio-info"> 
                            <a class="preview" href="<?php echo $lastimages[$lm]; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
				<?php } ?>
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->
	<?php } ?>


  
  <section id="contact-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">اتصل بنا</h2>
                <p class="wow fadeInDown">تواصل معنا الأن تواصل معنا الأنتواصل معنا الأنتواصل معنا الأنتواصل معنا الأن<br> تواصل معنا الأنتواصل معنا الأنتواصل معنا الأن.</p>
            </div>
        </div>
  
        <div class="container">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-4 col-md-4">
				  <?php
						$contact = getRowFromTable('*','contact','where id = 1','');
					?>
                        <div class="contact-form">
                            <?php if($contact['address'] != '') { ?>
							<h3>عنوان التواصل</h3>
                            <address>
                              <strong><?php echo $contact['address']; ?></strong><br>
                            </address>
							<?php } ?>
							
							<?php if($contact['phone'] != '') { ?>
							<h3>الهاتف</h3>
                            <address>
                              <strong><?php echo $contact['phone']; ?></strong><br>
                            </address>
							<?php } ?>
							
							<?php if($contact['mobile'] != '') { ?>
							<h3>الموبايل</h3>
                            <address>
                              <strong><?php echo $contact['mobile']; ?></strong><br>
                            </address>
							<?php } ?>
							
					</div></div>
                    <div class="col-sm-8 col-md-8">
                        <div class="contact-form">
							<?php
								if(isset($_GET['message']) && $_GET['message'] == 'm1') echo '<div style="color:green; text-align:center;">تمت العملية بنجاح</div>';
								elseif(isset($_GET['message']) && $_GET['message'] == 'm5') echo '<div style="color:red; text-align:center;">كل الخانات مطلوبة</div>';
							?>
                            <form id="main-contact-form" name="contact-form" method="POST" action="contactform.php">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="البريد الألكترونى" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="العنوان" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="تفاصيل الرسالة" required></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">ارسل رسالة</button>
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