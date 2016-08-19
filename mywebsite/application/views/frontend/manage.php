<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/960_24_col.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_home.css">
        <script src="<?php echo base_url(); ?>resources/scripts/jquery-latest.pack.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/scripts/jcarousellite_1.0.1.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/scripts/jquery.autosize.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrap">
            <!-- header -->
            <?php $this->load->view('frontend/header'); ?>
            <!-- end header -->

            <div id="page_body" class="container_24">
                <?php $this->load->view('frontend/'.$template); ?>
            </div> <!-- end page body -->
            <div class="footer">
                <div class="footer-wrap">
                    <div class="city-landscape-img"></div>
                    <p class="copyright lesser-text">
                        Copyright © 2004–2014 Yelp Inc. Yelp,
                        <img src="http://s3-media4.ak.yelpcdn.com/assets/2/www/img/9d213bfb766e/logo/logo_tiny.png" alt="Yelp logo" class="footer-copyright-logo">, 
                        <img src="http://s3-media3.ak.yelpcdn.com/assets/2/www/img/86ec59fef415/logo/burst_tiny.png" alt="Yelp burst" class="footer-burst-logo"> 
                        and related marks are registered trademarks of Yelp.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>