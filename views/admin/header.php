<?php
        if(!$this->session->userdata('user_id'))
        {
            redirect('admin/login/index');
        }
        ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="<?php echo base_url('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/dist/css/style.min.css')?>" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/libs/select2/dist/css/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/libs/quill/dist/quill.snow.css')?>">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/dataTables.bootstrap4.css')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/images/favicon.png')?>">
    <title>FindExpert - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/libs/flot/css/float-chart.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/style.min.css')?>" rel="stylesheet">
    
    <script src="<?php echo base_url('assets/admin/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
    .bg-dark
    {
        background-color: #212529 !important;
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('assets/admin/images/my_logo1.png')?>" alt="homepage" style="height:50px;width:50px"  class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url('assets/admin/images/logo2.png')?>" style="height:50px;width:150px" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/admin/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       <!-- -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('upload/admin/'.$this->session->userdata('user_img')); ?>" alt="user" class="rounded-circle" height="35" width="35"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo site_url('admin/manage_admin/edit_profile/'.$this->session->userdata('user_id')); ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('admin/manage_admin/change_password/'.$this->session->userdata('user_id')); ?>"><i class=" fas fa-lock m-r-5 m-l-5"></i> Change Password</a>
                                
                                
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="<?php echo site_url('admin/login/logout');?>"><i class="fa fa-power-off m-r-5 m-l-5"></i>Logout</a>
                                  <!--   <a href="<?php //echo site_url('login/logout');?>"> Logout</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i></a> -->
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?php echo site_url('admin/manage_admin/show_profile/'.$this->session->userdata('user_id')); ?>" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== --> 
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('admin/login') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Admin </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_admin/insertdata') ?>" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Add Admin </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_admin/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Admin </span></a></li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-list-alt"></i><span class="hide-menu">Category </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_category/insertdata') ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_category/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Category </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" far fa-list-alt"></i><span class="hide-menu">Sub Category </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_subcategory/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add SubCategory</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_subcategory/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View SubCategory</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-flag "></i><span class="hide-menu">Country </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_country/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add Country</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_country/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Country</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-map-marker"></i><span class="hide-menu">State </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_state/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add State</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_state/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View State</span></a></li>
                            </ul>
                        </li>
                          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-map-marker-alt"></i><span class="hide-menu">City </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_city/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add City</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_city/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View City</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fab fa-gg"></i><span class="hide-menu">Skills </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_skill/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add Skill</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_skill/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Skill</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_client/viewdata'); ?>" class="sidebar-link"><i class="fas fa-user-circle"></i><span class="hide-menu"> Client</span></a>
                         </li>
                         
                         <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_worker/viewdata'); ?>" class="sidebar-link"><i class=" fas fa-users"></i><span class="hide-menu"> Worker</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fab fa-blogger-b"></i><span class="hide-menu">Blog </span></a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_blog/insertdata/'.$this->session->userdata('user_id')); ?>" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Add Blog </span></a></li>
                                        <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_blog/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Blog </span></a></li>
                                 
                                    </ul>
                            </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-money-bill-alt"></i><span class="hide-menu">Payment Details </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_payment/client_payment'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Client Payment</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/manage_payment/worker_payment'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> Worker Payment</span></a></li>
                            </ul>
                        </li>
                    </ul>

                        <!--
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                                <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                                <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                                <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                                <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                                <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                                <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                            </ul>
                        </li>
                    </ul>-->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>