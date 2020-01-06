<?php include('header.php'); ?>
<script>
$(document).ready(function(){
 function load_data(query)
 {
  $.ajax({
   url:"<?php echo site_url(); ?>/worker/manage_project/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
 // alert(search);
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
       <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-responsive">
                            <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            <div class="card-body text-right">

                                <div class="card-title text-left m-b-0" style="font-size: 20px;float: left;">
                                  <b>Project Details</b></div>
                                <span class="pull-right text-right">
                                <label>
                                  Search:
                                  <input type="text" name="search_text" id="search_text" class="form-control form-control-sm" placeholder aria-controls="zero-config">
                                </label>
                              </span>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">P_Title</th>
                                      <th scope="col">Min_budget</th>
                                      <th scope="col">Max_budget</th>
                                      <!-- <th scope="col">Pro_des</th> -->
                                      <th scope="col">Cre_Time</th>
                                      <th scope="col">Bid_Close</th>
                                      <th scope="col">Time_Duration</th>
                                      
                                      <!-- <th scope="col">Client_Name</th> -->
                                      <th scope="col">Re_Skill</th>
                                      
                                      <th scope="col">Category</th>

                                    <!--   <th scope="col">Status</th>-->
                                      
                                     
                                      <th scope="col">Accept</th> 
                                    </tr>
                                  </thead>
                                  <tbody id="result">
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['project_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['project_title']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['min_budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['max_budget']; ?></td>
                                            <!-- 
                                             <td style="vertical-align:middle;"><?php// echo $value['project_description']; ?></td> -->
                                            <td style="vertical-align:middle;"><?php echo $value['creation_time']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['bid_close']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['required_skills']; ?></td>

                                            <td style="vertical-align:middle;"><?php echo $value['cat_name']; ?></td>

                                            <!-- 
                                            <td style="vertical-align:middle;"><?php //echo $value['status']; ?></td>
                                            <td style="vertical-align:middle;"><?php //echo $value['client_accept']; ?></td>
                                           
-->
                                           
                                            
                                            <td style="vertical-align:middle;"><a href="<?php echo site_url('worker/manage_project/view_details/'.$value['project_id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="More Details">More Details</a></td>

                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                         <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate">
                                        <?php echo $pagination;?>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 