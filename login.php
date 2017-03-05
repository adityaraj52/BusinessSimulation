<?PHP
require_once("resources/include/membersite_config.php");

if ($fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("login-home.php");
    exit;
}

if (isset($_POST['submitted_login'])) {
    if ($fgmembersite->Login()) {
        echo("done");
        $fgmembersite->RedirectToURL("login-home.php");
    } else {
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
    <title>Home | Nova</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <link rel="stylesheet" href="css/formsignin.css">

    <link rel="stylesheet" href="css/mySettings.css">


    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

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

<body>

<!--<!--Header-->
<header class="navbar navbar-fixed-top">
    <a class="pull-left" href="index.php">
        <img src="images/logo.gif" alt=" " width="100%">
    </a>
    <div class="navbar-inner">

        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
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
                    <li class="login">
                        <a href="login.php"><i class="icon-lock"> Member Login </i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--<!-- /header -->

<!--Title -->
<section class="title" style="margin-top: 1cm">
    <div class="container">
        <div class="row-fluid" style="height: 20px">
            <div class="span6">
                <h2>Registration</h2>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php" style="font-size: 18px">Home / </a></li>
                    <li><a href="login.php" style="font-size: 18px">SignIn</a></li>
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
                <form id='login' class="form-signin" action="<?php echo $fgmembersite->GetSelfScript(); ?>"
                      method="post" id="form-login">

                    <input type='hidden' name='submitted_login' id='submitted_login' value='1'/>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name='username' id='username' placeholder="Username"/>
                        <span id='login_username_errorloc' class='error'></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name='password' id='password'
                               placeholder="Password"/>
                        <span id='login_password_errorloc' class='error' style='clear:both'></span>
                    </div>

                    <span id='wrong_credentials' class='error' style='clear:both'><?php echo($txt) ?></span>

                    <legend></legend>
                    <input type="Submit" value="Login" class="btn-large" style="width:130px"/>
                    <a href="register.php"><input type="button" class="btn-large btn-success"
                                                  style="float: right; width:130px" Value="Register"></a>

                </form>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    var frmvalidator = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name", "req", "Please provide your name");

    frmvalidator.addValidation("email", "req", "Please provide your email address");

    frmvalidator.addValidation("email", "email", "Please provide a valid email address");

    frmvalidator.addValidation("username", "req", "Please provide a username");

    frmvalidator.addValidation("password", "req", "Please provide a password");
</script>
<!--Login Form-->

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<!-- Required javascript files for PHPMailer -->
<script type='text/javascript' src='../resources/library/scripts/phpmailer/gen_validatorv31.js'></script>
<!-- Required javascript files for PHPMailer -->

<!-- form validation -->
<script type='text/javascript'>
    // <![CDATA[

    var frmvalidator = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username", "req", "Please provide your username");

    frmvalidator.addValidation("password", "req", "Please provide the password");

    // ]]>
</script>
<!--form validation-->

</body>
</html>