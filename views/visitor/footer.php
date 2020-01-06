<footer>
        <div class="footer-widget-container padding-top-115 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-text">
                            <img src="<?php echo base_url('assets/visitor/img/mylogo1.png')?>" alt="footer-logo" style="height:60px;width:210px"  class="img-responsive margin-bottom-30" />
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
                                <?php if($this->session->userdata('client_id') || $this->session->userdata('worker_id')){ ?>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?php echo site_url('visitor/manage_feedback'); ?>">Feedback</a>
                                </li>
                            <?php } ?>
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
                                <div class="form-group">
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

    <!-- Spinner -->
     <div class="jbm-spinner">
        <div class="spinner-content">
            <div class="loader-circle"></div>
            <div class="loader-line-mask">
                <div class="loader-line"></div>
            </div>
        </div>
    </div>
     <!-- Spinner end here -->


    <div class="apply-job-popup">
        <div class="popup-overlay"></div>
        <!-- Candidate popup -->
        <div class="popup">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-5 jbm-login-side applyy">  
                                <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                <span class="section-tit-line"></span>
                                <h3 class="margin-bottom-60">Apply for Job</h3>
                                <ul class="new-signup">
                                    <li>
                                        <a href="#">New User? </a>
                                    </li>
                                    <li>
                                        <a href="#">Sign Up</a>
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
                        <div class="col-md-7 jbm-form">
                            <div class="jbm-field margin-top-20 register">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name4" class="form-control">
                                        <label for="name4">First Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="last-name" id="last-name4" class="form-control">
                                        <label for="last-name4">Last Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address4" class="form-control">
                                        <label for="email-address4">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="number" id="number4" class="form-control">
                                        <label for="number4">Phone Number*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <textarea name="message" id="number5" class="form-control"></textarea>
                                        <label for="number5">Message*</label>
                                    </div>
                                </div> 
                                <div class="g-recaptcha" data-sitekey="6LdcpCoUAAAAAH7ei-XX2bHUWul6Ppl5wYm1Y7Ne"></div>
                                <a href="#" class="jbm-button jbm-button-3 jbm-hover margin-bottom-15   ">Apply for Job</a>
                                <div class="terms">
                                    <input type="checkbox" id="c1" name="cc">
                                    <label for="c1"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                        </div>
                        <div class="close-btn">
                            <i class="fa fa-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Candidate popup -->
    </div><!--apply job popup end-->

    <div class="jbm-login-popup">
        <div class="popup-overlay"></div>
        <div class="container">
            <div class="popup">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-5 jbm-login-side">  
                                    <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                    <span class="section-tit-line"></span>
                                    <h3 class="margin-bottom-60">Login</h3>
                                    <ul>
                                        <li>
                                            <a href="#">Not yet registered? </a>
                                        </li>
                                        <li>
                                            <a href="#">Register Here</a>
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
                            <div class="col-md-7 jbm-form">
                                <ul class="jbm-login-form padding-top-40">
                                    <li class="candidate selected">
                                        <a href="#">Worker</a>
                                    </li>
                                    <li  class="employer">
                                        <a href="#">CLient</a>
                                    </li>
                                </ul>
                                <div class="jbm-field login-style margin-top-60">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="email-address" id="email-address" class="form-control">
                                            <label for="email-address">Email Address*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="new-pass" id="new-pass2" class="form-control">
                                            <label for="new-pass2">Enter Password*</label>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('visitor/login'); ?>" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20">Login</a>
                                    <div class="row margin-bottom-40">
                                        <div class="col-md-7">
                                           <div class="terms style3">
                                                <input type="checkbox" id="c4" name="cc">
                                                <label for="c4"><span></span></label>
                                                <small>Keep me logged in</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="#" class="forgot">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-30">
                                        <div class="col-md-5 or">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="jbm-or">
                                                <span class="or">OR</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 or">
                                        </div>
                                    </div>

                                    <div class="jbm-social-icons-2 style3">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="close-btn">
                                <i class="fa fa-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--jbm-login-popup end-->

    <div class="jbm-can-register-popup">    
        <div class="popup-overlay"></div>
        <div class="popup">
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
                                <li class="candidate selected" data-tab="tab1">
                                    <a href="#">Worker</a>
                                </li>
                                <li class="employer" data-tab="tab2">
                                    <a href="#">Client</a>
                                </li>
                            </ul>
                            <div class="jbm-field current margin-top-60 register" id="tab1">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control">
                                        <label for="name">First Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="last-name" id="last-name" class="form-control">
                                        <label for="last-name">Last Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address2" class="form-control">
                                        <label for="email-address2">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass3" class="form-control">
                                        <label for="new-pass3">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm-pass" id="confirm-pass2" class="form-control">
                                        <label for="confirm-pass2">Password Confirm*</label>
                                    </div>
                                </div> 
                                <img class="margin-top-10" src="assets/img/register-img.jpg" alt="">
                                <div class="jbm-cand-register">
                                    <a href="#" class="jbm-button jbm-button-3 jbm-hover">Register</a>
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c5" name="cc">
                                    <label for="c5"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                            <div class="jbm-field margin-top-60 register" id="tab2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="com-name" id="com-name" class="form-control">
                                        <label for="com-name">Company Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control">
                                        <label for="address">Company Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address3" class="form-control">
                                        <label for="email-address3">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass4" class="form-control">
                                        <label for="new-pass4">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm-pass" id="confirm-pass3" class="form-control">
                                        <label for="confirm-pass3">Password Confirm*</label>
                                    </div>
                                </div> 
                                <img class="margin-top-10" src="assets/img/register-img.jpg" alt="">
                                <div class="jbm-cand-register">
                                    <a href="#" class="jbm-button jbm-button-3 jbm-hover">Register</a>
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c6" name="cc">
                                    <label for="c6"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                        </div>
                        <div class="close-btn">
                            <i class="fa fa-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--jbm-can-register-popup end-->


    <div class="jbm-overlay jbm-2nd-bg"></div>
    <!-- Scripts -->
  
    <script type="text/javascript" src="<?php echo base_url('assets/visitor/js/counter.js')?>"></script>
    <script src="<?php echo base_url('assets/visitor/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/slick/slick.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/select2/js/select2.full.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/js/custom.js')?>" type="text/javascript"></script>

</body>


<!-- Mirrored from demo.diothemes.com/html/jobmarket/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 13:28:21 GMT -->
</html>
