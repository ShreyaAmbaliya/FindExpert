<?php include('header.php'); ?>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link href="<?php echo base_url('assets/rating/css/star-rating.css')?>" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="<?php echo base_url('assets/rating/js/star-rating.js')?>" type="text/javascript"></script>
<style type="text/css">
    .div_css
    {
        width: 450px;
    }
    .error_msg
    {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 60%;
        transform: translateY(-50%);
    }
    .error_msg p 
    {
        font-size: 13px;
        color:red;
    }
</style>

<!-- section page  start -->
    <div class="jbm-page-title page-title-bg-2 smt">
        <div class="container">
             <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                        <h2><span class="fw-400">Contact</span>
                        us</h2>
                        <p><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; > &nbsp;<a href="#">Employers</a> 
                        &nbsp; > &nbsp;Dashboard</p>
                </div>    
            </div>
        </div>
    </div>
    
    <!-- Contact us -->
    <div class="jbm-contact-us margin-bottom-80">
        <div class="container">
            
            <!-- <div class="jbm-contact-map">
                <div id="map_canvas"></div>
            </div> --><!--jbm-contact-map end-->
            <div class="jbm-contact-info margin-bottom-80">
                <div class="row">

                    <div class="col-md-7">
                        <div class="jbm-contact-form">
                            <span style="float: left;"><h4>Get in Touch Here</h4></span>
                                <?php 
                if($this->session->flashdata('success'))
                {
                    ?><span style="float: left;margin-left: 150px;">
                <div class="jbm-notification jbm-success">
                                <span>
                                    <i class="fa fa-check"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('success'); ?></p>
                            </div></span>
                                    <?php }
                                ?>
                            <span style="clear: both;" class="section-tit-line-2 margin-bottom-40"></span>
                            <form method="post" action="">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group <?php if(set_value('fb_name')){ echo 'field-active';}else if(!empty($record['fb_name'])){echo 'field-active';}?>">
                                            <input type="text" name="fb_name" id="name" class="form-control" value="<?php if(isset($_POST['fb_name'])){echo set_value('fb_name');}else{echo @$record['fb_name'];} ?>">
                                            
                                            <label for="name">Full Name*</label>

                                        </div>
                                        <span class="error_msg" style="color:red;font-size:10px;"><?php
                                                if(form_error('fb_name'))
                                                {
                                                    echo form_error('fb_name');
                                                }
                                            ?></span>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="last-name" id="last-name" class="form-control">
                                            <label for="last-name">Last Name*</label>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="form-group <?php if(set_value('fb_email')){ echo 'field-active';}else if(!empty($record['fb_email'])){echo 'field-active';}?>">
                                            <input type="email" name="fb_email" id="email" class="form-control" value="<?php if(isset($_POST['fb_email'])){echo set_value('fb_email');}else{echo @$record['fb_email'];} ?>">
                                            
                                            <label for="email">Email Address*</label>

                                        </div>
                                        <span class="error_msg" style="color:red;font-size:10px;"><?php
                                                if(form_error('fb_email'))
                                                {
                                                    echo form_error('fb_email');
                                                }
                                            ?></span>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group <?php if(set_value('star')){ echo 'field-active';}else if(!empty($record['rating'])){echo 'field-active';}?>">
                                            
                                            <input id="input-21f" value="<?php if(isset($_POST['star'])){echo set_value('star');}else{echo @$record['rating'];} ?>" name="star" type="text" data-min=0 data-max=5 data-step=0.1 data-size="md" title="">
                                        </div>
                                            <span class="error_msg" style="color:red;font-size:10px;"><?php
                                                if(form_error('star'))
                                                {
                                                    echo form_error('star');
                                                }
                                            ?></span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group  <?php if(set_value('fb_message')){ echo 'field-active';}else if(!empty($record['fb_msg'])){echo 'field-active';}?>">
                                            <input type="text" name="fb_message" id="message" class="form-control margin-bottom-60" value="<?php if(isset($_POST['fb_message'])){echo set_value('fb_message');}else{echo @$record['fb_msg'];} ?>">
                                            
                                            <label for="message">Message*</label>
                                        </div>
                                        <span class="error_msg" style="color:red;font-size:10px;"><?php
                                                if(form_error('fb_message'))
                                                {
                                                    echo form_error('fb_message');
                                                }
                                            ?></span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="jbm-app-submit">
                                            <button type="submit" class="jbm-button jbm-button-3">Send Feedback</button>
                                            <span>(All fields marked with an * are mandatory)</span>
                                        </div><!--jbm-app-submit end-->
                                    </div>
                                </div>
                            </form>
                        </div><!--jbm-contact-form end-->
                    </div>
                    <div class="col-md-5">
                        <div class="jbm-contact-dt">
                            <h4>Contact Details</h4>
                            <span class="section-tit-line-2 margin-bottom-40"></span>
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <h4>121 King St, Melbourne VIC 3000, Australia</h4>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <h4>contactadmin@jobmarket.com</h4>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <h4>+ 000 123 456 7890</h4>
                                </li>
                                <li>
                                    <i class="fa fa-fax"></i>
                                    <h4>+ 000 123 456 7090 / + 000 7890 456 123</h4>
                                </li>
                            </ul>
                        </div><!--jbm-contact-dt end-->
                    </div>
                </div>
            </div><!--jbm-contact-info end-->
            <div class="jbm-ad-banner">
                <img src="assets/img/ad-ban.jpg" alt="">
            </div><!--jbm-ad-banner end-->
        </div>
    </div><!--jbm contact-us end-->
    <!-- Contact us -->
    

    <!-- start section helpbox -->
    <div class="jbm-section-helpbox main-1st-bg padding-top-75 padding-bottom-100">
        <!-- start section title -->
        <div class="jbm-section-title title-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <span class="section-tit-line"></span>
                        <h2 class="white"><span class="fw-400">Need Some</span>  Help?</h2>
                        <p>Feel free to visit our <a href="faqs.html">FAQ section</a>. You can also send us an email <a href="contact-us.html">here</a> or give us a call on (123) 123 456 7890.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section title -->
    </div>
    <!-- end section helpbox -->
    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function () {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>
<?php include('footer.php'); ?>