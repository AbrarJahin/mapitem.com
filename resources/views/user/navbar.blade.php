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
            <a class="navbar-brand" href="{{ URL::route('index') }}"><img src="images/blockhunt-logo.png" width="175"></a>
        </div>
        {{-- Collect the nav links, forms, and other content for toggling --}}
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            @include('nav_filters')

            <div class="clearfix visible-xs-block"></div>

            <ul class="nav navbar-nav navbar-right ip-nav">
                <li class="dropdown">
                    @include('profile_menu')
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