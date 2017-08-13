<nav class="navbar navbar-inverse ip-adj2" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
        	
			<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>-->
			<a class="navbar-brand ipl" href="{{ URL::route('index') }}"><img src="{{ URL::asset('images/blockhunt-logo-minified.png') }}"></a>
		</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			@include('nav_filters')

			<div class="clearfix visible-xs-block"></div>
            <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
			<h3>Menu</h3>
			<a href="#">Celery seakale</a>
			<a href="#">Dulse daikon</a>
			<a href="#">Zucchini garlic</a>
			<a href="#">Catsear azuki bean</a>
			<a href="#">Dandelion bunya</a>
			<a href="#">Rutabaga</a>
		</nav>
             <button id="showRightPush">Show/Hide Right Push Menu</button>
		</div>
		{{-- /.navbar-collapse --}}
	</div>
	{{-- /.container --}}
</nav>