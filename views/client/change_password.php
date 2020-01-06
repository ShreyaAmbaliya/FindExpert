<?php  include('header.php'); ?>
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
                                <div class="card-body"><center>
                                    <div class=""><img src="<?php echo base_url('upload/client/'.$this->session->userdata('user_img')); ?>" alt="user" class="rounded-circle" height="100" width="100"></div></center>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Current Password</label>
                                        <div class="col-sm-8">
                                         <input type="password" name="password" class="form-control" id="password" placeholder="Current Password" value="<?php
                                         if(isset($_POST['password']))
                                         {
                                            echo $_POST['password'];
                                         } echo @$record['password']; ?>" >
                                        <span style="color: red;font-size:13px;"><?php
                                                
                                                    echo @$err;
                                                
                                            ?></span>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="email" value="<?php
                                         if(isset($_POST['npassword']))
                                         {
                                            echo $_POST['npassword'];
                                         } echo @$record['npassword']; ?>"  name="npassword" placeholder="New Password">
                                         <span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('npassword'))
                                                {
                                                    echo form_error('npassword');
                                                }
                                            ?>
                                        </span>
                                        </div>
                                    </div>
                                    <br>
                                 
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-right control-label col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="email" value="<?php
                                         if(isset($_POST['cpassword']))
                                         {
                                            echo $_POST['cpassword'];
                                         } echo @$record['cpassword']; ?>"  name="cpassword" placeholder="Confirm Password"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('cpassword'))
                                                {
                                                    echo form_error('cpassword');
                                                }
                                            ?></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>