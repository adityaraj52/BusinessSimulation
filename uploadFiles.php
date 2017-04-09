<?php
/**
 * Created by PhpStorm.
 * User: adityaraj
 * Date: 02/04/17
 * Time: 9:36 PM
 */

require_once('resources/phpmail/include/membersite_config.php');

if (!$fgmembersite->CheckLogin()
) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

if (isset($_POST['submitted_file_upload'])) {
    if (!$fgmembersite->UpdateFileUpload()) {
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
                    <form id='updateprofile' action='<?php echo($fgmembersite->GetSelfScript()); ?>'
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
                                <button type="submit" class="btn btn-primary" style="width:80%;">Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if($formvars['role'] == 'Administrator' || $formvars['role'] == 'Professor') {
                    ?>
                    <div class="col-lg-6" style="margin-top: 1cm">

                        <div class="row offset-2">
                            <h3>Post Events</h3>
                        </div>
                        <form id='updateprofile' action='<?php echo($fgmembersite->GetSelfScript()); ?>'
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
                                    <button type="submit" class="btn btn-primary" style="width:80%;">Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                }
                ?>
            </div>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div style="text-align: center;">
                    <iframe src="http://docs.google.com/gview?url=http://www.pdf995.com/samples/pdf.pdf&embedded=true"
                            style="width:500px; height:500px;" frameborder="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    document.getElementById("fileToUpload").onchange = function () {
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
