<?php include('header.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>

    <div class="main"> 
    	<div class="container-fluid col-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="row">
                    <div class="col-md-6" style="margin-left:auto;margin-right: auto;">
                        <div class="card content"  style="border-radius: 1%;">
	                         <div class="card-body">
	                                <h3 class="card-title m-b-0" ><?php echo $record['project_title']; ?></h3>

	                                <div class="col-lg-12 ml-auto text-right">
	                                	<b>Client Name: </b><?php echo $client_name['client_name']; ?>
	                                </div>
	                               <hr>
	                               <div class="col-lg-6 ml-auto text-left" style="float: left;">
		                               	<br>
		                               		<b>Creation Time: </b>
	                               <?php $date=strtotime($record['creation_time']);
				                                        echo date('d/m/Y', $date); ?>
		                               	<br><br>
		                               		<b>Bid Close: </b><?php echo $record['bid_close']; ?>
		                                <br><br>
		                                	<b>Time Duration: </b><?php echo $record['time_duration']; ?>
		                                <br><br>
	                                </div>

	                            	<div class="col-lg-6 ml-auto text-left">
	                            		<br>
	                               		<b>Minimum Budget: </b><?php echo $record['min_budget']; ?>
	                               		<br><br>
	                               		<b>Maximum Budget: </b><?php echo $record['max_budget']; ?>
	                               
	                               <br><br>
	                              
	                               		<b>Skills: &nbsp;</b><?php echo str_replace('|',' , ',$record['required_skills']); ?>
	                               </div>

	                               <br>
	                                <div class="table-responsive col-lg-12 ml-auto" style="margin-left:200px;clear:both;background-color: #EEEEEE; border-radius: 5%;height:auto">

		                           		<div class="card-body">
			                           		<h5>Description</h5>
			                           		<hr>
				                           	<div class="text-left">
				                           		<?php echo $record['project_description']; ?>
				                           	</div>
		                           		</div>
	                               </div><br><br>
	                            </div>
	                               <div class="col-lg-12 ml-auto text-center">
	                               	<?php 
                                            if($record['status']==0){
                                              ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$record['project_id'].'/1');?>"><button class="btn btn-success btn-lg">Approve</button></a>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$record['project_id'].'/2');?>"><button class="btn btn-danger btn-lg">Declined</button></a>
                                              <?php
                                            }elseif($record['status']==1){ ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$record['project_id'].'/2');?>"><button class="btn btn-danger btn-lg">Declined</button></a>
                                            <?php }elseif($record['status']==2){ ?>
                                              <a href="<?php echo site_url('admin/manage_project/change_status/'.$record['project_id'].'/1');?>"><button class="btn btn-success btn-lg">Approve</button></a>
                                            <?php } ?>
	                               </div>
	                         </div>
                        </div>
                    </div>
                </div>
            </div>
<br><br><br><br><br><br>
    	
    </div>
<?php include('footer.php'); ?>