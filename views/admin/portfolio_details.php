<?php include('header.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
    <div class="main">
            <div class="container-fluid col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12" style="margin-left:auto;margin-right: auto;">
                        <div class="card content">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <div class="card-body table-responsive">
                                    <h4 class="card-title">Worker Info</h4>
                                    <br>
                                    <!-- accoridan part -->
                                    <div class="accordion" id="accordionExample">
                                       
                                        <div class="card m-b-0">
                                            <div class="card-header" id="headingOne">
                                              <h5 class="mb-0">
                                                <a  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                                    <span>Portfolio</span>
                                                </a>
                                              </h5>
                                            </div>
                                            
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                                <div class="card-body table-responsive">
                                                   <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      
                                      <th scope="col">Image</th>
                                      <th scope="col">Link</th>
                                      
                                      <th scope="col">Description</th>
                                      <th scope="col" style="text-align:center;">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($precords as $value) { ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['portfolio_id']; ?></td>
                                             <td style="vertical-align:middle;"><img src="<?php echo base_url('upload/worker/portfolio/'.$value['image_path']);?>" height="80" width="80"></td>
                                            <td style="vertical-align:middle;"><?php echo $value['pr_link']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['pr_description']; ?></td>
                                            <td style="vertical-align:middle;text-align:center;">
                                            
                                                            <?php 
                                                            if($value['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$value['portfolio_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$value['portfolio_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$value['portfolio_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($value['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$value['portfolio_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                                </td>
                                            </tr>
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table><!-- <center>
                                            <?php 
                                                $qry=$this->db->get_where('portfolio',array('worker_id'=>$wrecord['worker_id']));
                                                $rs=$qry->num_rows();
                                                if($rs!=0){
                                            ?>
                                                    <div style="float: left;">
                                                        <img src="<?php echo base_url('upload/worker/portfolio/'.@$precord['image_path']);?>" height="100" width="100"></center>
                                                    </div>

                                                    <div style="float: left;margin-left: 10px;">
                                                        <div><big><b>Description : </b></big><?php echo @$precord['pr_description']; ?></div>
                                                        <br>
                                                        <div><big><b>Link : </b></big><?php echo @$precord['pr_link']; ?></div>    
                                                    </div>
                                                    <center>
                                                        <br><br><br><br><br>
                                                    <div style="clear: both;">
                                                        
                                                            <?php 
                                                            if($precord['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$precord['portfolio_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$precord['portfolio_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($precord['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$precord['portfolio_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($precord['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/portfolio_change_status/'.$precord['portfolio_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                                        </div>
                                                    <br><br><br><br>
                                            <?php }else { echo '<h4>No Records</h4>'; } ?></center> -->
                                                </div>
                                          
                                            </div>

                                        </div>
                                    
                                        <div class="card m-b-0 border-top">
                                            <div class="card-header" id="headingTwo">
                                              <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                                    <span>Education</span>
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                              <div class="card-body table-responsive">
                                                 <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      
                                      <th scope="col">Degree</th>
                                      <th scope="col">University</th>
                                      
                                      <th scope="col">Start - End Year</th>
                                      <th scope="col" style="text-align:center;" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($edrecords as $value) { ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['education_id']; ?></td>
                                             <td style="vertical-align:middle;"><?php echo $value['degree']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['university']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['start_year'].' - '.$value['end_year']; ?></td>
                                            <td style="vertical-align:middle;text-align:center;">
                                                 <?php 
                                                            if($value['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$value['education_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$value['education_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$value['education_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($value['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$value['education_id'].'/1');?>"  class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                            </td>
                                            <?php 
                                            }
                                            ?>
                                  </tbody>
                            </table>
                                               <!--  <?php 
                                                $qry=$this->db->get_where('education',array('worker_id'=>$wrecord['worker_id']));
                                                $rs=$qry->num_rows();
                                                if($rs!=0){
                                            ?>
                                                        <div class="text-left" style="margin-left: 80px">
                                                            <div><big><b>Degree : </b></big><?php echo @$edrecord['degree']; ?></div><br>
                                                            <div><big><b>University : </b></big><?php echo @$edrecord['university']; ?></div><br>
                                                            <div><big><b>Start-End Year : </b></big><?php echo @$edrecord['start_year'].' - '.@$edrecord['end_year']; ?> </div>
                                                        </div> 
                                                    <center>
                                                        <br><br><br>
                                                        <div style="clear: both;">
                                                            <?php 
                                                            if($edrecord['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$edrecord['education_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$edrecord['education_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($edrecord['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$edrecord['education_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($edrecord['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/education_change_status/'.$edrecord['education_id'].'/1');?>"  class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                                        </div></center>
                                                    <br><br>
                                                    <?php }else { echo '<center><h4>No Records</h4></center>'; } ?> -->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="card m-b-0 border-top">
                                            <div class="card-header" id="headingThree">
                                              <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                                    <span>Experience</span>
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                              <div class="card-body table-responsive">
                                                <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      
                                      <th scope="col">Position</th>
                                      <th scope="col">Company</th>
                                      
                                      <th scope="col">Year</th>
                                      <th scope="col">Summary</th>

                                      <th scope="col" style="text-align:center;" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($exrecords as $value) { ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['experience_id']; ?></td>
                                             <td style="vertical-align:middle;"><?php echo $value['position']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['company']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['year']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['summary']; ?></td>
                                             <td style="vertical-align:middle;text-align:center;">
                                            <?php 
                                                            if($value['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$value['experience_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$value['experience_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$value['experience_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($value['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$value['experience_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                          </tr>

                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                                              <!-- 
                                                <?php 
                                                $qry=$this->db->get_where('experience',array('worker_id'=>$wrecord['worker_id']));
                                                $rs=$qry->num_rows();
                                                if($rs!=0){
                                            ?>
                                                <div class="text-left" style="margin-left: 80px">
                                                            <div><big><b>Position : </b></big><?php echo @$exrecord['position']; ?></div><br>
                                                            <div><big><b>Company : </b></big><?php echo @$exrecord['company']; ?></div><br>
                                                            <div><big><b>Years of Experience : </b></big><?php echo @$exrecord['year'];?></div><br>
                                                            <div><big><b>Summary : </b></big><?php echo @$exrecord['summary'];?></div>
                                                        </div> 
                                                    <center>
                                                        <br><br><br>
                                                        <div style="clear: both;">
                                                            <?php 
                                                            if($edrecord['status']==0){
                                                              ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$exrecord['experience_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$exrecord['experience_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                              <?php
                                                            }else if($edrecord['status']==1){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$exrecord['experience_id'].'/2');?>" class="btn btn-danger btn-md">Declined</a>
                                                            <?php }else if($edrecord['status']==2){ ?>
                                                              <a href="<?php echo site_url('admin/manage_portfolio/experience_change_status/'.$exrecord['experience_id'].'/1');?>" class="btn btn-success btn-md">Approve</a>
                                                            <?php } ?>
                                                        </div></center>
                                                    <br><br>
                                                <?php }else { echo '<center><h4>No Records</h4></center>'; } ?> -->
                                              </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                               <!--  <div class="border-top"><center>
                                    <div class="card-body table-responsive">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                        <button type="reset"  class="btn btn-danger">Reset</button>
                                    </div></center>
                                </div> -->
                            </form>
                        </div></div></div></div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
       <?php include('footer.php'); ?>