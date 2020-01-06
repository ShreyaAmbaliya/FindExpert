<?php include('header.php');?>
<form method="post">
<!-- section page  start -->
    <!-- <div class="jbm-page-title page-title-bg-2 margin-bottom-80">
        <div class="container">
             <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                        <h2><span class="fw-400">Candidate</span>
                        Dashboard</h2>
                        <p><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; > &nbsp;<a href="#">Candidate</a> 
                        &nbsp; > &nbsp;Dashboard</p>
                </div>    
            </div>
        </div>
    </div>
 -->
<!-- employer dashboard -->
    <div class="jbm-emp-dashboard pad-xs-top-60">
        
        <div class="container">
            <div class="row margin-bottom-100">
                <!-- right section -->
                    <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                        <div class="payment-history"><br><br>
                            <h4> Change Password</h4><br>
                            <span class="section-tit-line-2 margin-bottom-40"></span>
                            <?php if($this->session->flashdata('success')){ ?>
                                <div class="jbm-notification jbm-success">
                                    <span>
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <p><?php  echo @$this->session->flashdata('success'); ?></p>
                                </div>
                            <?php } ?>
                            <div class="change-pass margin-bottom-30 padding-bottom-60">

                                <h5 class="margin-bottom-40 margin-top-0">Change Password</h5>
                                 <!-- row start -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="old-pass" class="form-control">
                                            <label for="old-pass">Old Password*</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- row start -->
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="npassword" id="new-pass" class="form-control">
                                            <label for="new-pass">New Password*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="cpassword" id="confirm-pass" class="form-control">
                                            <label for="confirm-pass">Password Confirm*</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 full-wdth">     
                                        <div class="jbm-notification jbm-normal">
                                            
                        <a href="<?php echo site_url('visitor/manage_account/change_password/'.$this->session->userdata($user.'_id')); ?>"><button type="submit"  class="jbm-button jbm-button-3 btn">Confirm all changes</button></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 full-wdth text-right tct"> 
                                        <p>(All fields marked with an * are mandatory)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="change-pass margin-bottom-30 padding-bottom-60"> -->
                            <!-- <h5 class="margin-bottom-40 margin-top-0">Delete Account</h5> -->
                             <!-- row start --><!-- 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address" class="form-control">
                                        <label for="email-address">Enter Email Address*</label>
                                    </div>
                                </div>
                            </div> -->
                            <!-- row start --><!-- 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass2" class="form-control">
                                        <label for="new-pass2">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div> -->
                            <!-- row start --><!-- 
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 full-wdth">     
                                    <div class="jbm-notification jbm-normal">
                                        <span>
                                            <i class="fa fa-check"></i>
                                        </span>
                                        <p>Save Changes</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 full-wdth text-right tct"> 
                                    <p>(All fields marked with an * are mandatory)</p>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div>  
                <!-- right section -->
                <!-- Emp sidebar -->
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        
                    <center><img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="120" width="120" style="border-radius:5%"></center><br>
                        <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30">
                            <ul class="jbm-dashboard-links">
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account');?>">Profile Informations</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account/edit_profile');?>">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account/change_password');?>" class="active">Change Password</a>
                                </li><!-- 
                                <li>
                                    <a href="candidate-job-history.html">Job History</a>
                                </li>
                                <li>
                                    <a href="cv.html">CV and Cover Letter</a>
                                </li>
                                <li>
                                    <a href="candidate-account-setting.html">Account Settings</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo site_url('visitor/home/logout'); ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <!-- Emp sidebar -->
            </div>
        </div>
    </div>
<!-- employer dashboard --></form>

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
<?php include('footer.php') ?>