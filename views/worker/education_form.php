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
                                    <h4 class="card-title">Education Info</h4>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Degree</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="degree" class="form-control" id="name" placeholder="Degree Here" value="<?php if(set_value('degree')){echo set_value('degree');}else{echo @$record['degree'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('degree'))
                                                {
                                                    echo form_error('degree');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">University</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="university" class="form-control" id="name" placeholder="University Name Here" value="<?php if(set_value('university')){echo set_value('university');}else{echo @$record['university'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('university'))
                                                {
                                                    echo form_error('university');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Start Year</label>
                                        <div class="col-sm-9">
                                            <input type="number" max="9999" min="999" name="start_year" class="form-control" id="name" placeholder="Start year Here" value="<?php if(set_value('start_year')){echo set_value('start_year');}else{echo @$record['start_year'];} ?>" >
                                            <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('start_year'))
                                                {
                                                    echo form_error('start_year');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">End Year</label>
                                        <div class="col-sm-9">
                                            <input type="number" max="9999" min="999" name="end_year" class="form-control" id="name" placeholder="End year Here" value="<?php if(set_value('end_year')){echo set_value('end_year');}else{echo @$record['end_year'];} ?>" >
                                             <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('end_year'))
                                                {
                                                    echo form_error('end_year');
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
                        <br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>