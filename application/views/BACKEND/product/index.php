<?=$layout['header']?>
    <div class="layout-content">
        <input type="hidden" name="base_url" id="base_url" value="<?=base_url('')?>" class="form-control" />
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Product</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Product</li>
                </ol>
                <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('Product')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                <?php } ?>
                <?php if(!empty($this->session->flashdata('errors'))){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="<?=base_url('Product')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                <?php } ?>
            </div>
            <div class="card">
                <h6 class="card-header"><a href="<?=base_url('Products')?>"><button type="button" class="btn btn-round btn-dark">Add Product</button></a></h6>
                <div class="card-datatable table-responsive">
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Product price</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($product)){
                                $i = 0;
                            foreach($product as $row){
                                $i++; ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=ucfirst(getanyname('tbl_category','category_name',$row['cat_id']))?></td>
                                <td><?=ucfirst($row['product_name'])?></td>
                                <td><?=$row['product_price']?></td>
                                <td><img src="<?=base_url($row['product_pic'])?>" height="25%" width="25%" /></td>
                                <td><?php $status =$row['status']; 
                                          if($status == 'Active'){ ?>
                                            <a href="" class="btn btn-success actvcity" event_id="<?php echo $row['id']; ?>" status="<?php echo $status ;?>">Active</a>
                                            <?php }if($status == 'Inactive'){?>
                                            <a href="" class="btn btn-danger actvcity" event_id="<?php echo $row['id']; ?>" status="<?php echo $status ;?>">Inactive</a>
                                    <?php } ?></td>
                                <td class="center"><a href="<?=base_url('UpdatePro/').$row['id']?>"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>theme/backend/assets/js/jquery-3.5.1.min.js"></script>
    <script>
    function getData(id){
                 $.ajax({
                        type:'POST',
                        url:'<?php echo base_url("ProductUpdateData"); ?>',
                        data:{'id':id},
                        success:function(result){
                            var url = $("#base_url").val();
                            var obj = JSON.parse(result);
                            $("#cat_id").val(obj.cat_id);
                            $("#product_name").val(obj.product_name);
                            $("#product_full_description").val(obj.product_full_description);
                            $("#short_description").val(obj.short_description);
                            $("#product_price").val(obj.product_price);
                            $("#search_keyword").val(obj.search_keyword);
                            $("#edit_id").val(obj.id);
                            var img1 = url+obj.product_image;
                            var img2 = url+obj.product_image2;
                            var img3 = url+obj.product_image3;
                            $("#product_image").attr("src", img1);
                            $("#product_image2").attr("src", img2);
                            $("#product_image3").attr("src", img3);
                        }
                    });/* ajax call end*/
    }
    $(document).on('click', '.actvcity', function() {
        var event_id = $(this).attr('event_id');
        var eventStatus = $(this).attr('status');
        if (eventStatus == 'Active') {
            is_active = "Inactive";
            $(this).attr("status", is_active);
            $(this).html("Inactive");
            $(this).removeClass("btn-success");
            $(this).addClass("btn-danger");
        } else {
            is_active = "Active";
            $(this).attr("status", is_active);
            $(this).html("Active");
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-success");
        }
        if (event_id) {
            $.ajax({
                url: '<?php echo base_url("Productystatus"); ?>',
                type: 'POST',
                dataType: "json",
                data: {
                    'event_id': event_id,
                    'eventStatus': is_active
                },
                beforeSend: function(xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(data) {}
            });
        }

        return false;
    }); 
    </script>
<?=$layout['footer']?>