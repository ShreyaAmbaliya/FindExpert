<?php include('header.php');?>
<!-- employer dashboard -->
    <div class="jbm-emp-dashboard pad-xs-top-60">
        <div class="container">
            <div class="row margin-bottom-100">
                <!-- right section -->
                    <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                       <div class="jbm-company-info">
                        <br><br>
                            <h4>Profile Informations</h4>
                        <br>    <span class="section-tit-line-2 margin-bottom-40"></span>

                            
                            <div class="company-details margin-bottom-30 change-pass padding-bottom-60">
                                <!-- <h5 class="margin-bottom-60"><?php //echo $name; ?></h5> -->
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                           
                                                <div class="team-member text-center">
                                                    <img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" alt="memeber-1"  class="member-thumb">
                                                     <h3 class="text-center"><!-- <span class="fw-400"> --><?php echo $name; ?><!-- </span> -->
                                                      </h3>
                                                      <p><h5><?php echo $user; ?></h5></p>
                                                </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12"> 
                                       <!--  <div class="form-group">
                                               <h6><?php// echo $user; ?></h6>
                                        </div> -->
                                        <div class="form-group">
                                                <div class="jbm-contact-dt">
                                                   <!--  <h4>Contact Details</h4>
                                                    <span class="section-tit-line-2 margin-bottom-40"></span> -->
                                                    <ul>
                                                        <?php if(@$record['country_name']){?>
                                                        <li>
                                                            <i class="fa fa-map-marker"></i>
                                                            <h4><?php echo @$record['city_name'].' , '.@$record['state_name'].' , '.@$record['country_name']; ?></h4>
                                                        </li><?php }?>
                                                        <li>
                                                            <i class="fa fa-envelope"></i>
                                                            <h4><?php echo $record[$user.'_email']; ?></h4>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-phone"></i>
                                                            <h4><?php echo $record['mobileno']; ?></h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                                <div class="jbm-contact-dt">
                                                     <ul><?php if(@$record['gender']){?>
                                                        <li>
                                                            <p class="">
                                                                <?php echo '<big><b>Gender : </b></big>'.'<span style="color:black">'.@$record['gender'].'</span>';  ?>
                                                            </p>
                                                        </li><?php }if(@$record['skills']){?>
                                                        <li>
                                                            <p class="">
                                                                    <?php echo '<big><b>Skills : </b></big>'.'<span style="color:black">'.@$record['skills'].'</span>';  ?>
                                                            </p>
                                                        </li><?php }else if(@$record['dob']){?>
                                                             <li>
                                                            <p class="">
                                                                    <?php echo '<big><b>Date of Birth : </b></big>'.'<span style="color:black">'.@$record['dob'].'</span>';  ?>
                                                            </p>
                                                        </li>
                                                        <?php }

                                                        if(@$record['profession']){?>
                                                        <li>
                                                            <p class="">
                                                                    <?php echo '<big><b>Profession : </b></big>'.'<span style="color:black">'.@$record['profession'].'</span>';  ?>
                                                            </p>
                                                        </li><?php }else if(@$record['company']){?>
                                                            <li>
                                                            <p class="">
                                                                    <?php echo '<big><b>Company : </b></big>'.'<span style="color:black">'.@$record['company'].'</span>';  ?>
                                                            </p>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group" style="">
                                                    <?php echo  '<dd><big><b>About  </b></big></dd><dl><span style="color:black"><p>'.@$record['about'].'</span></dl>';  ?>
                                            </div>
                                    </div>
                                </div>
                                <!-- <a href="#" class="jbm-button jbm-button-3 margin-bottom-30 btn fw-500">Confirm all changes</a> -->
                            </div>
                        </div>
                    </div>
                <!-- right section -->
                <!-- Emp sidebar -->

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <center><img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="120" width="120" style="border-radius:5%"></center><br>
                    <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30">
                        <ul class="jbm-dashboard-links">
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account');?>" class="active">Profile Informations</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account/edit_profile');?>">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_account/change_password')?>">Change Password</a>
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
<!-- employer dashboard -->
<?php include('footer.php');?>