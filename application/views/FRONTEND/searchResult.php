<?php echo $layouts["header"]; ?>
<section class="section-content py-5">    
<div class="row">
  <div class="col-lg-12 jumbotron">
      <h1 align="center">SEARCH RESULTS: “<?=$searchfor?>” </h1>      
    </div></div>
  <div class="row">
  <div class="col-lg-9">
 <div class="container">
  Showing all <?=$count?> result(s)
  <div class="row">
    <?php if(!empty($product)){
    foreach($product as $row){ ?>
      <input type="hidden" id="quantity<?=$row['id']?>" value="1" />
      <input type="hidden" id="pricevalue<?=$row['id']?>" value="<?=$row['product_price']?>" />
    <div class="col-sm-4">
      <div class="card" style="width:300px">
    <img class="img1" src="<?=base_url($row['product_pic'])?>" alt="roadster" width="300" height="300">
    <div class="card-body">
      <h4 class="card-title"><?=ucfirst($row['product_name'])?></h4>
      <p class="card-text"> $ <?=$row['product_price']?></p>
      <span class="row justify-center" id="icons">
      <a href="#" onclick="addtocart(<?=$row['id']?>)"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" onclick="wishlist(<?=$row['id']?>)"><i class="fa fa-heart" aria-hidden="true"></i></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#"><i class="fa fa-search-plus" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="<?=base_url('Product/').$row['id']?>"><i class="fa fa-link" aria-hidden="true"></i></a>
      </span>
    </div>
  </div>
    </div>
  <?php }} ?>
  </div>
  <br>
 </div></div>
    

  <div class="col-lg-3">
<div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                <ul class="list-group category_block">
                    <?php if(!empty($categories)){
                        foreach($categories as $row){ ?>
                  <li class="list-group-item"><a style="color:black" href="<?=base_url('ProductList/'.$row['id'])?>"><?=ucfirst($row['category_name'])?></a></li>
               <?php }} ?>                    
                </ul>
            </div>
      </div></div>
      </div>
<?php echo $layouts["footer"]; ?>