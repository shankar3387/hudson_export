<?=$layouts['header']?>

<section class="section-content py-5">
   <div class="row">
      <div class="col-lg-12 jumbotron">
         <h1 align="center">My Account </h1>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-2">
            <div class="card">
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
            <?php if(!empty($this->session->flashdata('message'))){ ?>
            <div class="alert alert-success alert-dismissible">
               <a href="<?=base_url('OrderHistory')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <?php echo $this->session->flashdata('message');?>
            </div>
            <?php } ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col">Order</th>
                     <th scope="col">Date</th>
                     <th scope="col">Status</th>
                     <th scope="col">Total</th>
                     <th scope="col">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(!empty($order)){
                     foreach($order as $row){ ?>
                  <tr>
                     <td><a style="color:black;" href="<?=base_url('ViewOrder/').$row['id']?>">#<?=$row['tbl_display_order_id']?></a></td>
                     <td><time datetime="2020-08-01T07:51:17+00:00"><?php echo date('M d, Y',strtotime($row['tbl_date_order'])) ?></time></td>
                     <td><?=$row['tbl_order_status']?></td>
                     <td>$<?=$row['tbl_total_amount']?> for <?=$row['tbl_order_quantity']?> item</td>
                     <td><a href="<?=base_url('ViewOrder/').$row['id']?>" class="btn btn-primary"><i class="fa fa-eye"></i> View</a></td>
                  </tr>
                  <?php }} ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<div></div>
</section>
<?= $layouts['footer']?>