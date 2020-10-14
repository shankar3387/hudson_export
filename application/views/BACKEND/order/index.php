<?=$layout['header']?>
<input type="hidden" name="base_url" id="base_url" value="<?=base_url('')?>" class="form-control" />
    <div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Order</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Order</li>
                </ol>
                <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('Category')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                <?php } ?>
            </div>
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($order)){
                                $i = 0;
                            foreach($order as $row){
                                $i++; ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=ucfirst(getanyname('tbl_customer','full_name',$row['tbl_user_id']))?></td>
                                <td><?=ucfirst(getanyname('tbl_customer','mobile_no',$row['tbl_user_id']))?></td>
                                <td><?=getanyname('tbl_customer','email',$row['tbl_user_id'])?></td>
                                <td><?=getanyname('tbl_product','product_name',$row['tbl_product_id'])?></td>
                                <td><?=$row['tbl_order_quantity']?></td>
                                <td>$<?=$row['tbl_total_amount']?></td>
                                <td class="center"><?=date('d-m-Y',strtotime($row['tbl_date_order']))?></td>
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
                        url:'<?php echo base_url("CategoryUpdateData"); ?>',
                        data:{'id':id},
                        success:function(result){
                            var obj = JSON.parse(result);
                            var url = $("#base_url").val();
                            $("#category_name").val(obj.category_name);
                            $("#edit_id").val(obj.id);
                            var img = url+obj.img;
                            $("#cat_img").attr("src", img);
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
                url: '<?php echo base_url("categorystatus"); ?>',
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