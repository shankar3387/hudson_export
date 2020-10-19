<?php echo $layouts["header"]; ?>
<style>
.checked {
  color: orange;
}
</style>
<main>
        <!-- breadcrumb Start-->
        <div class="page-notification" ;>
            <div class="container">
                <div class="row" style="background:#EFF5F8;">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="#"><?=ucwords(getanyname('tbl_product','product_name',$proId))?></a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 ">
                    <img class='embed-responsive embed-responsive-4by3' height='400px' src="<?=base_url().$Product[0]['product_pic']?>" alt="">
                </div>
                <div class="col-6">
                    <b><?=ucwords(getanyname('tbl_product','product_name',$proId))?></b>
                    <p class="box"><?php echo ucwords($Product[0]['short_description']); ?></p>
                    <input type = "hidden" id = "pricevalue<?php echo $Product[0]['id']; ?>" value= "<?php echo $Product[0]['product_price']; ?>" />
                   <div class='form-inline form-group-lg'>
                   <b>$<?php echo $Product[0]['product_price']; ?></b>
                    <span> <input style='font-size:2rem' class='form-control-lg ml-2 form-group-lg' type="number" value="1" id="quantity<?php echo $Product[0]['id']; ?>" onkeyup="checkqtystockip(this.value,<?=$Product[0]['id']?>)" min="1" max="25"></span>
                   </div>
                      <ul class='form-group form-row col-md-6'>
                          <div class="col-md-4 form-group">
                              <?php foreach ($productmanagement as $key) { ?>
                              <select class='' name="" id="">
                                <?php foreach (explode(' ',$key['size']) as $key1) { ?>
                                  <option value=""><?= $key1 ?></option>
                              <?php } ?>
                              </select>
                          </div>
                         <div class="col-md-4 form-group">
                              <select class='' name="" id="">
                                  <?php foreach (explode(' ',$key['color_name']) as $key1) { ?>
                                    <option value=""><?= $key1 ?></option>
                                <?php } ?>
                                </select>
                                
                         </div>
                        <?php  } ?>
                      </ul>
                      <span id="qtymess" style="color:red;"></span>
                        <li id="showavail" style="display:none;"><b>Availability:</b> 
                        <span class="instock" style="display:none;color:green;">In Stock</span> 
                        <span class="outstock" style="display:none;color:red;">Out Of Stock</span>
                        </li>
                    
                      
                    <div class="submit-info">
                        <button class="submit-btn2" onclick="addtocart(<?=$Product[0]['id']?>);" type="submit" style="width:30%;height:40px;border-radius:14px;">Add To Cart</button>
                    </div><br>
                    <div class="submit-info">
                        <button class="submit-btn2" onclick="wishlist(<?=$Product[0]['id']?>)" type="submit" style="width: 30%;height: 40px;border-radius: 14px;"><a href="signIn.html">Add to wishlist</a></button>
                    </div>

                    <?php if(!empty($this->session->flashdata('enquiryerror'))){ ?>
                      <div class="alert alert-danger alert-dismissible">
                         <a href="<?=base_url('Product/').$proId?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <?php echo $this->session->flashdata('enquiryerror');?>
                      </div>
                <?php } ?>
                <?php if(!empty($this->session->flashdata('reviewerror'))){ ?>
                      <div class="alert alert-danger alert-dismissible">
                         <a href="<?=base_url('Product/').$proId?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <?php echo $this->session->flashdata('reviewerror');?>
                      </div>
                <?php } ?>
                <?php if(!empty($this->session->flashdata('message'))){ ?>
                      <div class="alert alert-success alert-dismissible">
                         <a href="<?=base_url('Product/').$proId?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <?php echo $this->session->flashdata('message');?>
                      </div>
                <?php } ?>
                </div>
            </div>
            
        </div>

 


  <ul class="nav nav-tabs" role="tablist" style="padding: 60px;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" style="color:black;">Description</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" style="color:black;">Reviwes (<?=count($review)?>)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab-contact" style="color:black;">Contact Supplier</a>
    </li>
   
  </ul>




        



  <div class="tab-content" style="padding:50px">
    <div id="home" class="container tab-pane active"><br>
      <h3 align="center">Description</h3>
      <p></p><p><?=ucwords($Product[0]['product_full_description'])?></p>
    </div>

    <div id="tab-contact" class="container tab-pane fade"><br>
      <h3 align="center">Contact Supplier</h3>
      <form action="<?=base_url('submitContact')?>" method="post" id="commentform" class="comment-form" validate="">
            <p class="comment-notes"> Required fields are marked <span class="required" style="color:red;">*</span></p>
      
            <input class="form-control input-lg" id="pro_name" name="pro_name" type="text" value="<?=ucfirst(getanyname('tbl_product','product_name',$proId))?>" readonly="" size="30" required="" placeholder="Product Name"><br>

            <input class="form-control input-lg" id="seller_name" placeholder="Supplier Name" name="seller_name" type="text" value="<?=ucfirst(getanyname('tbl_admin_login','name',$Product[0]['seller_id']))?>" readonly="" size="30" required=""><br>

            <input class="form-control input-lg" id="author" name="author" type="text" value="<?=ucwords($this->session->userdata('customername'))?>" size="30" required="" placeholder="Name *"><br>
            
            <input class="form-control input-lg" id="mobile" placeholder="Mobile No *" name="mobile" type="number" pattern="[0-9]{10}" title="Mobile number should be integer and 10 digit" value="" size="30" required=""><br>
            
            <input class="form-control input-lg" id="email" name="email" placeholder="Email *" type="email" value="" size="30" required=""><br>

         <input class="form-control input-lg" id="required_quantity" name="required_quantity" placeholder="Required Quantity *" type="number" value="1" size="30" required=""><br>

           <textarea class="form-control input-lg" id="message" name="message" cols="30" placeholder="Your Message *" required=""></textarea>
            <input type="hidden" name="product_id" class="reviews" value="<?=$proId?>" />
            <input type="hidden" name="seller_id" value="<?=$Product[0]['seller_id']?>" /><p></p>

            <input name="submit" type="submit" id="submit" class="btn btn-sm btn-primary" value="Submit">
        
         </form>
    </div>

    
    <div id="menu1" class="container tab-pane fade"><br>
      <h3 align="center">Reviwes</h3>
                  <div>
             <table class="table table-striped table-bordered">
               <tbody>
                <?php if(!empty($review)){ 
                  foreach($review as $row){ ?>
                 <tr>
                   <td style="width: 50%;"><strong><span><?=$row['tbl_product_review_name']?></span></strong></td>
                   <td class="text-right"><span><?=date('d/m/Y',strtotime($row['created_at']))?></span></td>
                 </tr>
                 <tr>
                   <td colspan="2"><p><?=$row['tbl_product_review_description']?></p>
                     <div class="rating">
                      <?php if(!empty($row['tbl_product_review_rating'])){
                                   $cnt = $row['tbl_product_review_rating'];
                                   for($i = 0; $i<$cnt; $i++){ ?>     
                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
                   <?php }} ?>
                      </div>
                     </td>
                 </tr>
               <?php }} ?>
               </tbody>
             </table>
             </div>
                  <?php if(!empty($review)){ ?>
      <p align="center"> Give your precious Review “<?=ucfirst(getanyname('tbl_product','product_name',$proId))?>”</p>
            <?php }else{ ?>
      <p align="center"> Be the first to review “<?=ucfirst(getanyname('tbl_product','product_name',$proId))?>”</p>
            <?php } ?>

<div class="cont">
<div class="stars">
<form action="<?=base_url('submitReview')?>" method="post">
  <input class="fa fa-star" id="star-5-2" type="radio" value="1" name="rating">

  <input class="fa fa-star" id="star-4-2" type="radio" value="2" name="rating">

  <input class="fa fa-star" id="star-3-2" type="radio" value="3" name="rating">

  <input class="fa fa-star" id="star-2-2" type="radio" value="4" name="rating">

  <input class="fa fa-star" id="star-1-2" type="radio" value="5" name="rating">

  <div class="rev-box">
   <textarea class="reviews" required="" col="10" name="author"  style="padding: 3px; width: 216px; text-align: inherit" placeholder="Name"><?=ucwords($this->session->userdata('customername'))?></textarea>
   <textarea class="reviews" required="" col="10" name="email" style="padding: 3px; width: 216px; text-align: inherit" placeholder="Email"></textarea>
    <textarea class="review" required="" col="30" name="comment" style="padding: 3px; width: 216px; text-align: inherit" placeholder="comment"></textarea>
    <input type="hidden" name="product_id" value="<?=$proId?>" />
    <input type="hidden" name="seller_id" value="<?=$Product[0]['seller_id']?>" /></p>
    <p></p>
    <label class="review" for="review" type="submit"></label>
       <button class="submit" type="submit" style="width :170px;height: 50px;border-radius:5px;background-color:rgb(110, 91, 158);margin-left: 230px;">submit</button>
     </div>
</form>
</div>
</div>


    </div>
   
  </div>
</div>
</div>
<?php echo $layouts["footer"]; ?>