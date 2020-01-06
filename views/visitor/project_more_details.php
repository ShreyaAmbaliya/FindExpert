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
                                
                                <h5 class="margin-bottom-40 margin-top-0">Project : <?php echo $records['project_title']; ?></h5>
                                <!-- row start -->
                               

                               <div class="row">
                                
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                   
                                <div class="form-group">Minimum Budget :<?php echo $records['min_budget']; ?></div>
                                
                                </div> <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="form-group">Maximum Budget: <?php echo $records['max_budget']; ?></div>
                                
                                </div>
                               </div>

                               <div class="row">
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="form-group">Creation Time : <?php echo $records['creation_time']; ?></div>
                                
                                </div> <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="form-group">Time Duration : <?php echo $records['time_duration']; ?></div>
                                
                                </div>
                               </div>

                               <div class="row">
                                <div class="col-md-5 col-sm-6 col-xs-12">

                                    <div class="form-group">Skills : <?php echo $records['required_skills']; ?>
                                    </div>
                                    <div class="form-group">Description : <?php echo $records['project_description']; ?>
                                    </div>
                                </div> 
                                    
                                </div>
                                <?php if($rows){?>
                                     <label class="jbm-button jbm-button-3"><b>Already Bidded</b></label>
                                     <?php
                                }else{ ?>
                                 <a href="<?php echo site_url('visitor/manage_bid/quick_bid/'.$records['project_id']); ?>"><button type="submit"  class="jbm-button jbm-button-3 btn"><b>BID</b></button></a>
                                <?php } ?>
                               <hr>
                                <!-- <a href="#" class="jbm-button jbm-button-3 margin-bottom-30 btn fw-500">Confirm all changes</a> -->
                            </div>
                        </div>
                    </div>
                <!-- right section -->
                <!-- Emp sidebar -->

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <center><img src="<?php echo base_url('upload/'.$user.'/'.$path); ?>" height="120" width="120" style="border-radius:5%"></center><br>
                    <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30 text-center">
                        <ul class="jbm-dashboard-links">
                                <li>
                                    <b><big>Client Name : </big></b>
                                    <?php echo $records['client_name']; ?>     
                                </li>
                                <li>
                                    <b><big>Email : </big></b>
                                    <?php echo $records['client_email']; ?>     
                                </li>
                                <li>
                                    <b><big>Company : </big></b>
                                    <?php echo $records['company']; ?>     
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