<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_login-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 09:35:06 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hudson Export | Hudson Export</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

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

    <div class="authentication-wrapper authentication-3">
        <div class="authentication-inner">

            <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5" style="background-image: url('<?=base_url('')?>/theme/backend/assets/img/bg/21.jpg');">
                <div class="ui-bg-overlay bg-dark opacity-50"></div>

                <div class="w-100 text-white px-5">
                    <h1 class="display-2 font-weight-bolder mb-4">JOIN OUR<br>COMMUNITY</h1>
                    <div class="text-large font-weight-light">
                    Being a host to a wide array of merchandise including clothing and accessories, 
               we are also the ultimate destination for home decor and more including many industrial products.
              </div>
                </div>
            </div>
            <div class="d-flex col-lg-4 align-items-center bg-white p-5">
                <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                    <div class="w-100">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="ui-w-60">
                                <div class="w-100 position-relative">
                                    <img src="<?=base_url('')?>/theme/backend/assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center text-lighter font-weight-normal mt-5 mb-0">Login to Your Account</h4>
                        <form class="my-5" method="post" action="<?=base_url('DoAdminlogin')?>">
                            <div class="form-group">
                                <label class="form-label">Mobile</label>
                                <input name="mobile_no" type="text" class="form-control">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label d-flex justify-content-between align-items-end">
                                    <span>Password</span>
                                    <!--a href="pages_authentication_password-reset.html" class="d-block small">Forgot password?</a-->
                                </label>
                                <input type="password" name="password" class="form-control">
                                <div class="clearfix"></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center m-0">
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
                                                <!--label class="custom-control custom-checkbox m-0">
<input type="checkbox" class="custom-control-input">
<span class="custom-control-label">Remember me</span>
</label-->
                                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>

                        <div class="text-center text-muted">
                            You don't remember yor password?
                            <a href="<?=base_url('ForgotPassword')?>">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>

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
    <script src="assets/js/analytics.js"></script>
</body>

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_login-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 09:35:06 GMT -->

</html>