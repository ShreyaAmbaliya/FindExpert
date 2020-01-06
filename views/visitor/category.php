<?php include('header.php'); ?>
    <!-- start banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jbm-banner-text text-center">
                        <div class="jbm-ban-txt-line-1">
                            <h1>
                                AMBITION <span class="double-line">is the first step to success</span>
                            </h1>
                        </div> 
                        <div class="jbm-ban-txt-line-2">
                            <p class="blockquote">“If you want to be successful in this world, you have to follow your passion, not a paycheck”</p>
                        </div>
                        <div class="jbm-ban-txt-line-3">
                            <a href="#" class="jbm-button jbm-button-5 margin-right-30">Purchase Template</a>
                            <a href="#" class="jbm-button jbm-button-2">Join JobMarket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->
    <!-- start search -->
    <form method="post" action="<?php echo site_url('visitor/home/search_bycat'); ?>">
    <div class="jbm-search-bar jbm-search-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="jbm-sch-inner margin-top-85-minus" >
                        <div class="row">
                             <!--<div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                   
                                        <div class="col-sm-8">
                                           
                                            <select name="country_name" class="jbm-s-category jbm-select-hide-search" id="country_name">
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
                            </div> -->
                            <div class="col-md-3 col-sm-3 col-xs-3"></div>
                             <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group c">
                                    <select class="jbm-s-category jbm-select-hide-search" name="category" id="jbm-s-category">
                                        <option value="">Category</option>
                                                <?php
                                                foreach($cat as $row) { ?>

                                                    <option value="<?php echo $row['cat_id']; ?>" 
                                                         <?php
                                                         if(@$cat_id==$row['cat_id']){
                                                            echo "selected";
                                                         }
                                                         ?>
                                                         >
                                                         <?php  echo $row['cat_name'];?></option> 
                                                    <!-- 
                                                    echo '<option value="'.$row['cat_id'].'" >'.$row['cat_name'].'</option>'; -->
                                                 <?php } ?>
                                    </select>
                                    <p>(Example: designer, legal, education)</p>
                                </div>
                            </div> 
                            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" />
                                    <p>(Example: Melbourne, Florida)</p>
                                </div>
                            </div> -->
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group ">
                                    <input type="submit" class="jbm-button jbm-button-3" id="search-btn" name="search" value="Search Jobs" />
                                    <p class="text-center"><a href="<?php echo site_url('visitor/home/search_bycat'); ?>">More Search Options</a></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div></form>
    <!-- end search -->

    <!-- start section title -->
    <div class="jbm-section-title margin-top-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2>Top Trending <span class="fw-400">Categories</span></h2>
                    <p>Make the most of the opportunity available by browsing among the most trending categories and get hired today.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section title -->

    <!-- end section category -->
    <div class="jbm-section-catgory padding-top-80 padding-bottom-100">
        <div class="container">
            <div class="row">
            	<?php foreach($cat as $row){?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="jbm-category-box clearfix">
                        <span class="category-icon">
                            
                        </span>
                        <a href="<?php echo site_url('visitor/manage_cat_project/project_bycat/'.$row['cat_id']); ?>" class="jbm-cat-title"><?php echo $row['cat_name'];?></a>
                        <span class="jbm-cat-jobs">
                            <?php // echo $cnt[$i]['total']; $i++; ?> <br />
                            <!-- Projects -->
                        </span>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="row margin-top-30 margin-bottom-50">
                <div class="col-xs-12 text-center">
                    <a href="#" class="jbm-loadmore">Load More Categories</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end section category -->
        <!-- start section title -->
    <div class="jbm-section-title margin-top-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Latest</span> Job Openings</h2>
                    <p>Make the most of the opportunity available by browsing among the most trending categories and get hired today.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section title -->
    <!-- end section category -->
    <div class="jbm-section-jobs padding-top-80 padding-bottom-100">
        <div class="container">
            <div class="row">
            	<?php foreach($records as $row){?>
	                <div class="col-md-12 col-sm-12 col-xs-12 jbm-job-loop">
	                    <div class="jbm-job-loop-in">
	                        <div class="row">
	                            <div class="col-md-3 col-sm-5 col-xs-5 full-wdth mg-btm-20 text-left jbm-first-col">
	                                <!-- <div class="jbm-company-logo"><?php echo $row['project_id']; ?></div> -->
	                                <div class="jbm-job-title">
	                                    <h5><?php echo $row['project_title']; ?></h5>
	                                    <br />
	                                    <h5><a href="mailto:" class="jbm-job-email"><?php echo $row['client_name']; ?></a></h5>
	                                </div>
	                            </div>
	                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	                                <div class="jbm-job-locaction">
	                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
	                                    <br />
	                                    <a href="#"><?php echo $row['cat_name']; ?></a>
	                                </div>
	                            </div>
	                            <div class="col-md-2 col-sm-3 col-xs-4 text-center">
	                                <div class="jbm-job-price">
	                                    <i class="fa fa-money" aria-hidden="true"></i>
	                                    <br />
	                                    <span><?php echo $row['min_budget'].' &#8377'.' - '.$row['max_budget'].' &#8377'; ?></span>
	                                </div>
	                            </div>
	                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	                                <!-- <div class="jbm-job-timing">
	                                    <i class="fa fa-battery-full" aria-hidden="true"></i>
	                                    <br />
	                                    <span>Full Time</span>
	                                </div> -->
	                            </div>
	                            <div class="col-md-3 col-xs-12 col-xs-12">
	                                <div class="jbm-job-links">
	                                    <div class="jbm-job-detail">
	                                        <a href="single-job.html">Job Detail</a>
	                                    </div>
	                                    <div class="jbm-job-apply">
                                            <?php if($this->session->userdata('worker_id')){?>
    	                                        <a href="<?php echo site_url('visitor/manage_bid/view_details/'.$row['project_id']); ?>" class="jbm-job-apply-btn ">Quick Apply</a>
                                            <?php }else if($this->session->userdata('client_id')){ ?>
                                                <a href="<?php echo site_url('visitor/manage_bid/show_bid/'.$row['project_id']); ?>" class="jbm-job-apply-btn ">View Bid</a>
                                            <?php }else{ ?> 
                                                 <a href="<?php echo site_url('visitor/manage_bid/view_details/'.$row['project_id']); ?>" class="jbm-job-apply-btn ">Quick Apply</a>
                                            <?php } ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div><!--jbm-job-loop-in-->
	                </div><!--jbm-job-loop-->
                <?php }?>
            </div>
            <div class="row margin-top-40 margin-bottom-50">
                <div class="col-xs-12 text-center">
                    <a href="#" class="jbm-loadmore">Load More Jobs</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end section category -->
<?php include('footer.php'); ?>