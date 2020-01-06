<?php include('header.php'); ?>
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
    </style>
<!-- start  -->
      <div class="container">    
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-5 jbm-login-side">  
                                <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                <span class="section-tit-line"></span>
                                <h3 class="margin-bottom-60">Register</h3>
                                <ul>
                                    <li>
                                        <a href="#">Already have an account? </a>
                                    </li>
                                    <li>
                                        <a href="#">Login Here</a>
                                    </li>
                                </ul>

                                <ul class="jbm-social-icons">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                        </div>

                        <div class="col-md-7 jbm-form regis">
                            <ul class="jbm-login-form padding-top-30">
                                <li class="candidate <?php if(!isset($cur) || @$cur =="worker") {echo 'selected';}?>" data-tab="tab1">
                                    <a href="#">Worker</a>
                                </li>
                                <li class="employer <?php if(@$cur =="client") {echo 'selected';}?>" data-tab="tab2">
                                    <a href="#">Client</a>
                                </li>
                            </ul>
                             <form method="post" action="<?php echo site_url('visitor/login/register_worker'); ?>">
<input type="hidden" name="cur_tab" value="worker">
                            <div class="jbm-field  <?php if(!isset($cur) || @$cur=='worker'){echo 'current';}?> margin-top-60 register" id="tab1">
                                <!-- success msg -->
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('worker_name')){ echo 'field-active';}?>">
                                        <input type="text" name="worker_name" id="name" class="form-control" value="<?php if(set_value('worker_name')){echo set_value('worker_name');}else{echo @$record['worker_name'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('worker_name'))
                                                {
                                                    echo form_error('worker_name');
                                                }
                                            ?></span>
                                        <label for="name">Username*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('mobile_no')){ echo 'field-active';}?>">
                                        <input type="text" name="mobile_no" id="last-name" class="form-control" value="<?php if(set_value('mobile_no')){echo set_value('mobile_no');}else{echo @$record['mobile_no'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('mobile_no'))
                                                {
                                                    echo form_error('mobile_no');
                                                }
                                            ?></span>
                                        <label for="last-name">Mobile Number*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('worker_email')){ echo 'field-active';}?>">
                                        <input type="text" name="worker_email" id="email-address2" class="form-control" value="<?php if(set_value('worker_email')){echo set_value('worker_email');}else{echo @$record['worker_email'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('worker_email'))
                                                {
                                                    echo form_error('worker_email');
                                                }
                                            ?></span>
                                        <label for="email-address2">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="password" id="new-pass3" class="form-control">
                                        <label for="new-pass3">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm_password" id="confirm-pass2" class="form-control">
                                         <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('confirm_password'))
                                                {
                                                    echo form_error('confirm_password');
                                                }
                                            ?>
                                    </span>
                                        <label for="confirm-pass2">Password Confirm*</label>
                                    </div>
                                </div> 
                                <img class="margin-top-10" src="assets/img/register-img.jpg" alt="">
                                <div class="jbm-cand-register">
                                   
                                   <input type="submit" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20" value="Register">
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c5" name="cc">
                                    <label for="c5"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                        </form>
                         <form method="post" action="<?php echo site_url('visitor/login/register_client'); ?>">
                        <input type="hidden" name="cur_tab" value="client">
                            <div class="jbm-field <?php if(@$cur=='client'){echo 'current';}?> login-style margin-top-60 margin-top-60 register" id="tab2">
                               <!-- success_client -->
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('client_name')){ echo 'field-active';}?>">
                                        <input type="text" name="client_name" id="com-name" class="form-control" value="<?php if(set_value('client_name')){echo set_value('client_name');}else{echo @$record['client_name'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('client_name'))
                                                {
                                                    echo form_error('client_name');
                                                }
                                            ?></span>
                                        <label for="com-name">Username*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('cmobile_no')){ echo 'field-active';}?>">
                                        <input type="text" name="cmobile_no" id="address" class="form-control" value="<?php if(set_value('cmobile_no')){echo set_value('cmobile_no');}else{echo @$record['mobile_no'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('cmobile_no'))
                                                {
                                                    echo form_error('cmobile_no');
                                                }
                                            ?></span>
                                        <label for="address">Mobile number*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?php if(set_value('client_email')){ echo 'field-active';}?>">
                                        <input type="text" name="client_email" id="email-address3" class="form-control" value="<?php if(set_value('client_email')){echo set_value('client_email');}else{echo @$record['client_email'];} ?>" > 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('client_email'))
                                                {
                                                    echo form_error('client_email');
                                                }
                                            ?></span>
                                        <label for="email-address3">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="text" name="password" id="new-pass4" class="form-control"> 
                                        <label for="new-pass4">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="cconfirm_password" id="confirm-pass3" class="form-control">
                                        <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('cconfirm_password'))
                                                {
                                                    echo form_error('cconfirm_password');
                                                }
                                            ?>
                                    </span>
                                        <label for="confirm-pass3">Password Confirm*</label>
                                    </div>
                                </div> 
                                <img class="margin-top-10" src="assets/img/register-img.jpg" alt="">
                                <div class="jbm-cand-register">
                                   
                                   <input type="submit" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20" value="Register">
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c6" name="cc">
                                    <label for="c6"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="close-btn">
                            <i class="fa fa-close"></i>
                        </div> -->
                    </div></div></form>
        </div>
    </div><!--jbm-can-register-popup end-->

<!-- end -->

     <footer>
        <div class="footer-widget-container padding-top-115 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-text">
                            <img src="<?php echo base_url('assets/visitor/img/my_logo.png')?>" style="height:70px;width:210px" alt="footer-logo" class="img-responsive margin-bottom-30" />
                            <p>
                                JobMarket is a platform that has been designed to help both employers and candidates achieve success. We have more than 20 years of experience and we are growing stronger each and every day.
                                <a href="#">Read More..</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">need help?</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="how-it-works.html">How it Works</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="faqs.html">FAQ</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="terms-and-conditions.html">Terms & Conditions</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="contact-us.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Useful Links</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="404.html">404 Error</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="pricing-plans.html">Pricing Plans</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="career-jobmarket.html">Career at JobMarket</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="sitemap.html">Sitemap</a>
                                </li>
                            </ul>
                    </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="widget last-widget">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Subscribe to our Newsletter</h6>
                            <div class="widget-subscribe">
                                <div class="form-group subsribe-email">
                                    <label for="subs-email" class="subs-email-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 14 14" xml:space="preserve" ><g><g><path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986 c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z" fill="#c4c4c4"/><path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8 L13.684,2.271z" fill="#c4c4c4"/><polygon points="0,2.878 0,11.186 4.833,7.079 " fill="#c4c4c4"/><polygon points="9.167,7.079 14,11.186 14,2.875 " fill="#c4c4c4"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </label>
                                    <input type="email" name="bs-suemail" id="subs-email" class="form-control" placeholder="Enter your email address" />
                                </div>
                                <div class="form-group <?php if(set_value('email')){ echo 'field-active';}?>">
                                   <input type="submit" class="jbm-button jbm-button-3" id="subscribe-btn" name="subscribe-btn" value="Subscribe">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-bar main-2nd-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 hidden-xs hidden-sm text-left">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-2 text-center back-top">
                        <a href="#" class="back-top-button">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="#" class="back-top-link">Back to Top</a>
                    </div>
                    <div class="col-md-5 text-right">
                        <ul class="list-none jbm-social-icon-1 ">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 hidden-md hidden-lg text-center">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="jbm-overlay jbm-2nd-bg"></div>
    <!-- Scripts -->
   <script src="<?php echo base_url('assets/visitor/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/visitor/js/counter.js')?>"></script>
    <script src="<?php echo base_url('assets/visitor/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/slick/slick.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/select2/js/select2.full.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/js/custom.js')?>" type="text/javascript"></script>

</body>


<!-- Mirrored from demo.diothemes.com/html/jobmarket/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 13:28:21 GMT -->
</html>
