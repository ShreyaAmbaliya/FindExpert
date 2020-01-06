<html lang="en">
<!-- Mirrored from demo.diothemes.com/html/jobmarket/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 13:28:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Job Market</title>
    <!-- stylesheets--> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/css/bootstrap.min.css')?>">
     <script src="<?php echo base_url('assets/visitor/js/jquery.min.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/font-awesome/4.7.0/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/lib/slick/slick.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/lib/slick/slick-theme.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/lib/select2/css/select2.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/css/main.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/css/color2.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/visitor/css/responsive.css')?>">

    <!-- slider -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/slider/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/slider/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/slider/css/animate.css')?>">
    <!-- <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/slider/css/style.css')?>">

    <!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
    <!-- <script type="text/javascript" src="js/fontawesome-all.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/slider/js/owl.carousel.min.js')?>"></script>
    <!-- end slider -->

    <script src='<?php echo base_url('assets/visitor/js/api.js')?>'></script>

<script type="text/javascript">
        
        $(document).ready(function(){

            $('.owl-carousel').owlCarousel({
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                loop:true,
                nav:true,
                autoplay:true,
                autoplayTimeout:5000,
                navText:['<span class="nav-btn">Prev</span>','<span class="nav-btn">Next</span>'],
                responsive:{
                    0:{
                        items:3,
                        dots:false
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            });

        });

    </script>
</head>

<body>
    <header>
        
        <!-- start topbar -->
        <div class="jbm-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 text-left" style="margin-top: 12px;margin-bottom: 12px;">
                        <ul class="dis-inline list-none jbm-topbar-contact">
                            <li>
                                <a href="tel:+0001234567890"><i class="fa fa-phone"></i>+ 000 123 456 7890</a>
                            </li>
                            <li>
                                <a href="mailto:findexpert15699@gmail.com"><i class="fa fa-envelope"></i>findexpert15699@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-right hidden-xs hidden-sm">
                        <?php if($this->session->userdata('worker_id') || $this->session->userdata('client_id')){ if($this->session->userdata('worker_id')){
                            $qry=$this->db->get_where('worker',array('worker_id'=>$this->session->userdata('worker_id')));
                            $res=$qry->row_array();
                           // print_r($res);die;
                            $user='worker';$name=$this->session->userdata('worker_name');
                            $path=$this->session->userdata('worker_img');}else{$user='client';$name=$this->session->userdata('client_name');$path=$this->session->userdata('client_img');
                        }?>
                              <ul class="dis-inline list-none  jbm-topbar-login">
                                <li style="border-right: none;">
                                    <a class="" href="<?php echo site_url('visitor/home/login_form'); ?>">
                                        <img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="50" width="50" style="border-radius:100%">
                                    </a>
                                </li>
                                <li>
                                    <a class=""><?php echo $name; ?></a>
                                </li>
                                <li>
                                    <a class="" href="<?php echo site_url('visitor/manage_account'); ?>"><i class="fa fa-cog"></i>&nbsp;&nbsp;<?php echo 'Account Settings'; ?></a>
                                </li>
                                <li>
                                    <a class="" href="<?php echo site_url('visitor/home/logout'); ?>"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a>
                                </li>
                            </ul><?php
                        }else{?>
                            <ul class="dis-inline list-none  jbm-topbar-login"  style="margin-top: 12px;margin-bottom: 12px;">
                                <li>
                                    <a class="" href="<?php echo site_url('visitor/home/login_form'); ?>">Login</a>
                                </li>
                                <li>
                                    <a class="" href="<?php echo site_url('visitor/home/register_form'); ?>">Register</a>
                                </li>
                            </ul>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end topbar -->
 
        <!-- start menu -->
        <div class="jbm-mennubar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="jbm-logo">
                            <a href="index.html">
                                <img src="<?php echo base_url('assets/visitor/img/mylogo1.png')?>"  style="height:60px;width:210px" alt="Job Market Logo" class="img-responsive" />
                            </a>
                        </div>
                        <div class="jbm-menu-icon pull-right hidden-lg">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 302 302" xml:space="preserve" ><g><rect y="36" width="302" height="30" fill="#454545"/><rect y="236" width="302" height="30" fill="#454545"/><rect y="136" width="302" height="30" fill="#454545"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 text-right hidden-md hidden-sm hidden-xs">
                        <nav class="jbm-menu-container">
                            <ul class="jbm-menu list-none dis-inline">
                                <li>
                                    <a href="<?php echo site_url('visitor/home'); ?>">Home</a>
                                </li>
                                
                                
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_cat_project') ?>">Category<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <?php foreach($cat as $row){?>
                                            <li>
                                                <a href="<?php echo site_url('visitor/manage_cat_project/project_bycat/'.$row['cat_id']); ?>"><?php echo $row['cat_name']; ?></a>
                                            </li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <?php if($this->session->userdata('worker_id')){ ?>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_bid/view_worker_bid/'.$this->session->userdata('worker_id')); ?>">My Bids<!-- <i class="fa fa-angle-down" aria-hidden="true"></i> --></a></li>
                                <?php } ?>
                                
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_inquiry')?>">Contact Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_inquiry')?>">About Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_blog')?>">Blog</a>
                                </li>
                               <!--  <li>
                                    <a href="#">Blogs<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-standard.html">Blog standard</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail.html">Blog Details</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail-fullwidth.html">Blog detail full width</a>
                                        </li>
                                        <li>
                                            <a href="blog-grid.html">Blog grid</a>
                                        </li>
                                        <li>
                                            <a href="blog-list-layout.html">Blog list layout</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="#" class="jbm-searchform">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <form class="form-inline pull-right" method="post" >
                                <div class="form-group m-r-4">
                                    <input type="text" class="form-control" name="s" id="header-search-input" placeholder="Search here..." />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="jbm-search-sm-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end menu -->
        <!-- start mobile menu -->
        <div class="jbm-menu-wrap">
            <div class="jbm-mobile-logo-wrap">
                <div class="jbm-logo">
                    <a href="index.html">
                        <img src="<?php echo base_url('assets/visitor/img/logo2.png')?>" alt="Job Market Logo" class="img-responsive" />
                    </a>
                </div>
                <div class="jbm-menu-icon pull-right">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 612 612" xml:space="preserve"><g><g id="cross"><g><polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397 306,341.411 576.521,611.397 612,575.997 341.459,306.011 " fill="#454545"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a>
                </div>
            </div>
            <div class="jbm-mobile-search-wrap margin-bottom-50">
                <form class="form-inline" method="post" >
                    <div class="form-group m-r-4">
                        <input type="text" class="form-control" name="s" id="header-search-input2" placeholder="Search here..." />
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="jbm-search-sm-btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="jbm-mobile-menu-wrap">
                <ul class="jbm-mobile-menu">
                    <li class="mobile-hasmenu">
                         <a href="<?php echo site_url('visitor/home'); ?>">Home</a>
                    </li>
                    <li class="mobile-hasmenu">
                        <a href="#">Candidates</a>
                        <ul class="mobile-submenu">
                            <li class="jbm-pg-hd">
                                <h3>Candidates Header</h3>
                            </li>
                            <li>
                                <a href="candidate-information.html">Candidate Dashboard</a>
                            </li>
                            <li>
                                <a href="candidate-message.html">Messages</a>
                            </li>
                            <li>
                                <a href="resume.html">Resume</a>
                            </li>
                            <li>
                                <a href="candidate-account-setting.html">Account Settings</a>
                            </li>
                            <li class="jbm-pg-hd">
                                <h3>Candidate Search</h3>
                            </li>
                            <li>
                                <a href="candidate-search.html">Find Candidate</a>
                            </li>
                            <li>
                                <a href="candidate-search-with-map.html">Map Search</a>
                            </li>
                            <li>
                                <a href="candidate-search-with-filter.html">Search with Filters</a>
                            </li>
                            <li>
                                <a href="candidate-search-with-alphabets.html">Search by Alphabets</a>
                            </li>
                            <li class="jbm-pg-hd">
                                <h3>Candidate Pages</h3>
                            </li>
                            <li>
                                <a href="candidate-single.html">Candidate Single</a>
                            </li>
                            <li>
                                <a href="candidate-job-history.html">Job History</a>
                            </li>
                            <li>
                                <a href="cv.html">CV</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mobile-hasmenu">
                        <a href="#">Employers</a>
                        <ul class="mobile-submenu">
                            <li class="jbm-pg-hd">
                                <h3>Heading One</h3>
                            </li>
                            <li>
                                <a href="single-job.html">Job Single</a>
                            </li>
                            <li>
                                <a href="apply-job.html">Apply Job</a>
                            </li>
                            <li>
                                <a href="employer-information.html">Employer Dashboard</a>
                            </li>
                            <li>
                                <a href="employer-message.html">Message</a>
                            </li>
                        
                            <li class="jbm-pg-hd">
                                <h3>Heading Two</h3>
                            </li>
                            <li>
                                <a href="employer-job-history.html">Job History</a>
                            </li>
                            <li>
                                <a href="candidate-applications.html">Candidate Applications</a>
                            </li>
                            <li>
                                <a href="shortlisted-candidates.html">Shortlisted Candidates</a>
                            </li>
                            <li>
                                <a href="payment-history.html">Payment History</a>
                            </li>
                            <li class="jbm-pg-hd">
                                <h3>Heading Three</h3>
                            </li>
                            <li>
                                <a href="post-a-job.html">Post A Job</a>
                            </li>
                            <li>
                                <a href="employer-account-setting.html">Account Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mobile-hasmenu">
                       <a href="<?php echo site_url('visitor/manage_cat_project') ?>">Category</a>
                        <ul class="mobile-submenu">
                             <?php foreach($cat as $row){?>
                                             <li>
                                                <a href="<?php echo site_url('visitor/manage_cat_project/project_bycat/'.$row['cat_id']); ?>"><?php echo $row['cat_name']; ?></a>
                                            </li>
                                        <?php }?>
                        </ul>
                    </li>
                    <li class="mobile-hasmenu">
                                <?php if($this->session->userdata('worker_id')){ ?>
                                    <a href="<?php echo site_url('visitor/manage_bid/view_worker_bid/'.$this->session->userdata('worker_id')); ?>">My Bids<!-- <i class="fa fa-angle-down" aria-hidden="true"></i> --></a>
                                <?php } ?>
                                </li>
                    <li class="mobile-hasmenu">
                        <a href="#">Contact Us</a>
                       <!--  <ul class="mobile-submenu">
                            <li class="jbm-pg-hd">
                                <h3>Page Heading One</h3>
                            </li>
                            <li>
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li>
                                <a href="how-it-works.html">How it Works</a>
                            </li>
                            <li>
                                <a href="terms-and-conditions.html">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="faqs.html">FAQ</a>
                            </li>
                            <li>
                                <a href="pricing-plans.html">Pricing Plans</a>
                            </li>
                            <li class="jbm-pg-hd">
                                <h3>Page Heading Two</h3>
                            </li>
                            <li>
                                <a href="shortcodes.html">Shortcodes</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="header-styles.html">Headers</a>
                            </li>
                            <li>
                                <a href="404.html">404 Page</a>
                            </li>
                            <li>
                                <a href="contact-us.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="career-jobmarket.html">Career Jobmarket</a>
                            </li>
                            <li class="jbm-pg-hd">
                                <h3>Page Heading Three</h3>
                            </li>
                            <li>
                                <a href="search-no-result.html">Search with no result</a>
                            </li>
                            <li>
                                <a href="sitemap.html">Site Map</a>
                            </li>
                        </ul> -->
                    </li>
                    <!-- <li class="mobile-hasmenu">
                        <a href="#">Blogs</a>
                        <ul class="mobile-submenu">
                            <li>
                                <a href="blog-standard.html">Blog standard</a>
                            </li>
                            <li>
                                <a href="blog-detail.html">Blog Details</a>
                            </li>
                            <li>
                                <a href="blog-detail-fullwidth.html">Blog detail full width</a>
                            </li>
                            <li>
                                <a href="blog-grid.html">Blog grid</a>
                            </li>
                            <li>
                                <a href="blog-list-layout.html">Blog list layout</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="jbm-mobile-bottom-wrap">
                <div class="jbm-mobile-bottom-wrap-inner clearfix">
                    <div class="mobile-username pull-left">
                         <?php if($this->session->userdata('worker_id') || $this->session->userdata('client_id')){ if($this->session->userdata('worker_id')){
                            $user='worker';$name=$this->session->userdata('worker_name');
                            $path=$this->session->userdata('worker_img');}else{$user='client';$name=$this->session->userdata('client_name');$path=$this->session->userdata('client_img');
                        }?>
                                    
                                     <b><a class="mob-user" href="<?php echo site_url('visitor/manage_account'); ?>"><?php echo 'Account Settings'; ?></a></b>
                                     <br><br>
                                    <a class="mob-user mob-logout" href="<?php echo site_url('visitor/home/logout'); ?>">LOGOUT</a>
                           </div>     
                           <div class="mobile-user-image pull-right">
                                <a class="mob-user-image" href="<?php echo site_url('visitor/home/login_form'); ?>">
                                <img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="60" width="60" ></a>
                                <br>
                               <center> <a class="mob-user"><b><?php echo $name; ?></b></a></center><br>
                            </div>
                        <?php
                        }else{?>
                                <div class="mobile-username pull-left">
                                    <a class="mob-user mob-logout" href="<?php echo site_url('visitor/home/login_form'); ?>">LOGIN</a>
                                </div>
                                <div class="mobile-user-image">
                                    <a class="mob-user-image mob-logout" href="<?php echo site_url('visitor/home/register_form'); ?>">Register</a>
                                </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- end mobile menu -->
    </header>