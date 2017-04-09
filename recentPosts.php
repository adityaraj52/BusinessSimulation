<?PHP
require_once("resources/phpmail/include/membersite_config.php");

if (!$fgmembersite->CheckLogin() ||
    !$fgmembersite->CheckUserProfOrMemberRole()
) {
//    $fgmembersite->RedirectToURL("index.php");
//    exit;
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
    <!--    <link href="vendor/others/css/dashboard2.css" rel="stylesheet">-->

    <link href="vendor/others/css/simple-sidebar.css" rel="stylesheet">

    <script src="vendor/others/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<!--Head-->

<body onload="viewData()">

<!-- --Header-->
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
<!-- /header -->


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
            <li>
                <a href="uploadFiles.php">Post Documents</a>
            </li>
            <li class="active">
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
                <div class="col-lg-12" style="margin-top: 1cm">
                    <h1 align="">Team Posts</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <table id="" align="" class="table tab-content table-bordered">
                        <thead>
                        <tr>
                            <th>User id</th>
                            <th>File Name</th>
                            <th>Time Stamp</th>
                            <th>Uploaded By</th>
                            <th>Team</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = $fgmembersite->getPostsTeamData();
                        if ($result)
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo($row['id']); ?></td>
                                    <td>
                                        <a href="images/fileuploads/<?php echo($row[id] . $row['file_name']) ?>"><?php echo($row['file_name']); ?>
                                    </td>
                                    <td><?php echo($row['time_stamp']); ?></td>
                                    <td><?php echo($row['uploaded_by']); ?></td>
                                    <td><?php echo($row['team']); ?></td>
                                </tr>

                                <?php
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php

        if ($fgmembersite->CollectProfileData()['team'] != 'Public') {
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 1cm">
                        <h1 align="">Public Posts</h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <!--                    <h2>Contextual Classes</h2>-->
                        <!--                    <p>Classes used are: .active, .success, .info, .warning, and .danger.</p>-->
                        <table id="" align="center" class="table tab-content table-bordered"
                               style="max-width: 1024px">
                            <thead>
                            <tr>
                                <th>User id</th>
                                <th>File Name</th>
                                <th>Time Stamp</th>
                                <th>Uploaded By</th>
                                <th>Team</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $fgmembersite->getPostsPublicData();
                            if ($result)
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo($row['id']); ?></td>
                                        <td>
                                            <a href="images/fileuploads/<?php echo($row[id_user] . $row['file_name']) ?>"><?php echo($row['file_name']); ?></a>
                                        </td>
                                        <td><?php echo($row['time_stamp']); ?></td>
                                        <td><?php echo($row['uploaded_by']); ?></td>
                                        <td><?php echo($row['team']); ?></td>
                                    </tr>

                                    <?php
                                }
                            ?>
                            </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery-slim.min.js"></script>
    <script src="vendor/jquery/jquery-1.9.1.min.js"></script>
    <script src="vendor/jquery/jquery.tabledit.js"></script>
    <script src="vendor/jquery/jquery.tabledit.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
