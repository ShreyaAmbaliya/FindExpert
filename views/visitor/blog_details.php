<?php include('header.php'); ?>
<style type="text/css">
    .owl-theme .owl-dots .owl-dot span
    {	
     	border-color: white;
     	height:15px;
     	width: 15px;
     	border-width: 3px;
    }
    .owl-theme .owl-dots .owl-dot .active span
    {
     	background-color: red;
     	color:orange;
    }
</style>
<div class="darkbg">
    <!-- start section title --> 
    <div class="jbm-section-title padding-top-100 margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Latest Blog</span> News</h2>
                    <p>Read the latest news from our blog and learn more everyday.</p>
                </div>
            </div>
        </div>
    </div>
	<div class="slider" style="margin-left:100px;margin-right:100px">
		<div class="owl-carousel owl-theme">
 						<?php $i=0;
				                 foreach($blog as $value){ 
				                 	$sql=$this->db->get_where('admin',array('id'=>$value['admin_id']));
				                 	$admin=$sql->row_array();
				                 	 ?>
		    <div class="item">
		    	<?php //echo $i; $i=$i+1; ?>
		    	<div class="sectiob-blog">
			        <div class="container">
			            <div class="row">
			                <div class="blog-news-slider">
				               
				                    <div class="col-md-4 col-sm-6 col-xs-12">
				                        <div class="blog-posts-in">
				                            <div class="blog-post-thumb">
				                                <a href="#">
				                                    <img src="<?php echo base_url('upload/admin/blog/'.$value['image_path']); ?>" alt="blog-1" class="img-responsive" />
				                                </a>
				                                <div class="blog-date" style="width:100px;padding:8px">
				                                    <span class="">
				                                        <?php 
				                                        $date=strtotime($value['creation_time']);
				                                        echo date('d/m/Y', $date);
				                                        ?>
				                                    </span>
				                                    <span class="blog-cat">Career</span>
				                                </div>
				                            </div>
				                            <div class="blog-post-desc">
				                                <a href="#" class="blog-redmore">
				                                   <i class="fa fa-angle-right" aria-hidden="true"></i>
				                                </a>
				                                <h5>
				                                    <a href="#"><?php echo $value['title']; ?></a>
				                                </h5>
				                                <div class="blog-grid-meta">
				                                    <span>by</span>
				                                    <a href="#"><?php echo $admin['name']; ?></a>
				                                </div>
				                                <p style="height:320px;"><?php echo $value['description']; ?></p>
				                            </div>
				                        </div>
				                    </div>
			                </div>
			            </div>

			        </div>
    			</div>
		    </div><?php } ?>
		</div>
			            <div class="row margin-top-60 margin-bottom-100">
			                <div class="col-xs-12 text-center">
			                    <a href="#" class="jbm-loadmore">View More News</a>
			                </div>
			            </div>
	</div>
    </div>
<?php include('footer.php'); ?>