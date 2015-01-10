<?php
    /**************************** https://github.com/ipavl/simplephpsite ****************************
     *   File name: index.php
     *      Author: I. Pavlinic <https://github.com/ipavl>
     * Description: This is the main script of SimplePHPSite which will include any page specified
     *              by the "page" parameter in the URL, i.e. /index.php?page=PAGE_NAME_HERE. The
     *              script will look for that file in the /pages/ directory, and throw a 404 error
     *              if it cannot be found. Some of these settings can be changed in includes/config.php.
     *
     *       Notes: At the moment, page extensions DO matter, so in order to have a URL like this:
     *              /index.php?page=sample (WITHOUT a file extension), the file to include must also
     *              not have an extension, i.e. /pages/sample and not /pages/sample.html.
     ************************************************************************************************/

    $adminFileWarning = true;   /* You can set this to false if you've restricted access to includes/admin.php */
    $config = include_once('includes/config.php');

    // Create default values if they are not set or config.php is missing, otherwise load the config ones
    if (!isset($config['pageDir']))
        $pageDir = "pages";
    else
        $pageDir = $config['pageDir'];

    if (!isset($config['pageParam']))
        $pageParam = "page";
    else
        $pageParam = $config['pageParam'];

    if (!isset($config['indexPage']))
        $indexPage = "index";
    else
        $indexPage = $config['indexPage'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php
            if (isset($config['titleText'])) {
                echo $config['titleText'];
            } else {
                echo "";    // if config.php is missing, this will be shown instead (the page URL by default)
            }
        ?></title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- Add custom CSS here -->
        <link rel="stylesheet "href="css/simplephpsite.css"/>
        <link rel="stylesheet" href="css/custom.css" />

        <link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

        <script src="js/email.js" type="text/javascript"></script>

        <?php
            /* Force SSL? */
            if ($_SERVER["HTTPS"] != "on" && isset($config['forceSSL']) && isset($config['forceLocalSSL'])) {
                if ((($_SERVER["HTTP_HOST"] != "127.0.0.1") && $config['forceSSL']) || ($_SERVER["HTTP_HOST"] == "127.0.0.1") && $config['forceLocalSSL']) {
                    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                    exit();
                }
            }
        ?>
    </head>

    <body>
    <?php include('includes/header.php'); ?>

        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if (file_exists('includes/admin.php') && $adminFileWarning) {
                            echo '<div class="alert alert-danger" role="alert">
                              The file <code>includes/admin.php</code> exists! If you are done configuring your site, please delete it!
                              If you have restricted access to it, you can disable this message in index.php.
                            </div>';
                        }

                        if (isset($_GET[$pageParam]) && trim($_GET[$pageParam]) != "") {
                            $p = $_GET[$pageParam];
                            $file_check = $pageDir . "/" . $p;

                            if (file_exists($file_check)) {
                                include($file_check);
                            } else {
                                // Check to see if a custom 404 page exists
                                if (file_exists('includes/404.php')) {
                                    include('includes/404.php');
                                } else {
                                    echo "The page you requested could not be found.";
                                }
                            }
                        } else {
                            //echo 'No page specified.';
                            include($pageDir . '/' . $indexPage);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->

    <?php include('includes/footer.php'); ?>
    <?php include('includes/javascript.php'); ?>
    </body>
</html>
