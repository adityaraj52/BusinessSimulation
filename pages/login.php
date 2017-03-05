<?PHP
require_once("../resources/include/membersite_config.php");
if (isset($_POST['submitted_login'])) {
    if ($fgmembersite->Login()) {
        echo("done");
        $fgmembersite->RedirectToURL("login-home.php");
    }
    else
    {
        $txt = "<h5 align='center'> Wrong Credentials!</h5>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="../resources/css/formsignin.css">

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
                            <li><a href="#">Tallin University</a></li>
                            <li><a href="#">Vancouver Island University</a></li>
                            <li><a href="#>University of TyumenI</a></li>
                            <li><a href="#">Costs</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Participate</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Contact</a></li>
                    <li class="login">
                        <a href="login.php"><i class="icon-lock"> Member Login </i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
<!-- /header -->

<!--Title -->
<section class="title">
    <div class="container">
        <div class="row-fluid" style=" margin-top: 0.9cm;height: 30px">
            <div class="span6">
                <h2>Registration</h2>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php" style="font-size: 18px">Home / </a></li>
                    <li><a href="login.php" style="font-size: 18px">Registration</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<!--Login Form-->
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form id='login' class="form-signin" action="<?php echo $fgmembersite->GetSelfScript(); ?>" method="post" id="form-login">

                        <input type='hidden' name='submitted_login' id='submitted_login' value='1'/>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name='username' id='username' placeholder="Username"/>
                            <span id='login_username_errorloc' class='error'></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name='password' id='password' placeholder="Password"/>
                            <span id='login_password_errorloc' class='error' style='clear:both'></span>

                        </div>

                        <span id='wrong_credentials' class='error' style='clear:both'><?php echo($txt)?></span>

                        <legend></legend>
                        <input type="Submit" value="Login" class="btn-large" style="width:130px"/>
                        <a href="register.php"><input type="button" class="btn-large btn-success" style="float: right; width:130px" Value="Register"></a>

                    </form>
                </div>
            </div>
        </div>
</div>
<!--Login Form-->


<script type='text/javascript'>

    var frmvalidator = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username", "req", "Please provide your username");

    frmvalidator.addValidation("password", "req", "Please provide the password");

</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script src="../resources/library/scripts/others/jquery-1.9.1.min.js"></script>-->
<!--<script src="../resources/library/scripts/others/main.js"></script>-->

</body>
</html>