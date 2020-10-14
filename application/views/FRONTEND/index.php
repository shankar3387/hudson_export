<?=$layouts['header']?>
    <main>
        <!--? Hero Area Start-->
        <div class="container-fluid">
            <div class="slider-area">
                <!-- Mobile Device Show Menu-->
                <div class="header-right2 d-flex align-items-center">
                    <!-- Social -->
                    <div class="header-social  d-block d-md-none">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                    <!-- Search Box -->
                    <div class="search d-block d-md-none" >
                        <ul class="d-flex align-items-center">
                            <li class="mr-15">
                                <div class="nav-search search-switch">
                                    <i class="ti-search"></i>
                                </div>
                            </li>
                            <li>
                                <div class="card-stor">
                                    <img src="<?=base_url('theme/front-end/')?>assets/img/gallery/card.svg" alt="">
                                    <span>0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /End mobile  Menu-->

                <div class="slider-active dot-style">
                    <!-- Single -->
                    <?php if(!empty($slider)){ $i = 0;
                  foreach($slider as $row){ $i++; ?>
                    <div class= "<?php if($i == 1){ echo 'hero-overly'; }else{echo 'single-slider'; } ?> slider-height d-flex align-items-center"  style="background-image:url('<?=base_url('/').$row['tbl_slider_link']?>')">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>Bridging to<br>Your<br>Needs</h1>
                                        <a href="<?=base_url('Shop')?>" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                   <?php }} ?>
                </div>
            </div>
        </div>
        <!-- End Hero -->
        <!--? Popular Items Start -->
        <div class="popular-items pt-50">
            <div class="container">
                <div class="row">
                  <?php if(!empty($category)){
                foreach($category as $row){  ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img  class="zoom" src="<?=base_url('').$row['img']?>" style="height:360px" alt="">
                                <div class="img-cap">
                                    <span><?=ucfirst($row['category_name'])?></span>
                                </div>
                                <div class="favorit-items">
                                    <a href="<?=base_url('ProductList/'.$row['id'])?>" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                </div>
            </div>
        </div>
<!-- Popular Items End -->
<!--? New Arrival Start -->
<div class="new-arrival">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2>new<br>arrival</h2>
                </div>
            </div>
        </div>
       <div class="row">
       <?php foreach ($newArrival as $key) { ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
                        <img src="<?=base_url('theme/front-end/assets/img/gallery/').$key['product_image']?>" alt="">
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                            <img src="<?=base_url('theme/front-end/')?>assets/img/gallery/favorit-card.png" alt="">
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="<?=base_url('ProductList/'.$key['id'])?>"><?php echo $key['product_name']; ?></a></h3>
                        <div class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>$ 30.00</span>
                    </div>
                </div>
        </div>
        <?php  } ?>
     </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
          <video controls  style="height:400px; width:200px">
             <source src="<?=base_url('theme/front-end/')?>assets/images/sareepictures/video1.mp4"   type="video/mp4">
        </video>
                                
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                           
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="<?=base_url('Shop')?>">kanchi Sarees</a></h3>
                        <div class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>$ 300.00</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
          <video controls  style="height:400px; width:200px">
             <source src="<?=base_url('theme/front-end/')?>assets/images/sareepictures/video2.mp4"   type="video/mp4">
        </video>
                                
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                           
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="product_details.html">kanchi Sarees</a></h3>
                        <div class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>$ 300.00</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
          <video controls  style="height:400px; width:200px">
             <source src="<?=base_url('theme/front-end/')?>assets/images/sareepictures/video3.mp4"   type="video/mp4">
        </video>
                                
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                           
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="product_details.html">kanchi Sarees</a></h3>
                        <div class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>$ 300.00</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
          <video controls  style="height:400px; width:200px">
             <source src="<?=base_url('theme/front-end/')?>assets/images/sareepictures/video4.mp4"   type="video/mp4">
        </video>
                                
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                           
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="product_details.html">kanchi Sarees</a></h3>
                        <div class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>$ 300.00</span>
                    </div>
                </div>
            </div> 
        </div>
            
          </div>
         
         
        
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    
                </div>
            </div>
        </div>
</div>

</div>
</div>
<!-- Button -->

</div>
</div>
<!--? New Arrival End -->
<!--? collection -->
<section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?=base_url('theme/front-end/')?>assets/img/gallery/section_bg01.png">
    <div class="container-fluid"></div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="single-question text-center">
                <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever</h2>
                <a href="about.html" class="btn wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
            </div>
        </div>
    </div>
</div>
</section>
<!-- End collection -->
<!--? Popular Locations Start 01-->
<!-- Popular Locations End -->

<?=$layouts['footer']?>
