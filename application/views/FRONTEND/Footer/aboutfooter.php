<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hudson Technologies</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    
</head>
<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <p>Hudson</p>
					</div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start-->
    <?=$layouts['header']?>

    <!-- header end -->
	
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">about</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End-->
        <!-- About Area Start -->
        <div class="about-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-tittle mb-60 text-center pt-10">
                            <h2>About us</h2>
                            <p class="pera">Hudson Development was founded in July 1999 with the aspiration of creating corporate websites and web systems. We are de-segregating the technology with strategic consulting, using the Internet as a source to enterprise development.
We are a multinational company that offers specialized services in consulting, analysis, design, planning, development and support of web applications like intranets, extranets, online shops and websites today.
Our purpose is to help our customers solve their most complex business issues with a vision that is 100% based on IT, covering web, mobile and tablet platforms, with the best quality and an appropriate cost-benefit balance. Our technology implementation projects are accompanied by justifications for cost reduction, sales increase and excellence in exchange of business information.
Our business vision created a solid identity that attracted customers from businesses like Bradesco, Vivo, Sadia, Pirelli, Toyota, among dozens of companies seeking to develop strength and reliability for their Web projects.
HAT Development seeks constant improvement. Therefore, we incorporate strategic business consulting to our services, analyzing problems and defining, through studies and benchmark, the best digital solutions.
</p>
                        </div>
                    </div>
                    
        <!-- About Area End -->
        <!--? Popular Items Start -->
		  <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?= base_url()?>assets/img/gallery/section_bg01.png">
    <div class="container-fluid"></div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="single-question text-center">
                <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever</h2>
               
            </div>
        </div>
    </div>
</div>
</section> 
        <!--? Services Area End -->
    </main>

    <?=$layouts['footer']?>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url()?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url()?>assets/js/popper.min.js"></script>
<script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="<?= base_url()?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url()?>assets/js/slick.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.slicknav.min.js"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="<?= base_url()?>assets/js/wow.min.js"></script>
<script src="<?= base_url()?>assets/js/animated.headline.js"></script>
<script src="<?= base_url()?>assets/js/jquery.magnific-popup.js"></script>
<script src="<?= base_url()?>assets/js/gijgo.min.js"></script>

<!-- Nice-select, sticky,Progress -->
<script src="<?= base_url()?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.sticky.js"></script>
<script src="<?= base_url()?>assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="<?= base_url()?>assets/js/jquery.counterup.min.js"></script>
<script src="<?= base_url()?>assets/js/waypoints.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.countdown.min.js"></script>
<script src="<?= base_url()?>assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="<?= base_url()?>assets/js/contact.js"></script>
<script src="<?= base_url()?>assets/js/jquery.form.js"></script>
<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url()?>assets/js/mail-script.js"></script>
<script src="<?= base_url()?>assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="<?= base_url()?>assets/js/plugins.js"></script>
<script src="<?= base_url()?>assets/js/main.js"></script>

</body>
</html>