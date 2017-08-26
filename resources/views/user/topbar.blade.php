{{-- Topbar Nav --}}
<nav class="navbar dn cbp-spmenu-push" role="navigation">
	<div class="container">
	{{-- Collect the nav links, forms, and other content for toggling --}}
	<div class="" id="bs-example-navbar-collapse-2">
		<ul class="nav navbar-nav navbar-left">
			<li>
				<a href="{{ URL::route('user.dashboard') }}" @if($current_page=="user.dashboard") class="selected" @endif > Dashboard  </a>
			</li>
			<li>
				<a href="{{ URL::route('user.my_adds') }}" @if($current_page=="user.my_adds") class="selected" @endif >
					My Ads
					@if($total_no_of_adds > 0)
						<span class="notification">
							{{ $total_no_of_adds }}
						</span>
					@endif
				</a>
			</li>
			<li>
				<a href="{{ URL::route('user.offers') }}" @if($current_page=="user.offers") class="selected" @endif >
					Offers
					@if($no_of_new_offer > 0)
						<span class="notification">
							{{ $no_of_new_offer }}
						</span>
					@endif
				</a>
			</li>
			<li>
				<a href="{{ URL::route('user.inbox') }}" @if($current_page=="user.inbox") class="selected" @endif >
					Inbox
					@if($no_of_new_message > 0)
						<span class="notification">
							{{ $no_of_new_message }}
						</span>
					@endif
				</a>
			</li>
			<li>
				<a href="{{ URL::route('user.profile') }}" @if($current_page=="user.profile") class="selected" @endif > My Profile  </a>
			</li>
			<li>
				<a href="{{ URL::route('user.account') }}" @if($current_page=="user.account") class="selected" @endif > Account </a>
			</li>
		</ul>
	</div>
	{{-- /.navbar-collapse --}}
	</div>
{{-- /.container --}}
</nav>
<div class="clearfix"></div>