<?php include('header.php'); ?>
<style>
    .btn
    {
        height:40px;
        font-size:14px;
    }
</style>
<!-- employer dashboard -->
<form method="post">
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
                               <h5>All Bids</h5>
                                <div class="table-responsive">
                                <?php foreach($bids as $row) { ?>
                                    <!-- start -->
                                    <div class="jbm-job-loop-in">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <div style="float: left;" class=" col-lg-5 jbm-job-price text-left"><h5>
                                                	<?php echo $row['project_title']; ?></h5>
                                                </div>
                                                 
                                                <div class="col-lg-6" style="float: right;;">
                                                	<!-- start -->
                                                	<?php if($row['status']==0){
                                                          echo '<span style="color:orange"> <i class="fa fa-check-circle" style="font-size:15px;color:orange"></i> In Process </span>';
                                                        } else if($row['status']==1){
                                                       	if($row['worker_accept']==1){ echo '<span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i> Approved </span>';}else if($row['worker_accept']==2){ echo '<span style="color:red"><i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Declined </span>';}else{
                                                       	?>
                                                       	<a href="<?php echo site_url('visitor/manage_bid/worker_accept/'.$row['bid_id'].'/1'); ?>" class="btn btn-success btn-sm" style="float: left;">
                                                          Approve</a>
                                                          &nbsp;&nbsp;
                                                          <a href="<?php echo site_url('visitor/manage_bid/worker_accept/'.$row['bid_id'].'/2'); ?>" class="btn btn-danger btn-sm">
                                                        Decline</a>
                                                       	<?php }
                                                      /*  echo '<span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i> Approved </span>';*/
                                                         }else if($row['status']==2){ 

                                                            echo '<span style="color:red"><i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Declined by client </span>';
                                                        } ?>

                                                	<!-- end -->
                                                </div>
                                            </div>
                                        </div><hr>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3 col-xs-4 text-center">
                                                <div class="jbm-job-price">
                                                    <h6>Client</h6>
                                                     <a href="<?php echo site_url('visitor/manage_worker/show_client/'.$row['client_id']); ?>"><big><?php echo $row['client_name']; ?></big></a>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 col-sm-3 col-xs-4 text-center">
                                                <div class="jbm-job-price">
                                                    <h6>Budget</h6>
                                                    <span><?php echo $row['budget']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
                                                <div class="jbm-job-timing">
                                                    <h6>Time Duration</h6>
                                                    <span><?php echo $row['time_duration']; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-xs-12">
                                                <div class="jbm-job-links text-center">
                                                      
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-xs-12">
                                                <div class="jbm-job-links text-center">
                                                        
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <hr>
                                            <div class="col-md-2 col-sm-3 col-xs-4 text-center">
                                                <div class="jbm-job-link">
                                                    <br>
                                                    <big><b>Description : </b></big>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-8 col-xs-7 text-left">
                                                <div class="jbm-job-link">
                                                    <br>
                                                    <?php echo $row['description']; ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
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
                                <h5 class="text-center">Projects</h5>
                                    <hr>
                            </li>
                            <?php foreach($bids as $row) { ?>
                                <li>
                                    <a href="<?php echo site_url('visitor/manage_bid/project_bid/'.$row['project_id']); ?>"><?php echo $row['project_title']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- Emp sidebar -->
            </div>
        </div>
    </div></form>
<!-- employer dashboard -->
<?php include('footer.php'); ?>