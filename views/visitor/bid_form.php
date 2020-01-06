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
                            <h4> Bid Details</h4><br>
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

                                <h5 class="margin-bottom-40 margin-top-0">Bid Details</h5>
                                 <!-- row start -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php if(set_value('budget')){ echo 'field-active';}elseif(!empty($record['budget'])){echo 'field-active';}?> ">
                                            <input type="text" name="budget" id="old-pass" class="form-control">
                                            <label for="old-pass">Budget*</label>
                                          <span class="error_msg" style="color:red;font-size:13px;"><p>
                                                <?php
                                                if(form_error('budget'))
                                                {
                                                    echo form_error('budget');
                                                }
                                            ?></p>
                                            </span>      
                                        </div>
                                      
                                    </div>
                                </div> 
                                <!-- row start -->
                                <div class="row"> 
                                    <div class="col-md-6"> 
                                        <div class="form-group ">
                                             <select class="jbm-s-salary jbm-select-hide-search" name="time_duration" id="jbm-s-gender">
                                            <option value="">--Select Time Duration--</option>
                                                <option value="15 days" <?php if(set_value('time_duration')==@$_POST['time_duration']){echo "selected";} ?>>15 Days</option>
                                                <option value="1 month" <?php if(set_value('time_duration')==@$_POST['time_duration']){echo "selected";}  ?>>1 Month</option>
                                                <option value="3 months" <?php if(set_value('time_duration')==@$_POST['time_duration']){echo "selected";}  ?>>3 Months</option>
                                                <option value="6 months" <?php if(set_value('time_duration')==@$_POST['time_duration']){echo "selected";}  ?>>6 Months</option>
                                                <option value="12 months" <?php if(set_value('time_duration')==@$_POST['time_duration']){echo "selected";}  ?>>12 Months</option>
                                                </select>
                                        </div>                              
                                    </div>
                                         <span class="error_msg" style="color:red;font-size:13px;"><p>
                                                <?php
                                                if(form_error('time_duration'))
                                                {
                                                    echo form_error('time_duration');
                                                }
                                            ?></p>
                                            </span>
                                </div>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php if(set_value('description')){ echo 'field-active';}elseif(!empty($record['description'])){echo 'field-active';}?> ">
                                            <textarea name="description" id="confirm-pass" class="form-control"></textarea>
                                            <label for="confirm-pass" style="color:#3992DD">Project Description*</label>
                                            
                                        </div>
                                        <span class="error_msg" style="color:red;font-size:13px;"><p>

                                                <?php
                                                if(form_error('description'))
                                                {
                                                    echo form_error('description');
                                                }
                                            ?></p>
                                            </span>  
                                    </div>
                                </div>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 full-wdth">     
                                        <div class="jbm-notification jbm-normal">
                                            
                            <a href="<?php echo site_url('visitor/manage_bid/quick_bid/'); ?>"><button type="submit"  class="jbm-button jbm-button-3 btn">Confirm all changes</button></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 full-wdth text-right tct"> 
                                        <p>(All fields marked with an * are mandatory)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <!-- right section -->
                <!-- Emp sidebar -->
                     <div class="col-md-3 col-sm-12 col-xs-12">
                    <center><img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="120" width="120" style="border-radius:5%"></center><br>
                    <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30 text-center">
                        <u>Client</u>
                        <h4 class="text-center" style="color:#3992DD"><?php echo $record['client_name']; ?></h4>
                        
                        <hr>
                        <ul class="jbm-dashboard-links text-center">
                                <li>
                                    <big><b>Project Title : </big></b>
                                    <?php echo $record['project_title']; ?>
                                </li>
                                <li>
                                    <b><big>Min-Max Budget : </big></b>
                                    <?php echo $record['min_budget'].' - '.$record['max_budget']; ?>
                                </li>
                                <li>
                                    <b><big>Skills : </big></b>
                                    <?php echo $record['required_skills']; ?>
                                </li>
                                <li>
                                    <b><big>Creation Time : </big></b>
                                    <?php echo $record['creation_time']; ?>     
                                </li>
                                <li>
                                    <b><big>Bid Close : </big></b>
                                    <?php echo $record['bid_close']; ?>     
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