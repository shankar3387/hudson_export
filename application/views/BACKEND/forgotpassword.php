<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 09:35:07 GMT -->

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hudson Export | Hudson Export</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="<?=base_url('')?>/theme/backend/assets/img/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/ionicons.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/linearicons.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/fonts/feather.css">

    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/css/shreerang-material.css">
    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/css/uikit.css">

    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/libs/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" href="<?=base_url('')?>/theme/backend/assets/css/pages/authentication.css">
</head>

<body>

    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <div class="authentication-wrapper authentication-2 px-4">
        <div class="authentication-inner py-5">
            <?php if(!empty($this->session->flashdata('message'))){ ?>
                    <p class="lead alert hideme adminmessage form-group">
                        <div class="alert alert-danger alert-dismissible">
                            <a href="<?=base_url('Admin')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                    </p>
                    <?php } ?>
                        <?php if(!empty($this->session->flashdata('success'))){ ?>
                            <p class="lead alert hideme adminmessage form-group">
                                <div class="alert alert-success alert-dismissible">
                                    <a href="<?=base_url('Admin')?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $this->session->flashdata('success');?>
                                </div>
                            </p>
            <?php } ?>
            <form class="card" method="post" action="<?=base_url('resetPassword')?>">
                <div class="p-4 p-sm-5">

                    <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                        <div class="ui-w-60">
                            <div class="w-100 position-relative">
                                <img src="<?=base_url('')?>/theme/backend/assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center text-muted font-weight-normal mb-4">Reset Your Password</h5>
                    <hr class="mt-0 mb-4">
                    <p>Enter your registered email address and we will send you a new password.</p>
                    <div class="form-group">
                        <input type="text" name="frg_email" class="form-control" placeholder="Enter your email address">
                        <div class="clearfix"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send password reset email</button><br/>
                    <center><a href="<?=base_url('Admin')?>">Back To Login</a></center>
                </div>
            </form>
        </div>
    </div>
    <script src="<?=base_url('')?>/theme/backend/assets/js/pace.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/libs/popper/popper.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/bootstrap.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/sidenav.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/layout-helpers.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/material-ripple.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/demo.js"></script>
    <script src="<?=base_url('')?>/theme/backend/assets/js/analytics.js"></script>
</body>

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 09:35:07 GMT -->

</html>