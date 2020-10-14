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
                  <li class="list-group-item"><a style="color:black;" href="#">Address</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('AccountDetail')?>">Account details</a></li>
                  <li class="list-group-item"><a style="color:black;" href="<?=base_url('logout')?>">Logout</a></li>
               </ul>
            </div>
         </div>
         <div class="col-lg-8">
            <table class="table table-bordered">
               <h6>Order #<mark class="order-number"><?=$order[0]['tbl_display_order_id']?></mark> was placed on <mark class="order-date"><?=date('M d, Y',strtotime($order[0]['tbl_date_order']))?></mark> and is currently <mark class="order-status"><?=$order[0]['tbl_order_status']?></mark>.</h6>
               <h4>Order details</h4>
               <thead>
                  <tr>
                     <th scope="col">Product</th>
                     <th scope="col">Subtotal</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><a style="color:blue;" href="<?=base_url('Product/').$order[0]['tbl_product_id']?>"><?=getanyname('tbl_product','product_name',$order[0]['tbl_product_id'])?></a> <strong class="product-quantity">&times;&nbsp;<?=$order[0]['tbl_order_quantity']?></strong></td>
                     <td>$<?=$order[0]['tbl_product_base_price']*$order[0]['tbl_order_quantity']?></td>
                  </tr>
               </tbody>
               <tfoot>
                  <tr>
                     <th scope="row">Subtotal:</th>
                     <td>$<?=$order[0]['tbl_product_base_price']*$order[0]['tbl_order_quantity']?></td>
                  </tr>
                  <tr>
                     <th scope="row">shipping:</th>
                     <td><?php if($order[0]['tbl_product_delivery_charges'] != '0'){ echo '$'.$order[0]['tbl_product_delivery_charges']; }else{ ?>Free shipping <?php } ?></td>
                  </tr>
                  <tr>
                     <th scope="row">Payment method:</th>
                     <td><?=$order[0]['tbl_order_payment_mode']?></td>
                  </tr>
                  <tr>
                     <th scope="row">Total</th>
                     <td>$<?=$order[0]['tbl_total_amount']?></td>
                  </tr>
               </tfoot>
            </table>
            <div class="row">
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title" >Billing address</h5>
                        <?php  $cusId = base64_decode($this->session->userdata('customerId'));
                           $customer = getanydata('tbl_customer','id',$cusId); ?>
                        <p class="card-text">
                           <i class="fa fa-user"> <?=$customer[0]['full_name']?></i>
                           <i class="fa fa-map-marker"> <?=$customer[0]['address_1']?><?=$customer[0]['address_2']?> , <?=$customer[0]['city']?> , <?=getanyname('state','name',$customer[0]['state'])?>, <?=$customer[0]['pincode']?> , <?=getanyname('tbl_country','name',$customer[0]['country'])?></br>
                           516136
                           </i>
                           </br>
                           <i class="fa fa-phone">&nbsp;&nbsp;<?=$customer[0]['mobile_no']?></i></br>
                           <i class="fa fa-envelope">&nbsp;&nbsp;<?=$customer[0]['email']?></i></br></br>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Shipping address</h5>
                        <p class="card-text"> 
                           <i class="fa fa-user"> <?=$order[0]['delivery_full_name']?></i><br>
                           <i class="fa fa-map-marker"> <?=ucwords($order[0]['tbl_delivery_address'])?></i>
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