<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
        echo ("Done");
   }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<body>

<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registration | Nova</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Register</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>

</head>

<body>

<!--Header-->
<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="pull-left" href="index.html">
                <img src="images/logo.gif" alt=" " width="100%" style="max-height:400px">
            </a>


            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li class="active"><a href="index.html">Home</a></li>

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
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"> Member Login </i></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->


        <!--
        <div class="nav-collapse collapse pull-right">
            <ul class="nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="career.html">Career</a></li>
                        <li><a href="blog-item.html">Blog Single</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="registration.html">Registration</a></li>
                        <li class="divider"></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                        <li><a href="terms.html">Terms of Use</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact-us.html">Contact</a></li>
                <li class="login">
                    <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->


        </div>
    </div>
</header>
<!-- /header -->

<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>Registration</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Registration</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->


<section id="registration-page" class="container">

    <form class="center" id='register' action='<?php echo $fgmembersite->GetSelfScript();?>' method="POST" >
        <fieldset class="registration-form">

        <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

        <div class='container'>
                <div class="control-group">
                <!-- E-mail -->
                <div class="controls">
                <!--<label for='name' >Your Full Name*: </label><br/>-->
                    <input type='text' placeholder="Your Full Name" name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>
                </div>
        </div>

        <div class='container'>
        <div class="control-group">
                <!-- E-mail -->
                <div class="controls">
                <!--<label for='email' >Email Address*:</label><br/>-->
                    <input type='text' placeholder="Email Address" name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>
                </div>
        </div>
        
       <div class='container'>
        <div class="control-group">
                <!-- E-mail -->
                <div class="controls">
            <!--<label for='username' >UserName*:</label><br/>-->
                    <input type='text' placeholder="UserName" name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>
            </div>
        </div>
        
       <div class='container'>
        <div class="control-group">
                <!-- E-mail -->
                <div class="controls">
            <!--<label for='password' >Password*:</label><br/>-->
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <noscript>
                    <input type='password' placeholder="Password" name='password' id='password' maxlength="50" />
                    </noscript>    
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>
        </div>
    </div>


       <div class='container'>
        <div class="control-group">
                <!-- E-mail -->
                <div class="controls">
                    <input type='submit' name='Submit' value='Submit' />
                </div>
        </div>
    </div>

        </fieldset>
    </form>
    <!--</div>-->
</section>

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();

    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");

    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>


<!-- /#registration-page -->

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
            <!--
        <div class="span3">
            <h4>FLICKR GALLERY</h4>
            <div class="row-fluid first">
                <ul class="thumbnails">
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/"
                           title="01 (254) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75"
                                height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/"
                           title="01 (196) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75"
                                height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/"
                           title="01 (65) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75"
                                height="75" alt="01 (65)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/"
                           title="01 (6) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75"
                                height="75" alt="01 (6)"></a>
                    </li>
                </ul>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails">
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/"
                           title="01 (6) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75"
                                height="75" alt="01 (6)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/"
                           title="01 (254) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75"
                                height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/"
                           title="01 (196) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75"
                                height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/"
                           title="01 (65) by Victor1558, on Flickr"><img
                                src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75"
                                height="75" alt="01 (65)"></a>
                    </li>
                </ul>
            </div>

        </div>
        -->

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
                    <!--
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-pinterest"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-google-plus"></i></a></li>
                <li><a href="#"><i class="icon-youtube"></i></a></li>
                <li><a href="#"><i class="icon-tumblr"></i></a></li>
                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                <li><a href="#"><i class="icon-rss"></i></a></li>
                <li><a href="#"><i class="icon-instagram"></i></a></li>
                -->
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

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" action="registration_update.php" method="post" id="form-login">
            <input type="text" class="input-small" name="email" placeholder="Email">
            <input type="password" class="input-small" name="password" placeholder="Password">
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

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



