<?PHP
require_once("resources/phpmail/include/membersite_config.php");

if (!$fgmembersite->CheckLogin() ||
    !$fgmembersite->CheckUserProfOrMemberRole()
) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
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
                       data-toggle="dropdown"> Welcome <?PHP echo($fgmembersite->UserFullName());?> <i
                                class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php">Logout</a></li>

                        <?php
                        if ($fgmembersite->UserRole() == 'Administrator') {
                            ?>
                            <li><a href="dashboard.php">Manage Users</a></li>
                            <?php
                        }
                        else if ($fgmembersite->UserRole() == 'Professor') {
                            ?>
                            <li><a href="dashboard.php">Manage Students</a></li>
                            <?php
                        }
                        else {
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

<!-- #wrapper-->
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav nav-list">
            <li class="sidebar-brand">
                <a href="#">
                </a>
            </li>

            <li class="active">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="profileUpdate.php">Profile Update</a>
            </li>
            <li>
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
            <div class="row" style="margin-top: 1cm">
                <div class="col-4"></div>
                <div class="col-5">
                    <h1>Membership Information</h1>
                </div>
            </div>

        </div>


        <div class="container-fluid">
            <div class="row" style="margin-top: 0.5cm">

                <div class="col-1 "></div>
                <div class="col-9 ">
                    <!--                    <h2>Contextual Classes</h2>-->
                    <!--                    <p>Classes used are: .active, .success, .info, .warning, and .danger.</p>-->
                    <table id="tableedit" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>University</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Team</th>
                            <?php
                            if($fgmembersite->CheckUserRole()) {
                            ?>
                                <th>Edit/Delete</th>
                            <?php
                            }
                            ?>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- #wrapper-->

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

<script>
    function viewData() {
        $.ajax({
            url: 'process.php?p=<?echo($_SESSION['email_of_user']); ?>',
            method: 'GET'
        }).done(function (data) {
            $('tbody').html(data)
            tableData()
        })
    }

    function tableData() {
        $('#tableedit').Tabledit({
            url: 'process.php',
            eventType: 'dblclick',
            editButton: true,
            deleteButton: true,
            hideIdentifier: true,
            confirm: true,

            buttons: {
                edit: {
                    class: 'btn btn-sm btn-warning',
                    html: '<span class="glyphicon glyphicon-pencil"></span> Edit',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<span class="glyphicon glyphicon-trash"></span> Trash',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Save'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Confirm'
                }
            },
            columns: {
                identifier: [0, 'id_user'],
                <?php
                if($_SESSION['role_of_user'] == 'Administrator'){
                ?>
                <!-- Activate this to make all fields editable-->
//                editable: [[1, 'name'], [2, 'email'], [3, 'university', '{"1": "TU Clausthal", "2": "Vancouver Island University", "3": "University of Tyumen", "4":"Tallin University"}'], [4, 'username'], [5, 'role', '{"1": "Guest", "2": "Member", "3": "Professor", "4": "Administrator"}'], [6, 'team']]
                editable: [[5, 'role', '{"1": "Guest", "2": "Member", "3": "Professor", "4": "Administrator"}'], [6, 'team', '{"1": "Public", "2": "A", "3": "B", "4": "C", "5": "D", "6": "E", "7": "F"}']]
                <?php
                }
                ?>
            },
            onSuccess: function (data, textStatus, jqXHR) {
                viewData();
            },
            onFail: function (jqXHR, textStatus, errorThrown) {
                console.log('onFail(jqXHR, textStatus, errorThrown)');
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
            onAjax: function (action, serialize) {
                console.log('onAjax(action, serialize)');
                console.log(action);
                console.log(serialize);
            }
        });
    }
</script>

</body>

</html>
