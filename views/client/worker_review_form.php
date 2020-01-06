<?php include('header.php'); ?>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/rating/css/star-rating.css')?>" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/rating/js/star-rating.js')?>" type="text/javascript"></script>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    
                </div>
            </div>
        <div class="main">
            <div class="container-fluid col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-8" style="margin-left:auto;margin-right:auto;">
                        <div class="card content">
                    <form method="post" action="">
                                <div class="card-body">
                                    <h4 class="card-title">Worker Review</h4>
                                    
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Review Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="wr_title" class="form-control" id="name" placeholder="Project title Here" >
                                        </div>
                                    </div>
                                    <div class="form-group card-body row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Rating</label>
                                        <div class="col-sm-9">
                                            <input id="input-21f" value="0" name="star" type="text" data-min=0 data-max=5 data-step=0.1 data-size="md" title="">
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="border-top"><center>
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                    </div></center>
                                </div>
                            </form>
                        </div></div></div></div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function () {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>
<?php include('footer.php'); ?>