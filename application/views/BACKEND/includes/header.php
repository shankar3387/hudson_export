<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/dashboards_ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 09:25:07 GMT -->

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Hudson Export | Hudson Export</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>theme/backend/assets/img/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/ionicons.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/linearicons.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/fonts/feather.css">

    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/css/shreerang-material.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/css/uikit.css">

    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/libs/flot/flot.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url()?>theme/backend/assets/libs/datatables/datatables.css">
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/timepicker/timepicker.css" />
    <link rel="stylesheet" href="<?=base_url('theme/backend/')?>assets/libs/minicolors/minicolors.css" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ko52mepxduibiraix863b5iblk292gtr3m03w37k5hpjppgv"></script>
</head>

<body>

    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <div class="layout-wrapper layout-2">
<div class="layout-inner">

<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">

<div class="app-brand demo">
<span class="app-brand-logo demo">
<img src="<?=base_url('theme/backend/')?>assets/img/logo.png" alt="Brand Logo" class="img-fluid">
</span>
<a href="<?=base_url()?>" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Empire</a>
<a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
<i class="ion ion-md-menu align-middle"></i>
</a>
</div>
<div class="sidenav-divider mt-0"></div>

<ul class="sidenav-inner py-1">

<li class="sidenav-item">
<a href="<?=base_url('Dashboard')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-home"></i>
<div>Dashboard</div>
</a>
</li>

<li class="sidenav-item">
<a href="<?=base_url('Category')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-layers"></i>
<div>Category</div>
</a>
</li>

<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('SubCategory')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-type"></i>
<div>Subcategory</div>
</a>
</li>

<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Sliderimage')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-box"></i>
<div>Slider Image</div>
</a>
</li>

<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Colors')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-clipboard"></i>
<div>Color</div>
</a>
</li>
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Brand')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-grid"></i>
<div>Brand</div>
</a>
</li>
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('product')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>Product</div>
</a>
</li>
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('FeatureProduct')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>Feature Product</div>
</a>
</li>
<li class="sidenav-item">
<a href="<?=base_url('newArrival')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>New Arrival </div>
</a>
</li>
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Reviews')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>Reviews</div>
</a>
</li>

<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Orders')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>Your Order</div>
</a>
</li>
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-item">
<a href="<?=base_url('Enquiry')?>" class="sidenav-link">
<i class="sidenav-icon feather icon-award"></i>
<div>Enquiry</div>
</a>
</li>

</ul>
</div>

<div class="layout-container">

<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">

<a href="<?=base_url('Dashboard')?>" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
<span class="app-brand-logo demo">
<img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
</span>
<span class="app-brand-text demo font-weight-normal ml-2">Empire</span>
</a>

<div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
<a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
<i class="ion ion-md-menu text-large align-middle"></i>
</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="layout-navbar-collapse">

<hr class="d-lg-none w-100 my-2">
<div class="navbar-nav align-items-lg-center">

<label class="nav-item navbar-text navbar-search-box p-0 active">
<i class="feather icon-search navbar-icon align-middle"></i>
<span class="navbar-search-input pl-2">
<input type="text" class="form-control navbar-text mx-2" placeholder="Search...">
</span>
</label>
</div>
<div class="navbar-nav align-items-lg-center ml-auto">
<div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
<a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
<i class="feather icon-bell navbar-icon align-middle"></i>
<span class="badge badge-danger badge-dot indicator"></span>
<span class="d-lg-none align-middle">&nbsp; Notifications</span>
</a>
<div class="dropdown-menu dropdown-menu-right">
<div class="bg-primary text-center text-white font-weight-bold p-3">
4 New Notifications
</div>
<div class="list-group list-group-flush">
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<div class="ui-icon ui-icon-sm feather icon-home bg-secondary border-0 text-white"></div>
<div class="media-body line-height-condenced ml-3">
<div class="text-dark">Login from 192.168.1.1</div>
<div class="text-light small mt-1">
Aliquam ex eros, imperdiet vulputate hendrerit et.
</div>
<div class="text-light small mt-1">12h ago</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<div class="ui-icon ui-icon-sm feather icon-user-plus bg-info border-0 text-white"></div>
<div class="media-body line-height-condenced ml-3">
 <div class="text-dark">You have
<strong>4</strong> new followers</div>
<div class="text-light small mt-1">
Phasellus nunc nisl, posuere cursus pretium nec, dictum vehicula tellus.
</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<div class="ui-icon ui-icon-sm feather icon-power bg-danger border-0 text-white"></div>
<div class="media-body line-height-condenced ml-3">
<div class="text-dark">Server restarted</div>
<div class="text-light small mt-1">
19h ago
</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<div class="ui-icon ui-icon-sm feather icon-alert-triangle bg-warning border-0 text-dark"></div>
<div class="media-body line-height-condenced ml-3">
<div class="text-dark">99% server load</div>
<div class="text-light small mt-1">
Etiam nec fringilla magna. Donec mi metus.
</div>
<div class="text-light small mt-1">
20h ago
</div>
</div>
</a>
</div>
<a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all notifications</a>
</div>
</div>
<div class="demo-navbar-messages nav-item dropdown mr-lg-3">
<a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
<i class="feather icon-mail navbar-icon align-middle"></i>
<span class="badge badge-success badge-dot indicator"></span>
<span class="d-lg-none align-middle">&nbsp; Messages</span>
</a>
<div class="dropdown-menu dropdown-menu-right">
<div class="bg-primary text-center text-white font-weight-bold p-3">
4 New Messages
</div>
<div class="list-group list-group-flush">
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<img src="assets/img/avatars/6-small.png" class="d-block ui-w-40 rounded-circle" alt>
<div class="media-body ml-3">
<div class="text-dark line-height-condenced">Lorem ipsum dolor consectetuer elit.</div>
<div class="text-light small mt-1">
Josephin Doe &nbsp;·&nbsp; 58m ago
</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<img src="assets/img/avatars/4-small.png" class="d-block ui-w-40 rounded-circle" alt>
<div class="media-body ml-3">
<div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet, consectetuer.</div>
<div class="text-light small mt-1">
Lary Doe &nbsp;·&nbsp; 1h ago
</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<img src="assets/img/avatars/5-small.png" class="d-block ui-w-40 rounded-circle" alt>
<div class="media-body ml-3">
<div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet elit.</div>
<div class="text-light small mt-1">
Alice &nbsp;·&nbsp; 2h ago
</div>
</div>
</a>
<a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
<img src="assets/img/avatars/11-small.png" class="d-block ui-w-40 rounded-circle" alt>
<div class="media-body ml-3">
<div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet consectetuer amet elit dolor sit.</div>
<div class="text-light small mt-1">
Suzen &nbsp;·&nbsp; 5h ago
</div>
</div>
</a>
</div>
<a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
</div>
</div>

<div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
<div class="demo-navbar-user nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
<span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
<img src="assets/img/avatars/1.png" alt class="d-block ui-w-30 rounded-circle">
<span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?=$this->session->userdata('fullname')?></span>
</span>
</a>
<div class="dropdown-menu dropdown-menu-right">

<a href="<?=base_url('AccountSetting')?>" class="dropdown-item">
 <i class="feather icon-settings text-muted"></i> &nbsp; Account settings</a>
<div class="dropdown-divider"></div>
<a href="<?=base_url('AdminLogout')?>" class="dropdown-item">
<i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
</div>
</div>
</div>
</div>
</nav>