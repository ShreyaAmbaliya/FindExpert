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

                                <h5 class="card-title m-b-0">Woker Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Profile Image</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <!-- <th scope="col">Password</th> -->
                                      <th scope="col">Mobile Number</th>
                                      <th scope="col">Portfolio</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                              <input type="hidden" value="<?php echo $value['worker_id']; ?>" name="wid">
                                                <td style="vertical-align:middle;" scope="row"><?php echo $value['worker_id'];?></td>
                                                  <td style="vertical-align:middle;"><img src="<?php echo base_url('upload/worker/'.$value['image_path']);?>" height="80" width="80"></td>
                                                <td style="vertical-align:middle;"><?php echo $value['worker_name']; ?></td>
                                                <td style="vertical-align:middle;"><?php echo $value['worker_email']; ?></td>
                                                
                                                <td style="vertical-align:middle;"><?php echo $value['mobileno']; ?></td>
                                                <td style="vertical-align:middle;">  
                                                  <a href="<?php echo site_url('admin/manage_portfolio/view_portfolio/'.$value['worker_id']);?>">Portfolio</a>
                                                </td>
                                                <td style="vertical-align:middle;"><?php 
                                            if($value['status']==0){
                                              ?>
                                             <a href="<?php echo site_url('admin/manage_worker/change_status/'.$value['worker_id'].'/1');?>">
                                              <button class="btn btn-danger btn-sm">Block</button></a>
                                              <a href="<?php echo site_url('admin/manage_worker/change_status/'.$value['worker_id'].'/1');?>">
                                              <button class="btn btn-info btn-sm">Unblock</button></a>
                                             
                                              <?php
                                            }elseif($value['status']==2){ ?>

                                             <a href="<?php echo site_url('admin/manage_worker/change_status/'.$value['worker_id'].'/1');?>">
                                              <button class="btn btn-info btn-sm">Unblock</button></a>
                                            <?php }elseif($value['status']==1){ ?>

                                             <a href="<?php echo site_url('admin/manage_worker/change_status/'.$value['worker_id'].'/2');?>">
                                              <button class="btn btn-danger btn-sm">Block</button></a>
                                            <?php }?></td>
                                            </tr>
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate">
                                        <?php echo $pagination;?>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 