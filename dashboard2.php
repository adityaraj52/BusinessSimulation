<?PHP
require_once('resources/phpmail/include/membersite_config.php');

if (!$fgmembersite->CheckLogin() ||
    !$fgmembersite->CheckUserRole()
) {
//    $fgmembersite->RedirectToURL("index.php");
//    exit;
}

if (isset($_POST['submitted'])) {
    if ($fgmembersite->UpdateProfile()) {
        $fgmembersite->RedirectToURL("dashboard2.php");
    }
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
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">

    <!-- Custom CSS -->
    <link href="vendor/others/css/simple-sidebar.css" rel="stylesheet">
    <link href="vendor/others/css/mySettings.css" rel="stylesheet">
    <link href="vendor/others/css/dashboard2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>

    <![endif]-->

</head>

<body onload="viewData()">

<!--<!--Header-->
<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <a href="#menu-toggle" data-toggle="collapse" class="btn btn-large pull-left" id="menu-toggle"
           style="width: 210px; height: 15px; margin-top: 0cm; margin-bottom: 0cm">
        </a>
        <div class="container-fluid">
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
                <form id="form-profilepic" action="http://www.google.com" onsubmit="">
                    <div class="container">
                        <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png"
                             class="img-thumbnail img-circle img-responsive" "/>
                        <div style="padding:100px;">
                            <div class="uploadButton">
                                <input type="file" id="file-profilepic"/>
                            </div>

                        </div>
                    </div>
                </form>
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
                    <h1 align="center">Profile Update</h1>
                </div>
            </div>

            <form id='updateprofile' class="form-horizontal" action='<?php echo($fgmembersite->GetSelfScript()); ?>' method='post' accept-charset='UTF-8'>
                <input type='hidden' name='submitted' id='submitted' value='1'/>

                <div class="container-fluid">
                    <div class="col-lg-6" style="margin-top: 2cm">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <select class="form-control input-block-level"  id="title" name='title' >
                                    <option value="Prof.">Prof.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Master">Master</option>
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Mrs.</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label">Gender</label>
                            <div class="col-9">
                                <select class="form-control input-block-level"  id="gender" name='gender' >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label">Full Name</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text" value="<?php echo $fgmembersite->UserFullName()?>"
                                       name='name' id='name'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" class="col-3 col-form-label">Public Email</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="email" value=""
                                       name='public_email'
                                       id='public_email'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" class="col-3 col-form-label">Telephone</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="tel" value=""
                                       id="telephone"
                                       name="telephone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" class="col-3 col-form-label">Skype</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text" value=""
                                       id="skype"
                                       name="skype">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" class="col-3 col-form-label">Study Major</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text" value=""
                                       id="faculty"
                                       name="faculty">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6" style="margin-top: 2cm">

                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-3 col-form-label">Date Of Birth</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="date"
                                       value=""
                                       id="date_of_birth"
                                       name="date_of_birth">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-3 col-form-label">Place Of Birth</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text"
                                       value=""
                                       id="place_of_birth"
                                       name="place_of_birth">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-color-input" class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text" value=""
                                       id="address"
                                       name="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" class="col-3 col-form-label">Personal URL</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="url"
                                       value=""
                                       name="website"
                                       id="website">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-search-input" class="col-3 col-form-label">Interests</label>
                            <div class="col-9">
                                <input class="form-control input-block-level" type="text" value=""
                                       id="interest"
                                       name="interest">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-search-input" class="col-3 col-form-label">Biography</label>
                            <div class="col-9">
                                <textarea class="input-block-level" placeholder="Describe yourself here..." name="biography" id="biography"></textarea>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary" style="width:50%; height: 100%">Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="vendor/others/js/main.js"></script>

    <!--  Login form -->
    <div class="modal hide fade in" id="loginForm" aria-hidden="false">
        <div class="modal-header">
            <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
            <h4>Login Form</h4>
        </div>
        <!--Modal Body-->
        <div class="modal-body">
            <form class="form-inline" action="index.html" method="post" id="form-login">
                <input type="text" class="input-small" placeholder="Email">
                <input type="password" class="input-small" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox"> Remember me
                </label>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <a href="#">Forgot your password?</a>
        </div>
        <!--/Modal Body-->
    </div>
    <!--  /Login form -->


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        document.getElementById("file-profilepic").onchange = function () {
            document.getElementById("form-profilepic").submit();
        };

        $(function () {
            $('input[type="file"]').change(function () {
                if ($(this).val() != "") {
                    $(this).css('color', '#333');
                } else {
                    $(this).css('color', 'transparent');
                }
            });
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
        }

        $(function () {
            $(".uploadButton").mousemove(function (e) {
                var offL, offR, inpStart
                offL = $(this).offset().left;
                offT = $(this).offset().top;
                aaa = $(this).find("input").width();
                $(this).find("input").css({
                    left: e.pageX - aaa - 30,
                    top: e.pageY - offT - 10
                })
            });
        });
    </script>

</body>

</html>
