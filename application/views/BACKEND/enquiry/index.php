<?=$layout['header']?>
<input type="hidden" name="base_url" id="base_url" value="<?=base_url('')?>" class="form-control" />
    <div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Enquiry</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('Dashboard')?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Enquiry</li>
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
                <div class="card-datatable table-responsive">
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Quantity</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($enquiry)){
                                $i = 0;
                            foreach($enquiry as $row){
                                $i++; ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=ucfirst($row['name'])?></td>
                                <td><?=ucfirst($row['mobile'])?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['required_quantity']?></td>
                                <td><?=ucfirst($row['message'])?></td>
                                <td class="center"><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?=$layout['footer']?>