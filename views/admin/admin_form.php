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
                                    <h4 class="card-title">Admin Info</h4> 
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                         <input type="text" name="name" class="form-control" id="name" placeholder="Name Here" 
                                        value="<?php if(set_value('name')){echo set_value('name');}else{echo @$record['name'];} ?>" ><span style="color: red;font-size:13px;"><?php
                                                if(form_error('name'))
                                                {
                                                    echo form_error('name');
                                                }
                                            ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" value="<?php if(set_value('email')){echo set_value('email');}else{echo @$record['email'];} ?>" name="email" placeholder="Email Here"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('email'))
                                                {
                                                    echo form_error('email');
                                                }
                                            ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password Here" value="<?php echo @$record['password']; ?>">
                                            <span style="color: red;font-size:13px;"><?php
                                                if(form_error('password'))
                                                {
                                                    echo form_error('password');
                                                }
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" name="file_up" class="col-sm-3 text-right control-label col-form-label">Profile Image</label>
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
    </div> 
<?php include('footer.php'); ?>