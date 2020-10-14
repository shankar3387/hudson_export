<?=$layouts['header']?>
<!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
<link rel="stylesheet" href="<?=base_url('theme/front-end/')?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="container" style="font-size: 12px;">
  <div class="row">
    <div class="col-lg-12 jumbotron">
        <h3 align="center">Cart</h3>
    </div>
   </div>
</div>
<div class="container" style="font-size: 16px;">
   <div class="row">
   <?php if(!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-danger alert-dismissible">
        <a href="<?=base_url('cart')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('message');?>
    </div>
    <?php } ?>

    <div style="display:none;" class="alert alert-success alert-dismissible" id="success-alert">
        <a href="<?=base_url('cart')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Your Cart Updated successfully!!!.
    </div>
    <?php if(!empty($cart)){ ?>
    <table class="table table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($cart)){
            $totalPrice = 0;
            $delivery = 0;
            $price= 0;
            foreach($cart as $row){ 
               $pro_id = $row['tbl_product_id'];
            $res = getanydata('tbl_product','id',$pro_id,'Active','status');
            $img = $res[0]['product_pic'];
            $pro_name = $res[0]['product_name'];
            $price = $res[0]['product_price'];
            $brand_id = $res[0]['brand_id'];
            $res1 = getanydata('tbl_product_price','tbl_product_id',$pro_id);
            if(!empty($res1[0]['tbl_product_delivery_charges'])) {
               $delivery += $res1[0]['tbl_product_delivery_charges']; 
               
            }
            $res2 = getanydata('tbl_product_price','tbl_product_id',$pro_id,'1','tbl_product_is_discountable');
            if(!empty($res2)){
            $paymentDate = date('Y-m-d');
            $paymentDate=date('Y-m-d', strtotime($paymentDate));
            $startdate = $res2[0]['tbl_product_discount_start_date'];
            $enddate = $res2[0]['tbl_product_discount_end_date'];
            //echo $startdate."==".$enddate."==".$paymentDate; exit;
            $contractDateBegin = date('Y-m-d', strtotime($startdate));
            $contractDateEnd = date('Y-m-d', strtotime($enddate));
            $price = $res2[0]['tbl_product_base_price'];
            if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
               $percent = $res2[0]['tbl_product_discount_percentage'];
               $price = $res2[0]['tbl_product_price_after_discount'];
            }
            }
            ?>
            <tr id="cartview<?=$row['id']?>">
                <th scope="row"><a style="color:red;" href="<?=base_url('Removecart/').$row['id'];?>"
                        onclick="return confirm('Are You Sure Want To Remove?');"><i class="fa fa-remove"></i></a></th>
                <td><a href="<?=base_url('Product/').$pro_id?>"><img class="img1" src="<?=base_url().$img?>"
                            alt="roadster" width="50" height="50"></a></td>
                <td><a href="<?=base_url('Product/').$pro_id?>"><?=$pro_name?><a></td>
                <td>
                    <input type="hidden" value="<?=$price?>" id="pricevalue<?=$pro_id?>" />
                    $<?=$price?>
                </td>
                <td class="text-left">
                    <div class="input-group btn-block quantity">
                        <?php if(!empty($row['tbl_quantity'])) {
                        $qty = $row['tbl_quantity'];
                        $color_id = $row['color_id'];
                        echo "<input type='hidden' id='color_id' value='$color_id'>";
                        $size = $row['size'];
                        echo "<input type='hidden' id='size' value='$size'>";
                        if(!empty($color_id) && !empty($size)){
                            $stock = getanydata('tbl_stock_management','size',$size,$pro_id,'product_id','color_id',$color_id);
                        }
                        elseif(!empty($color_id)){
                            $stock = getanydata('tbl_stock_management','product_id',$pro_id,$color_id,'color_id');
                        }
                        elseif(!empty($size)){
                            $stock = getanydata('tbl_stock_management','size',$size,$pro_id,'product_id');
                        }else{
                            $stock = getanydata('tbl_stock_management','product_id',$pro_id);
                        }
                        if(!empty($stock)){
                            $stock1 = $stock[0]['stock'];
                            if($stock1 == $qty || $stock1 > $qty){?>
                        <?php  if(!empty($row['tbl_quantity'])) { ?>
                        <input type="text" name="quantity" id="quantity<?=$row['id']?>"
                            onkeyup="checkqtystockip(this.value,<?=$pro_id?>)"
                            value="<?php if(!empty($row['tbl_quantity'])) {echo $row['tbl_quantity']; }else{echo '1'; } ?>"
                            size="1" class="form-control" />
                        <span id="qtymess" style="color:red;"></span>

                        <?php }else{ ?>
                        <input type="text" name="quantity" id="quantity<?=$row['id']?>"
                            onkeyup="checkqtystockip(this.value,<?=$pro_id?>)"
                            value="<?php if(!empty($row['tbl_quantity'])) {echo $row['tbl_quantity']; }else{echo '1'; } ?>"
                            readonly size="1" class="form-control" />
                        <span id="qtymess" style="color:red;"></span>

                        <?php } ?>
                        <span class="input-group-btn">
                            <button type="submit" data-toggle="tooltip" title="Update"
                                onclick="updatecart('<?=$row['id']?>')" class="btn btn-primary update"><i
                                    class="fa fa-refresh"></i></button>
                            <a href="<?=base_url('Removecart/').$row['id'];?>"
                                onclick="return confirm('Are You Sure Want To Remove?');"><button type="button"
                                    data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i
                                        class="fa fa-times-circle"></i></button></a>
                        </span></div>
                    <?php }else{ ?>
                    <span class="outstock"
                        style="background: #d60c0c;color: #fff;padding: 2px 8px;border-radius: 2px;font-weight: bold;">Out
                        Of Stock</span>
                    <?php }}} ?>
                </td>

                <td>$<?=(int)$row['tbl_product_price'] * (int)$row['tbl_quantity'] ?></td>
            </tr>


            <!--tr>
            <th scope="row"></th>
            <td colspan="4">
               <form class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                     <label for="inputPassword2" class="sr-only">coupon code</label>
                     <input type="password" class="form-control" id="inputPassword2" placeholder="coupon code">
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Apply coupon</button>
               </form>
            </td>
            <td><button class="submit pull-right" type="submit" style="width :170px;height: 50px;border-radius:5px">Update cart</button></td>
         </tr-->
        </tbody>
        <?php $totalPrice += $row['total_price'];  } } ?>
    </table>
    <br>
    <center>
        <h2>Cart totals</h2>
    </center>
    <table class="table table-bordered">
        <tbody>
            <tr class="cart-subtotal" width="">
                <th class="text-right"><strong>Subtotal</strong></th>
                <td class="text-right" data-title="Subtotal" id="priing">$<?=$totalPrice?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Delivery Chrges</strong></td>
                <td class="text-right">
                    <?php if($delivery != 0) {echo "<i class='fa fa-usd'></i>".$delivery;  }else{ echo "Free"; } ?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Total</strong></td>
                <td class="text-right" id="total_price"><i class="fa fa-usd"></i> <?=$totalPrice + $delivery?>
                    <input type="hidden" class="totalamnt" name="totalamnt" id="totalamnt"
                        value="<?=$totalPrice + $delivery?>" />
                    <input type="hidden" name="newdeductamiunt" id="newdeductamiunt"
                        value="<?=$totalPrice + $delivery?>" />
                </td>
            </tr>
        </tbody>
    </table>
    <a href="<?=base_url('Checkout')?>"><button class="submit pull-right" type="submit"
            style="border-radius:5px;color: #060606;">Proceed to checkout</button></a>
    <?php }else{ ?>
    <div class="alert alert-danger alert-dismissible" id="success-alert">
        <strong><i class="fa fa-shopping-cart"></i></strong> Your cart is currently empty.!!!
    </div>
    <a href="<?=base_url('')?>"><button class="submit pull-left" type="submit"
            style="border-radius:5px;color: #060606;">Return To shop</button></a>
    <?php } ?>
   </div>
</div>

<?=$layouts['footer']?>

<script type='text/javascript'>
function updatecart(cartid) {
    var prdqty = $('#quantity' + cartid).val();
    var page = "cart";
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Updatecart"); ?>',
        data: {
            cartid: cartid,
            page: page,
            prdqty: prdqty
        },
        processdata: false,
        cache: false,
        async: true,
        success: function(tempdata) {
            if (tempdata.trim() != "") {
                var values = JSON.parse(tempdata);
                if (values.success == "1") {

                    $("#cartview" + cartid).html(values.data);
                    $("#priing").html(values.showtotal);
                    $("#total_price").html(values.total);
                    $("#totalamnt").val(values.total1);
                    $("#success-alert").show();
                    $("#success-alert").fadeTo(2000, 500).slideUp(1000, function() {
                        $("#success-alert").slideUp(11100);
                        window.location.href = window.location.href;
                    });
                } else {
                    window.location.href = "<?php echo base_url("
                    Login "); ?>";
                }
            } else {
                $(".addtocartres" + prdid).html("Something went wrong, Please try again later.");
            }
        }
    });
}
</script>