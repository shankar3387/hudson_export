<?=$layout['header']?>
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Add Product</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item"><a href="<?=base_url('Product')?>">Products</a></li>
         <li class="breadcrumb-item active">Add Product</li>
      </ol>
   </div>
   <?php if(!empty($this->session->flashdata('errors'))){ ?>
	    <div class="alert alert-danger alert-dismissible">
	        <a href="<?=base_url('Product')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	        <?php echo $this->session->flashdata('errors');?>
	    </div>
    <?php } ?>
   <div class="card mb-4">
      <div class="card-body">
         <form method="post" enctype="multipart/form-data" action="<?=base_url('Backend/ProductController/addProducts')?>">
            <div class="form-group">
               <label class="form-label">Category Name123</label>
               <select class="select2-demo form-control" style="width: 100%" data-allow-clear="true" name="cat_id" onchange="getsubcate(this.value,'subcat_id')">
	                <option>Please select Category</option>
	                <?php  if(!empty($category)){
	                foreach($category as $row){ ?>
	                <option value="<?=$row['id']?>"><?=ucfirst($row['category_name'])?></option>
	                <?php }} ?>
                </select>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Subcategory Name</label>
               <select class="select2-demo form-control" style="width: 100%" data-allow-clear="true" name="subcat_id" id="subcat_id">
	                <option>Please select Sub category</option>
                </select>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Brand Name</label>
               <select class="select2-demo form-control" style="width: 100%" data-allow-clear="true" name="brand_id">
	                <option>Please select Brand</option>
	                <?php  if(!empty($brand)){
	                foreach($brand as $row){ ?>
	                <option value="<?=$row['id']?>"><?=ucfirst($row['tbl_brand_name'])?></option>
	                <?php }} ?>
                </select>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Name</label>
               <input name="product_name" type="text" class="form-control" placeholder="Product Name">
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Code</label>
               <input type="text" name="product_code" class="form-control" placeholder="Product Code">
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Base Price</label>
               <input name="base_price" onkeyup="calculateprice1(this.value)" type="number" class="form-control" id="base_price" placeholder="Please Enter Base Price"/>
               <span id="showmessage" style="color:red;"></span>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Offer Start Date</label>
               <input name="offer_startr_date" type="date" class="form-control" id="datepicker-base1" placeholder="Start Date" />
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Offer End Date</label>
               <input name="offer_end_date" type="date" class="form-control datepicker-base" id="datepicker-base" placeholder="Start Date" />
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Discount In Percent (%)</label>
               <input name="percent" onkeyup="calculateprice(this.value)" type="number" class="form-control" id="discount_percent" placeholder="Discount In Percennt"/>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Price After Discount</label>
               <input name="price_after_discount" type="text" class="form-control" id="after_discount" placeholder="Please Enter Base Price"/>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Delivery Charges <small>If Have</small></label>
               <input name="delivery_charges" type="text" class="form-control" id="discount_percent" placeholder="Please Enter Delivery Charges"/>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Short Description</label>
               <textarea name="short_description" class="demo1 form-control"  placeholder="Short Description" ></textarea>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Product Description</label>
               <textarea name="product_full_description" class="demo1 form-control htmleditor"  placeholder="Full Description" ></textarea>
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label">Search Keyword</label>
               <input type="text"  data-role="tagsinput" class="form-control" name="search_keywords" class="form-control"  />
               <div class="clearfix"></div>
            </div>
            <div class="form-group">
               <label class="form-label w-100">Product Image</label>
               <input type="file" name="product_pic[]" accept="Image/*">
                <span onclick="appendaddmoresub();" class="pull-right">
        			<i class="fa fa-plus" style="height: 20px; font-size: 14px; width: 20px; line-height: 20px; background: #de5947; border-radius: 50% !important; color: white; text-align: center; cursor: pointer;" ></i>
        		</span>
            </div>
            <div class="addmoresundiv"></div>
            <div class="x_panel" style="">
          	<div class="x_content">
            <div class="row grid_slider">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <p>Color</p>
                <select id="Color" value="" class="form-control"  name="Color[]" >
                    <option value=''>Please Select Color</option>
                    <?php if(!empty($color)){
                    foreach($color as $row){ ?>
                    <option value='<?=$row['id']?>'><?=$row['color_name']?></option>
                    <?php }} ?>
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <p>Size</p>
                <input type="text" id="range_25" value="" class="form-control" placeholder="Please Enter Size As According To Product" name="size[]" />
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <p>Stock</p>
                <input type="text" id="range_27" value="" class="form-control" placeholder="Please Enter Stock" name="stock[]" required />
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <!--button class="add_field_button">Add More Fields</button-->
                <p></p>
                <span onclick="appendaddmoresub1();" class="pull-right">
        			<i class="fa fa-plus" style="height: 20px; font-size: 14px; width: 20px; line-height: 20px; background: #de5947; border-radius: 50% !important; color: white; text-align: center; cursor: pointer;" ></i>
        		</span>
              </div>
            </div>
            <div class="addmoresundiv1"></div>
          </div>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         <div class="addmoredata" style="display:none;">
            <div class="row addmoredivindex grid_slider">
			<div class="col-md-4 col-sm-4 col-xs-12">
                <input type="file" name="product_pic[]" accept="Image/*">
              </div>
			 <div class="col-md-3 col-sm-3 col-xs-12">
                
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
              </div>
				<div class="col-md-2 col-sm-2 col-xs-12">
					<div class="form-group">
					<label for="addmoresjakd"> &nbsp; </label>
					<div class="add-more-row" style="margin-top: 7px;">
					<a  onclick="removeaddmoresub(index);">
						<i class="fa fa-minus" style="height: 20px; font-size: 14px; width: 20px; line-height: 20px; background: #de5947; border-radius: 50% !important; color: white; text-align: center; cursor: pointer;" ></i>
					</a>
					</div>
					</div>
				</div>
				<div style="clear:both;"></div>
            </div>
		</div>
		<div class="addmoredata1" style="display:none;">
                    <div class="row addmorediv1index grid_slider">
						<div class="col-md-4 col-sm-4 col-xs-12">
                        <p>Color</p>
                        <select class="form-control"  name="Color[]" >
                            <option value=''>Please Select Color</option>
                            <?php if(!empty($color)){
                            foreach($color as $row){ ?>
                            <option value='<?=$row['id']?>'><?=$row['color_name']?></option>
                            <?php }} ?>
                        </select>
                      </div>
					 <div class="col-md-3 col-sm-3 col-xs-12">
                        <p>Size</p>
                        <input type="text"  class="form-control" placeholder="Please Enter Size As According To Product" name="size[]" />
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <p>Stock</p>
                        <input type="text"   class="form-control" placeholder="Please Enter Stock" name="stock[]" />
                      </div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="form-group">
							<label for="addmoresjakd"> &nbsp; </label>
							<div class="add-more-row" style="margin-top: 7px;">
						
								<a  onclick="removeaddmoresub1(index);">
									<i class="fa fa-minus" style="height: 20px; font-size: 14px; width: 20px; line-height: 20px; background: #de5947; border-radius: 50% !important; color: white; text-align: center; cursor: pointer;" ></i>
								</a>
							</div>
							</div>
						</div>
						<div style="clear:both;"></div>
                    </div>
				</div>
        </div>
   </div>
</div>
<script src="<?=base_url()?>theme/backend/assets/js/jquery-3.5.1.min.js"></script>
    <script>
		function getsubcate(cateId,idname){
			$.ajax({
                type:'POST',
                url:'<?php echo base_url("Backend/ProductController/SubCateGet"); ?>',
                data:{'cateId':cateId},
                success:function(result){
                    $("#"+idname).html(result);
                }
            });/* ajax call end*/
		}
		var addmoreind = 0;

	function appendaddmoresub()
		{
			addmoreind++;
			var addmoredata = $(".addmoredata").html();
			
				var addmoredata = addmoredata.replace("index", addmoreind);
				var addmoredata = addmoredata.replace("index", addmoreind);
			
				$(".addmoresundiv").append(addmoredata);
		}
	function removeaddmoresub(index)
		{
			$(".addmorediv"+index).remove();
		}

		var addmoreind1 = 0;

	function appendaddmoresub1()
		{
			addmoreind1++;
			var addmoredata = $(".addmoredata1").html();
			
				var addmoredata = addmoredata.replace("index", addmoreind1);
				var addmoredata = addmoredata.replace("index", addmoreind1);
			
				$(".addmoresundiv1").append(addmoredata);
		}
	function removeaddmoresub1(index)
		{
			$(".addmorediv1"+index).remove();
		}
	function calculateprice(percent){
    var base_price = $("#base_price").val();
    if(base_price != ''){
        $("#showmessage").html('');
    var discount = (parseInt(base_price) *parseInt(percent))/100;
    var priceafterdis = parseInt(base_price) - parseInt(discount);
    $("#after_discount").val(priceafterdis);
    $("#after_discount").attr('readonly','readonly');
    }else{
      $("#showmessage").html("Please Enter Base Price")
    }
    
	}
	function calculateprice1(base_price){
    var percent  = $("#discount_percent").val();
    if(percent != ''){
        $("#showmessage").html('');
    var discount = (parseInt(base_price) *parseInt(percent))/100;
    var priceafterdis = parseInt(base_price) - parseInt(discount);
    $("#after_discount").val(priceafterdis);
    $("#after_discount").attr('readonly','readonly');
    }
    
}
	</script>
<?=$layout['footer']?>
