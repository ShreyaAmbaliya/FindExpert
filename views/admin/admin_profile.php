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

                                <div class="card-body"><center>
                                    <div class=""><img src="<?php echo base_url('upload/admin/'.$this->session->userdata('user_img')); ?>" alt="user" class="rounded-circle" height="100" width="100"></div></center>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                         <input type="text" name="name" class="form-control" id="name" placeholder="Name Here" 
                                         value="<?php 
                                         if(isset($_POST['name']))
                                         {
                                            echo $_POST['name'];
                                         }
                                         echo @$record['name']; ?>" ><span style="color: red;font-size:13px;"><?php
                                                if(form_error('name'))
                                                {
                                                    echo form_error('name');
                                                }
                                            ?></span>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" value="<?php
                                         if(isset($_POST['email']))
                                         {
                                            echo $_POST['email'];
                                         } echo @$record['email']; ?>" name="email" placeholder="Email Here"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('email'))
                                                {
                                                    echo form_error('email');
                                                }
                                            ?></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="email1" name="file_up" class="col-sm-3 text-right control-label col-form-label">Profile Image</label>
                                        <div class="col-sm-9">
                                            
                                            <input type="file" name="img" class="form-control" id="img">
                                            <div style="color: red;"><?php 
                                                echo @$img_err;
                                            ?>
                                            </div>
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
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 