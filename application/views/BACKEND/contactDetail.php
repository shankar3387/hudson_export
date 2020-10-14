<?=$layout['header']?>
    <div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Contact Detail For Order</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Contact Detail</li>
            </ol>
            <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('ContactDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
            <?php } ?>
            <?php if(!empty($this->session->flashdata('errors'))){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="<?=base_url('ContactDetail')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('errors');?>
                    </div>
            <?php } ?>
        </div>
        <div class="card mb-4">
            <h6 class="card-header">Detail</h6>
            <div class="card-body">
                <form action="<?=base_url('SaveDetail')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Contact Detail 1</label>
                        <input type="text" name="contact_num1" class="form-control" placeholder="Contact Detail 1" value="<?php if(!empty($contact)){ echo $contact[0]['contact_num1']; } ?>" />
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contact Detail 2</label>
                        <input type="text" name="contact_num2" class="form-control" placeholder="Contact Detail 2" value="<?php if(!empty($contact)){ echo $contact[0]['contact_num2']; } ?>" />
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contact Detail 3</label>
                        <input type="text" name="contact_num3" class="form-control" placeholder="Contact Detail 3" value="<?php if(!empty($contact)){ echo $contact[0]['contact_num3']; } ?>" />
                        <div class="clearfix"></div>
                    </div>
                    <?php  if(!empty($contact)){ ?> <input type="hidden" name="rowId" value="<?=$contact[0]['id']?>" /> <?php }else{ ?> <input type="hidden" name="rowId" value="0" /> <?php } ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$layout['footer']?>