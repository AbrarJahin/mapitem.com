{{-- Topbar Nav --}}
<nav class="navbar dn" role="navigation">
	<div class="container">
	{{-- Collect the nav links, forms, and other content for toggling --}}
	<div class="" id="bs-example-navbar-collapse-2">
		<ul class="nav navbar-nav navbar-left">

			<li>
				<a href="{{ URL::route('admin.category') }}" @if($current_page=="admin.category") class="selected" @endif >
					Category
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.sub_category') }}" @if($current_page=="admin.sub_category") class="selected" @endif >
					Sub-Category
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.show_users') }}" @if($current_page=="admin.show_users") class="selected" @endif >
					Users
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.adds') }}" @if($current_page=="admin.adds") class="selected" @endif >
					Adds
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.messages') }}" @if($current_page=="admin.messages") class="selected" @endif >
					Messages
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.offers') }}" @if($current_page=="admin.offers") class="selected" @endif >
					Offers
				</a>
			</li>

			<li>
				<a href="{{ URL::route('admin.transactions') }}" @if($current_page=="admin.transactions") class="selected" @endif >
					Transactions
				</a>
			</li>

		</ul>
	</div>
	{{-- /.navbar-collapse --}}
	</div>
{{-- /.container --}}
</nav>
<div class="clearfix"></div>