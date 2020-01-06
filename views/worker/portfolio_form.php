<?php include('header.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div> 
            </div>
    <div class="main">
            <div class="container-fluid col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-8" style="margin-left:auto;margin-right:auto;">
                        <div class="card content">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <div class="card-body">
                                    <h4 class="card-title">Portfolio Info</h4>
                                    <?php
                                            if(@$record['image_path']){
                                            ?>
                                           <center> <img src="<?php echo base_url('upload/worker/portfolio/'.$record['image_path']); ?>" width="100"></center>
                                           
                                        <?php } ?>
                                    <div class="form-group card-body row">

                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                        	
                                            <input type="file" name="img" class="form-control" id="img" >

                                            <div style="color: red;"><?php 
                                                echo @$img_err;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pr_link" class="form-control" id="name" placeholder="Link Here" value="<?php if(set_value('pr_link')){echo set_value('pr_link');}else{echo @$record['pr_link'];} ?>" >
                                             <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('pr_link'))
                                                {
                                                    echo form_error('pr_link');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div> 
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="pr_description" class="form-control" id="name" rows="2" placeholder="Description Here"><?php if(set_value('pr_description')){echo set_value('pr_description');}else{echo @$record['pr_description'];} ?></textarea>
                                             <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('pr_description'))
                                                {
                                                    echo form_error('pr_description');
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
                                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                    </div></center>
                                </div>
                            </form>
                        </div></div></div></div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>