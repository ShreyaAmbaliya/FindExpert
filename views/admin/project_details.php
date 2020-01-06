<?php include('header.php'); ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
            <div class="container-fluid col-12 col-sm-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-responsive">
                            <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            <div class="card-body">

                                <h5 class="card-title m-b-0"><?php echo $client['client_name']."'s "; ?>Project Details</h5>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      <th scope="col">Project<br>Title</th>
                                      <th scope="col">Min<br>budget</th>
                                      <th scope="col">Max<br>budget</th>
                                      <th scope="col">Time<br>Duration</th>
                                      <th scope="col">Required<br>Skill</th>

                                      <th scope="col">Category</th>
                                      <th scope="col">Status</th>
                                      <th scope="col"></th>
                                    <!--   <th scope="col">Status</th>-->
                                      
                                      <!-- <th scope="col" style="text-align:center;" >Action</th>
                                      <th scope="col">Accept</th>  -->
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
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['required_skills']; ?></td>
                                            
                                            <td style="vertical-align:middle;"><?php echo $value['cat_name']; ?></td>
                                            <td style="vertical-align:middle;"><?php 
                                            if($value['status']==0){
                                              ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$value['project_id'].'/1');?>"><button class="btn btn-success btn-sm">Approve</button></a>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$value['project_id'].'/2');?>"><button class="btn btn-danger btn-sm">Declined</button></a>
                                              <?php
                                            }elseif($value['status']==1){ ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$value['project_id'].'/2');?>"><button class="btn btn-danger btn-sm">Declined</button></a>
                                            <?php }elseif($value['status']==2){ ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$value['project_id'].'/1');?>"><button class="btn btn-success btn-sm">Approve</button></a>
                                            <?php } ?></td>
                                            
                                            <td style="vertical-align:middle;"><a href="<?php echo site_url('admin/manage_project/view_details/'.$value['project_id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="More Details">More Details</a></td>
                                            <!-- 
                                            <td style="vertical-align:middle;"><?php //echo $value['status']; ?></td>
                                            <td style="vertical-align:middle;"><?php //echo $value['client_accept']; ?></td>
                                           
-->
                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                          <!-- <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">Records
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate">
                                        <?php echo $pagination;?>
                                    </div>
                                </div>
                             </div>
                        </div> -->
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 