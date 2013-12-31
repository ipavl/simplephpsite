<?php
    /************************************************************************************************   
     *   File name: admin.php
     *
     *      Author: I. Pavlinic
     * Description: This is the admin script of SimplePHPSite to change configuration settings via a
     *              web page interface instead of manually editing includes/config.php.
     ************************************************************************************************/

    include_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW, NOARCHIVE, NOSNIPPET">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SimplePHPSite Admin</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" />

        <!-- Add custom CSS here -->
        <link rel="stylesheet" href="css/modern-business.css" />
        <link rel="stylesheet "href="css/simplephpsite.css"/>
        <link rel="stylesheet" href="css/custom.css" />

        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

        <script src="js/email.js" type="text/javascript"></script>

        <?php
            /* Force SSL based on the configuration file settings */
            if (isset($forceSSL) && $forceSSL) {
                header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                exit();
            }
        ?>
    </head>

    <body background="images/splash.jpg" class="cover">
        <?php include('includes/header.php'); ?>

        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SimplePHPSite Admin</h1>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p><font color="orange"><strong>Note:</strong> At the moment, this page is completed unsecured. That means anyone 
                            could edit your configuration file via this page! Once you have set your settings, delete the following files  
                            or otherwise prevent access to them: <code>admin.php</code> and <code>includes/admin.php</code> (the latter being 
                            the most important). You can always manually edit your configuration file or re-upload these pages temporarily 
                            if you need to change something at a later time.</font></p>
                        <?php require_once('includes/admin.php'); ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->

        <?php include('includes/footer.php'); ?>

        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/modern-business.js"></script>

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/bootstrap.js"><\/script>')</script>

        <!-- Non-Bootstrap -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-ui.min.1.10.3.js"><\/script>')</script>
    </body>
</html>