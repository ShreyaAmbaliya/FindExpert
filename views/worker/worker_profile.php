<?php include('header.php'); ?>
<script type="text/javascript">
        $(document).ready(function(){
            $('#country_name').change(function(){
                var country_id = $(this).val();
                //alert(cat_id);
     
                $.ajax({
                    type:"post",
                    url:"<?php echo site_url('worker/manage_worker/ajax_state'); ?>",
                    data:{country:country_id},
                    success:function(res){
                        $('#state_name').html(res);
                    }
                })
            })
        })
        $(document).ready(function(){
             $('#state_name').change(function(){
                var state_id = $(this).val();
                //alert(cat_id);
                $.ajax({
                    type:"post",
                    url:"<?php echo site_url('worker/manage_worker/ajax_city'); ?>",
                    data:{state:state_id},
                    success:function(res){
                        $('#city_name').html(res);
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
                    <div class="col-md-6" style="margin-left:auto;margin-right: auto;">
                        <div class="card content ">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body"><center>
                                    <div class="">
                                        <img src="<?php echo base_url('upload/worker/'.$this->session->userdata('worker_img')); ?>" alt="user" class="rounded-circle" height="100" width="100"></div></center>
                                    <br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-8">
                                         <input type="text" name="worker_name" class="form-control" id="name" placeholder="Name Here" 
                                         value="<?php if(isset($_POST['worker_name'])){echo set_value('worker_name');}else{echo @$record['worker_name'];} ?>" ><span style="color: red;font-size:13px;"><?php
                                                if(form_error('worker_name'))
                                                {
                                                    echo form_error('worker_name');
                                                }
                                            ?></span>
                                        </div>
                                        
                                    </div>
                                      
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="worker_email" class="form-control" id="email" value="<?php if(isset($_POST['worker_email'])){echo set_value('worker_email');}else{echo @$record['worker_email'];} ?>"  placeholder="Email Here"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('worker_email'))
                                                {
                                                    echo form_error('worker_email');
                                                }
                                            ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-8">
                                            <input type="radio" name="gender" value="male" <?php if(@$record['gender']=="male"){echo "checked";} if(set_value('gender')=='male'){echo 'checked';} ?>>Male
                                           &nbsp;&nbsp;
                                            <input type="radio" name="gender" value="female" <?php if(@$record['gender']=="female"){echo "checked";} if(set_value('gender')=='female'){echo 'checked';}?>>Female
                                            
                                            <span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('gender'))
                                                {
                                                    echo form_error('gender');
                                                }
                                            ?></span>
                                        </div>
                                     </div>
                                                                           
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile no</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mobileno" value="<?php if(isset($_POST['mobileno'])){echo set_value('mobileno');}else{echo @$record['mobileno'];} ?>" name="mobileno" placeholder="Contact number Here"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('mobileno'))
                                                {
                                                    echo form_error('mobileno');
                                                }
                                            ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="profession" value="<?php if(isset($_POST['profession'])){echo set_value('profession');}else{echo @$record['profession'];} ?>"  name="profession" placeholder="Profession Here"><span style="color: red;font-size:13px;">
                                            <?php
                                                if(form_error('profession'))
                                                {
                                                    echo form_error('profession');
                                                }
                                            ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Country Name</label>
                                        <div class="col-sm-8">
                                           
                                            <select name="country_name" id="country_name">
                                                <option value="">--Select Country--</option>
                                                <?php 
                                                if(set_value('country_name')){
                                                    $country_id = set_value('country_name');
                                                }elseif(@$record['country_id']){
                                                    $country_id = @$record['country_id'];
                                                }
                                                foreach($country as $row) { ?>

                                                    <option value="<?php echo $row['country_id']; ?>" 
                                                         <?php
                                                         if(@$country_id==$row['country_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['country_name'];?></option>

                                                <?php } ?>
                                            </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('country_name'))
                                                {
                                                    echo form_error('country_name');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                
                                    </div>
                                <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">State Name</label>
                                        <div class="col-sm-8">
                                           
                                            <select name="state_name" id="state_name">
                                                  <option value="">----State----</option>  
                                                 <?php 
                                                if(set_value('state_name')){
                                                    $state_id = set_value('state_name');
                                                }else if(@$record['state_id']){
                                                    $state_id = @$record['state_id'];
                                                }
                                                foreach($state as $row) { ?>

                                                    <option value="<?php echo $row['state_id']; ?>" 
                                                         <?php
                                                         if(@$state_id==$row['state_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['state_name'];?></option>
                                                     <?php }?>
                                            </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('state_name'))
                                                {
                                                    echo form_error('state_name');
                                                }
                                            ?>
                                            </span>  
                                        </div>
                                </div>
                <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">City Name</label>
                    <div class="col-sm-8">
                                                       
                                            <select name="city_name" id="city_name">
                                                  <option value="">----City----</option>  
                                                 <?php 
                                                if(set_value('city_name')){
                                                    $city_id = set_value('city_name');
                                                }elseif(@$record['city_id']){
                                                    $city_id = @$record['city_id'];
                                                }
                                                foreach($city as $row) { ?>

                                                    <option value="<?php echo $row['city_id']; ?>" 
                                                         <?php
                                                         if(@$city_id==$row['city_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['city_name'];?></option>
                                                     <?php }?>
                                            </select>
                                             <span style="color:red;font-size:13px;">

                                                <?php
                                                if(form_error('city_name'))
                                                {
                                                    echo form_error('city_name');
                                                }
                                            ?>
                                            </span>  
                  </div>
              </div>
                                <div class="form-group row">
                                        <label for="email1" name="file_up" class="col-sm-3 text-right control-label col-form-label">Profile Image</label>
                                        <div class="col-sm-8">  
                                            <input type="file" name="img" class="form-control" id="img">
                                            <div style="color: red;"><?php 
                                                echo @$img_err;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="form-group card-body row">
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
                                    <!-- row start -->
                                         <?php $sk=@$record['skills'];
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
                                    
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">About</label>
                                        <div class="col-sm-8">
                                          <textarea rows="3" cols="44" name="about_me"><?php echo @$record['about'];  ?></textarea>
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
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 