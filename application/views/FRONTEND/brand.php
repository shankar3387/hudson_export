<?php echo $layouts["header"]; ?>
<div class="custom-header no-bg-img" >
   <div class="mt-container">
      <h1 class="woocommerce-products-header__title page-title"><?=getanyname('tbl_brands','tbl_brand_name',$brandId)?></h1>
   </div>
   <!-- .mt-container -->
</div>
<!-- .custom-header -->
<div id="content" class="site-content">
   <div class="mt-container">
      <div id="primary" class="content-area">
         <main id="main" class="site-main" role="main">
            <header class="woocommerce-products-header">
            </header>
            <div class="woocommerce-notices-wrapper"></div>
            <p class="woocommerce-result-count">
               Showing all <?=$count?> result(s)
            </p>
            <!--form class="woocommerce-ordering" method="get">
               <select name="orderby" class="orderby" aria-label="Shop order">
                  <option value="menu_order"  selected='selected'>Default sorting</option>
                  <option value="popularity" >Sort by popularity</option>
                  <option value="rating" >Sort by average rating</option>
                  <option value="date" >Sort by latest</option>
                  <option value="price" >Sort by price: low to high</option>
                  <option value="price-desc" >Sort by price: high to low</option>
               </select>
               <input type="hidden" name="paged" value="1" />
            </form-->
            <div class="columns-3">
               <ul class="products columns-3">
                  <?php if(!empty($BrandProduct)){
                  foreach($BrandProduct as $row){ ?>
                  <li class="product type-product post-50 status-publish first instock product_cat-electronics-collection product_cat-gadgets-collection has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                     <div class="es-product-thumb-wrapper"><a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=base_url($row['product_pic'])?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?=base_url($row['product_pic'])?> 300w, <?=base_url($row['product_pic'])?>g 150w, <?=base_url($row['product_pic'])?> 768w, <?=base_url($row['product_pic'])?> 500w, <?=base_url($row['product_pic'])?> 600w, <?=base_url($row['product_pic'])?> 100w, <?=base_url($row['product_pic'])?> 800w" sizes="(max-width: 300px) 100vw, 300px" /></a></div>
                     <!-- .es-product-thumb-wrapper -->
                     <div class="es-product-title-wrap">
                        <a href="#">
                           <h2 class="woocommerce-loop-product__title"><?=$row['product_name']?></h2>
                        </a>
                        <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?=$row['product_price']?></span></span>
                     </div>
                     <!-- .es-product-title-wrap -->
                     <div class="es-product-buttons-wrap"><a href="#" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="50" data-product_sku="" aria-label="Add &ldquo;Classic Camera With Amazing Features&rdquo; to your cart" rel="nofollow"><span class="es-cart-btn">Add to cart</span></a>	<a href="#" rel="nofollow" data-product-id="50" data-product-type="simple" class="add_to_wishlist" >
                        <span class="es-wish-btn">Add to Wishlist</span>	</a>
                        <a href="#" class="button yith-wcqv-button" data-product_id="50">Quick View</a><a href="#" class="woocommerce-LoopProduct-link es-woo-product-link woocommerce-loop-product__link"><span class="es-product-link"><i class="fa fa-link"></i></span> Details</a>
                     </div>
                     <!-- .es-product-buttons-wrap -->
                  </li>
                 <?php }} ?>
               </ul>
            </div>
         </main>
         <!-- #main -->
      </div>
      <!-- #primary -->
      <div id="sidebar-shop" class="widget-area sidebar" role="complementary">
         <!--section id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
            <h4 class="widget-title">Cart</h4>
            <div class="widget_shopping_cart_content"></div>
         </section-->
         <!--section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
            <h4 class="widget-title">Filter by price</h4>
            <form method="get" action="https://demo.mysterythemes.com/easy-store-pro/product-category/electronics-collection/">
               <div class="price_slider_wrapper">
                  <div class="price_slider" style="display:none;"></div>
                  <div class="price_slider_amount" data-step="10">
                     <input type="text" id="min_price" name="min_price" value="1200" data-min="1200" placeholder="Min price" />
                     <input type="text" id="max_price" name="max_price" value="3000" data-max="3000" placeholder="Max price" />
                     <button type="submit" class="button">Filter</button>
                     <div class="price_label" style="display:none;">
                        Price: <span class="from"></span> &mdash; <span class="to"></span>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
            </form>
         </section-->
         <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
            <h4 class="widget-title">Product categories</h4>
            <ul class="product-categories">
               <?php if(!empty($categories)){
                        foreach($categories as $row){ ?>
                  <li class="cat-item cat-item-23"><a href="<?=base_url('ProductList/'.$row['id'])?>"><?=ucfirst($row['category_name'])?></a></li>
               <?php }} ?>
            </ul>
         </section>
      </div>
      <!-- #sidebar-shop -->
   </div>
   <!-- .mt-container tt -->
</div>
<!-- #content -->
<?php echo $layouts["footer"]; ?>