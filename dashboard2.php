<?PHP
require_once('resources/phpmail/include/membersite_config.php');

if (!$fgmembersite->CheckLogin()
) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

if (isset($_POST['submitted'])) {
    if ($fgmembersite->UpdateProfile()) {
        $fgmembersite->RedirectToURL("dashboard2.php");

    }
}

if (isset($_POST['image_submitted'])) {
    if ($fgmembersite->uploadImage()) {
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
                <form id="form-profilepic" action='<?php echo($fgmembersite->GetSelfScript()); ?>' method='post'
                      enctype="multipart/form-data">
                    <input type='hidden' name='image_submitted' id='image_submitted' value='1'/>
                    <div class="container">
                        <img src="<?php if (file_exists("images/uploads/" . $fgmembersite->UserEmail() . ".png"))
                            echo("images/uploads/" . $fgmembersite->UserEmail() . ".png");
                        else
                            echo("http://s3.amazonaws.com/37assets/svn/765-default-avatar.png")
                        ?>"
                             class="img-thumbnail img-rounded img-responsive" "/>
                        <div style="padding:10px;">
                            <div class="uploadButton">
                                <input type="file" id="fileToUpload" name="fileToUpload"/>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="active">
                <a href="dashboard2.php">Profile Update</a>
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

            <div class="row">
                <div class="col-lg-4" style="margin-top: 1cm">
                    <form id='updateprofile' class="" action='<?php echo($fgmembersite->GetSelfScript()); ?>'
                          method='post' accept-charset='UTF-8'>
                        <input type='hidden' name='submitted' id='submitted' value='1'/>

                        <?php
                        $formvars = $fgmembersite->CollectProfileData();
                        ?>


                </div>
            </div>


            <div class="container-fluid">
                <div class="col-lg-6" style="margin-top: 0cm">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label">Title</label>
                        <div class="col-9">
                            <select class="form-control input-block-level" id="title" name='title'>
                                <option <?php if ($formvars['title'] == 'Prof') {
                                    echo("selected");
                                } ?> value="Prof">Prof
                                </option>
                                <option <?php if ($formvars['title'] == 'Dr') {
                                    echo("selected");
                                } ?> value="Dr">Dr
                                </option>
                                <option <?php if ($formvars['title'] == 'Master') {
                                    echo("selected");
                                } ?> value="Master">Master
                                </option>
                                <option <?php if ($formvars['title'] == 'Bachelor') {
                                    echo("selected");
                                } ?> value="Bachelor">Bachelor
                                </option>
                                <option <?php if ($formvars['title'] == 'Mr') {
                                    echo("selected");
                                } ?> value="Mr">Mr
                                </option>
                                <option <?php if ($formvars['title'] == 'Ms') {
                                    echo("selected");
                                } ?> value="Ms">Mrs
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label">Gender</label>
                        <div class="col-9">
                            <select class="form-control input-block-level" id="gender" name='gender'>
                                <option <?php if ($formvars['gender'] == 'Male') {
                                    echo("selected");
                                } ?> value="Male">Male
                                </option>
                                <option <?php if ($formvars['gender'] == 'Female') {
                                    echo("selected");
                                } ?> value="Female">Female
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label">Full Name</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['name'] ?>"
                                   name='name' id='name'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-3 col-form-label">Public Email</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="email"
                                   value="<?php echo $formvars['public_email'] ?>"
                                   name='public_email'
                                   id='public_email'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-3 col-form-label">Telephone</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="tel"
                                   value="<?php echo $formvars['telephone'] ?>"
                                   id="telephone"
                                   name="telephone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-3 col-form-label">Skype</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['skype'] ?>"
                                   id="skype"
                                   name="skype">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-3 col-form-label">Study Major</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['faculty'] ?>"
                                   id="faculty"
                                   name="faculty">
                        </div>
                    </div>

                </div>

                <div class="col-lg-6" style="margin-top: 0cm">

                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-3 col-form-label">Date Of Birth</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="date"
                                   value="<?php echo $formvars['date_of_birth'] ?>"
                                   id="date_of_birth"
                                   name="date_of_birth">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-3 col-form-label">Place Of
                            Birth</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['place_of_birth'] ?>"
                                   id="place_of_birth"
                                   name="place_of_birth">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label">Nationality</label>
                        <div class="col-9">
                            <select class="form-control input-block-level" id="nationality" name='nationality'>
                                <option <?php if ($formvars['nationality'] == 'select ') {
                                    echo("selected");
                                } ?> value="">-- select one --
                                </option>
                                <option <?php if ($formvars['nationality'] == 'afghan') {
                                    echo("selected");
                                } ?> value="afghan">Afghan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'albanian') {
                                    echo("selected");
                                } ?> value="albanian">Albanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'algerian') {
                                    echo("selected");
                                } ?> value="algerian">Algerian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'american') {
                                    echo("selected");
                                } ?> value="american">American
                                </option>
                                <option <?php if ($formvars['nationality'] == 'andorran') {
                                    echo("selected");
                                } ?> value="andorran">Andorran
                                </option>
                                <option <?php if ($formvars['nationality'] == 'angolan') {
                                    echo("selected");
                                } ?> value="angolan">Angolan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'antiguans') {
                                    echo("selected");
                                } ?> value="antiguans">Antiguans
                                </option>
                                <option <?php if ($formvars['nationality'] == 'argentinean') {
                                    echo("selected");
                                } ?> value="argentinean">Argentinean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'armenian') {
                                    echo("selected");
                                } ?> value="armenian">Armenian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'australian') {
                                    echo("selected");
                                } ?> value="australian">Australian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'austrian') {
                                    echo("selected");
                                } ?> value="austrian">Austrian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'azerbaijani') {
                                    echo("selected");
                                } ?> value="azerbaijani">Azerbaijani
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bahamian') {
                                    echo("selected");
                                } ?> value="bahamian">Bahamian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bahraini') {
                                    echo("selected");
                                } ?> value="bahraini">Bahraini
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bangladeshi') {
                                    echo("selected");
                                } ?> value="bangladeshi">Bangladeshi
                                </option>
                                <option <?php if ($formvars['nationality'] == 'barbadian') {
                                    echo("selected");
                                } ?> value="barbadian">Barbadian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'barbudans') {
                                    echo("selected");
                                } ?> value="barbudans">Barbudans
                                </option>
                                <option <?php if ($formvars['nationality'] == 'batswana') {
                                    echo("selected");
                                } ?> value="batswana">Batswana
                                </option>
                                <option <?php if ($formvars['nationality'] == 'belarusian') {
                                    echo("selected");
                                } ?> value="belarusian">Belarusian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'belgian') {
                                    echo("selected");
                                } ?> value="belgian">Belgian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'belizean') {
                                    echo("selected");
                                } ?> value="belizean">Belizean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'beninese') {
                                    echo("selected");
                                } ?> value="beninese">Beninese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bhutanese') {
                                    echo("selected");
                                } ?> value="bhutanese">Bhutanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bolivian') {
                                    echo("selected");
                                } ?> value="bolivian">Bolivian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bosnian') {
                                    echo("selected");
                                } ?> value="bosnian">Bosnian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'brazilian') {
                                    echo("selected");
                                } ?> value="brazilian">Brazilian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'british') {
                                    echo("selected");
                                } ?> value="british">British
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bruneian') {
                                    echo("selected");
                                } ?> value="bruneian">Bruneian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'bulgarian') {
                                    echo("selected");
                                } ?> value="bulgarian">Bulgarian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'burkinabe') {
                                    echo("selected");
                                } ?> value="burkinabe">Burkinabe
                                </option>
                                <option <?php if ($formvars['nationality'] == 'burmese') {
                                    echo("selected");
                                } ?> value="burmese">Burmese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'burundian') {
                                    echo("selected");
                                } ?> value="burundian">Burundian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'cambodian') {
                                    echo("selected");
                                } ?> value="cambodian">Cambodian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'cameroonian') {
                                    echo("selected");
                                } ?> value="cameroonian">Cameroonian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'canadian') {
                                    echo("selected");
                                } ?> value="canadian">Canadian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'cape ') {
                                    echo("selected");
                                } ?> value="cape verdean">Cape Verdean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'central ') {
                                    echo("selected");
                                } ?> value="central african">Central African
                                </option>
                                <option <?php if ($formvars['nationality'] == 'chadian') {
                                    echo("selected");
                                } ?> value="chadian">Chadian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'chilean') {
                                    echo("selected");
                                } ?> value="chilean">Chilean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'chinese') {
                                    echo("selected");
                                } ?> value="chinese">Chinese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'colombian') {
                                    echo("selected");
                                } ?> value="colombian">Colombian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'comoran') {
                                    echo("selected");
                                } ?> value="comoran">Comoran
                                </option>
                                <option <?php if ($formvars['nationality'] == 'congolese') {
                                    echo("selected");
                                } ?> value="congolese">Congolese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'costa ') {
                                    echo("selected");
                                } ?> value="costa rican">Costa Rican
                                </option>
                                <option <?php if ($formvars['nationality'] == 'croatian') {
                                    echo("selected");
                                } ?> value="croatian">Croatian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'cuban') {
                                    echo("selected");
                                } ?> value="cuban">Cuban
                                </option>
                                <option <?php if ($formvars['nationality'] == 'cypriot') {
                                    echo("selected");
                                } ?> value="cypriot">Cypriot
                                </option>
                                <option <?php if ($formvars['nationality'] == 'czech') {
                                    echo("selected");
                                } ?> value="czech">Czech
                                </option>
                                <option <?php if ($formvars['nationality'] == 'danish') {
                                    echo("selected");
                                } ?> value="danish">Danish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'djibouti') {
                                    echo("selected");
                                } ?> value="djibouti">Djibouti
                                </option>
                                <option <?php if ($formvars['nationality'] == 'dominican') {
                                    echo("selected");
                                } ?> value="dominican">Dominican
                                </option>
                                <option <?php if ($formvars['nationality'] == 'dutch') {
                                    echo("selected");
                                } ?> value="dutch">Dutch
                                </option>
                                <option <?php if ($formvars['nationality'] == 'east ') {
                                    echo("selected");
                                } ?> value="east timorese">East Timorese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ecuadorean') {
                                    echo("selected");
                                } ?> value="ecuadorean">Ecuadorean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'egyptian') {
                                    echo("selected");
                                } ?> value="egyptian">Egyptian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'emirian') {
                                    echo("selected");
                                } ?> value="emirian">Emirian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'equatorial ') {
                                    echo("selected");
                                } ?> value="equatorial guinean">Equatorial Guinean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'eritrean') {
                                    echo("selected");
                                } ?> value="eritrean">Eritrean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'estonian') {
                                    echo("selected");
                                } ?> value="estonian">Estonian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ethiopian') {
                                    echo("selected");
                                } ?> value="ethiopian">Ethiopian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'fijian') {
                                    echo("selected");
                                } ?> value="fijian">Fijian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'filipino') {
                                    echo("selected");
                                } ?> value="filipino">Filipino
                                </option>
                                <option <?php if ($formvars['nationality'] == 'finnish') {
                                    echo("selected");
                                } ?> value="finnish">Finnish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'french') {
                                    echo("selected");
                                } ?> value="french">French
                                </option>
                                <option <?php if ($formvars['nationality'] == 'gabonese') {
                                    echo("selected");
                                } ?> value="gabonese">Gabonese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'gambian') {
                                    echo("selected");
                                } ?> value="gambian">Gambian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'georgian') {
                                    echo("selected");
                                } ?> value="georgian">Georgian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'german') {
                                    echo("selected");
                                } ?> value="german">German
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ghanaian') {
                                    echo("selected");
                                } ?> value="ghanaian">Ghanaian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'greek') {
                                    echo("selected");
                                } ?> value="greek">Greek
                                </option>
                                <option <?php if ($formvars['nationality'] == 'grenadian') {
                                    echo("selected");
                                } ?> value="grenadian">Grenadian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'guatemalan') {
                                    echo("selected");
                                } ?> value="guatemalan">Guatemalan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'guinea') {
                                    echo("selected");
                                } ?> value="guinea-bissauan">Guinea-Bissauan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'guinean') {
                                    echo("selected");
                                } ?> value="guinean">Guinean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'guyanese') {
                                    echo("selected");
                                } ?> value="guyanese">Guyanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'haitian') {
                                    echo("selected");
                                } ?> value="haitian">Haitian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'herzegovinian') {
                                    echo("selected");
                                } ?> value="herzegovinian">Herzegovinian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'honduran') {
                                    echo("selected");
                                } ?> value="honduran">Honduran
                                </option>
                                <option <?php if ($formvars['nationality'] == 'hungarian') {
                                    echo("selected");
                                } ?> value="hungarian">Hungarian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'icelander') {
                                    echo("selected");
                                } ?> value="icelander">Icelander
                                </option>
                                <option <?php if ($formvars['nationality'] == 'indian') {
                                    echo("selected");
                                } ?> value="indian">Indian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'indonesian') {
                                    echo("selected");
                                } ?> value="indonesian">Indonesian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'iranian') {
                                    echo("selected");
                                } ?> value="iranian">Iranian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'iraqi') {
                                    echo("selected");
                                } ?> value="iraqi">Iraqi
                                </option>
                                <option <?php if ($formvars['nationality'] == 'irish') {
                                    echo("selected");
                                } ?> value="irish">Irish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'israeli') {
                                    echo("selected");
                                } ?> value="israeli">Israeli
                                </option>
                                <option <?php if ($formvars['nationality'] == 'italian') {
                                    echo("selected");
                                } ?> value="italian">Italian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ivorian') {
                                    echo("selected");
                                } ?> value="ivorian">Ivorian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'jamaican') {
                                    echo("selected");
                                } ?> value="jamaican">Jamaican
                                </option>
                                <option <?php if ($formvars['nationality'] == 'japanese') {
                                    echo("selected");
                                } ?> value="japanese">Japanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'jordanian') {
                                    echo("selected");
                                } ?> value="jordanian">Jordanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'kazakhstani') {
                                    echo("selected");
                                } ?> value="kazakhstani">Kazakhstani
                                </option>
                                <option <?php if ($formvars['nationality'] == 'kenyan') {
                                    echo("selected");
                                } ?> value="kenyan">Kenyan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'kittian ') {
                                    echo("selected");
                                } ?> value="kittian and nevisian">Kittian and Nevisian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'kuwaiti') {
                                    echo("selected");
                                } ?> value="kuwaiti">Kuwaiti
                                </option>
                                <option <?php if ($formvars['nationality'] == 'kyrgyz') {
                                    echo("selected");
                                } ?> value="kyrgyz">Kyrgyz
                                </option>
                                <option <?php if ($formvars['nationality'] == 'laotian') {
                                    echo("selected");
                                } ?> value="laotian">Laotian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'latvian') {
                                    echo("selected");
                                } ?> value="latvian">Latvian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'lebanese') {
                                    echo("selected");
                                } ?> value="lebanese">Lebanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'liberian') {
                                    echo("selected");
                                } ?> value="liberian">Liberian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'libyan') {
                                    echo("selected");
                                } ?> value="libyan">Libyan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'liechtensteiner') {
                                    echo("selected");
                                } ?> value="liechtensteiner">Liechtensteiner
                                </option>
                                <option <?php if ($formvars['nationality'] == 'lithuanian') {
                                    echo("selected");
                                } ?> value="lithuanian">Lithuanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'luxembourger') {
                                    echo("selected");
                                } ?> value="luxembourger">Luxembourger
                                </option>
                                <option <?php if ($formvars['nationality'] == 'macedonian') {
                                    echo("selected");
                                } ?> value="macedonian">Macedonian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'malagasy') {
                                    echo("selected");
                                } ?> value="malagasy">Malagasy
                                </option>
                                <option <?php if ($formvars['nationality'] == 'malawian') {
                                    echo("selected");
                                } ?> value="malawian">Malawian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'malaysian') {
                                    echo("selected");
                                } ?> value="malaysian">Malaysian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'maldivan') {
                                    echo("selected");
                                } ?> value="maldivan">Maldivan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'malian') {
                                    echo("selected");
                                } ?> value="malian">Malian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'maltese') {
                                    echo("selected");
                                } ?> value="maltese">Maltese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'marshallese') {
                                    echo("selected");
                                } ?> value="marshallese">Marshallese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mauritanian') {
                                    echo("selected");
                                } ?> value="mauritanian">Mauritanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mauritian') {
                                    echo("selected");
                                } ?> value="mauritian">Mauritian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mexican') {
                                    echo("selected");
                                } ?> value="mexican">Mexican
                                </option>
                                <option <?php if ($formvars['nationality'] == 'micronesian') {
                                    echo("selected");
                                } ?> value="micronesian">Micronesian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'moldovan') {
                                    echo("selected");
                                } ?> value="moldovan">Moldovan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'monacan') {
                                    echo("selected");
                                } ?> value="monacan">Monacan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mongolian') {
                                    echo("selected");
                                } ?> value="mongolian">Mongolian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'moroccan') {
                                    echo("selected");
                                } ?> value="moroccan">Moroccan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mosotho') {
                                    echo("selected");
                                } ?> value="mosotho">Mosotho
                                </option>
                                <option <?php if ($formvars['nationality'] == 'motswana') {
                                    echo("selected");
                                } ?> value="motswana">Motswana
                                </option>
                                <option <?php if ($formvars['nationality'] == 'mozambican') {
                                    echo("selected");
                                } ?> value="mozambican">Mozambican
                                </option>
                                <option <?php if ($formvars['nationality'] == 'namibian') {
                                    echo("selected");
                                } ?> value="namibian">Namibian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'nauruan') {
                                    echo("selected");
                                } ?> value="nauruan">Nauruan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'nepalese') {
                                    echo("selected");
                                } ?> value="nepalese">Nepalese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'new ') {
                                    echo("selected");
                                } ?> value="new zealander">New Zealander
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ni') {
                                    echo("selected");
                                } ?> value="ni-vanuatu">Ni-Vanuatu
                                </option>
                                <option <?php if ($formvars['nationality'] == 'nicaraguan') {
                                    echo("selected");
                                } ?> value="nicaraguan">Nicaraguan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'nigerien') {
                                    echo("selected");
                                } ?> value="nigerien">Nigerien
                                </option>
                                <option <?php if ($formvars['nationality'] == 'north ') {
                                    echo("selected");
                                } ?> value="north korean">North Korean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'northern ') {
                                    echo("selected");
                                } ?> value="northern irish">Northern Irish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'norwegian') {
                                    echo("selected");
                                } ?> value="norwegian">Norwegian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'omani') {
                                    echo("selected");
                                } ?> value="omani">Omani
                                </option>
                                <option <?php if ($formvars['nationality'] == 'pakistani') {
                                    echo("selected");
                                } ?> value="pakistani">Pakistani
                                </option>
                                <option <?php if ($formvars['nationality'] == 'palauan') {
                                    echo("selected");
                                } ?> value="palauan">Palauan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'panamanian') {
                                    echo("selected");
                                } ?> value="panamanian">Panamanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'papua ') {
                                    echo("selected");
                                } ?> value="papua new guinean">Papua New Guinean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'paraguayan') {
                                    echo("selected");
                                } ?> value="paraguayan">Paraguayan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'peruvian') {
                                    echo("selected");
                                } ?> value="peruvian">Peruvian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'polish') {
                                    echo("selected");
                                } ?> value="polish">Polish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'portuguese') {
                                    echo("selected");
                                } ?> value="portuguese">Portuguese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'qatari') {
                                    echo("selected");
                                } ?> value="qatari">Qatari
                                </option>
                                <option <?php if ($formvars['nationality'] == 'romanian') {
                                    echo("selected");
                                } ?> value="romanian">Romanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'russian') {
                                    echo("selected");
                                } ?> value="russian">Russian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'rwandan') {
                                    echo("selected");
                                } ?> value="rwandan">Rwandan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'saint ') {
                                    echo("selected");
                                } ?> value="saint lucian">Saint Lucian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'salvadoran') {
                                    echo("selected");
                                } ?> value="salvadoran">Salvadoran
                                </option>
                                <option <?php if ($formvars['nationality'] == 'samoan') {
                                    echo("selected");
                                } ?> value="samoan">Samoan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'san ') {
                                    echo("selected");
                                } ?> value="san marinese">San Marinese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'sao ') {
                                    echo("selected");
                                } ?> value="sao tomean">Sao Tomean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'saudi') {
                                    echo("selected");
                                } ?> value="saudi">Saudi
                                </option>
                                <option <?php if ($formvars['nationality'] == 'scottish') {
                                    echo("selected");
                                } ?> value="scottish">Scottish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'senegalese') {
                                    echo("selected");
                                } ?> value="senegalese">Senegalese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'serbian') {
                                    echo("selected");
                                } ?> value="serbian">Serbian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'seychellois') {
                                    echo("selected");
                                } ?> value="seychellois">Seychellois
                                </option>
                                <option <?php if ($formvars['nationality'] == 'sierra ') {
                                    echo("selected");
                                } ?> value="sierra leonean">Sierra Leonean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'singaporean') {
                                    echo("selected");
                                } ?> value="singaporean">Singaporean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'slovakian') {
                                    echo("selected");
                                } ?> value="slovakian">Slovakian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'slovenian') {
                                    echo("selected");
                                } ?> value="slovenian">Slovenian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'solomon ') {
                                    echo("selected");
                                } ?> value="solomon islander">Solomon Islander
                                </option>
                                <option <?php if ($formvars['nationality'] == 'somali') {
                                    echo("selected");
                                } ?> value="somali">Somali
                                </option>
                                <option <?php if ($formvars['nationality'] == 'south ') {
                                    echo("selected");
                                } ?> value="south african">South African
                                </option>
                                <option <?php if ($formvars['nationality'] == 'south ') {
                                    echo("selected");
                                } ?> value="south korean">South Korean
                                </option>
                                <option <?php if ($formvars['nationality'] == 'spanish') {
                                    echo("selected");
                                } ?> value="spanish">Spanish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'sri ') {
                                    echo("selected");
                                } ?> value="sri lankan">Sri Lankan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'sudanese') {
                                    echo("selected");
                                } ?> value="sudanese">Sudanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'surinamer') {
                                    echo("selected");
                                } ?> value="surinamer">Surinamer
                                </option>
                                <option <?php if ($formvars['nationality'] == 'swazi') {
                                    echo("selected");
                                } ?> value="swazi">Swazi
                                </option>
                                <option <?php if ($formvars['nationality'] == 'swedish') {
                                    echo("selected");
                                } ?> value="swedish">Swedish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'swiss') {
                                    echo("selected");
                                } ?> value="swiss">Swiss
                                </option>
                                <option <?php if ($formvars['nationality'] == 'syrian') {
                                    echo("selected");
                                } ?> value="syrian">Syrian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'taiwanese') {
                                    echo("selected");
                                } ?> value="taiwanese">Taiwanese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'tajik') {
                                    echo("selected");
                                } ?> value="tajik">Tajik
                                </option>
                                <option <?php if ($formvars['nationality'] == 'tanzanian') {
                                    echo("selected");
                                } ?> value="tanzanian">Tanzanian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'thai') {
                                    echo("selected");
                                } ?> value="thai">Thai
                                </option>
                                <option <?php if ($formvars['nationality'] == 'togolese') {
                                    echo("selected");
                                } ?> value="togolese">Togolese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'tongan') {
                                    echo("selected");
                                } ?> value="tongan">Tongan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'trinidadian ') {
                                    echo("selected");
                                } ?> value="trinidadian or tobagonian">Trinidadian or Tobagonian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'tunisian') {
                                    echo("selected");
                                } ?> value="tunisian">Tunisian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'turkish') {
                                    echo("selected");
                                } ?> value="turkish">Turkish
                                </option>
                                <option <?php if ($formvars['nationality'] == 'tuvaluan') {
                                    echo("selected");
                                } ?> value="tuvaluan">Tuvaluan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ugandan') {
                                    echo("selected");
                                } ?> value="ugandan">Ugandan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'ukrainian') {
                                    echo("selected");
                                } ?> value="ukrainian">Ukrainian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'uruguayan') {
                                    echo("selected");
                                } ?> value="uruguayan">Uruguayan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'uzbekistani') {
                                    echo("selected");
                                } ?> value="uzbekistani">Uzbekistani
                                </option>
                                <option <?php if ($formvars['nationality'] == 'venezuelan') {
                                    echo("selected");
                                } ?> value="venezuelan">Venezuelan
                                </option>
                                <option <?php if ($formvars['nationality'] == 'vietnamese') {
                                    echo("selected");
                                } ?> value="vietnamese">Vietnamese
                                </option>
                                <option <?php if ($formvars['nationality'] == 'welsh') {
                                    echo("selected");
                                } ?> value="welsh">Welsh
                                </option>
                                <option <?php if ($formvars['nationality'] == 'yemenite') {
                                    echo("selected");
                                } ?> value="yemenite">Yemenite
                                </option>
                                <option <?php if ($formvars['nationality'] == 'zambian') {
                                    echo("selected");
                                } ?> value="zambian">Zambian
                                </option>
                                <option <?php if ($formvars['nationality'] == 'zimbabwean') {
                                    echo("selected");
                                } ?> value="zimbabwean">Zimbabwean
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-color-input" class="col-3 col-form-label">Address</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['address'] ?>"
                                   id="address"
                                   name="address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-url-input" class="col-3 col-form-label">Personal URL</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="url"
                                   value="<?php echo $formvars['website'] ?>"
                                   name="website"
                                   id="website">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">Interests</label>
                        <div class="col-9">
                            <input class="form-control input-block-level" type="text"
                                   value="<?php echo $formvars['interest'] ?>"
                                   id="interest"
                                   name="interest">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-search-input" class="col-3 col-form-label">Biography</label>
                        <div class="col-9">
                                <textarea class="input-block-level" placeholder="Describe yourself here..."
                                          name="biography" id="biography"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary" style="width:80%;">Update
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
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
