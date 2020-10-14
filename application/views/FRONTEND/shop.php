<?=$layouts['header']?>
<main>
        <!-- breadcrumb Start-->
        <div class="page-notification" style="padding-bottom: 31px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('Shop')?>">Shop</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- listing Area Start -->
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-50">
                            <h2>Shop with us</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4 ">
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- Select City items start -->
                                <div class="select-job-items2">
                                    <select name="select2" onchange="location=this.value;">
                                        <option value="">CATEGORIES</option>
                                        <?php if(!empty($category)){
                							foreach($category as $row){  ?>
										<option value="<?=base_url('ProductList/').$row['id']?>"><?=ucfirst($row['category_name'])?></option>
										<?php }} ?>
                                    </select>
                                    <select name="select2" onchange="location=this.value;">
                                        <option value="">Type</option>
                                        <?php if(!empty($category)){
                							foreach($category as $row){  ?>
										<option value="<?=base_url('ProductList/').$row['id']?>"><?=ucfirst($row['category_name'])?></option>
										<?php }} ?>
                                    </select>
                                    <select name="select2" onchange="location=this.value;">
                                        <option value="">Size</option>
                                        <?php if(!empty($category)){
                							foreach($category as $row){  ?>
										<option value="<?=base_url('ProductList/').$row['id']?>"><?=ucfirst($row['category_name'])?></option>
										<?php }} ?>
                                    </select>
                                    <select name="select2" onchange="location=this.value;">
                                        <option value="">Color</option>
                                        <?php if(!empty($category)){
                							foreach($category as $row){  ?>
										<option value="<?=base_url('ProductList/').$row['id']?>"><?=ucfirst($row['category_name'])?></option>
										<?php }} ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!--?  Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8 ">
                        <!--? New Arrival Start -->
                        <div class="new-arrival new-arrival2">
                            <div class="row">
                            	<?php if(!empty($Product)){
                            	foreach($Product as $row){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="<?=base_url().$row['product_pic']?>" alt="" style="height:335px">
                                            <div class="favorit-items">
                                                <!-- <span class="flaticon-heart"></span> -->
                                                <img src="<?=base_url('theme/front-end/')?>assets/img/gallery/favorit-card.png" alt="">
                                            </div>
                                        </div>
                                        <!-- <?= var_dump($row) ?> -->
                                        <div class="popular-caption">
                                         <h3><a href="<?= "product_details/".$row['cat_id']?>"><?=ucfirst($row['product_name'])?></a></h3>
                                         <div class="rating mb-10">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>$<?=$row['product_price']?></span>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
</div>
<!-- Button -->

</div>
<!--? New Arrival End -->
</div>
</div>
</div>
</div>
<!-- listing-area Area End -->
<!--? Popular Items Start -->
<!--? Popular Items Start -->
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br> </br>
<?=$layouts['footer']?>