<div class="col-lg-4 col-sm-6">
	<div class="pos-rel">
		<a href="#" class="wsh-lst">
			@include('hearts-svg')
			{{-- <object type="image/svg+xml" data="svg/normal.svg" class="weather_icon red_color_svg circle"></object> --}}
		</a>
		<div class="box showonmap9" marker_id={{ $i }}>
			<div class="img-box-list">
				<img src="{{ URL::asset('uploads') }}/a-pic3.jpg">
			</div>
			<div class="box-content">
				<h5>Iphone</h5>
				<h6> $500</h6>
				<div class="clearfix margin-bottom-ten"></div>
				<img class="pull-left width-adj2" src="{{ URL::asset('uploads') }}/pp-5.jpg">
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