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
                                    <h4 class="card-title">Project Info</h4>
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Project Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="project_title" class="form-control" id="name" placeholder="Project title Here" value="<?php if(set_value('project_title')){echo set_value('project_title');}else{echo @$record['project_title'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('project_title'))
                                                {
                                                    echo form_error('project_title');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Minimum Budget</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="min_budget" class="form-control" id="txtname" placeholder="Minimum Budget Here" value="<?php if(set_value('min_budget')){echo set_value('min_budget');}else{echo @$record['min_budget'];} ?>" >
                                             <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('min_budget'))
                                                {
                                                    echo form_error('min_budget');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>

                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Maximum Budget</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="max_budget" class="form-control" id="name" placeholder="Maximum Budget Here" value="<?php if(set_value('max_budget')){echo set_value('max_budget');}else{echo @$record['max_budget'];} ?>" >
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('max_budget'))
                                                {
                                                    echo form_error('max_budget');
                                                }
                                                    
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    

                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Project Description</label>
                                        <div class="col-sm-9">
                                           <textarea rows="3" cols="45" name="project_description"><?php if(set_value('project_description')){echo set_value('project_description');}else{echo @$record['project_description'];} ?></textarea>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('project_description'))
                                                {
                                                    echo form_error('project_description');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Time Duration</label>
                                        <div class="col-sm-5">
                                            <select value="" name="time_duration">
                                                <option value="">--Select Time--</option>
                                                <option value="15 days" <?php if(@$record['time_duration']=="15 days"){echo "selected";}else if(set_value('time_duration')=="15 days"){echo "selected";} ?>>15 Days</option>
                                                <option value="1 month" <?php if(@$record['time_duration']=="1 month"){echo "selected";}else if(set_value('time_duration')=="1 month"){echo "selected";}  ?>>1 Month</option>
                                                <option value="3 months" <?php if(@$record['time_duration']=="3 months"){echo "selected";}else if(set_value('time_duration')=="3 months"){echo "selected";}  ?>>3 Month</option>
                                                <option value="6 months" <?php if(@$record['time_duration']=="6 months"){echo "selected";}else if(set_value('time_duration')=="6 months"){echo "selected";}  ?>>6 Month</option>
                                                <option value="12 months" <?php if(@$record['time_duration']=="12 months"){echo "selected";}else if(set_value('time_duration')=="12 months"){echo "selected";}  ?>>12 month</option>
                                            </select>
                                             <span style="color:red;font-size:13px;">
                                                <?php
                                                if(form_error('time_duration'))
                                                {
                                                    echo form_error('time_duration');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    
                                     <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-5">
                                                <select value="" name="cat_name">
                                                <option value="">-----Select Category-----</option>
                                                <?php 
                                                if(set_value('cat_name')){
                                                    $cat_id = set_value('cat_name');
                                                }elseif(@$record['cat_id']){
                                                    $cat_id = @$record['cat_id'];
                                                }
                                                foreach($cat as $row) { ?>

                                                    <option value="<?php echo $row['cat_id']; ?>" 
                                                         <?php
                                                         if(@$cat_id==$row['cat_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['cat_name'];?></option>
                                                    <!-- 
                                                    echo '<option value="'.$row['cat_id'].'" >'.$row['cat_name'].'</option>'; -->

                                                <?php } ?>

                                                
                                            </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('cat_name'))
                                                {
                                                    echo form_error('cat_name');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div>
                                    

                                   <!--  <div class="form-group card-body row">
                                        <label for="fname"  style="vertical-align: top;" class="col-sm-3 text-right control-label col-form-label">Required Skills</label>
                                        <div class="col-sm-9">
                                            <?php foreach($skills as $row) {?>
                                                <input type="checkbox" name="required_skills[]" value="<?php echo $row['skill_name']; ?>"
                                                    <?php if(@in_array($row['skill_name'],$required_skills))
                                                    {
                                                        echo 'checked';
                                                    }
                                                    ?>>&nbsp;<?php echo $row['skill_name']; ?>&nbsp;&nbsp;
                                            <?php } ?>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('required_skills[]'))
                                                {
                                                    echo form_error('required_skills[]');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                    </div> -->
                                    <?php $sk=@$record['required_skills'];
                                    $arr=explode('|',$sk);
                                    $i=0;
                                 ?>
                                <div class="form-group row">
                                    <label  for="fname" class="col-sm-3 text-right control-label col-form-label">Skills</label>
                                    <div class="col-md-9">
                                        <select  name="required_skills[]" id="required_skills" class="select2 form-control m-t-15" multiple="multiple" style="height: 100%;width: 100%;">
                                           
                                            <option disabled="true" value="">----Skills----</option>
                                            <?php foreach($skills as $row) {?>
                                                <option value="<?php echo $row['skill_name']; ?>" 
                                                         <?php
                                                         if(@$arr[$i]==$row['skill_name']){
                                                            echo "selected='true'";
                                                             $i=$i+1; 
                                                         } ?> >
                                                         <?php  echo $row['skill_name'];?></option>    
                                            <?php } ?>
                                        </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('required_skills[]'))
                                                {
                                                    echo form_error('required_skills[]');
                                                }
                                            ?>
                                            </span>  
                                        </select>
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
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
       <?php include('footer.php'); ?>