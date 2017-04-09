<?PHP
require_once('resources/phpmail/include/membersite_config.php');

if (isset($_POST['submitted'])) {
    if ($fgmembersite->RegisterUser()) {
        $fgmembersite->RedirectToURL("thank-you.html");
    }
}

if (isset($_POST['submitted_login'])) {
    if ($fgmembersite->Login()) {
        echo("done");
        $fgmembersite->RedirectToURL("login-home.php");
    }
}
?>

<!--Head-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home | Nova</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/others/css/main.css">
    <link rel="stylesheet" href="vendor/slider/css/sl-slide.css">

    <link rel="stylesheet" href="vendor/others/css/formsignin.css">
    <link rel="stylesheet" href="vendor/others/css/mySettings.css">

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

<body>


<!--Header-->
<header class="navbar navbar-fixed-top">
    <a class="navbar-brand pull-left" href="index.php">
        <img src="images/logo.gif" alt=" " width="100%">
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
<section class="title" style="margin-top: 1cm">
    <div class="container">
        <div class="row-fluid" style="height: 20px">
            <div class="span6">
                <h2>Registration</h2>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php" style="font-size: 18px">Home / </a></li>
                    <li><a href="register.php" style="font-size: 18px">Registration</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<!-- Form Code Start -->

<div class="container-fluid center">
    <form id='register' class="form-inline" action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'
          accept-charset='UTF-8'>

        <fieldset class=" center">

            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <div class="form-group">
                <!-- Name -->
                <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
                <div class='container center'>
                    <legend for="inputName"></legend>
                    <input type='text' class="input-xxlarge" name='name' id='name' placeholder="Your Full Name"
                           value='<?php echo $fgmembersite->SafeDisplay(' name ') ?>' maxlength="50"/>
                    <br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>
            </div>

            <div class="form-group">
                <!-- Email -->
                <div class='container text-center'>
                    <legend for="inputEmail"></legend>
                    <input class="input-xxlarge" type='text' name='email' id='email' placeholder="Email"
                           value='<?php echo $fgmembersite->SafeDisplay(' email ') ?>' maxlength="50"/>
                    <br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>
            </div>

            <div class="form-group">
                <!-- University -->
                <div class='container text-center'>
                    <legend for="university"></legend>
                    <select class="form-control input-xxlarge" style="height: 50px"  id="university" name='university' >
                        <option value="TU Clausthal">TU Clausthal</option>
                        <option value="Vancouver Island University">Vancouver Island University</option>
                        <option value="University of Tyumen">University of Tyumen</option>
                        <option value="Tallin University">Tallin University</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <!-- Username -->

                <div class='container text-center'>
                    <legend for="username"></legend>
                    <input type='text' class="input-xxlarge" name='username' id='username' placeholder="Username"
                           value='<?php echo $fgmembersite->SafeDisplay(' username ') ?>' maxlength="50"/>
                    <br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>
            </div>

            <div class="form-group">
                <!-- Password -->
                <div class='container text-center'>
                    <legend for="password"></legend>
                    <input type='password' class="input-xxlarge" name='password' id='password' placeholder="Password"
                           maxlength="50"/>
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>
            </div>

            <div class="form-group">
                <!-- Submit Button -->
                <div class='container'>
                    <legend></legend>
                    <input type='submit' class="btn-large" name='Submit' style="width: 20%" value='Submit'/>
                </div>
            </div>

            <div class="form-group">
                <!-- Submit Button -->
                <div class='container'>
                    <div class="row">
                    <h5><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></h5>
                    </div>
                </div>
            </div>



        </fieldset>
    </form>
</div>


<script type='text/javascript'>
    var frmvalidator = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name", "req", "Please provide your name");

    frmvalidator.addValidation("email", "req", "Please provide your email address");

    frmvalidator.addValidation("email", "email", "Please provide a valid email address");

    frmvalidator.addValidation("username", "req", "Please provide a username");

    frmvalidator.addValidation("password", "req", "Please provide a password");
</script>

<!--Form Code End -->

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
                        <i class="icon-home"></i><strong>Address:</strong> Julis-Albert-Strasse
                        <br>38678-ClausthalZellerfeld
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

<script src="vendor/jquery/jquery-1.9.1.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/others/js/main.js"></script>

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