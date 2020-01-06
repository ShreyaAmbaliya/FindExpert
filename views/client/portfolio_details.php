<?php include('header.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
    <div class="main">
            <div class="container-fluid col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6" style="margin-left:auto;margin-right: auto;">
                        <div class="card content">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <div class="card-body">
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

                                                <div class="card-body"><center>
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
                                                    <br><br><br><br>
                                            <?php }else { echo '<h4>No Records</h4>'; } ?></center>
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
                                              <div class="card-body">
                                                <?php 
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
                                                        </center>
                                                    <br><br>
                                                    <?php }else { echo '<center><h4>No Records</h4></center>'; } ?>
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
                                              <div class="card-body">
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
                                                        </center>
                                                    <br><br>
                                                <?php }else { echo '<center><h4>No Records</h4></center>'; } ?>
                                              </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                               <!--  <div class="border-top"><center>
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                        <button type="reset"  class="btn btn-danger">Reset</button>
                                    </div></center>
                                </div> -->
                            </form>
                        </div></div></div></div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
       <?php include('footer.php'); ?>