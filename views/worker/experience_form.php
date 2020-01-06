<?php include('header.php'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#cat_name').change(function(){
                var cat_id = $(this).val();
                //alert(cat_id);
                $.ajax({
                    type:"post",
                    url:"<?php echo site_url('admin/manage_skill/ajax_subcat'); ?>",
                    data:{category:cat_id},
                    success:function(res){
                        $('#subcat_name').html(res);
                    }
                })
            })
        })
    </script>
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
                                    <h4 class="card-title">Experience Info</h4>
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">position</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="position" class="form-control" id="name" placeholder="position Here" value="<?php if(set_value('position')){echo set_value('position');}else{echo @$record['position'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('position'))
                                                {
                                                    echo form_error('position');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    
                                  
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company" class="form-control" id="name" placeholder="Company Name Here" value="<?php if(set_value('company')){echo set_value('company');}else{echo @$record['company'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('company'))
                                                {
                                                    echo form_error('company');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    

                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Year</label>
                                        <div class="col-sm-9">
                                            <input type="number" max="10" min="1" name="year" class="form-control" id="name" placeholder="Year Here" value="<?php if(set_value('year')){echo set_value('year');}else{echo @$record['year'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('year'))
                                                {
                                                    echo form_error('year');
                                                }
                                                    
                                            ?>
                                            </span>  
                                        </div>
                                    </div>

                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">summary</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-9">
                                           <textarea rows="3" cols="45" name="summary"><?php echo @$record['summary']; ?></textarea>
                                             <span style="color:red;font-size:13px;">

                                            </span>  
                                        </div> <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('summary'))
                                                {
                                                    echo form_error('summary');
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