{{-- Navigation --}}
<nav class="navbar navbar-inverse no-margin" role="navigation">
    <div class="container-fluid">
        {{-- Brand and toggle get grouped for better mobile display --}}
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/blockhunt-logo.png" width="175"></a>
        </div>
        {{-- Collect the nav links, forms, and other content for toggling --}}
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"><img src="images/pp-4.jpg" atl="max" class="round2"> Max Ezoory  <b class="glyphicon glyphicon-menu-down c-adj2"></b></a>
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
                </li>
                <li class="">
                    <a href="#" class="def" data-toggle="modal" data-target="#pfa">Post free ad </a>
                </li>
            </ul>
        </div>
        {{-- /.navbar-collapse --}}
    </div>
    {{-- /.container --}}
</nav>