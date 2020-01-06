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
                                         <input type="text" name="worker_name" class="form-control" id="name" readonly
                                         value="<?php echo @$record['worker_name']; ?>" >
                                        </div>
                                        
                                    </div>
                                      
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="worker_email" class="form-control" id="email" value="<?php echo @$record['worker_email']; ?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-8">
                                            <input type="text"  class="form-control" id="email" name="gender" value="<?php echo @$record['gender']; ?>" readonly>
                                        </div>
                                     </div>
                                                                           
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile no</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mobileno" value="<?php echo @$record['mobileno']; ?>" name="mobileno" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="profession" value="<?php echo @$record['profession']; ?>"  name="profession" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Country Name</label>
                                        <div class="col-sm-8">
                                           
                                            <?php foreach($country as $row) {
                                           if($record['country_id']==$row['country_id']) 
                                            @$st= $row['country_name'];
                                        }?>
                                            <input type="text" class="form-control" id="dob" value="<?php
                                         echo @$st; ?>" name="dob" readonly>
                                        </div>
                                
                                    </div>
                                <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">State Name</label>
                                        <div class="col-sm-8">
                                           
                                             <?php foreach(@$state as $row) {
                                           if($record['state_id']==$row['state_id']) 
                                            @$st= $row['state_name'];
                                        }?>
                                            <input type="text" class="form-control" id="dob" value="<?php
                                         echo @$st; ?>" name="dob" readonly>
                                        </div>
                                </div>
                <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">City Name</label>
                    <div class="col-sm-8">
                                                       
                                           <?php foreach($city as $row) {
                                           if($record['city_id']==$row['city_id']) 
                                            @$st= $row['city_name'];
                                        }?>
                                            <input type="text" class="form-control" id="dob" value="<?php
                                         echo @$st; ?>" name="dob" readonly>
                          </div>
                      </div>
                               
                                <div class="form-group row">
                                    <label  for="fname" class="col-sm-3 text-right control-label col-form-label">Skills</label>
                                    <div class="col-md-8">
                                       <input type="text" name="" class="form-control" id="skill" value="<?php echo @$record['skills'];?>" readonly>
                                    </div>
                                </div>                                
                                    
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">About</label>
                                        <div class="col-sm-8">
                                          <textarea rows="3" cols="44" name="about_me" readonly><?php echo @$record['about'];  ?></textarea>
                                          </div>
                                        </div>

                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 