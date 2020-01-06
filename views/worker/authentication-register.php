<!DOCTYPE html>
<html dir="ltr"> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/worker/images/favicon.png')?>">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/worker/dist/css/style.min.css')?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .div_css
        {
            width: 450px;
        }
        .error_msg
        {
            position: absolute;
            top: 50%;
            left: 102%;
            width: 60%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="div_css">
            <div class="auth-box bg-dark border-top border-secondary" style="max-width: 600px;">
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="<?php echo base_url('assets/worker/images/my_logo.png')?>" style="height:70px;width:210px"alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" action="<?php echo site_url('worker/login/register')?>" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="worker_name" aria-describedby="basic-addon1" required value="<?php if(set_value('worker_name')){echo set_value('worker_name');}else{echo @$record['worker_name'];} ?>" > <span class="error_msg" style="color:#f8f9fa;font-size:13px;"><?php
                                                if(form_error('worker_name'))
                                                {
                                                    echo form_error('worker_name');
                                                }
                                            ?></span>
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3 position-relative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" name="worker_email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required value="<?php if(set_value('worker_email')){echo set_value('worker_email');}else{echo @$record['mobile_no'];} ?>" >

                                     <span class="error_msg" style="color:#f8f9fa;font-size:13px;"><?php
                                                if(form_error('worker_email'))
                                                {
                                                    echo form_error('worker_email');
                                                }
                                            ?></span>
                                </div>
                                 <div class="input-group mb-3 position-relative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white"  id="basic-addon1"><i class=" fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="mobile_no"class="form-control form-control-lg" placeholder="Mobile Number" aria-label="Password" aria-describedby="basic-addon1" value="<?php if(set_value('mobile_no')){echo set_value('mobile_no');}else{echo @$record['mobile_no'];} ?>" > 
                                      <span  class="error_msg" style="color:#f8f9fa;font-size:13px;"><?php
                                                if(form_error('mobile_no'))
                                                {
                                                    echo form_error('mobile_no');
                                                }
                                            ?></span> 
                                </div>
                                <div class="input-group mb-3 position-relative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3 position-relative" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password"name="confirm_password" class="form-control form-control-lg" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" required >
                                    <span class="error_msg" style="color:#f8f9fa;font-size:13px;"><?php
                                                if(form_error('confirm_password'))
                                                {
                                                    echo form_error('confirm_password');
                                                }
                                            ?>
                                    </span>
                                </div>
                            </div>
                            </div>  
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">                                
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Sign Up</button>
                                        <br>
                                         <a class="btn btn-success" style="float: right;" href="<?php echo site_url('worker/login'); ?>" id="to-login" name="action">Back To Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="post" action="<?php echo site_url('worker/login/forget_password'); ?>">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="<?php echo site_url('worker/login'); ?>" id="to-login" name="action">Back To Login</a>
                                    <a href="<?php echo site_url('worker/login/forget_password'); ?>"><button class="btn btn-info float-right" type="submit"  name="action">Recover</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/worker/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/worker/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
        <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        </script>
    </body>
</html>