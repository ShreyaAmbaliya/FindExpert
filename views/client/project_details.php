<?php include('header.php'); ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-responsive">
                            <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            <div class="card-body">

                                <h5 class="card-title m-b-0">Project Details</h5>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      <th scope="col">P_Title</th>
                                      <th scope="col">Min_budget</th>
                                      <th scope="col">Max_budget</th>
                                      <th scope="col">Cre_Time</th>
                                      <th scope="col">Bid_Close</th>
                                      <th scope="col">Time_Duration</th>
                                      <!-- <th scope="col">Client_Name</th> -->
                                      <th scope="col">Re_Skill</th>
                                      <th scope="col">Category</th>
                                      <th scope="col" style="text-align:center;" >Action</th>
                                      <th scope="col">Accept</th> 
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['project_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['project_title']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['min_budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['max_budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['creation_time']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['bid_close']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['required_skills']; ?></td>
                                             <td style="vertical-align:middle;"><?php echo $value['cat_name']; ?></td>
                                            <!-- 
                                            <td style="vertical-align:middle;"><?php //echo $value['status']; ?></td>
                                            <td style="vertical-align:middle;"><?php //echo $value['client_accept']; ?></td>
                                            -->
                                            <td style="vertical-align:middle;text-align: center;">
                                            <a href="<?php echo site_url('client/manage_project/updatedata/'.$value['project_id']);?>">
                                                <i class="fas fa-edit"  style="font-size: 20px;color:gray; margin-bottom: 10px;"></i>
                                            </a>
                                                <a href="<?php echo site_url('client/manage_project/deletedata/'.$value['project_id']); ?>">
                                                    <i class="fas fa-window-close" style="font-size: 20px;color:gray;"></i>
                                                </a>
                                                </td>
                                             <td style="vertical-align:middle;text-align: center;">
                                              <a href="<?php echo site_url('client/manage_bid/bid_view/'.$value['project_id']); ?>">
                                                    Show Bid
                                                </a>
                                             </td>
                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                        
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 