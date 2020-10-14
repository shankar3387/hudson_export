<?=$layout['header']?>
    <div class="layout-content">
        <input type="hidden" name="base_url" id="base_url" value="<?=base_url('')?>" class="form-control" />
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Slider</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Slider</li>
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
                <h6 class="card-header"><button type="button" data-toggle="modal" data-target="#modals-default" class="btn btn-round btn-dark">Add Slider</button></h6>
                <div class="card-datatable table-responsive">
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($slider)){
                                $i = 0;
                            foreach($slider as $row){
                                $i++; ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><img src="<?=base_url($row['tbl_slider_link'])?>" width="25%" /></td>
                                <td><?php $status =$row['status']; 
                                          if($status == 'Active'){ ?>
                                            <a href="" class="btn btn-success actvcity" event_id="<?php echo $row['id']; ?>" status="<?php echo $status ;?>">Active</a>
                                            <?php }if($status == 'Inactive'){?>
                                            <a href="" class="btn btn-danger actvcity" event_id="<?php echo $row['id']; ?>" status="<?php echo $status ;?>">Inactive</a>
                                    <?php } ?></td>
                                <td class="center"><button data-toggle="modal" class="btn btn-primary" data-target="#Updateform" onclick="getData(<?php echo $row['id']; ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modals-default">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="<?=base_url('Backend/SliderController/SaveSlider')?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Slider
<span class="font-weight-light">Add</span>
</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Slider Image</label>
                            <input type="file" required name="tbl_slider_link" class="form-control" accept="image/*"  />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- UPDATE FORM-->
    <div class="modal fade" id="Updateform">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="<?=base_url('Backend/SliderController/UpdateSlider')?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Slider
<span class="font-weight-light">Add</span>
</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <img class="img1" width="25%"  id="tbl_slider_link" />
                            <label class="form-label">Slider Image</label>
                            <input type="file" required name="tbl_slider_link" class="form-control" accept="image/*"  />
                            <input type="hidden" name="edit_id" id="edit_id" class="form-control" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?=base_url()?>theme/backend/assets/js/jquery-3.5.1.min.js"></script>
    <script>
    function getData(id){
         $.ajax({
                type:'POST',
                url:'<?php echo base_url("Backend/SliderController/getupdateSliderData"); ?>',
                data:{'id':id},
                success:function(result){
                    var url = $("#base_url").val();
                    var obj = JSON.parse(result);
                    $("#edit_id").val(obj.id);
                    $("#h1").val(obj.h1);
                    $("#h2").val(obj.h2);
                    $("#p_tag").val(obj.p_tag);
                    var img1 = url+obj.tbl_slider_link;
                    $("#tbl_slider_link").attr("src", img1);
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
                url: '<?php echo base_url("Backend/SliderController/UpdateSliderstatus"); ?>',
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


