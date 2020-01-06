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
                                    <h4 class="card-title">SubCategory Info</h4>
                                    <br>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="text-right control-label col-form-label">Category Name</label>
                                        <div class="col-sm-8">
                                           
                                            <select value="" name="cat_name">
                                                <option value="">--Select Category--</option>
                                                <?php 
                                                if(set_value('cat_name')){
                                                    $cat_id = set_value('cat_name');
                                                }elseif(@$record['cat_id']){
                                                    $cat_id = @$record['cat_id'];
                                                }
                                                foreach($cat as $row) { ?>

                                                    <option value="<?php echo $row['cat_id']; ?>" 
                                                         <?php
                                                         if(@$cat_id==$row['cat_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['cat_name'];?></option>
                                                    <!-- 
                                                    echo '<option value="'.$row['cat_id'].'" >'.$row['cat_name'].'</option>'; -->

                                                <?php } ?>

                                                
                                            </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('cat_name'))
                                                {
                                                    echo form_error('cat_name');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="text-right control-label col-form-label">SubCategory Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="subcat_name" class="form-control" id="name" placeholder="Name Here" value="<?php if(set_value('subcat_name')){echo set_value('subcat_name');}else{echo @$record['subcat_name'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('subcat_name'))
                                                {
                                                    echo form_error('subcat_name');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top"><center>
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                        <button type="reset"  class="btn btn-danger">Reset</button>
                                    </div></center>
                                </div>
                            </form>
                        </div></div></div></div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
       <?php include('footer.php'); ?>