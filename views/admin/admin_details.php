<?php include('header.php'); ?>
<style type="text/css">
.container-fluid
{
    position: relative;
    min-height: 100vh;
}
footer
{
    position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem; 
}
</style>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card  table-responsive">
                            <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            <div class="card-body">

                                <h5 class="card-title m-b-0">Admin Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Password</th>
                                      <th scope="col">Profile Image</th>
                                      <th scope="col" style="text-align:center;" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['name']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['email']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['password']; ?></td>
                                            <td style="vertical-align:middle;"><img src="<?php echo base_url('upload/admin/'.$value['image_path']);?>" height="80" width="80"></td>
                                            <td style="vertical-align:middle;text-align:center;">
                                            <a href="<?php echo site_url('admin/manage_admin/updatedata/'.$value['id']);?>" data-toggle="tooltip" data-placement="top" title data-original-title="Update">
                                                <i class="fas fa-edit"  style="font-size: 20px;color:gray;"></i>
                                            </a>
                                            </td>
                                            <td style="vertical-align:middle;">
                                                <a href="<?php echo site_url('admin/manage_admin/deletedata/'.$value['id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
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
                </div>
            </div>
<?php include('footer.php'); ?> 