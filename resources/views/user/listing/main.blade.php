{{-- Everything in this page are different from any other page, so everything is redone for this page --}}

@include('user.listing.header')

<a href="#" class="close-detail hide"><i class="fa fa-close"></i></a>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top ip-adj2" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand ipl" href="index.html"><img src="images/blockhunt-logo.png" width="175"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form action="#" class="top-search col-lg-offset-1 col-md-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 no-padding">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topcat">
                    <div class="dropdown no-padding ">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        Category
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu h-ctr h-ctr3">
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
                    <input type="email" placeholder="Search" id="InputEmail1" class="ct form-control normal-input pull-left">
                    <div class="ct-list ct-list2" style="display: none;">
                       <ul>
                            <li><a href="#">This is one</a></li>
                            <li><a href="#">This is two</a></li>
                        </ul> 
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topsearch">
                    <input type="email" placeholder="Location" id="InputEmail1" class="form-control normal-input">
                    <button class="btn dropdown-toggle" type="button"><span class="fa fa-fw">&#xf002;</span></button>
                </div>
            </form>

            <div class="clearfix visible-xs-block"></div>

            <ul class="nav navbar-nav navbar-right ip-nav">
                
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

<!--send offer login Modal -->
<div id="lgn-pup" class="modal fade" role="dialog">
  <div class="modal-dialog width-adj10">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Login</h4>
      </div>
      <div class="modal-body">

        <form class="" id="login-f" role="form">
            <div class="form-group">
                <input type="email" required="" placeholder="Email" id="inputEmail" class="form-control normal-input">
            </div>
            <div class="form-group">
                <input type="password" required="" placeholder="Password" class="form-control normal-input" name="login-password" id="login-password">
            </div>
            <div class="pos-adj1">
                <a style="color: #23a500 !important; float: left; font-size: 9pt!important; padding: 0 !important; width: 50%;" data-dismiss="modal" data-target="#forgot-password" data-toggle="modal" href="#" class="fp">Forgot Password ?</a>
                <div class="checkbox no-margin pull-right">
                    <label class="pos-adj2">
                      <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <button class="btn btn-default green-small3 margin-top-twenty" type="submit">Login</button>
            <div class="pos-adj3">
                <span>Don't have an account ?</span>
                <a data-target="#sgn-pup" data-toggle="modal" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" class="sup" href="#">Sign up</a>
            </div>
            <div class="clearfix"></div>
            <div style="display:none" class="for-pass">
                <div class="modal-header">
                    <button type="button" class="close closefp" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Reset Password</h4>
                </div>
                <div class="modal-body">
                      <div class="form-group">
                      <input type="email" placeholder="Email Address" id="InputEmail1" class="form-control normal-input">
                      </div>
                      <button class="btn btn-default green-small" type="submit">Reset Password</button>
                      <p class="small-text margin-top-ten">We will send password to your email address shortly</p>
                </div>
            </div>
        </form>
        <a class="facebook butt-adj1" href="#">Login with Facebook</a>
        <a class="googleplus butt-adj1" href="#">Login with Google Plus</a>

      </div>
      <div class="clearfix margin-twenty"></div>

    </div>

  </div>
</div>

<!--send offer sign up Modal -->
<div id="sgn-pup" class="modal fade" role="dialog">
  <div class="modal-dialog width-adj10">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Sign Up</h4>
      </div>
      <div class="modal-body">

        <form class="" action="#">
            
            <div class="form-group">
            <input type="text" required="" placeholder="First Name" id="InputEmail1" class="form-control normal-input">
            </div>

            <div class="form-group">
            <input type="text" required="" placeholder="Last Name" id="InputEmail1" class="form-control normal-input">
            </div>

            <div class="form-group">
            <input type="email" required="" placeholder="Email" id="InputEmail1" class="form-control normal-input">
            </div>

            <div class="form-group">
            <input type="password" required="" placeholder="Password" id="InputPasswords" class="form-control normal-input">
            </div>

            <div class="pos-adj4">
                By signing up you accept Mapitem's <a style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="#">Policy</a> and <a style="color:#23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="#">Term of use</a>
            </div>

            <button class="btn btn-default green-small3" type="submit">Sign up</button>

            <div class="pos-adj3">
                <span>Already a member ? </span> <a data-target="#lgn-pup" data-toggle="modal" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="#" class="si">Sign in</a>
            </div>

        </form>

      </div>
      <div class="clearfix margin-twenty"></div>
      
    </div>

  </div>
</div>

<!-- Inner Body -->
<div id="" class="container header-minus wraper no-padding">
    <!-- Map View -->
    <div id="map" class="listing-left pos-rel hidden-xs">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d217732.494320258!2d74.00072720149036!3d31.494753535792263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3919077738bb031b%3A0xf55d6272254ae7d1!2zR3JlZW4gQ2FwIEhvdXNpbmcgU2NoZW1lLCBMYWhvcmUsINm-2Kfaqdiz2KrYp9mG!3m2!1d31.3992914!2d74.3536154!4m5!1s0x3918ec2a11450f7f%3A0x7fab00f2c8606140!2sSheikhupura+-+Mangtanwala+Rd%2C+Pakistan!3m2!1d31.5603248!2d73.935102!5e0!3m2!1sen!2s!4v1437566522046" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="pos-adj9">

            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon.jpg">
                    <h4 class="pull-left">Ipone</h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show9">
                    <div>
                    Iphone 4s with complete accesseries for sale ...
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
        <div class="pos-adj10">
            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon-2.jpg">
                    <h4 class="pull-left">Wood Rack</h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show10">
                    <div>
                    Wood Wrack for Sale
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
        <div class="pos-adj11">
            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon-3.jpg">
                    <h4 class="pull-left">Laptops in bulk</h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show11">
                    <div>
                    We have a large verity of used laptops. Checkout our
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
        <div class="pos-adj12">
            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon-4.jpg">
                    <h4 class="pull-left">House for Sale</h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show12">
                    <div>
                        A house near canal with 3 bed rooms and TV lounge and big...
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
        <div class="pos-adj13">
            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon-5.jpg">
                    <h4 class="pull-left">Honda Accord</h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show13">
                    <div>
                        Honda Accord with Sports Tyre only 1000Km Used .....
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
        <div class="pos-adj14">
            <div class="triangle-isosceles">
                <div class="p-top">
                    <img class="pull-left" src="images/p-favicon-6.jpg">
                    <h4 class="pull-left">Samsung LCD </h4>
                    <a href="#" class="pull-right fa fa-close p-close"></a>
                    <a href="#" class="pull-right fa fa-minus p-min "></a>
                </div>
                <div class="p-bottom show14">
                    <div>
                        Samsung LCD Model 124567 in mint condition is for Sale ....
                    </div>
                    <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">Details</a>
                </div> 
            </div>
        </div>
    </div>
    <!-- Listing View -->
    <div class="listing-right">
        <!-- Ad Listing -->
        <div class="ad-listing">
            <!-- Filter -->
            <div class="filter padding-adj1">
              
                <h4>Filter your search results</h4>
                <a href="#" class="glyphicon glyphicon-minus minimize">&nbsp;</a>

                <form action="#" class="fl">

                    <div class="row margin-ten">
                      
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
                          <label>Sort :</label>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-8 ">
                          <select class="form-control">
                            <option>Distance - Closest</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>

                        <div class="clearfix visible-xs visible-sm"></div>

                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
                          <label>Within :</label>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-8">
                          <select class="form-control">
                            <option>Any Distance</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                    

                    </div>

                    <div class="clearfix"></div>

                    <div class="row margin-ten">
                      
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
                          <label>Categories :</label>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-8">

                            


                          <button aria-expanded="false" aria-haspopup="false" data-toggle="dropdown" class="btn l-cat-btn dropdown-toggle" type="button">Category Filter<i class="glyphicon glyphicon-menu-down arrow-adj"></i>
                          </button>

                           
                          
                            <ul class="dropdown-menu h-ctr h-ctr2 col-md-12 col-sm-12">
                                <li class="no-border">
                                    <label class="pull-left"><input type="checkbox" value=""><strong> Community (21)</strong></label>
                                    <ul>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (7) </label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Yards (14) </label></li>
                                    
                                    </ul>
                                </li>

                                <li class="no-border">
                                    <label class="pull-left"><input type="checkbox" value=""><strong> Community (10) </strong></label>
                                    <ul>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (10) </label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Yards (10)</label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (10)</label></li>
                                    </ul>
                                </li>

                                <li class="no-border">
                                    <label class="pull-left"><input type="checkbox" value=""><strong> Community (40)</strong></label>
                                    <ul>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (5)</label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Yards(10) </label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (10)</label></li>
                                    </ul>
                                </li>

                                <li class="no-border">
                                    <label class="pull-left"><input type="checkbox" value=""><strong> Community (1)</strong></label>
                                    <ul>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Events (10)</label></li>
                                    <li><label class="pull-left"><input type="checkbox" unchecked value="1"> Yards (10)</label></li>
                                    
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        

                    </div>

                    <div class="row margin-ten">

                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
                            <label>Price Range :</label>
                        </div>

                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8 height-adj">

                            <input type="hidden" class="slider-input range-slider" value="1000" />

                        </div>

                    </div>

                    

                </form>

            </div>

            <!-- Results -->
            <div class="results">

                <div class="r-hdr col-lg-12">
                  
                  <h6 class="pull-left">Found (6) Records</h6>

                  <div class="pull-right">

                    <a href="#" title="box" class="blocks fa fa-fw pos-adj6 changeview selected-view">&#xf00a;</a>
                    <a href="#" title="list" class="list fa fa-fw pos-adj7 changeview">&#xf0ca;</a>

                  </div>

                </div>

                <div class="clearfix">
                  
                </div>

                <div id="box" class="box-posting">

                    <!-- community posting start -->
                    <div class="col-lg-4 col-sm-6">

                        <div class="pos-rel">
                          <a href="#" class="wsh-lst">
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
                        
                            <div class="box showonmap9">

                                <div class="img-box-list">
                                    <img src="images/a-pic3.jpg">
                                    
                                </div>

                                <div class="box-content">

                                    <h5>Iphone</h5>
                                    <h6> $500</h6>

                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            Iphone 4s with complete accesseries for sale.
                                            Original Box is also with iPhone. It's condition is really OutStanding ...<br> 
                                        </p>
                                    </div>


                                </div>

                            </div>
                        </div>    

                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
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
                            <div class="box showonmap13">
                                <div class="img-box-list">
                                    <img src="images/a-pic-2.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>Honda Civic</h5>
                                    <h6> $10000</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            Honda Civic Model 2006 in Awesome neat 
                                            and clean condition  <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
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
                            <div class="box showonmap12">
                               <div class="img-box-list"> 
                                    <img src="images/a-pic5.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>House for Sale</h5>
                                    <h6> $5000</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            A house near canal with 3 bed rooms and 
                                            TV lounge and big.<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
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
                            <div class="box showonmap11">
                                <div class="img-box-list">
                                    <img src="images/500x500.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>Laptops in bulk</h5>
                                    <h6> $1200</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            We have a large verity of used laptops. 
                                            Checkout our complete rangel. Please Visit
                                            our office for more details.<br> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
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
                            <div class="box showonmap10">
                                <div class="img-box-list">
                                    <img src="images/300x700.jpg" alt="Hill Vaction">
                                </div>
                            <div class="box-content">
                                <h5>Wodden Rack</h5>
                                <h6> $500</h6>
                                <div class="clearfix margin-bottom-ten"></div>
                                <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                <div class="pull-left margin-left-ten width-adj3">
                                    <p class="pull-left dot1">
                                        Wood Rack for Sale <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <div class="col-lg-4 col-sm-6">

                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
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

                            <div class="box showonmap14">
                                <div class="img-box-list">
                                    <img src="images/200x200.jpg" alt="Hill Vaction">
                                </div>

                            <div class="box-content">


                                <h5>Samsung LCD for Sale</h5>
                                <h6> $100</h6>

                                <div class="clearfix margin-bottom-ten"></div>
                                <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Samsung LCD Model 124567 in mint 
                                    condition is for Sale. <br>
                                </p>
                                </div>
                            </div>



                            </div>
                        </div>

                    </div>

                </div>

                <div id="list" class="list-posting" style="display:none">
                    
                    <img src="images/p-favicon-3.jpg" class="s-img loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap11">Laptops in bulk</a> <b>Price : $500</b>   <span>We have a large verity of used laptops.   We have a large verity of used laptops.</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon.jpg" class="s-img loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap9">Iphone</a> <b>Price : $1000</b>   <span>Iphone 4s with complete accesseries for sale. Original Box is also with iPhone Iphone 4s  with ...</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-6.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap14">Samsung LCD</a> <b>Price : $100</b>   <span>Samsung LCD Model 124567 in mint condition is for Sale. Samsung LCD Model 124567 in mint condition is ...</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-2.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap10">Wood Rack</a> <b>Price : $50</b>   <span>Wood Rack for sale</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-5.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap13">Honda Accord</a> <b>Price : $5000</b>   <span>Honda Accord with Sprots Tyre Only 1000Km Used</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-4.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap12">House For Sale</a> <b>Price : $50000</b>   <span>A house near canal with 3 bed rooms and TV lounge is for sale</span>
                    </div>
                    <div class="clearfix margin-twenty"></div>
                </div>
              
            </div>
        </div>
        <div class="clearfix "></div>
        <!-- Ad detail -->
        <div class="ad-detail">

            <!-- Ad Slider-->
            
            <!-- Result detail -->
            <!-- Ad Listing -->
            <div class="variable-width">
              <div><img src="http://c3.staticflickr.com/8/7252/6883150650_b4e7c18007.jpg"></div>
              <div><img src="http://c8.staticflickr.com/1/80/255871583_d4df0e741f_n.jpg"></div>
              <div><img src="http://c1.staticflickr.com/4/3256/2860461368_6441f08834_m.jpg"></div>
              <div><img src="http://c2.staticflickr.com/9/8309/8044300313_5ee7865f34_m.jpg"></div>
            </div>
            <div class="results-det">
                <div class="col-lg-9">
                    <div class="col-lg-12 no-padding rd-top-row">
                        <h4 class="pull-left">Iphone</h4>
                        <a class="direction pull-right" href="#"><i class="fa fa-location-arrow"></i>Directions</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding rd-top-row2">
                        <h5 class="pull-left">Price: <span>$1000</span></h5>
                        <div class="pull-right popups">
                            <a data-original-title="Add to Wishlist" href="#" class="wsh-lst-adpage grey-tooltip" data-toggle="tooltip" data-placement="top" title="">
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
                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-comment-o grey-tooltip" href="#" data-original-title="Reviews"></a>

                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-eye grey-tooltip" href="#" data-original-title="157"></a>

                          
                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-thumbs-o-up grey-tooltip" href="#" data-original-title="Like"></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding">
                        <div class="dropdown">
                            <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#"><i class="fa fa-gavel"></i>Send Offer
                            </a>
                            <!-- If user is logged in  -->
                            <!-- <ul class="dropdown-menu no-padding loginpopup col-lg-4">
                                <li>
                                    <form class="offer" action="#">
                                        
                                        <div class="form-group">
                                            <span class="text-adj1">Name : Jonathan Kaneer </span>
                                        </div>

                                        <div class="form-group">
                                        <span class="text-adj1">Email : jk@yahoo.com </span>
                                        </div>

                                        <div class="form-group">
                                        <span class="text-adj1">Cell : 123-456-789 </span>

                                        </div>

                                        <div class="form-group">
                                            <input type="text" onkeypress="return numbersonly(this, event)" placeholder="Your Offer in $" id="InputPasswords" class="form-control normal-input">
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control medium-textarea no-margin" rows="3" placeholder="Message"></textarea>
                                        </div>


                                        <button class="btn btn-default green-small" type="submit">Place Offer</button>


                                    </form>

                                </li>
                                
                            </ul> -->
                            <!-- If user is not logged in  -->
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="pos-adj03">
                                        <span>Please </span><a href="#" class="def" data-toggle="modal" data-target="#lgn-pup" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">LOGIN</a>
                                        or
                                        <a data-toggle="modal" data-target="#sgn-pup" class="" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">SIGN UP</a> to continue
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding description rd-top-row">
                      

                         - Complet accesseries are available<br>
                         - Out Standing Condition.<br>
                         - 2 months warenty remaining <br><br>

                        Iphone 4s with complete accesseries for sale. Original Box is also with iPhone Iphone 4s with complete 
                        accesseries for sale. Original Box is also with iPhone. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.

                        <div class="cleafix"></div>

                        <a class="review" href="#">Write Review</a>

                        <div class="write-review hide">
                            <form action="#" class="offer">
                                <div class="form-group">
                                    <textarea class="form-control tarea" placeholder="Write your Reviews" rows="3"></textarea>
                                    <div class="col-lg-12 margin-top-twenty margin-bottom-twenty">
                                     <span class="pull-left margin-right-twenty">Please rate your experience</span>
                                    <input type="number" class="rating" id="test" name="test" data-min="1" data-max="5" value="0">
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-default green-small review-submit show">Submit</button>
                            </form>
                        </div>

                        <div class="share">

                            <span>Share on </span>

                            <a class="sm fa fa-facebook " href="#"></a>
                            <a class="sm fa fa-twitter " href="#"></a>
                            <a class="sm fa  fa-google-plus" href="#"></a>

                        </div>

                    </div>

                    <div class="col-lg-12 reviews">

                        <div class="col-lg-4 rone">
                          Jonathan Kaneer<br>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i><br>
                          <span>May 5, 2015</span>

                        </div>

                        <div class="col-lg-8 rtwo">
                          <span>Everything seems good as far as it’s the same as written</span>
                        </div>

                        <div class="clearfix margin-twenty"></div>

                        <div class="col-lg-4 rone">
                          Bilal Munawar<br>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i><br>
                          <span>June 5, 2015</span>
                        </div>

                        <div class="col-lg-8 rtwo">
                          <span>I wish to have this phone in less price I have contacted but she did not accept my offer</span>
                        </div>

                        <div class="clearfix margin-twenty"></div>

                    </div>

                </div>








                <div class="col-lg-3 no-padding">

                    <div class="contact-bar">
                      
                        <div class="sb-top">

                            <img class="pround" alt="Jesica" src="images/pp-1.jpg">
                            <h6>Jesica Alben</h6>
                            <div class="star">
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>

                        <div class="sb-middle">

                            <span><i class="fa fa-phone"></i>123-456-789</span>

                            <span><i class="fa fa-globe"></i><a #="" href="">www.jalben.com</a></span>

                            <span><i class="fa fa-envelope"></i>info@jablen.com</span>

                            <span><i class="fa fa-facebook"></i><i class="fa fa-check-circle p-adj"></i>Facebook Verified</span>

                            <span><i class="fa fa-credit-card"></i>Accepts Credit Card</span>

                        </div>

                        <div class="sb-bottom dropdown">

                            <a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>

                            <ul class="dropdown-menu no-padding loginpopup col-lg-4 contact">
                                <li>
                                    <form class="offer" action="#">
                                        
                                        <div class="form-group">
                                        <textarea rows="3" placeholder="Any Question" class="form-control tarea"></textarea>
                                        </div>


                                        <button class="btn btn-default green-small width-adj" type="submit">Send Message</button>


                                    </form>

                                </li>
                                
                            </ul>
                          
                        </div>



                    </div>

                </div>
              
            </div>

            <div class="clearfix "></div>
        </div>

        <div class="clearfix "></div>

        <footer>
            <div class="first-strip">
                <div class="container-fluid">
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
                    <div class="hidden-lg hidden-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <button data-target="#pfa" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <a class="round fa fa-fw" href="#"></a>
                        <a class="round fa fa-fw" href="#"></a>
                        <a class="round fa fa-fw" href="#"></a>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
                </div>
            </div>
            <div class="third-strip">
                <div class="container-fluid">
                    © Copyright Mapitem 2016
                </div>
            </div> 
        </footer>
    </div>
</div>

@include('user.listing.footer_scripts')