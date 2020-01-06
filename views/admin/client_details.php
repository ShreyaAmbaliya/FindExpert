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

                                <h5 class="card-title m-b-0">Client Details</h5>
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
                                      <th scope="col">Project</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>

                                                <td style="vertical-align:middle;" scope="row"><?php echo $value['client_id'];?></td>
                                                  <td style="vertical-align:middle;"><img src="<?php echo base_url('upload/client/'.$value['image_path']);?>" height="80" width="80"></td>
                                                <td style="vertical-align:middle;"><?php echo $value['client_name']; ?></td>
                                                <td style="vertical-align:middle;"><?php echo $value['client_email']; ?></td>
                                               
                                                <td style="vertical-align:middle;"><?php echo $value['mobileno']; ?></td>
                                                <td style="vertical-align:middle;"><a href="<?php echo site_url('admin/manage_project/viewdata/'.$value['client_id']);?>"   data-toggle="tooltip" data-placement="top" title data-original-title="Project Details">Project</a></td>       
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
            </div><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 