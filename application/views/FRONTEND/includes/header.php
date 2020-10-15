<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hudson Technologies</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('theme/front-end/')?>assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/slick.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/responsive.css">


</head>
<style>
.zoom {
    transition: transform .2s;
    /* Animation */
    width: 80%;
    height: 80%;
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.5);
    /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<script>
function hover(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/fwd/our story 2.jpg');
}

function unhover(element) {

    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/sareepictures/womens1.jpg');
}

function hover1(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/sportswearandjaketspictures/tshirt8.jpg');
}

function unhover1(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/formals1.jpg');
}

function hover2(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/fwd/kids trousers 1.jpg');
}

function unhover2(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/sareepictures/kids1.jpg');
}

function hover3(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/fwd/mask5.jpg');
}

function unhover3(element) {

    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/sareepictures/mask.jpg');
}

function hover4(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/acc2.jpg');
}

function unhover4(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/speaker.jpg');
}

function hover5(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/tools4.png');
}

function unhover5(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/tool.jpg');
}

function hover6(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/somemorepictures/decor2.jpg');
}

function unhover6(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/somemorepictures/decor9.jpeg');
}

function hover7(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/picturesforhudsonwebsite/carpet8.jpg');
}

function unhover7(element) {
    element.setAttribute('src', '<?=base_url('theme/front-end/')?>/assets/images/somemorepictures/other1.jpg');
}
</script>

<body class="full-wrapper"  >
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <p>Hudson</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->
    <header>
        <!-- Header Start -->
        <div class="header-area ">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?=base_url()?>"><img
                                        src="<?=base_url('theme/front-end/')?>assets/images/logo.JPG"
                                        style="width:150px;" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li><a href="<?=base_url('Myaccount')?>"><img src="https://ui-avatars.com/api/?length=1&name=Nischitha&rounded=true" style="width: 50px; margin-left: 8px;"></a></li>
                                        <li><a href="<?=base_url('Myaccount')?>">My Account</a></li>
                                        <li><a href="<?=base_url('')?>">Home</a></li>
                                        <li><a href="<?=base_url('Shop')?>">shop</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <!-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right1 d-flex align-items-center">
                            <!-- Social -->
                            <div class="header-social d-none d-md-block">
                                <a href="https://twitter.com/TechHudson" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/hudsonnjexpo/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/hudsontech_e/" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                            <!-- Search Box -->
                            <div class="search d-none d-md-block">
                                <ul class="d-flex align-items-center">
                                    <li class="mr-15">
                                        <div class="nav-search search-switch">
                                            <i class='ti-woocommerce-wishlist'></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-stor">
                                            <a class="link" href="<?=base_url('cart')?>" target="_blank"><img
                                                    src="<?=base_url('theme/front-end/')?>assets/img/gallery/card.svg"
                                                    alt=""></a>
                                            <span><?php 
               $user_id = base64_decode($this->session->userdata('customerId'));
               $res = getanydata('tbl_cart','tbl_user_id',$user_id); 
               if(!empty($res)){ 
               echo count($res); }else{ echo 0; } ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <!-- header end -->
    <div class="menu-wrapper d-flex align-items-center justify-content-between">
        <div class="formSearch ex">
            <form align="center" role="search" method="post" action="<?=base_url('mainSearch')?>" class="formSearch1">
                <select name="product_category" onchange="location=this.value;"
                    style="width:240px;height:50px;border-radius:5px;">
                    <option value="">All Categories</option>
                    <?php $cat =  getanydata('tbl_category','status','Active');
                if(!empty($cat)){
                 foreach($cat as $row){ ?>
                    <option value="<?=base_url('ProductList/').$row['id']?>"><?=ucfirst($row['category_name'])?>
                    </option>
                    <?php  } } ?>
                </select>

                <input type="search" placeholder="Search Product" value="" required="" name="searchtext"
                    style="width:137px;height:40px;border-radius:5px;float:left;border-width: 1px;margin-left: 10px;">
                <div class="search1">
                    <button class="fa fa-search searchsubmit" type="submit"
                        style="width :50px; background-color:#9F78FF;height: 40px;border-radius:5px;border-width:1px;margin-bottom:10px;"></button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="menu-wrapper d-flex align-items-center justify-content-between">
        <div class="formSearch">
            <form align="center" role="search" method="post" action="mainSearch.html" class="formSearch1">
               <select required="" name="product_category" style="width:240px;height:50px;border-radius:5px;" onchange="location=this.value;">
                  <option value="">All Categories</option>
                             <option value="shopmens.html">Men collection</option>
                            <option value="shopwomen.html">Women collection</option>
                            <option value="shopkids.html">Kids collection</option>
                            <option value="shopmasks.html">Mask</option>
                            <option value="shopaccs.html">Accessories</option>
                            <option value="shopdecor.html">Decor</option>
                            <option value="shoptools.html">Tools</option>
                      </select>
               <input type="search" class="search2" placeholder="Search Product" value="" required="" name="searchtext" style="width:136px;height:40px;border-radius:5px;float:left;border-width: 1px;margin-left: 10px;">
               <div class="search1">
               <button class="fa fa-search searchsubmit" type="submit" style="width :50px;height: 40px;border-radius:5px;border-width:1px;margin-bottom:10px;"></button>
           </div>    
           </form></div></div> -->