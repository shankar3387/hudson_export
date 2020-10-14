<?=$layouts['header']?>
<div class="custom-header no-bg-img" >
	            <div class="mt-container">
	    			<h1 class="entry-title">My account</h1>	    				            </div><!-- .mt-container -->
			</div><!-- .custom-header -->
	
	<div id="content" class="site-content">
		<div class="mt-container">
			

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			
<article id="post-8" class="post-8 page type-page status-publish hentry">

	
	<div class="entry-content">
		<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
<form method="post" action="<?=base_url('Forgotpasswords')?>" class="woocommerce-ResetPassword lost_reset_password">

	<p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="frg_email">Eemail</label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="email" name="frg_email" id="frg_email" autocomplete="username" />
	</p>
	<div class="clear"></div>
	<?php if(!empty($this->session->flashdata('success'))){ ?>
		<div class="alert alert-success alert-dismissible">
			<a href="<?=base_url('LostPassword')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $this->session->flashdata('success');?>
		</div>
   <?php } ?>
   <?php if(!empty($this->session->flashdata('message'))){ ?>
		<div class="alert alert-danger alert-dismissible">
			<a href="<?=base_url('LostPassword')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $this->session->flashdata('message');?>
		</div>
   <?php } ?>
	<p class="woocommerce-form-row form-row">
		<button type="submit" class="woocommerce-Button button" value="Reset password">Reset password</button>
	</p>
</form>
</div>
	</div><!-- .entry-content -->

	</article><!-- #post-8 -->

		</main><!-- #main -->
	</div><!-- #primary -->

	
<div id="secondary" class="widget-area sidebar" role="complementary">
			<section id="search-2" class="widget widget_search">	<form method="get" class ="search-form" id="searchform" action="https://demo.mysterythemes.com/easy-store-pro/">
		<input type="text" class="field" name="s" id="s" placeholder="Search" />
		<button type="submit" class="submit fa fa-search" name="submit" id="searchsubmit" value="Search" />
</form></section>		<section id="recent-posts-2" class="widget widget_recent_entries">		<h4 class="widget-title">Recent Posts</h4>		<ul>
											<li>
					<a href="../../wedding-dress-for-girls-available-in-store/index.html">Wedding Dress for girls available in store</a>
									</li>
											<li>
					<a href="../../girls-cool-makeup-kit-now-available/index.html">Girls Cool Makeup Kit Now Available</a>
									</li>
											<li>
					<a href="../../cool-modern-bags-for-girls-now-in-store/index.html">Cool Modern Bags For Girls Now In Store</a>
									</li>
											<li>
					<a href="../../featured-camera/index.html">Featured Camera</a>
									</li>
											<li>
					<a href="../../featured-watch/index.html">Featured Watch</a>
									</li>
					</ul>
		</section><section id="archives-2" class="widget widget_archive"><h4 class="widget-title">Archives</h4>		<ul>
				<!--li><a href='../../2018/05/index.html'>May 2018</a></li-->
		</ul>
			</section>	</div><!-- #secondary -->


		</div><!-- .mt-container tt -->
	</div><!-- #content -->
<?=$layouts['footer']?>