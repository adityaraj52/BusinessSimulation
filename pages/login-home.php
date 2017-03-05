<?PHP
require_once("../resources/include/membersite_config.php");

if (!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>

<!--Head-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home | Business Simultion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap-responsive.min.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="../resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/main.css">
    <link rel="stylesheet" href="../resources/css/sl-slide.css">
    <link rel="stylesheet" href="../resources/css/mySettings.css">

    <script src="../resources/library/other_scripts/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../resources/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../resources/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../resources/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../resources/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../resources/images/ico/apple-touch-icon-57-precomposed.png">
    <!--    <link rel="stylesheet" href="css/mySettings.css">-->
    <script type='text/javascript' src='../resources/library/scripts/phpmailer/gen_validatorv31.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<!--Head-->
<body>

<!--Header-->
<header class="navbar navbar-fixed-top">
    <a class="navbar-brand pull-left" href="index.php">
        <img src="../resources/images/logo.gif" alt=" " width="100%">
    </a>
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="nav-collapse pull-right">
                <ul class="nav pull-right">
                    <li class="active"><a href="index.php">Home</a></li>


                    <li><a href="about-us.html">About Us</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business Simulation <i
                                    class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Educational Concept</a></li>
                            <li><a href="blog-item.html">Course Structure</a></li>
                            <li><a href="faq.html">Experiences</a></li>
                            <li><a href="pricing.html">Video</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">International Partners <i
                                    class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Tallin University</a></li>
                            <li><a href="blog-item.html">Vancouver Island University</a></li>
                            <li><a href="faq.html">University of TyumenI</a></li>
                            <li><a href="pricing.html">Costs</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Participate</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>

                    <li><a href="contact-us.html">Contact</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown"> Welcome <?PHP echo($fgmembersite->UserFullName()); ?> <i
                                    class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php">Logout</a></li>

                            <?php

                            if ($fgmembersite->UserRole() == 'Administrator') {
                            ?>
                            <li><a href="dashboard.php">Manage Users</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
<!-- /header -->

<!--Slider-->
<section id="slide-show">
    <div id="slider" class="sl-slider-wrapper">

        <!--Slider Items-->
        <div class="sl-slider">
            <!--Slider Item1-->
            <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="-25"
                 data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src='../resources/images/Business_Simulation_Customers.jpg' width="60%" height="100%"
                             alt=""/>
                        <h2>Creative Ideas</h2>
                        <h3 class="gap">Ideas that inspire and help others.</h3>
                        <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <!--/Slider Item1-->

            <!--Slider Item2-->
            <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15"
                 data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src='../resources/images/Simulation.png' alt=""/>
                        <h2>Future Technology</h2>
                        <h3 class="gap">Future of Business Simulation</h3>
                        <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

            <!--Slider Item3-->
            <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3"
                 data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src='../resources/images/future-technologies.jpg' alt="" width="60%" height="100%"/>
                        <h2>Unique Solutions</h2>
                        <h3 class="gap">Solutions that help millions</h3>
                        <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

        </div>
        <!--/Slider Items-->

        <!--Slider Next Prev button-->
        <nav id="nav-arrows" class="nav-arrows">
            <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
            <span class="nav-arrow-next"><i class="icon-angle-right"></i></span>
        </nav>
        <!--/Slider Next Prev button-->

    </div>
    <!-- /slider-wrapper -->
</section>
<!--/Slider-->

<section class="main-info">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <h4>A virtual classroom project that focusses on the development of multicultural management skills</h4>
                <p class="no-margin">A Browser‐based business simulation program, where students of various
                    nationalities form work groups and compete with each other in a common market.</p>
            </div>
            <div class="span3">
                <a class="btn btn-success btn-large pull-right" href="#">Go to the Course</a>
            </div>
        </div>
    </div>
</section>

<!--Services-->
<section id="services">
    <div class="container">
        <div class="center gap">
            <h3>What We Offer</h3>
            <p class="lead">Look at some of the recent ideas and discussions </p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-book icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Educational Concept</a></h4>
                        <p>Learn about the concept of Business Simulation. Discover and create new ideas based on the
                            enhanced educational concept.</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-info icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Experiences</a></h4>
                        <p>Share or gain experiences</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-weibo icon-medium icon-rounded" href="#"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Course Structure</a></h4>
                        <p>Browse throught the course directory and see what courses we are offereing currently</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-facetime-video icon-medium icon-rounded" href="#"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Videos</a></h4>
                        <p>Go to Videos section</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium" href="#"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Archives</a></h4>
                        <p>Browse through the past works stored all in one place.</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-gamepad icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Business Simulation</a></h4>
                        <p>Skip to Business Simulation Environemnet</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/Services-->

<section id="recent-works">
    <div class="container">
        <div class="center">
            <h3>Our Recent Projects</h3>
            <p class="lead">Look at some of the recent projects.</p>
        </div>
        <div class="gap"></div>
        <ul class="gallery col-4">
            <!--Item 1-->
            <li>
                <div class="preview">
                    <img alt=" " src="../resources/images/portfolio/thumb/item1.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="#"><i
                                    class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>Project XXX</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="../resources/images/portfolio/full/item1.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
            <!--/Item 1-->

            <!--Item 2-->
            <li>
                <div class="preview">
                    <img alt=" " src="../resources/images/portfolio/thumb/item2.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="#"><i
                                    class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>Project YYY</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="../resources/images/portfolio/full/item2.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
            <!--/Item 2-->

            <!--Item 3-->
            <li>
                <div class="preview">
                    <img alt=" " src="../resources/images/portfolio/thumb/item3.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-3"><i class="icon-eye-open"></i></a><a href="#"><i
                                    class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>Project ZZZ</h5>
                </div>
                <div id="modal-3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="../resources/images/portfolio/full/item3.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
            <!--/Item 3-->

            <!--Item 4-->
            <li>
                <div class="preview">
                    <img alt=" " src="../resources/images/portfolio/thumb/item4.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-4"><i class="icon-eye-open"></i></a><a href="#"><i
                                    class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>Project AAA</h5>
                </div>
                <div id="modal-4" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="../resources/images/portfolio/full/item4.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
            <!--/Item 4-->

        </ul>
    </div>

</section>

<section id="clients" class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                    <h4 class="pull-left">OUR INTERNATIONAL PARTNERS</h4>
                    <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a>
                        <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                    </div>
                </div>
                <p>International MoUs.</p>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client1.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client2.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client3.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/logo.gif"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client4.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client3.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client2.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/logo.gif"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client1.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client2.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/sample/clients/client3.png"></a>
                                    </li>
                                    <li class="span3">
                                        <a href="#"><img src="../resources/images/logo.gif"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Carousel items -->

                </div>
            </div>
        </div>
    </div>
</section>

<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <!--Contact Form-->
            <div class="span3">
                <h4>ADDRESS</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong>Address:</strong> Julis-Albert-Strasse<br>38678-ClausthalZellerfeld
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> support@business-simulation.com
                    </li>
                    <li>
                        <i class="icon-globe"></i>
                        <strong>Website:</strong> www.tu-clausthal.de
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Phone:</strong> xxx-xxx-xxx
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->

            <!--Important Links-->
            <div id="tweets" class="span3">
                <h4>OUR University</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">Clients</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
            <!--Important Links-->

            <!--Archives-->
            <div id="archives" class="span3">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">December 2017 (1)</a></li>
                        <li><a href="#">November 2017 (5)</a></li>
                        <li><a href="#">October 2017 (8)</a></li>
                        <li><a href="#">September 2017 (10)</a></li>
                        <li><a href="#">August 2017 (29)</a></li>
                        <li><a href="#">July 2012 (1)</a></li>
                        <li><a href="#">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div>
            <!--End Archives-->

        </div>
        <!--/row-fluid-->
    </div>
    <!--/container-->

</section>
<!--/bottom-->

<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2017 <a target="_blank" href="http://tu-clausthal.de/" title="Business Simulation">TU
                    Clausthal</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->


<script src="../resources/library/scripts/others/jquery-1.9.1.min.js"></script>
<script src="../resources/library/scripts/bootstrap/bootstrap.min.js"></script>
<script src="../resources/library/scripts/others/main.js"></script>

<!-- Required javascript files for Slider -->
<script src="../resources/library/scripts/slider/jquery.ba-cond.min.js"></script>
<script src="../resources/library/scripts/slider/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->


<!-- SL Slider -->
<script type="text/javascript">
    $(function () {
        var Page = (function () {

            var $navArrows = $('#nav-arrows'),
                slitslider = $('#slider').slitslider({
                    autoplay: true
                }),

                init = function () {
                    initEvents();
                },
                initEvents = function () {
                    $navArrows.children(':last').on('click', function () {
                        slitslider.next();
                        return false;
                    });

                    $navArrows.children(':first').on('click', function () {
                        slitslider.previous();
                        return false;
                    });
                };

            return {
                init: init
            };

        })();

        Page.init();
    });
</script>
<!-- /SL Slider -->
</body>

</html>
