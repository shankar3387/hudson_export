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
               <ul class="list-group list-group-flush ">
                  <li class="list-group-item"><a href="<?=base_url('Myaccount')?>" style="color:#212529;">Dashboard</a></li>
                  <li class="list-group-item"><a href="<?=base_url('OrderHistory')?>" style="color:#212529;">Orders</a></li>
                  <li class="list-group-item"><a href="<?=base_url('cart')?>" style="color:#212529;">Cart</a></li>
                  <li class="list-group-item"><a href="<?=base_url('WishList')?>" style="color:#212529;">Wishlist</a></li>
                  <li class="list-group-item"><a href="#" style="color:#212529;">Address</a></li>
                  <li class="list-group-item"><a href="<?=base_url('AccountDetail')?>" style="color:#212529;">Account details</a></li>
                  <li class="list-group-item"><a href="<?=base_url('logout')?>" style="color:#212529;">Logout</a></li>
               </ul>
            </div>
         </div>
         <div class="col-lg-8">
            <?php if(!empty($this->session->flashdata('message'))){ ?>
            <div class="alert alert-success alert-dismissible">
               <a href="<?=base_url('Wishlist')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <?php echo $this->session->flashdata('message');?>
            </div>
            <?php } ?>
            <table class="table table-bordered text-center">
               <thead>
                  <tr>
                     <th scope="col">S.No</th>
                     <th scope="col">Image</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">Stock</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(!empty($wishlist)){
                     $sl_number=0;
                     foreach($wishlist as $row){
                     $product = getanydata('tbl_product','id',$row['tbl_product_id']);
					 if(!empty($product)){ ?>
                  <tr>
                     <th><a href="<?=base_url('RemoveWish/').$row['id'];?>" onclick="return confirm('Are You Sure Want To Remove?');"><i class="fa fa-remove"></i></a><?= ++$sl_number; ?></th>
                     
                     <td><a href="<?=base_url('Product/').$product[0]['id']?>"><img class="img1" src="<?=base_url('').$product[0]['product_pic']?>" alt="roadster" width="50" height="50"></a></td>
                     
                     <td><a href="<?=base_url('Product/').$row['tbl_product_id']?>" style="color:#212529;"><?=$product[0]['product_name']?></a></td>
                     
                     <td>$<?php $res = getanydata('tbl_product_price','tbl_product_id',$row['tbl_product_id'],'1','tbl_product_is_discountable');
                           //print_r($res); exit;
                                if(!empty($res)){
                                 
                                $paymentDate = date('Y-m-d');
                                $paymentDate=date('Y-m-d', strtotime($paymentDate));
                                $startdate = $res[0]['tbl_product_discount_start_date'];
                                $enddate = $res[0]['tbl_product_discount_end_date'];
                                //echo $startdate."==".$enddate."==".$paymentDate; exit;
                                $contractDateBegin = date('Y-m-d', strtotime($startdate));
                                $contractDateEnd = date('Y-m-d', strtotime($enddate));
                                $baseprice = $res[0]['tbl_product_base_price'];
                                $proid= $row['tbl_product_id'];
                                if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
                                    $percent = $res[0]['tbl_product_discount_percentage'];
                                    $priceaftrdisc = $res[0]['tbl_product_price_after_discount'];
                                    
                                    echo $priceaftrdisc;
                                    echo '<input type="hidden" id="pricevalue'.$proid.'" value="'.$priceaftrdisc.'" />';
                                }else{ 
                                    	echo $baseprice;
                                    	echo '<input type="hidden" id="pricevalue'.$proid.'" value="'.$baseprice.'" />'; 
                                    } }else{
                                     echo $product_price =  $product[0]['product_price'];  
                                     echo '<input type="hidden" id="pricevalue'.$product[0]['id'].'" value="'.$product_price.'" />';
                                 }
                        ?></td>
                     <td>
                     	<?php $pro_id= $row['tbl_product_id'];
                            $stock = getanydata('tbl_stock_management','product_id',$pro_id);
                        if(!empty($stock)){
                            $stock1 = $stock[0]['stock'];
                            if($stock1 == 1 || $stock1 > 1){ ?>
                        <span id="qtymess" style="color:green;">In Stock</span>
                        <?php }else{ ?>
                        <span id="qtymess" style="color:red;">Out Of Stock</span>
                        <?php }} ?>
                     </td>
                     
                     <td>
                     	<input type="hidden" id="quantity<?=$row['tbl_product_id']?>" value="1" />
                     	<a href="<?=base_url('cart')?>" style="padding: 12px 17px;" class="btn btn-primary" onclick="addtocart(<?=$row['tbl_product_id']?>);" title="Add “<?=$product[0]['product_name']?>” to your cart"><span class="es-cart-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                     </td>
                  </tr>
                  <?php }}}else{ ?>
                  	<tr>
						<td colspan="6" class="wishlist-empty">No products added to the wishlist</td>
					</tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>
<?=$layouts['footer']?>