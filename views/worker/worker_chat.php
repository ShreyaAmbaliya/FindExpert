<?php include('header.php'); ?>
<style type="text/css">
   .odd .chat-content
    {
        padding-right:50px;
        //margin:500px;
    }    
    .card-body .row
    {
        
        margin-left: 20px;
    }
    .image-upload > input
    {
        display: none;
    }

    .image-upload img
    {
        width: 80px;
        cursor: pointer;
    }

</style>
<script type="text/javascript">
    
    $( document ).ready(function() {
var objDiv = document.getElementById("bottom_scroll");
objDiv.scrollTop = objDiv.scrollHeight;
/*   setInterval(function() {
      var mb = $('#cont').html();
    $('#cont').html(mb)},5000
    );
  */  
});

</script>
        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('worker/manage_chat/msg_send/'.$assign['assign_id']); ?>">
  
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">

                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chat</h4>

                                <div class="chat-box scrollable" id="bottom_scroll" style="height:400px;">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                    <?php foreach($message as $value){ 
                                         if($value['w_msg']==0){

                                            if($value['attachment']!=""){?>
                                       <li class="chat-item">
                                        <div class="chat-img"><img src="<?php echo base_url('upload/client/'.$client['image_path']); ?>" alt="user"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium"><?php echo $client['client_name']; ?></h6>
                                                
                                                <div class="box bg-light-inverse"  data-toggle="modal" data-target="#myModal<?php echo $value['msg_id']; ?>">
                                                    <?php $ftype=$value['attachment'];
                                                                        $s=explode('.',$ftype);
                                                                        if($s[1]=='jpg' || $s[1]=='jpeg' || $s[1]=='png'){
                                                                     ?>
                                                                        <img src="<?php echo base_url('upload/chat/'.$value['attachment']); ?>" height="70" width="70">
                                                                    <?php } else{ ?>
                                                                        <div style="height:auto;width:auto;font-size:16px;margin:7px;">
                                                                            <span style="margin-right: 10px;"><i class="fa fa-file-alt"></i></span>
                                                                            <span class="pull-right"><?php echo $value['attachment']; ?></span>
                                                                        </div>
                                                    <?php } ?>

                                                </div>
                                                <div class="chat-time"><?php echo $value['msg_time']; ?></div>
                                                <!-- start modal -->
                                                <div id="myModal<?php echo $value['msg_id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->            
                                                        <div class="modal-content">
                                                           
                                                                  <div class="modal-header">
                                                                    <a href="<?php echo site_url('worker/manage_chat/download_files/'.$value['msg_id']); ?>">
                                                                    <big class="modal-title">Download 
                                                                    <i class="fas fa-download"></i></big>
                                                                    </a>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <center>
                                                                      <?php $ftype=$value['attachment'];
                                                                        $s=explode('.',$ftype);
                                                                        if($s[1]=='jpg' || $s[1]=='jpeg' || $s[1]=='png'){
                                                                     ?>
                                                                        <img src="<?php echo base_url('upload/chat/'.$value['attachment']); ?>" height="400" width="400">
                                                                    <?php } else{ ?>
                                                                        <div style="height:auto;width:auto;font-size:16px;margin:7px;">
                                                                            <span style="margin-right: 10px;"><i class="fa fa-file-alt"></i></span>
                                                                            <span class="pull-right"><?php echo $value['attachment']; ?></span>
                                                                        </div>
                                                    <?php } ?></center>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- end modal -->
                                                <br>
                                            </div>
                                        </li>
                                   <?php }
                                     if($value['text_msg']!=""){?>

                                        <li class="chat-item">
                                            <div class="chat-img"><img src="<?php echo base_url('upload/client/'.$client['image_path']); ?>" alt="user"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium"><?php echo $client['client_name']; ?></h6>
                                                <div class="box bg-light-info"><?php echo $value['text_msg']; ?></div>
                                            </div>
                                            <div class="chat-time"><?php echo $value['msg_time']; ?></div>
                                        </li>

                                    <?php }
                                    } else if($value['w_msg']==1){
                                       
                                        if($value['attachment']!=""){?>

                                       <li class="odd chat-item">
                                            <div class="chat-content">
                                                <h6 class="font-medium">You</h6>
                                                <div class="box bg-light-inverse"  data-toggle="modal" data-target="#myModal<?php echo $value['msg_id']; ?>">
                                                    <?php $ftype=$value['attachment'];
                                                                        $s=explode('.',$ftype);
                                                                        if($s[1]=='jpg' || $s[1]=='jpeg' || $s[1]=='png'){
                                                                     ?>
                                                                        <img src="<?php echo base_url('upload/chat/'.$value['attachment']); ?>" height="70" width="70">
                                                                    <?php } else{ ?>
                                                                        <div style="height:auto;width:auto;font-size:16px;margin:7px;">
                                                                            <span style="margin-right: 10px;"><i class="fa fa-file-alt"></i></span>
                                                                            <span class="pull-right"><?php echo $value['attachment']; ?></span>
                                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="chat-time"><?php echo $value['msg_time']; ?></div>
                                                <!-- start modal -->
                                                <div id="myModal<?php echo $value['msg_id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->            
                                                        <div class="modal-content">
                                                           
                                                                  <div class="modal-header">
                                                                    <a href="<?php echo site_url('worker/manage_chat/download_files/'.$value['msg_id']); ?>">
                                                                    <big class="modal-title">Download 
                                                                    <i class="fas fa-download"></i></big>
                                                                    </a>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <center>
                                                                      <?php $ftype=$value['attachment'];
                                                                        $s=explode('.',$ftype);
                                                                        if($s[1]=='jpg' || $s[1]=='jpeg' || $s[1]=='png'){
                                                                     ?>
                                                                        <img src="<?php echo base_url('upload/chat/'.$value['attachment']); ?>" height="400" width="400">
                                                                    <?php } else{ ?>
                                                                        <div style="height:auto;width:auto;font-size:16px;margin:7px;">
                                                                            <span style="margin-right: 10px;"><i class="fa fa-file-alt"></i></span>
                                                                            <span class="pull-right"><?php echo $value['attachment']; ?></span>
                                                                        </div>
                                                    <?php } ?></center>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- end modal -->
                                                <br>
                                            </div>
                                        </li>
                                    <?php }
                                     if($value['text_msg']!=""){ ?>
                                        <li class="odd chat-item">
                                            <div class="chat-content">
                                                <h6 class="font-medium">You</h6>
                                                <div class="box bg-light-inverse"><?php echo $value['text_msg'] ?></div>
                                                <div class="chat-time"><?php echo $value['msg_time']; ?></div>
                                                <br>
                                            </div>
                                        </li>
                                    <?php }
                                     }
                                     } ?>
                                    
                                </ul></div>
                            </div>
                            <div class="card-body border-top">
                              
                                    <div class="row">
                                        <input type="hidden" name="bid_id" value="<?php echo $assign['bid_id']; ?>">
                                        <div class="col-9">
                                            <div class="input-field m-t-0 m-b-0">
                                                <textarea name="text_msg" id="textarea1" placeholder="Type and enter" class="form-control border-0"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="image-upload">
                                                <label for="file-input" class=" btn btn-circle btn-lg float-right text-white" style="color:black;background-color: white;">
                                                    <i class="fa fa-paperclip" style="font-size: 30px;color:black;background-color: white;"></i>
                                                        </label>
                                                            <input type="file" name="attach_file" id="file-input"/>
                                            </div>
                                        </div>                
                                            <button type="submit" name="submit" value="submit" class=" btn btn-circle btn-lg btn-cyan float-right text-white" > <i class="fas fa-paper-plane" style="color:white"></i></button>
                                    </div>
                            </div>
                         
                            </div>
                        </div>
                    </div></form>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
     
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<!--              <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
  -->
                <!-- Modal content-->
 <!--               
                <div class="modal-content">
                   
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Choose File</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                             <div class="box bg-light-inverse"><img src="<?php// echo base_url('upload/chat/'.$value['attachment']); ?>" height="200" width="200"></div>
                          </div>
                          <div class="modal-footer">
                            
                          </div>
                    </div>
                
              </div>
        </div>
  -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <?php include('footer.php'); ?>