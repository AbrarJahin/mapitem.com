{{-- Topbar Nav --}}
<nav class="navbar dn" role="navigation">
    <div class="container">
    {{-- Collect the nav links, forms, and other content for toggling --}}
    <div class="" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav navbar-left">
            <li class="">
                <a href="{{ URL::route('user.dashboard') }}" @if($current_page=="user.dashboard") class="selected" @endif > Dashboard  </a>
            </li>
            <li>
                <a href="{{ URL::route('user.my_adds') }}" @if($current_page=="user.my_adds") class="selected" @endif > My Ads</a>
            </li>
            <li>
                <a href="{{ URL::route('user.offers') }}" @if($current_page=="user.offers") class="selected" @endif >Offers</a>
            </li>
            <li class="">
                <a href="{{ URL::route('user.inbox') }}" @if($current_page=="user.inbox") class="selected" @endif > inbox </span></a>
            </li>
            <li class="">
                <a href="{{ URL::route('user.profile') }}" @if($current_page=="user.profile") class="selected" @endif > My Profile  </a>
            </li>
            <li class="">
                <a href="{{ URL::route('user.account') }}" @if($current_page=="user.account") class="selected" @endif > Account </a>
            </li>
        </ul>
    </div>
    {{-- /.navbar-collapse --}}
    </div>
{{-- /.container --}}
</nav>
<div class="clearfix"></div>