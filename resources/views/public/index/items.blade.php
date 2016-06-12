<div class="clearfix"></div>
<div class="hd2"><h2>Community Postings</h2></div>
<!-- community posting start -->
<div class="row">
	@for ($i = 0; $i < 8; $i++)
		<div class="col-lg-3 col-md-3 col-sm-6">
			<a href="#" class="wsh-lst2">
				{{-- If any problem in showing SVG in deployment - fix the CSS inside svg element --}}
				<object type="image/svg+xml" data="{{ URL::asset('svg/normal.svg') }}"></object>
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
	@endfor

</div>

<div class="clearfix"></div>

<div class="col-lg-12">
	<a href="{{ URL::route('listing') }}">
		<button class="btn green-medium pull-right">View More</button>
	</a>
</div>

<div class="clearfix"></div>