<?PHP
require_once("resources/phpmail/include/membersite_config.php");

if (!$fgmembersite->CheckLogin() ||
    !$fgmembersite->CheckUserRole()
) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration controls</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-grid.min.css">

    <!-- Custom CSS -->
    <link href="vendor/others/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="viewData()">

<!--<!--Header-->
<header class="navbar navbar-fixed-top">
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
                <li class="login">
                    <a href="login.php"><i class="icon-lock"> Member Login </i></a>
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
            <li class="active">
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#"><? echo($_SESSION['email_of_user']); ?></a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
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
                    <h1 align="center">Membership Information</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <!--                    <h2>Contextual Classes</h2>-->
                    <!--                    <p>Classes used are: .active, .success, .info, .warning, and .danger.</p>-->
                    <table id="tableedit" align="center" class="table tab-content table-striped"
                           style="max-width: 1024px">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>University</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Edit/Delete</th>
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
<!-- /#wrapper -->

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
                editable: [[1, 'name'], [2, 'email'], [3, 'university', '{"1": "TU Clausthal", "2": "Vancouver Island University", "3": "University of Tyumen", "4":"Tallin University"}'], [4, 'username'], [5, 'role', '{"1": "Guest", "2": "Member", "3": "Professor", "4": "Administrator"}']]
                <?php
                }
                else if($_SESSION['role_of_user'] == 'Professor'){
                ?>
                editable: [[1, 'name'], [2, 'email'], [3, 'university', '{"1": "TU Clausthal", "2": "Vancouver Island University", "3": "University of Tyumen", "4":"Tallin University"}'], [4, 'username']]
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
