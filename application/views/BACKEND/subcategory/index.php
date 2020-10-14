<?=$layout['header']?>
<input type="hidden" name="base_url" id="base_url" value="<?=base_url('')?>" class="form-control" />
    <div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Subcategory</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Subcategory</li>
                </ol>
                <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('Category')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                <?php } ?>
                <?php if(!empty($this->session->flashdata('errors'))){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="<?=base_url('Category')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                <?php } ?>
            </div>
            <div class="card">
                <h6 class="card-header"><button type="button" data-toggle="modal" data-target="#modals-default" class="btn btn-round btn-dark">Add Subcategory</button></h6>
                <div class="card-datatable table-responsive">
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($Subcategory)){
                                $i = 0;
                            foreach($Subcategory as $row){
                                $i++; ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=ucfirst(getanyname('tbl_category','category_name',$row['category_id']))?></td>
                                <td><?=ucfirst($row['subcategory_name'])?></td>
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
            <form class="modal-content" method="post" action="<?=base_url('AddSubCategory')?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Subcategory
<span class="font-weight-light">Add</span>
</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Category Name</label>
                            <select class="select2-demo form-control" style="width: 100%" data-allow-clear="true" name="category_id">
                            <option>Please select Category</option>
                            <?php  if(!empty($Category)){
                            foreach($Category as $row){ ?>
                            <option value="<?=$row['id']?>"><?=ucfirst($row['category_name'])?></option>
                            <?php }} ?>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Subcategory Name</label>
                            <input type="text" name="subcategory_name" class="form-control" placeholder="SubCategory Name" />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="Updateform">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="<?=base_url('UpdateSubCategory')?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Category
<span class="font-weight-light">Update</span>
</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Category Name</label>
                            <select class="form-control" style="width: 100%" data-allow-clear="true" name="category_id" id="category_id">
                            <option>Please select Category</option>
                            <?php  if(!empty($Category)){
                            foreach($Category as $row){ ?>
                            <option value="<?=$row['id']?>"><?=ucfirst($row['category_name'])?></option>
                            <?php }} ?>
                            </select>
                            <input type="hidden" name="edit_id" id="edit_id" class="form-control" />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Subcategory Name</label>
                            <input type="text" name="subcategory_name" id="subcategory_name"  class="form-control"   />
                        </div>
                    </div>
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
                        url:'<?php echo base_url("SubCategoryUpdateData"); ?>',
                        data:{'id':id},
                        success:function(result){
                            var obj = JSON.parse(result);
                            //alert(obj.category_id);
                            $("#category_id").val(obj.category_id);
                            $("#subcategory_name").val(obj.subcategory_name);
                            $("#edit_id").val(obj.id);
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
                url: '<?php echo base_url("Subcategorystatus"); ?>',
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