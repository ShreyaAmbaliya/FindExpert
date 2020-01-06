<?php  if(!$this->session->userdata('worker_id'))
        {
            redirect('worker/login/index');
        }
        ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="<?php echo base_url('assets/worker/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/worker/dist/css/style.min.css')?>" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/worker/css/dataTables.bootstrap4.css')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/worker/images/favicon.png')?>">
    <title>FindExpert - The Ultimate Multipurpose Client template</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/worker/libs/flot/css/float-chart.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/worker/dist/css/style.min.css')?>" rel="stylesheet">
    
    <script src="<?php echo base_url('assets/worker/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
        <div class="">
            <div class="page-breadcrumb">
                <div class="row">

                </div>
            </div>

    <div class="main">
    	<div class="container-fluid col-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="row">
                    <div class="col-md-5" style="margin-left:auto;margin-right:auto;">

                        <div class="card content"  style="border-radius: 1%;">

	                               <div class="card-body ">
			                           		<center><img src="<?php echo base_url('upload/worker/'.$records['image_path']); ?>" style="border-radius: 10%;" alt="user" height="110" width="110"></center>
			                           		<hr><center>
				                          		<b>Worker Name: </b><?php echo $records['worker_name'];?>
				                          	<hr>
				                   		<b>Worker Email: </b><?php echo $records['worker_email']; ?>
	                                       <hr>
		                               	<b>Mobile No: </b><?php echo $records['mobileno']; ?><hr>
		                               	<?php if(@$records['gender']){?>
										<?php echo '<b>Gender: </b>'.@$records['gender'].'<hr>'; }?>
		                               
		                               	<?php if(@$records['profession']){?>
										<?php echo '<b>Profession: </b>'.@$records['profession'].'<hr>'; }?>
	                              
	                               		<?php if(@$records['skills']){ echo '<b>Skills: &nbsp;</b>'.$records['skills'].'<hr>'; }?>
	                            </center>
	                         </div>
                        </div>
                    </div>
                </div>
            </div>

    	
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php')?>