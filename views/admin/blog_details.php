<?php include('header.php'); ?>

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

                                <h5 class="card-title m-b-0">Blog Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Title</th>
                                       <th scope="col">Image</th>
                                      <th scope="col">Description</th>
                                      
                                      <th scope="col" style="text-align:center;" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($records as $value) {
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['blog_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['title']; ?></td>
                                            <td style="vertical-align:middle;"><img src="<?php echo base_url('upload/admin/blog/'.$value['image_path']);?>" height="80" width="80"></td>
                                             <td style="vertical-align:middle;"><?php echo $value['description']; ?></td>
                                            <td style="vertical-align:middle;text-align:center;">
                                            <a href="<?php echo site_url('admin/manage_blog/updatedata/'.$value['blog_id']);?>" data-toggle="tooltip" data-placement="top" title data-original-title="Update">
                                                <i class="fas fa-edit"  style="font-size: 20px;color:gray;"></i>
                                            </a>
                                            </td>
                                            <td style="vertical-align:middle;">
                                                <a href="<?php echo site_url('admin/manage_blog/deletedata/'.$value['blog_id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
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