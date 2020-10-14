<?=$layouts['header']?>
<section class="section-content py-5">
   <div class="row">
      <div class="col-lg-12 jumbotron">
         <h1 align="center">My Account </h1>
      </div>
   </div>
   <div class="container yes">
      <div class="row">
         <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('Myaccount')?>">Dashboard</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('OrderHistory')?>">Orders</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('cart')?>">Cart</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('WishList')?>">Wishlist</a></li>
                  <!-- <li class="list-group-item"><a style="color:black;" href="#">Address</a></li> -->
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('AccountDetail')?>">Account details</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('logout')?>">Logout</a></li>
               </ul>
            </div>
         </div>
         <div class="col-lg-8">
         	<?php if(!empty($this->session->flashdata('message'))){ ?>
                  <div class="alert alert-success alert-dismissible">
                     <a href="<?=base_url('AccountDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <?php echo $this->session->flashdata('message');?>
                  </div>
            <?php } ?>
        <?php if(!empty($this->session->flashdata('error'))){ ?>
                  <div class="alert alert-danger alert-dismissible">
                     <a href="<?=base_url('AccountDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <?php echo $this->session->flashdata('error');?>
                  </div>
            <?php } ?>
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <form class="woocommerce-EditAccountForm edit-account" action="<?=base_url('SaveDetails')?>" method="post"  >

	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="account_first_name">Full name&nbsp;<span style="color:red;">*</span></label>
	        </div>
	        <div class="col-md-7 pull-left">
	        	<input type="text" class="form-control input-lg" name="first_name" id="account_first_name" autocomplete="given-name" value="<?php if(!empty($customer)){ $name = explode(" ",$customer[0]['full_name']); echo $name[0]; } ?>" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>

	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="account_email">Email address&nbsp;<span style="color:red;">*</span></label>
	        </div>
	        <div class="col-md-7 pull-left" >
	        	<input type="email" class="form-control input-lg" name="email" id="account_email" autocomplete="email" value="<?php if(!empty($customer)){ echo $customer[0]['email']; } ?>" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>

	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="account_email">Mobile No&nbsp;<span style="color:red;">*</span></label>
	        </div>
	        <div class="col-md-7 pull-left" >
	        	<input type="number" class="form-control input-lg" name="mobile_no" id="account_email" autocomplete="mobile_no" value="<?php if(!empty($customer)){ echo $customer[0]['mobile_no']; } ?>" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>
<fieldset>
	<legend>Password change</legend>
	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="password_current">Current password</label>
	        </div>
	        <div class="col-md-7 pull-left" >
	        	<input type="password" class="form-control input-lg" name="oldpassword" id="password_current" autocomplete="off" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>

	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="password_1">New password</label>
	        </div>
	        <div class="col-md-7 pull-left" >
	        	<input type="password" class="form-control input-lg" name="newpassword" id="password_1" autocomplete="off" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>

	<div class="form-group">
	   <div class="row">
	        <div class="col-md-3">
	        	<label for="password_2">Confirm new password</label>
	        </div>
	        <div class="col-md-7 pull-left" >
	        	<input type="password" class="form-control input-lg" name="newconfirm" id="password_2" autocomplete="off" style="padding: 1.375rem; font-size:13px;"/>
	        </div>
	   </div>
	</div>
	</fieldset>
	<div class="clear"></div>

	
	<p>
		<button type="submit" class="pull-right btn btn-primary" name="save_account_details" value="Save changes">Save changes</button>
	</p>

	</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?=$layouts['footer']?>