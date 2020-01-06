<!doctype html>
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

<style type="text/css">
    .owl-theme .owl-dots .owl-dot span
    {	
     	border-color: white;
     	height:15px;
     	width: 15px;
     	border-width: 3px;
    }
    .owl-theme .owl-dots .owl-dot .active span
    {
     	background-color: red;
     	color:orange;
    }
</style>
<div class="darkbg">
    <!-- start section title --> 
    <div class="jbm-section-title padding-top-100 margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Latest Blog</span> News</h2>
                    <p>Read the latest news from our blog and learn more everyday.</p>
                </div>
            </div>
        </div>
    </div>
	<div class="slider"  style="margin-left:100px;margin-right:100px">
		<div class="owl-carousel owl-theme">
 						<?php $i=0;
				                 foreach($blog as $value){ 
				                 	$sql=$this->db->get_where('admin',array('id'=>$value['admin_id']));
				                 	$admin=$sql->row_array();
				                 	 ?>
		    <div class="item">
		    	<?php //echo $i; $i=$i+1; ?>
		    	<div class="sectiob-blog">
			        <div class="container">
			            <div class="row">
			                <div class="blog-news-slider">
				               
				                    <div class="col-md-4 col-sm-6 col-xs-12">
				                        <div class="blog-posts-in">
				                            <div class="blog-post-thumb">
				                                <a href="#">
				                                    <img src="<?php echo base_url('upload/admin/blog/'.$value['image_path']); ?>" alt="blog-1" class="img-responsive" />
				                                </a>
				                                <div class="blog-date" style="width:100px;padding:8px">
				                                    <span class="">
				                                        <?php 
				                                        $date=strtotime($value['creation_time']);
				                                        echo date('d/m/Y', $date);
				                                        ?>
				                                    </span>
				                                    <span class="blog-cat">Career</span>
				                                </div>
				                            </div>
				                            <div class="blog-post-desc">
				                                <a href="#" class="blog-redmore">
				                                   <i class="fa fa-angle-right" aria-hidden="true"></i>
				                                </a>
				                                <h5>
				                                    <a href="#"><?php echo $value['title']; ?></a>
				                                </h5>
				                                <div class="blog-grid-meta">
				                                    <span>by</span>
				                                    <a href="#"><?php echo $admin['name']; ?></a>
				                                </div>
				                                <p style="height:320px;"><?php echo $value['description']; ?></p>
				                            </div>
				                        </div>
				                    </div>
			                </div>
			            </div>

			        </div>
    			</div>
		    </div><?php } ?>
		</div>
			            <div class="row margin-top-60 margin-bottom-100">
			                <div class="col-xs-12 text-center">
			                    <a href="#" class="jbm-loadmore">View More News</a>
			                </div>
			            </div>
	</div>
    </div>
</body></html>