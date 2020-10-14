<?=$layout['header']?>
    <div class="layout-content">

        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Account settings</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url("Dashboard")?>" <i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
                <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="<?=base_url('AccountSetting')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                <?php } ?>
                <?php if(!empty($this->session->flashdata('errors'))){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="<?=base_url('AccountSetting')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                <?php } ?>
            </div>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-change-password">Change password</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                        <form method="post" action="<?=base_url('ChangePassword')?>">
                            <div class="tab-pane fade show active" id="account-change-password">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" name="curpassword" class="form-control">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" name="newpassword" class="form-control">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" name="confirmpassword" class="form-control">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=$layout['footer']?>