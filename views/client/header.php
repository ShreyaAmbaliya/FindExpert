<?php  if(!$this->session->userdata('client_id'))
        {
            redirect('client/login/index');
        } 
        ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="<?php echo base_url('assets/client/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/client/dist/css/style.min.css')?>" rel="stylesheet">
    
    <!-- star review -->
    <link href="<?php echo base_url('assets/rating/css/star-rating.css')?>" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url('assets/rating/js/star-rating.js')?>" type="text/javascript"></script>
    <!-- end review -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/libs/select2/dist/css/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/libs/quill/dist/quill.snow.css')?>">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width --> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/css/dataTables.bootstrap4.css')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/client/images/favicon.png')?>">
    <title>FindExpert - The Ultimate Multipurpose Client template</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/client/libs/flot/css/float-chart.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/client/dist/css/style.min.css')?>" rel="stylesheet">
    
    <script src="<?php echo base_url('assets/client/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

$( document ).ready(function() {

    $("#myid").click(function(){
                 $.ajax({            
                    url:"<?php echo site_url('client/manage_bid/ajax_nstatus');?>",
                    success:function(res){
                        $('#num').html(res);
                    }
                });
        });
});    
</script>
       <!-- 
/*    setInterval(function() {
      var mb = $('#num').html();
    $('#num').html(mb)},1000
    );
*/    //setTimeout(location.reload.bind(location), 2000);
            /*$('#myid').click(function(){
                //var cat_id = $(this).val();
                alert('ss');
            }*/
                //alert(cat_id);
             /*   $.ajax({
                   // type:"post",
                    url:"<?php // echo site_url('client/manage_bid/ajax_nstatus'); ?>"
                    ,
                    data:{category:cat_id},
                    success:function(res){
                        $('#num').html(res);
                    }
                })
            })*/ -->
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
                            <img src="<?php echo base_url('assets/client/images/my_logo1.png')?>" alt="homepage" style="height:50px;width:50px"  class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url('assets/client/images/logo2.png')?>" alt="homepage" style="height:50px;width:150px"  class="light-logo" />      
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/client/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
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
                        
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                
                                <?php 
                                    $cid=$this->session->userdata('client_id');
                                    $qry=$this->db->get_where('notification',array('status'=>0,'client_id'=>$cid));
                                    
                                    $rows=$qry->num_rows();

                                    $this->db->order_by('creation_time','desc');
                                    $sql=$this->db->get_where('notification',array('client_id'=>$cid));
                                    
                                    $rs=$sql->result_array();

                                    $this->db->where('bid_id!=',0);
                                    $this->db->where('status',0);
                                    $sql=$this->db->get('notification');                                     
                                    $total_bids=$sql->num_rows();

                                    $this->db->where('admin_approve',2);
                                    $this->db->where('status',0);
                                    $sql=$this->db->get('notification');                                     
                                    $total_disapprove=$sql->num_rows();

                                    $this->db->where('admin_approve',1);
                                    $this->db->where('status',0);
                                    $sql=$this->db->get('notification'); 
                                    $total_approval=$sql->num_rows();

                                    $this->db->where('worker_approve',1);
                                    $this->db->where('status',0);
                                    $sql=$this->db->get('notification'); 
                                    $worker_approval=$sql->num_rows();

                                    $this->db->where('worker_approve',2);
                                    $this->db->where('status',0);
                                    $sql=$this->db->get('notification'); 
                                    $worker_disapproval=$sql->num_rows();

                                ?>
                                <span id="num" style="border-radius: 100%;color:white;font-size: 13px;"><?php if($rows!=0){ echo $rows; }else {echo '';}?> </span> 
                                <span id="myid" style="margin-right: 30px"><i class="mdi mdi-bell font-24">
                              </i></span>
                            </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <?php 
                                        if($total_bids!=0){?> 
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                   <?php
                                        echo 'New Bids '.$total_bids;}
                                    ?>
                                </a>
                                <?php 
                                        if($total_approval!=0){ ?>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                    <?php
                                        echo 'Project Approval '.$total_approval;}
                                    ?>
                                </a>
                                <?php 
                                        if($total_disapprove!=0){ ?>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                    <?php 
                                        echo 'Project Disapproval '.$total_disapprove;}
                                    ?>
                                </a>
                                <?php 
                                        if($worker_approval!=0){ ?>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                   <?php
                                        echo 'Worker Approval '.$worker_approval; }
                                    ?>
                                </a>
                                <?php 
                                        if($worker_disapproval!=0){ ?>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                   <?php
                                        echo 'Worker Disapproval '.$worker_disapproval;}
                                    ?>
                                </a>
                                <?php 
                                        if($total_disapprove==0 && $total_approval==0 && $total_bids==0 && $worker_disapproval==0 && $worker_approval==0){ ?>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>">
                                    <?php 
                                        echo 'No Notification';}
                                    ?>
                                </a>

                                    <!-- <?php foreach ($rs as $value) {?>
                                       <a class="dropdown-item" href="<?php echo site_url('client/manage_project/view_bid'); ?>"><?php echo $value['n_txt']; ?></a> 
                                    <?php } 
                                    ?> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('upload/client/'.$this->session->userdata('client_img')); ?>" alt="user" class="rounded-circle" height="35" width="35" style="margin-right:10px"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_client/edit_profile/'.$this->session->userdata('client_id')); ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('client/manage_client/change_password/'.$this->session->userdata('client_id')); ?>"><i class=" fas fa-lock m-r-5 m-l-5"></i> Change Password</a>
                               <!--  <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a> -->
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="<?php echo site_url('client/login/logout');?>"><i class="fa fa-power-off m-r-5 m-l-5"></i>Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?php echo site_url('client/manage_client/show_profile/'.$this->session->userdata('client_id')); ?>" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('client/login') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" far fa-list-alt"></i><span class="hide-menu">Project </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('client/manage_project/insertdata'); ?>" class="sidebar-link"><i class=" fas fa-plus"></i><span class="hide-menu"> Add Project</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('client/manage_project/viewdata'); ?>" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Project</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a href="<?php echo site_url('client/manage_payment/show_payment_details'); ?>" class="sidebar-link"><i class="far fa-money-bill-alt"></i><span class="hide-menu">Payment Details </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>