<?PHP
require_once('resources/include/membersite_config.php');

if(isset($_GET['code']))
{
   if($fgmembersite->ConfirmUser())
   {
        $fgmembersite->RedirectToURL("thank-you-regd.html");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Confirm registration</title>
<!--      <link rel="STYLESHEET" type="text/css" href="../resources/css/fg_membersite.css" />-->
      <script type='text/javascript' src='../resources/library/scripts/phpmailer/gen_validatorv31.js'></script>
</head>

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

<h2>Confirm registration</h2>
<p>
Please enter the confirmation code in the box below
</p>

<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='confirm' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* required fields</div>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Confirmation Code:* </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("confirm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("code","req","Please enter the confirmation code");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>