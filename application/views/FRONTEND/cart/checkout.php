<?=$layouts['header']?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="row">
   <div class="col-lg-12 jumbotron" style="margin:2rem ">
      <h3 align="center">Checkout</h3>
   </div>
</div>
<div class="container">
   <?php if(!empty($this->session->flashdata('errors'))){ ?>
         <div class="alert alert-danger alert-dismissible">
            <a href="<?=base_url('Checkout')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('errors');?>
         </div>
   <?php } ?>
   <form method="post"  action="<?=base_url('PlaceOrder')?>" enctype="multipart/form-data">
   <div class="row">
      <div class="col-lg-6">
         <div class="card card-body">
            <h3 class="text-center mb-4">Billing details</h3>

            <fieldset>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="First Name" name="billing_first_name" type="text" required>
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Last Name" name="billing_last_name" type="text" required>
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="company name (optional)" name="billing_company" type="text">
               </div>
               <div class="form-group has-error">
                  <select class="form-control es-select-products" name="billing_country" placeholder="select a country/region.." style="width: 497px;" required>
                     <option value="">select a country/region..</option>
                     <?php if(!empty($country)){
                        foreach($country as $row){ ?>
                     <option value="<?=$row['id']?>"><?=ucfirst($row['name'])?></option>
                     <?php }} ?>
                  </select>
               </div><br/><br/><br/>
               <div class="form-group has-error">
                  <select class="form-control es-select-products" name="billing_state" placeholder="select a state.." style="width: 497px;" required>
                     <option value="">select a state..</option>
                     <?php if(!empty($state)){
                        foreach($state as $row){ ?>
                     <option value="<?=$row['id']?>"><?=ucfirst($row['name'])?></option>
                     <?php }} ?>
                  </select>
               </div><br/><br/>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="City" name="billing_city" type="text" required>
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Street address *" name="billing_address_1" type="text" required>
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Apartment, suite, unit, etc. (optional) " name="billing_address_2" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Postcode *" name="billing_postcode" type="text" required>
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="E-mail Address" name="billing_email" value="<?= $mailid ?>" type="text" readonly required>
               </div>
               <div class="form-group has-success">
                  <input class="form-control input-lg" placeholder="Phone Number" name="billing_phone"  type="text" value="<?=$phoneno?>"  readonly required>
               </div>
               <!--input class="btn btn-lg btn-primary btn-block" value="Submit" type="submit"-->
            </fieldset>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card card-body">
            <h3 class="text-center mb-4"><input id="ship-to-different-address-checkbox" type="checkbox" name="ship_to_different_address" value="1" /> <span>Ship to a different address?</span></h3>
            <div class="shipping_address" style="display:none;">
            <fieldset>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="First Name" name="shipping_first_name" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Last Name" name="shipping_last_name" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Company name (optional)" name="shipping_company" type="text">
               </div>
               <div class="form-group has-error">
                  <select class="form-control es-select-products" name="shipping_country" placeholder="select a country/region.." style="width: 497px;" >
                     <option value="">select a country/region..</option>
                     <?php if(!empty($country)){
                     foreach($country as $row){ ?>
                     <option value="<?=$row['id']?>"><?=ucfirst($row['name'])?></option>
                  <?php }} ?>
                  </select>
               </div><br/><br/><br/>
               <div class="form-group has-error">
                  <select class="form-control es-select-products" name="shipping_state" placeholder="select a state.." style="width: 497px;" >
                     <?php if(!empty($state)){
                        foreach($state as $row){ ?>
                        <option value="<?=$row['id']?>"><?=ucfirst($row['name'])?></option>
                     <?php }} ?>
                  </select>
               </div><br/><br/>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="City" name="shipping_city" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Street address" name="shipping_address_1" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Apartment, suite, unit, etc. (optional)" name="shipping_address_2" type="text" >
               </div>
               <div class="form-group has-error">
                  <input class="form-control input-lg" placeholder="Postcode" name="shipping_postcode" type="text" >
               </div>
            </fieldset>
         </div>
         <textarea class="form-control input-lg" placeholder="Notes about your order, e.g. special notes for delivery." name="order_comments"></textarea>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <table class="table table-bordered">
      <h4>Your order</h4>
      <thead>
         <tr>
            <th scope="col">Product</th>
            <th scope="col">Subtotal</th>
         </tr>
      </thead>
      <tbody>
         <?php if(!empty($detail)){
            $totalPrice = 0;
            $delivery = 0;
            foreach($detail as $row){
            $pro_id = $row['tbl_product_id'];
           $res = getanydata('tbl_product','id',$pro_id,'Active','status');
           //print_r($res);
           $img = $res[0]['product_pic'];
           $pro_name = $res[0]['product_name'];
           $brand_id = $res[0]['brand_id'];
           $res1 = getanydata('tbl_product_price','tbl_product_id',$pro_id);
           $user_id = base64_decode($this->session->userdata('customerId'));
           if(!empty($res1[0]['tbl_product_delivery_charges'])) {
               $delivery += $res1[0]['tbl_product_delivery_charges']; 
           } ?>
         <tr>
            <td>
                <input name="amount" id="amount" value="<?= $amount ?>"  type="hidden" />
                <input name="firstname" id="firstname" value="<?= $name ?>" type="hidden" />
                <input name="productinfo" value="<?= $productinfo ?>" type="hidden" />
                <input name="address1" value="<?= $address ?>" type="hidden"/>     
                <input name="surl" value="<?= $sucess ?>" size="64" type="hidden" />
                <input name="furl" value="<?= $failure ?>" size="64" type="hidden" />
                <input name="curl" value="<?= $cancel ?> " type="hidden" />
                <input type="hidden" name="key" value="<?= $mkey ?>" />
                <input type="hidden" name="hash" value="<?= $hash ?>"/>
                <input type="hidden" name="txnid" value="<?= $tid ?>" />
               <?=$pro_name?> * <strong><?php if(!empty($row['tbl_quantity'])) { echo $row['tbl_quantity'];  }else{ echo 1; } ?></strong></td>
            <td>$<?=$row['tbl_product_price'] * $row['tbl_quantity'] ?></td>
         </tr>
         <?php 
         $totalPrice += $row['tbl_product_price'] * $row['tbl_quantity']; 
         }} ?>
         
         <tr>
            <td>Subtotal</td>
            <td>$<?=$totalPrice?></td>
         </tr>
         <tr>
            <td>shipping</td>
            <td><?php if(!empty($delivery)){ echo '$'.$delivery; }else{ ?>Free shipping <?php } ?></td>
         </tr>
         <tr>
            <td>Total</td>
            <td>$<?=$totalPrice+$delivery?></td>
         </tr>
      </tbody>
   </table>
</div>
</br>
<div class="container">
   <div class="form-check">
      <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="Direct Bank Transfer" />
      <label class="form-check-label" for="exampleRadios1">
      Direct bank transfer
      </label>
   </div>
   <div class="form-check">
      <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios2" value="Check payments" />
      <label class="form-check-label" for="exampleRadios2">
      check payments
      </label>
   </div>
   <div class="form-check">
      <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios3" value="Cash on delivery" checked />
      <label class="form-check-label" for="exampleRadios3">
      cash on delivery
      </label>
   </div>
   </br>
   <input class="btn btn-lg btn-primary btn-block pull-right" value="Place order" type="submit" style="width:200px"></br></br></br>
</div>
</form>
<script src="<?=base_url()?>theme/backend/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript"> 
   $(document).ready(function() { 
       $('input[type="checkbox"]').click(function() { 
           var inputValue = $(this).attr("value"); 
           $(".shipping_address").toggle(); 
       }); 
   }); 
</script>
<?=$layouts['footer']?>