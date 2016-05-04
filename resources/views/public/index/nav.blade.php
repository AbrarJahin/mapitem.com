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
                    @include('public.index.log_in')
                </li>

                <li id="su" class="dropdown">
                    @include('public.index.sign_up')
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