<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bilal Munawar">

    <title>Map Item</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/animate.css" type="text/css">    

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">



    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/main.css" type="text/css">

    <link rel="stylesheet" href="css/jquery.maximage.css" type="text/css" media="screen" title="CSS" charset="utf-8" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="demo">
    
<div class="loader"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/blockhunt.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <div class="clearfix visible-xs-block"></div>

                <ul class="nav navbar-nav navbar-right">
                    
                    <li id="dt" class="dropdown">
                        <a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"> Login</a>



                        <ul class="dropdown-menu no-padding shadow loginpopup">
                            <li>

                                <form role="form" id="login-f" class="login">

                                    
                                    <div class="form-group">
                                        <input type="email" class="form-control normal-input" id="inputEmail" placeholder="Email" required>
                                    </div>

                                    <div class="form-group">

                                        <input type="password" id="login-password" name="login-password" class="form-control normal-input" placeholder="Password" required>
                                    </div>

                                    <div class="pos-adj1">
                                        <a class="fp" href="#" data-toggle="modal" data-target="#forgot-password" data-dismiss="modal" style="color: #23a500 !important; float: left; font-size: 9pt!important; padding: 0 !important; width: 50%;">Forgot Password ?</a>

                                        <div class="checkbox no-margin pull-right">
                                            <label class="pos-adj2">
                                              <input type="checkbox"> Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-default green-small3 margin-top-twenty">Login</button>
                                    <div class="pos-adj3">
                                        <span>Don't have an account ?</span>
                                        <a href="#" class="sup" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Sign up</a>
                                    </div>

                                    <div class="clearfix"></div>

                                    

                                    <div class="for-pass" style="display:none">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close closefp" type="button">×</button>
                                            <h4 class="modal-title">Reset Password</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" class="login no-border">
                                              <div class="form-group">
                                              <input type="email" class="form-control normal-input" id="InputEmail1" placeholder="Email Address">
                                              </div>

                                              <button type="submit" class="btn btn-default green-small">Reset Password</button>
                                              <p class="small-text margin-top-ten">We will send password to your email address shortly</p>
                                            </form>

                                        </div>
                                    </div>

                                    <!-- <div class="pos-adj3">
                                        <span>Don't have an account ?</span> <a href="#">Sign up</a>
                                    </div> -->
                                </form>

                                <a href="#" class="facebook">Login with Facebook</a>
                                <a href="#" class="googleplus">Login with Google Plus</a>

                            </li>
                            
                        </ul>
                    </li>
                    <li id="su" class="dropdown">
                        <a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown">Sign Up</a>
                        <ul class="dropdown-menu no-padding shadow loginpopup">
                            <li>
                                <form action="#" class="login">
                                    
                                    <div class="form-group">
                                    <input type="text" class="form-control normal-input" id="InputEmail1" placeholder="First Name" required>
                                    </div>

                                    <div class="form-group">
                                    <input type="text" class="form-control normal-input" id="InputEmail1" placeholder="Last Name" required>
                                    </div>

                                    <div class="form-group">
                                    <input type="email" class="form-control normal-input" id="InputEmail1" placeholder="Email" required>
                                    </div>

                                    <div class="form-group">
                                    <input type="password" class="form-control normal-input" id="InputPasswords" placeholder="Password" required>
                                    </div>

                                    <div class="pos-adj4">
                                        By signing up you accept Mapitem's <a href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Policy</a> and <a href="#" style="color:#23a500 !important; font-size: 10pt !important; padding: 0 !important;">Term of use</a>
                                    </div>

                                    <button type="submit" class="btn btn-default green-small3">Sign up</button>

                                    <div class="pos-adj3">
                                        <span>Already a member ? </span> <a class="si" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Sign in</a>
                                    </div>

                                </form>

                            </li>
                            
                        </ul>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"><i class="glyphicon glyphicon-user round2"></i> Max Ezoory  <b class="glyphicon glyphicon-menu-down c-adj2"></b></a>
                        <ul class="dropdown-menu dashboard">
                            <li class="">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="">
                                <a href="#">Profile</a>
                            </li>
                            <li class="">
                                <a href="#">Wishlist</a>
                            </li>
                            <li class="">
                                <a href="#">Sign out</a>
                            </li>
                            
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a href="#" class="def" data-toggle="modal" data-target="#pfa">Post free ad </a>
                        
                    </li>
                    <script type="text/javascript">
                        
                    </script>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Modal -->
    <div id="pfa" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Post Free Ad</h4>
          </div>
          <div class="modal-body">

            <div id="rootwizard">

                <ul class="nav nav-tabs nav-tabs-top pf-modal" role="tablist">
                    <li class="ta"><a href="#tab1" data-toggle="tab">1. Title - Description</a></li>
                    <li class="ta"><a href="#tab2" data-toggle="tab">2. Upload Images</a></li>
                    <li class="ta"><a href="#tab3" data-toggle="tab">3. Location</a></li>
                </ul>

                <form class="tab-content adj1">
                    
                    <div id="tab1" class="tab-pane">
                        <select class="form-control medium-select" id="sel1">
                            <option id="selected">Coumminty</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        <select class="form-control medium-select" id="sel1">
                        <option id="selected">Events</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        </select>
                        <div class="row">
                            <div class="col-lg-8">
                            <input type="text" class="form-control normal-input margin-adj" id="adtitle" placeholder="Ad Title">
                            </div>
                            <div class="col-lg-4">
                            <input type="text" class="form-control normal-input margin-adj" id="price" placeholder="Price">  
                            </div>
                        </div>
                        <textarea class="form-control medium-textarea" rows="4" placeholder="Ad Description"></textarea>
                    </div>

                    <div id="tab2" class="tab-pane">
                        <div class="image_upload_div">                      
                            <div id="dropzoneimage" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>                 
                        </div>
                    </div>

                    <div id="tab3" class="tab-pane">

                        <input type="text" class="form-control normal-input margin-adj" id="adaddress" placeholder="Ad Address">
                        <div class="map-address">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13598.001561973482!2d74.31768755!3d31.565323199999998!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1458218451359" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <a href="#" class="green-small2 no-textdecor" >Post Free Add</a>

                    </div>

                    <ul class="pager wizard">
                                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                <li class="next"><a href="#">Next</a></li>
                            </ul>

                </form>
            </div>

          </div>
          <div class="clearfix margin-twenty"></div>
          <div class="modal-footer">
            <!-- <ul class="nav nav-tabs nav-tabs-bottom pf-modal" role="tablist">
                <li class="ta active"><a href="#title" class="bs-overwrite" aria-controls="home" role="tab" data-toggle="tab">Step 1</a></li>
                <li class="ta"><a href="#image" class="bs-overwrite" aria-controls="profile" role="tab" data-toggle="tab">Step 2</a></li>
                <li class="ta"><a class="bs-overwrite" href="#location" aria-controls="profile" role="tab" data-toggle="tab">Step 3</a></li>
            </ul> -->

            <!-- <a href="#" class="grey-small pull-left no-textdecor" >Previous</a>
            <a href="#" class="green-small pull-left no-textdecor">Next</a>
            <a href="#" class="done-small green-small hide pull-left no-textdecor">Done</a> -->

            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
    </div>

    <div class="container-fluid no-padding height-adj1">
        <div id="maximage">
            <!-- <div class="first-item">
                <img src="images/rental-background.jpg" alt="" />
                <img id="gradient" src="images/mobile.jpg" alt="" />
               
            </div> -->
            <img class="main-img" src="images/car.jpg" alt="" />
            <img class="main-img" src="images/rental-background.jpg" alt="" />
            <img class="main-img" src="images/couch.jpg" alt="" />
            <img class="main-img" src="images/mobile.jpg" alt="" />
        </div>
        
        <div class="banner-text">
            <h1>Social Marketplace</h1>
            <h2>Friendly, Secure, & Fun</h2>
            <a class="hiw" href="#">Checkout How it works</a>
        </div>
        <!-- Search bar -->
        <div class="pos-adj5">
            <div class="container">

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding cat">
                    <button type="button" class="btn cat-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Category
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu h-ctr">
                        <li class="no-border"><h4 class="no-margin">Main Heading 1</h4>
                                <ul>
                                    <li><a href="#">This is first</a></li>
                                    <li><a href="#">This is second</a></li>
                                    <li><a href="#">This is third</a></li>
                                </ul>

                        </li>
                        <li class="no-border"><h4 class="no-margin">Main Heading 2</h4>
                                <ul>
                                    <li><a href="#">This is first</a></li>
                                    <li><a href="#">This is second</a></li>
                                    <li><a href="#">This is third</a></li>
                                </ul>

                        </li>
                        <li class="no-border"><h4 class="no-margin">Main Heading 3</h4>
                                <ul>
                                    <li><a href="#">This is first</a></li>
                                    <li><a href="#">This is second</a></li>
                                    <li><a href="#">This is third</a></li>
                                </ul>

                        </li>
                        <li class="no-border"><h4 class="no-margin">Main Heading 4</h4>
                                <ul>
                                    <li><a href="#">This is first</a></li>
                                    <li><a href="#">This is second</a></li>
                                    <li><a href="#">This is third</a></li>
                                </ul>

                        </li>
                    </ul>
                </div>



                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding pos-rel">
                    <input type="email" class="ct form-control large-input col-lg-4 input-title" id="InputEmail1" placeholder="Search">
                    <div class="ct-list">
                       <ul>
                            <li><a href="#">This is one</a></li>
                            <li><a href="#">This is two</a></li>
                        </ul> 
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <input type="email" class="form-control large-input col-lg-4 input-title" id="InputEmail1" placeholder="Location">
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding cat">
                    <button type="button" class="btn srch-btn dropdown-toggle">
                    Search
                    </button>
                </div>

            </div>
        </div>
        <!-- Inner Body -->
        <div class="container">
            <div class="clearfix"></div>
            <div class="hd2"><h2>Community Postings</h2></div>
            <!-- community posting start -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>  

                    <div class="box">

                        <div class="img-box">

                            <img src="images/sb-i.jpg" class="">

                        </div>

                        

                        <div class="box-content">

                            <h5>Hill Vacations</h5>
                            <h6>$500</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-5.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-2.jpg" alt="Hill Vaction" class="">
                        </div>

                        <div class="box-content">

                            <h5>Honda Civic</h5>
                            <h6>   $10000</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-4.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-3.jpg" alt="Hill Vaction" class="">
                        </div>

                        <div class="box-content">

                            <h5>Beautiful Room for rent</h5>
                            <h6>   $500</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-4.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-4.jpg" alt="Hill Vaction" class="">
                        </div>

                    <div class="box-content">

                        <h5>MacBook Pro</h5>
                        <h6>   $1200</h6>

                        <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-5.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                    </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/sb-i.jpg" class="">

                        </div>

                        

                        <div class="box-content">

                            <h5>Hill Vacations</h5>
                            <h6>$500</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-5.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-2.jpg" alt="Hill Vaction" class="">
                        </div>

                        <div class="box-content">

                            <h5>Honda Civic</h5>
                            <h6>   $10000</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-4.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-3.jpg" alt="Hill Vaction" class="">
                        </div>

                        <div class="box-content">

                            <h5>Beautiful Room for rent</h5>
                            <h6>   $500</h6>

                            <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-4.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">

                    <a href="#" class="wsh-lst2">
                                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                            <g>
                                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                    L171.747,0.078z"/>
                                            </g>
                                            </svg>
                    </a>

                    <div class="box">

                        <div class="img-box">

                            <img src="images/a-pic-4.jpg" alt="Hill Vaction" class="">
                        </div>

                    <div class="box-content">

                        <h5>MacBook Pro</h5>
                        <h6>   $1200</h6>

                        <div class="clearfix margin-bottom-ten"></div>

                            <img src="images/pp-5.jpg" class="pull-left width-adj2">
                            <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place tourist comes from far many places
                                    
                                </p>
                            </div>

                    </div>

                    </div>

                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-12">
                <button type="submit" class="btn green-medium pull-right">View More</button>
            </div>

            <div class="clearfix"></div>

            <div class="hd2"><h2>How it Works</h2></div>

            <div class="margin-adj2">

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12  hiwd">

                    <b>Posting an ad on Mapitem is super-easy!</b>
                    <div class="clearfix"></div>
                    <ul>

                        <li>
                            <span>1 - </span>
                            <p>Sign up first, enter info on your profile page, and get verified to accept electronic payment.</p>
                        </li>
                        <li>
                            <span>2 - </span>
                            <p>Posting an ad is a cost-free and easy way for users to get their items listed and sold. Takes just a couple minutes max.
                            </p>
                        </li>
                        <li>
                            <span>3 - </span>
                            <p>Get offers from fellow community members and accept a bid that suits your liking.</p>
                        </li>

                    </ul>


                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
                    <img src="images/signup.jpg" class="img-responsive marginauto">
                </div>

                <div class="ol-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
                    <img src="images/pa.jpg" class="img-responsive marginauto">
                </div>

                <div class="ol-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
                    <img src="images/get-offers.jpg" class="img-responsive marginauto">
                </div>
                
            </div> 
            


            <div class="col-lg-12">

                    <button type="submit" class="btn green-medium pull-right">Get Started</button>

            </div>

        </div>
            <!-- Footer -->
    <footer>
        <div class="first-strip">
            <div class="container">
                <a href="#">Blog</a>
                |
                <a href="#">Site Map</a>
                |
                <a href="#">Privacy</a>
                |
                <a href="#">About Us</a>
                |
                <a href="#">Contact Us</a>
                |
                <a href="#">Help</a>
                |
                <a href="#">Terms & Conditions</a>
            </div>    
        </div>
        <div class="second-strip">
                    <div class="container">

                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            <button data-target="#pfa" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            <a class="round fa fa-fw" href="#"></a>

                            <a class="round fa fa-fw" href="#"></a>

                            <a class="round fa fa-fw" href="#"></a>

                        </div>

                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
                    </div>
                </div>
        <div class="third-strip">
            <div class="container">
                © Copyright Mapitems 2016
            </div>
        </div> 
    </footer>
    </div>






    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script src="js/jquery.maximage.js" type="text/javascript"></script>


    <!-- Truncate paragraph -->
    <script src="js/jquery.dotdotdot.js"></script>

    <!-- Scroll Speed -->
    <script src="js/jQuery.scrollSpeed.js"></script>

    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    <!-- Post Free ad JS -->
    <script src="js/jquery.bootstrap.wizard.js"></script>
    <!-- Pages JS -->
    <script src="js/page.js"></script>
    
</body>

</html>
