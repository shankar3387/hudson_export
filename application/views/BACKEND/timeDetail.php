<?=$layout['header']?>
    <div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Time Detail For Order</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Time Detail</li>
            </ol>
            <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('TimeDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
            <?php } ?>
            <?php if(!empty($this->session->flashdata('errors'))){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="<?=base_url('TimeDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('errors');?>
                    </div>
            <?php } ?>
        </div>
        <div class="card mb-4">
            <h6 class="card-header">Time Detail</h6>
            <div class="card-body">
                <form action="<?=base_url('Backend/ProductController/InserEntry')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Open Time</label>
                        <input type="time" name="tbl_start_time" class="form-control" placeholder="Open Time" value="<?php if(!empty($TimeDetail)){ echo $TimeDetail[0]['tbl_start_time']; } ?>" />
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Time</label>
                        <input type="time" name="tbl_end_time" class="form-control" placeholder="End Time" value="<?php if(!empty($TimeDetail)){ echo $TimeDetail[0]['tbl_end_time']; } ?>" />
                        <div class="clearfix"></div>
                    </div>
                    <?php  if(!empty($TimeDetail)){ ?> <input type="hidden" name="rowId" value="<?=$TimeDetail[0]['id']?>" /> <?php }else{ ?> <input type="hidden" name="rowId" value="0" /> <?php } ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$layout['footer']?>