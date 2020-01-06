  <?php include('header.php'); ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                   
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-responsive">
                           
                            <div class="card-body">

                                <h5 class="card-title m-b-0">Bid Details</h5>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      <th scope="col" style="vertical-align: middle" style="vertical-align: middle">Budget</th>
                                      <th scope="col" style="vertical-align: middle">Time<br>duration</th>
                                      <th scope="col" style="vertical-align: middle">Description<br></th>
                                      <th scope="col" style="vertical-align: middle">Creation<br>time</th>
                                      <th scope="col" style="vertical-align: middle">Project<br>title</th>
                                      <th scope="col" style="vertical-align: middle">Client</th>
                                      <th scope="col" style="vertical-align: middle">Accept/Decline</th>
                                      <th scope="col" style="vertical-align: middle"></th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($bids as $value) {
                                            $this->db->join('client','client.client_id=project.client_id');
                                            $this->db->where('project.project_id',$value['project_id']);
                                            $qry=$this->db->get('project');
                                            $client=$qry->row_array();
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['bid_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['description']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['creation_time']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['project_title']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $client['client_name']; ?></td>
                                            <td style="vertical-align:middle;" scope="row">

                                           <!-- start -->
                                                  <?php if($value['status']==0){
                                                          echo '<span style="color:orange"> <i class="fa fa-check-circle" style="font-size:15px;color:orange"></i> In Process </span>';
                                                        } else if($value['status']==1){
                                                        if($value['worker_accept']==1){ echo '<span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i> Approved </span>';}else if($value['worker_accept']==2){ echo '<span style="color:red"><i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Declined </span>';}else{
                                                        ?>
                                                        <a href="<?php echo site_url('worker/manage_project/worker_accept/'.$value['bid_id'].'/1'); ?>" class="btn btn-success btn-sm" style="float: left;margin-left: 7px;margin-top: 5px">
                                                          Accept</a>
                                                          
                                                          <a href="<?php echo site_url('worker/manage_project/worker_accept/'.$value['bid_id'].'/2'); ?>" class="btn btn-danger btn-sm" style="margin-left:7px;margin-top:5px">
                                                        Decline</a>
                                                        <?php }
                                                      /*  echo '<span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i> Approved </span>';*/
                                                         }else if($value['status']==2){ 

                                                            echo '<span style="color:red"><i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Declined by client </span>';
                                                        } ?>

                                                  <!-- end -->

                                              </td>
                                            <td style="vertical-align:middle;" scope="row">
                                                <?php if($value['worker_accept']==1){ ?>
                                                        <span style="color:green"> <!-- <i class="fa fa-check-circle" style="font-size:15px;color:green"></i>  --> <a href=" <?php echo site_url('worker/manage_chat/view_chat/'.$value['bid_id']);?>" >Chat</a> </span>
                                                <?php }else if($value['worker_accept']==2){
                                                  echo '<span style="color:red"> <i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Denied </span>';
                                                } else { ?>
                                                    <!-- <span style="color:orange"> <i class="fa fa-check-circle" style="font-size:15px;color:orange"></i> In process </span> -->
                                                <?php } ?>
                                              </td>
                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                        
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 