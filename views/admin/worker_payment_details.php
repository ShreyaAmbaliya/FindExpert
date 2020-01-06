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

                                <h5 class="card-title m-b-0">Project Details</h5>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      
                                      <th scope="col">client Name</th>
                                      <th scope="col">Worker Name</th>
                                      
                                      <th scope="col">Project Title</th>
                                      <th scope="col">Txn_ID</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Payment Time</th>
                                      <th scope="col">Status</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['payment_id']; ?></td>
                                             
                                            <td style="vertical-align:middle;"><?php echo $value['client_name']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['worker_name']; ?></td>
                                            
                                            <td style="vertical-align:middle;"><?php echo $value['project_title']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['txn_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['payment_amt']; ?></td>
                                            
                                            <td style="vertical-align:middle;"><?php echo $value['payment_time']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['status']; ?></td>

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