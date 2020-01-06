<?php include('header.php');?>

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
          color:red;
        }
    </style>


<script type="text/javascript">
        $(document).ready(function(){
            $('#country_name').change(function(){
                var country_id = $(this).val();
               //alert(country_id);
     
                $.ajax({
                    type:"post",
                    url:"<?php echo site_url('visitor/manage_account/ajax_state'); ?>",
                    data:{country:country_id},
                    success:function(res){
                        $('#state_name').html(res);
                    }
                })
            })
        })
        $(document).ready(function(){
             $('#state_name').change(function(){
                var state_id = $(this).val();
                //alert(cat_id);
                $.ajax({
                    type:"post",
                    url:"<?php echo site_url('visitor/manage_account/ajax_city'); ?>",
                    data:{state:state_id},
                    success:function(res){
                        $('#city_name').html(res);
                    }
                })
            })
        })
    </script>

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
<form method="post" enctype="multipart/form-data">
    <div class="jbm-emp-dashboard pad-xs-top-60">
        <div class="container">
            <div class="row margin-bottom-100">
                <!-- right section -->
                    <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                        <div class="payment-history"><br><br>
                            <h4>Worker Account Settings</h4><br>
                            <span class="section-tit-line-2 margin-bottom-40"></span>

                            <div class="company-details margin-bottom-30 change-pass padding-bottom-60">
                                <h5 class="margin-bottom-60">Company Details</h5>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group <?php if(set_value('worker_name')){ echo 'field-active';}elseif(!empty($record['worker_name'])){echo 'field-active';}?>">
                                            <input type="text" name="worker_name" id="first-name" class="form-control"value="<?php if(isset($_POST['worker_name'])){echo set_value('worker_name');}else{echo @$record['worker_name'];} ?>" placeholder="Enter Name"> 
                                    <span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('worker_name'))
                                                {
                                                    echo form_error('worker_name');
                                                }
                                            ?></span>
                                            <label for="first-name"> Username*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group <?php if(set_value('worker_email')){ echo 'field-active';}elseif(!empty($record['worker_email'])){echo 'field-active';}?>">
                                            <input type="email" name="worker_email" id="last-name2"  class="form-control" value="<?php if(isset($_POST['worker_email'])){echo set_value('worker_email');}else{echo @$record['worker_email'];} ?>"  placeholder="Email Here"><span class="error_msg" style="color:red;font-size:13px;">         
                                          <?php if(form_error('worker_email'))
                                                {
                                                    echo form_error('worker_email');
                                                }
                                            ?></span>
                                            <label for="last-name2">Email*</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group <?php if(set_value('gender')){ echo 'field-active';}elseif(!empty($record['gender'])){echo 'field-active';}?> jbm-select-2">
                                            <select class="jbm-s-salary jbm-select-hide-search" name="gender" id="jbm-s-gender">
                                                <option value="">Gender*</option>
                                                <option value="male" <?php if(@$record['gender']=='male'){echo 'selected';} ?>>Male</option>
                                                <option value="female"<?php if(@$record['gender']=='female'){echo 'selected';} ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group <?php if(set_value('mobileno')){ echo 'field-active';}elseif(!empty($record['mobileno'])){echo 'field-active';}?>">
                                              <input type="text" name="mobileno" id="last-name2"  class="form-control" placeholder="Enter Mobile No." value="<?php if(isset($_POST['mobileno'])){echo set_value('mobileno');}else{echo @$record['mobileno'];} ?>" ><span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('mobileno'))
                                                {
                                                    echo form_error('mobileno');
                                                }
                                            ?></span>
                                            <label for="last-name2">Mobile number*</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group <?php if(set_value('country_name')){ echo 'field-active';}?> jbm-select-2">
                                            <select class="jbm-s-salary jbm-select-hide-search" name="country_name" id="country_name">
                                                   <option value="" >--Select Country--</option>
                                                <?php 
                                                if(set_value('country_name')){
                                                    $country_id = set_value('country_name');
                                                }elseif(@$record['country_id']){
                                                    $country_id = @$record['country_id'];
                                                }
                                                foreach($country as $row) { ?>

                                                    <option value="<?php echo $row['country_id']; ?>" 
                                                         <?php
                                                         if(@$country_id==$row['country_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['country_name'];?></option>

                                                <?php } ?>
                                            </select>
                                             <span class="error_msg" style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('country_name'))
                                                {
                                                    echo form_error('country_name');
                                                }
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group  <?php if(set_value('state_name')){ echo 'field-active';}?> jbm-select-2">
                                            <select class="jbm-s-salary jbm-select-hide-search"name="state_name" id="state_name">
                                            <option value="">----State----</option>  
                                                 <?php 
                                                if(set_value('state_name')){
                                                    $state_id = set_value('state_name');
                                                }else if(@$record['state_id']){
                                                    $state_id = @$record['state_id'];
                                                }
                                                foreach($state as $row) { ?>

                                                    <option value="<?php echo $row['state_id']; ?>" 
                                                         <?php
                                                         if(@$state_id==$row['state_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['state_name'];?></option>
                                                     <?php }?>
                                                      </select>
                                                      <span class="error_msg" style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('state_name'))
                                                {
                                                    echo form_error('state_name');
                                                }
                                            ?>
                                            </span>

                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <div class="row">
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group <?php if(set_value('city_name')){ echo 'field-active';}?> jbm-select-2">
                                            <select class="jbm-s-salary jbm-select-hide-search"name="city_name" id="city_name" >
                                                 <option value="">----City----</option>  
                                                 <?php 
                                                if(set_value('city_name')){
                                                    $city_id = set_value('city_name');
                                                }elseif(@$record['city_id']){
                                                    $city_id = @$record['city_id'];
                                                }
                                                foreach($city as $row) { ?>

                                                    <option value="<?php echo $row['city_id']; ?>" 
                                                         <?php
                                                         if(@$city_id==$row['city_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['city_name'];?></option>
                                                     <?php }?>
                                            </select>
                                            <span class="error_msg" style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('city_name'))
                                                {
                                                    echo form_error('city_name');
                                                }
                                            ?>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <div class="form-group <?php if(set_value('profession')){ echo 'field-active';}elseif(!empty($record['profession'])){echo 'field-active';}?>">
                                        
                                            <input type="text" name="profession" id="last-name"  class="form-control" value="<?php if(isset($_POST['profession'])){echo set_value('profession');}else{echo @$record['profession'];} ?>" placeholder="Enter Profession" ><span class="error_msg" style="color:red;font-size:13px;"><?php
                                                if(form_error('profession'))
                                                {
                                                    echo form_error('profession');
                                                }
                                            ?></span>
                                            <label for="last-name2">Profession*</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <input type="file" name="img" id="img" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- row start -->
                                <?php $sk=@$record['skills'];
                                    $arr=explode('|',$sk);
                                    $i=0;
                                 ?>
                                <div class="row">
                                    <div class="form-group"> 
                                         <select class="jbm-s-salary ms jbm-select-hide-search"  name="required_skills[]" id="required_skills" multiple="multiple">
                                            <option disabled="true" value="" selected="true">----Skills----</option>
                                            <?php foreach($skills as $row) {?>
                                                <option value="<?php echo $row['skill_name']; ?>" 
                                                         <?php
                                                         if(@$arr[$i]==$row['skill_name']){
                                                            echo "selected='true'";
                                                             $i=$i+1; 
                                                         } ?> >
                                                         <?php  echo $row['skill_name'];?></option>    
                                            <?php } ?>
                                        </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('required_skills[]'))
                                                {
                                                    echo form_error('required_skills[]');
                                                }
                                            ?>
                                            </span>  

                                    </div>
                                </div>
                                 <div class="form-group <?php if(set_value('about')){ echo 'field-active';}elseif(!empty($record['about'])){echo 'field-active';}?>">
                                    <textarea class="margin-bottom-60 form-control" rows="2" cols="10" name="about_me"> <?php echo @$record['about'];  ?></textarea>
                                    <label style="color:#3992DD">About*</label>
                                </div>
                                 <a href="<?php echo site_url('visitor/manage_account/edit_profile/'.$this->session->userdata($user.'_id')); ?>"><button type="submit"  class="jbm-button jbm-button-3 btn">Confirm all changes</button></a>
                       
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
                                    <a href="<?php echo site_url('visitor/manage_account/edit_profile');?>" class="active">Edit Profile</a>
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
    </div></form>
<!-- employer dashboard -->

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