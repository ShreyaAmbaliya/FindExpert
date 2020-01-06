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
                        <div class="card content ">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <div class="card-body">
                                    <h4 class="card-title">Blog Info</h4> 
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                         <input type="text" name="title" class="form-control" id="title" placeholder="Title Here" 
                                        value="<?php if(set_value('title')){echo set_value('title');}else{echo @$record['title'];} ?>" ><span style="color: red;font-size:13px;"><?php
                                                if(form_error('title'))
                                                {
                                                    echo form_error('title');
                                                }
                                            ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" name="file_up" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <?php
                                            if(@$record['image_path']){
                                            ?>
                                            <img src="<?php echo base_url('upload/admin/'.$record['image_path']); ?>" width="70">
                                        <?php } ?>
                                        
                                            <input type="file" name="img" class="form-control" id="img" >
                                            <div style="color: red;"><?php 
                                                echo @$img_err;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea  class="form-control" id="description"  name="description" placeholder="Description Here"><?php if(set_value('description')){echo set_value('description');}else{echo @$record['description'];} ?></textarea><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('description'))
                                                {
                                                    echo form_error('description');
                                                }
                                            ?></span>
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
                        </div>
                    </div>
                </div>
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>