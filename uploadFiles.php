<?php
/**
 * Created by PhpStorm.
 * User: adityaraj
 * Date: 02/04/17
 * Time: 9:36 PM
 */

require_once('resources/phpmail/include/membersite_config.php');

if (!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

if (isset($_POST['submit_event'])) {
    if ($fgmembersite->UpdateEvents()) {
    }
}

if (isset($_POST['submitted_file_upload'])) {
    if ($fgmembersite->UpdateFileUpload()) {
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<!--Head-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home | Nova</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/others/css/main.css">
    <link rel="stylesheet" href="vendor/slider/css/sl-slide.css">

    <link rel="stylesheet" href="vendor/others/css/formsignin.css">
    <link rel="stylesheet" href="vendor/others/css/mySettings.css">
    <link href="vendor/others/css/viewpdf.css" rel="stylesheet">
    <!--    <link href="vendor/others/css/dashboard2.css" rel="stylesheet">-->

    <link href="vendor/others/css/simple-sidebar.css" rel="stylesheet">

    <script src="vendor/others/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
</head>
<!--Head-->

<body onload="viewData()">


<!--<!--Header-->
<header class="navbar navbar-fixed-top">
    <a class="navbar-brand pull-left" href="index.php">
        <img src="images/logo.gif" alt=" " width="100%">
    </a>
    <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="nav-collapse collapse pull-right">
            <ul class="nav">
                <li class="active"><a href="index.php">Home</a></li>

                <li><a href="#">About Us</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business Simulation <i
                                class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Educational Concept</a></li>
                        <li><a href="#">Course Structure</a></li>
                        <li><a href="#">Experiences</a></li>
                        <li><a href="#">Video</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
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
                        } else if ($fgmembersite->UserRole() == 'Professor') {
                            ?>
                            <li><a href="dashboard.php">Manage Students</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="dashboard.php">My Profile</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--<!-- /header -->


<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav nav-list">
            <li class="sidebar-brand">
                <a href="#">
                </a>
            </li>

            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="profileUpdate.php">Profile Update</a>
            </li>
            <li class="active">
                <a href="uploadFiles.php">Post Documents</a>
            </li>
            <li>
                <a href="recentPosts.php">Posts</a>
            </li>
            <li>
                <a href="Events">Posts</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="margin-top: 1cm">

                    <div class="row offset-2">
                        <h3>Post Documents to groups</h3>
                    </div>
                    <form id='updateprofile' action='<?php echo $fgmembersite->GetSelfScript(); ?>'
                          method='post'
                          accept-charset='UTF-8' enctype="multipart/form-data">
                        <input type='hidden' name='submitted_file_upload' id='submitted_file_upload' value='1'/>
                        <?php
                        $formvars = $fgmembersite->CollectProfileData();
                        ?>

                        <div class="form-control row">
                            <label for="example-text-input" class="col-3 col-form-label">Upload for Team</label>
                            <div class="col-5">
                                <select class="form-control input-block-level" id="upload_team" name='upload_team'>
                                    <?php if ($formvars['team'] != 'Public') { ?>
                                        <option value="<?php echo($formvars['team']) ?>"><?php echo($formvars['team']) ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    <option value="Public">Public
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-control row">
                            <label for="example-text-input" class="col-3 col-form-label">Select File</label>
                            <div class="col-5">
                                <input type="file" id="file_name" name="file_name">
                            </div>
                        </div>

                        <div class="form-control row">
                            <div class="col-6"></div>
                            <div><h5><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></h5>
                            </div>
                        </div>

                        <div class="form-control row">
                            <div class="col-6 offset-2">
                                <button type="submit_file" class="btn btn-primary" style="width:80%;">Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>


<!-- /#wrapper -->

<!-- jQuery -->
<script src="vendor/jquery/jquery-slim.min.js"></script>
<script src="vendor/jquery/jquery-1.9.1.min.js"></script>
<script src="vendor/jquery/jquery.tabledit.js"></script>
<script src="vendor/jquery/jquery.tabledit.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/others/js/main.js"></script>


</body>

</html>
