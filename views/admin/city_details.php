<?php include('header.php'); ?>
<style type="text/css">
    
</style>
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

                                <h5 class="card-title m-b-0">City Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">City Name</th>
                                      <th scope="col">State Name</th>
                                      <th scope="col"  style="text-align:center;" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <th  style="vertical-align:middle;"scope="row"><?php echo $value['city_id']; ?></th>
                                            <td style="vertical-align:middle;"><?php echo $value['city_name']; ?></td>
                                             <td style="vertical-align:middle;"><?php echo $value['state_name']; ?></td>
                                            <td style="vertical-align:middle;text-align:center;">
                                            <a href="<?php echo site_url('admin/manage_city/updatedata/'.$value['city_id']);?>"  data-toggle="tooltip" data-placement="top" title data-original-title="Update">
                                                <i class="fas fa-edit"  style="font-size: 20px;color:gray;"></i>
                                            </a>
                                            </td>

                                            <td style="vertical-align:middle;text-align:center;">
                                                <a href="<?php echo site_url('admin/manage_city/deletedata/'.$value['city_id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
                                                    <i class="fas fa-window-close" style="font-size: 20px;color:gray;"></i>
                                                </a>
                                                </td>
                                            
                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                             <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
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
                        </div>
                        </div>
        </div></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>