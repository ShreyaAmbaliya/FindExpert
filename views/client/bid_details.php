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
                            <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            <div class="card-body">

                                <h5 class="card-title m-b-0">Bid Details of <?php echo $record['project_title']; ?></h5>
                            </div>
                            <table class="table">
                                 <thead>
                                    <tr>
                                      <th>#</th>
                                      <th scope="col">Worker Name</th>
                                      <th scope="col">Budget</th>
                                      <th scope="col">Time Duration</th>
                                      <!-- <th scope="col">Description</th> -->
                                      <th scope="col">Creation Time</th>
                                      <th scope="col">Portfolio</th>
                                      <th scope="col">Accept/Decline</th>
                                      <th scope="col">Worker Approval</th>
                                      
                                      <th scope="col">Payment</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($bids as $value) {
                                          
                                          
                                          $this->db->where('bid_id',$value['bid_id']);
                                          $qry=$this->db->get('project_assignment');
                                          $result=$qry->row_array();
                                          //print_r($result);die;
                                          
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['bid_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['worker_name']; ?></td>

                                            <td style="vertical-align:middle;"><?php echo $value['budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                           <!--  <td style="vertical-align:middle;"><?php// echo $value['description']; ?></td> -->
                                             <td style="vertical-align:middle;"><?php echo $value['creation_time']; ?></td>
                                             <td style="vertical-align:middle;"><a href="<?php echo site_url('client/manage_portfolio/view_portfolio/'.$value['worker_id']); ?>">Portfolio</a></td>
                                            <td style="vertical-align:middle;" scope="row">
                                                   <?php if($value['status']==0){?>
                                                        <a href="<?php echo site_url('client/manage_bid/change_status/'.$value['bid_id'].'/1'); ?>" class="btn btn-success btn-sm">
                                                          Approve</a>
                                                          <?php
                                                        } ?>

                                                        <?php if($value['status']==0){?>
                                                          <a href="<?php echo site_url('client/manage_bid/change_status/'.$value['bid_id'].'/2'); ?>" class="btn btn-danger btn-sm">
                                                        Decline</a>
                                                       <?php } else if($value['status']==1){
                                                        echo '<span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i> Approved </span>';
                                                         }else if($value['status']==2){ 
                                                            echo '<span style="color:red"><i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Declined  </span>';
                                                        } ?>
                                              </td>

                                              <td style="vertical-align:middle;" scope="row">
                                                <?php if($value['worker_accept']==1){?>

                                                        <span style="color:green"> <i class="fa fa-check-circle" style="font-size:15px;color:green"></i>  <!-- <i class="fa fa-check-circle" style="font-size:15px;color:green"></i>  --> <a href=" <?php echo site_url('client/manage_chat/view_chat/'.$value['bid_id']);?>" >Chat</a> </span>
                                                <?php }else if($value['worker_accept']==2){
                                                  echo '<span style="color:red"> <i class="fa fa-times-circle" style="font-size:15px;color:red"></i> Denied </span>';
                                                }else if($value['status']==1 && $value['worker_accept']==0){
                                                   echo '<span style="color:orange"> <i class="fa fa-check-circle" style="font-size:15px;color:orange"></i> In Process </span>';
                                                }else { echo ''; } ?>
                                              </td>
                                              <td style="vertical-align:middle;" scope="row">
                                                <?php if($value['worker_accept']==1){ if($result['payment_status']==0){?>
                                                        <span style="color:green"> <a href=" <?php echo site_url('client/manage_payment/index/'.$value['bid_id']);?>" class="btn btn-outline-success">Payment</a> </span>
                                                <?php }else if($result['payment_status']==1){?>
                                                  <span style="color:red"> <a href="#" class="btn btn-info">Paid</a> </span>
                                                <?php } }else{
                                                  echo '';
                                                }?>
                                              </td>
                                            </tr>
                                        <?php 
                                        }
                                        ?>
                                  </tbody>
                            </table>
                        
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?> 