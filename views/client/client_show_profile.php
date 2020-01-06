<?php include('header.php'); ?>
<script type="text/javascript">
        $(document).ready(function(){
            $('#country_name').change(function(){
        
                var country_id = $(this).val();
                //alert(cat_id);
     
                $.ajax({ 
                    type:"post",
                    url:"<?php echo site_url('client/manage_client/ajax_state'); ?>",
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
                    url:"<?php echo site_url('client/manage_client/ajax_city'); ?>",
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
                                        <img src="<?php echo base_url('upload/client/'.$this->session->userdata('client_img')); ?>" alt="user" class="rounded-circle" height="100" width="100"></div></center>
                                    <br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-8">
                                         <input type="text" name="client_name" class="form-control" id="name"  
                                         value="<?php 
                                         echo @$record['client_name']; ?>
                                         " readonly >
                                        </div>
                                        
                                    </div>
                                      
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="client_email" class="form-control" id="email" value="<?php
                                        echo @$record['client_email']; ?>" readonly>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Gender</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mobileno" value="<?php
                                          echo @$record['gender']; ?>"readonly>
                                            
                                            
                                            
                                        </div>
                                     </div>
                                      
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile no</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mobileno" value="<?php
                                          echo @$record['mobileno']; ?>" name="mobileno" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="company" value="<?php
                                        echo @$record['company']; ?>" name="company" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                                        <div class="col-sm-8">
                                            <input type="Date" class="form-control" id="dob" value="<?php
                                         echo @$record['dob']; ?>" name="dob" readonly>
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
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 