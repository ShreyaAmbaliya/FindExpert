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
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"> <b>Name : </b></label>
                                        <div class="col-sm-9">
                                         <input type="text" name="name" class="form-control" id="name" 
                                         value="<?php 
                                         
                                         echo @$record['name']; ?>" readonly >
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label"><b>Email : </b></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" value="<?php
                                        echo @$record['email']; ?>" name="email" readonly>
                                        </div>
                                    </div>
                                    <br>
                                   
                                </div>
                               
                               
                            </form>
                        </div>
                    </div>
                </div>
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 