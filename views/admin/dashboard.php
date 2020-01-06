<?php include('header.php');?>
        <div class="page-wrapper">    
             <div class="page-breadcrumb">
                <div class="row">
                </div>
            </div>
            <div class="container-fluid">
                
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3 ">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                <h6 class="text-white">Total Clients</h6>
                                <h3 class="text-white"><?php echo $c_count; ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                <h6 class="text-white">Total Workers</h6>
                                 <h3 class="text-white"><?php echo $w_count; ?></h3>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fas fa-handshake"></i></h1>
                                <h6 class="text-white">Total Approval Project</h6>
                                 <h3 class="text-white"><?php echo $pa_count; ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fas fa-hourglass-half"></i></h1>
                                <h6 class="text-white">Total Pending Project</h6>
                                <h3 class="text-white"><?php echo $pending_count; ?></h3>
                            </div>
                        </div>
                    </div>
                   
                </div></div><br><br><br><br><br><br>
<?php include('footer.php');?>