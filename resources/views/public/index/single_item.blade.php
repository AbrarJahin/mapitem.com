<div class="col-lg-3 col-md-3 col-sm-6">
	<a href="#" class="add_to_wishlist wsh-lst2">
		{{-- If any problem in showing SVG in deployment - fix the CSS inside svg element --}}
		<object type="image/svg+xml" data="@if ($advertisement->is_wishlisted > 0)
							{{ URL::asset('svg/filled.svg') }}
							@else
								{{ URL::asset('svg/normal.svg') }}
						@endif"></object>
	</a>
	<a href="{{ URL::route('listing')."#".$advertisement->id }}">
		<div class="box">
			<div class="img-box">
				<img src="@if (count($advertisement->AdvertisementImages) > 0)
							{{ URL::asset('uploads') }}/{{ $advertisement->AdvertisementImages[0]->image_name }}
							@else
								{{ URL::asset('images/not_available_1.png') }}
						@endif" height="226" width="314" alt="{{ $advertisement->title }}">
			</div>
			<div class="box-content">
				<h5>{{ $advertisement->title }}</h5>
				<h6>${{ $advertisement->price }}</h6>
				<div class="clearfix margin-bottom-ten"></div>
				<img src="{{ URL::asset('uploads') }}/{{ strlen($advertisement->User->profile_picture)>0 ? $advertisement->User->profile_picture : '../images/empty-profile.jpg' }}" class="pull-left width-adj2" height="46" width="46" alt="{{ $advertisement->user->first_name }} {{ $advertisement->user->last_name }}">{{-- Profile Picture --}}
				<div class="pull-left margin-left-ten width-adj3">
					<p class="pull-left dot1 home_page_description">
						{{ $advertisement->description }}
					</p>
				</div>
			</div>
		</div>
	</a>
</div>