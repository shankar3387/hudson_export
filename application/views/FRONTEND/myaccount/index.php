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
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <?php  $cusId = base64_decode($this->session->userdata('customerId'));
                           $customer = getanydata('tbl_customer','id',$cusId); ?>
                        <p class="card-text">Hello <strong><?=getanyname('tbl_customer','full_name',base64_decode($this->session->userdata('customerId')))?></strong></p>
                        <p>
                           From your account dashboard you can view your <a style="color:black;" href="<?=base_url('OrderHistory')?>">recent orders</a>, manage your <a style="color:black;" href="#">shipping and billing addresses</a>, and <a style="color:black;" href="<?=base_url('AccountDetail')?>">edit your password and account details</a>.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?=$layouts['footer']?>