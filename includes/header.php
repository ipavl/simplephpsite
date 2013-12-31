        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php?page=index"><?php
                        if (isset($config['useImageLogo']) && $config['useImageLogo']) {
                            echo "<img src=" . $config['logoPath'] . " title=\"logo\" />";
                        } else {
                            if (isset($config['logoText'])) {
                                echo $config['logoText'];
                            } else {
                                echo "SimplePHPSite";
                            }
                        }
                    ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?page=index">Home</a></li>
                        <li><a href="index.php?page=broken">Sample broken link</a></li>
                        <li><a href="index.php?page=sample">Sample page</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sample menu <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=subpage/sample">Sample drop-down link</a></li>
                                <li><a href="index.php?page=subpage/sample">Sample drop-down link</a></li>
                                <li><a href="index.php?page=subpage/sample">Sample drop-down link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>