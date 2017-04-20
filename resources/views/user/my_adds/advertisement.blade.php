<div class="db-body pos-rel" advertisement_id="{{ $my_add->id }}">
	@if ($my_add->is_active === 'inactive')
		<div class="inative-list"><a href="#/" class="relist">Relist</a><br><span class="ia">Inactive Ad</span></div>
	@endif
		<div class="active-list">
			{{-- Advertisement Topbar - Start --}}
				<section class="p-head col-lg-12">
					<div class="width-adj11">
						<div class="dropdown pull-left">
							<button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" type="button" class="dropdown-toggle sbtn">
								<i class="fa fa-pencil "></i>Settings
							</button>
							<ul class="dropdown-menu no-underline">
								 <li>
								 	<a href="#/" class="edit1" id="{{ $my_add->id }}">
								 		Edit
								 	</a>
								 </li>
								 <li class="end_listing_button">
								 	<a href="#/">
								 		End Listing
								 	</a>
								 </li>
							</ul>
						</div>
					</div>

					<div class="width-adj12">
						<i class="fa fa-heart-o"></i>
						<span>Added to wishlist by :</span>
						<b>5 Users</b>
					</div>
					<div class="width-adj13">
						<i class="fa fa-comment-o"></i>
						<span>Reviews :</span>
						<b>8</b>
					</div>
					<div class="width-adj14">
						<i class="fa fa-eye"></i>
						<span>Viewed by :</span>
						<b>{{ $my_add->total_views }}</b>
					</div>
					<div class="width-adj15">
						<i class="fa fa-thumbs-up"></i>
						<span>  Liked by :</span>
						<b>150</b>
					</div>
				</section>
			{{-- Advertisement Topbar - End --}}

			{{-- Advertisement Body - Start --}}
				<div class="db-adc">
					<div class="col-lg-3 col-md-3 col-sm-5 no-padding">
							<img class="pic-adj img-responsive"
								src="@if (count($my_add->AdvertisementImages) > 0)
							{{ URL::asset('uploads') }}/{{ $my_add->AdvertisementImages[0]->image_name }}
							@else
								{{ URL::asset('images/not_available.jpg') }}
						@endif">
					</div>

					<div class="col-lg-9 col-md-9 col-sm-7 dleft">
						<h3>{{ $my_add->title }}</h3>
						<div class="pull-right">
								<span>Price : </span>
								<b>${{ $my_add->price }}</b>
						</div>
						<div class="clearfix"></div>
						<p>
							{{ $my_add->description }}
							<br/><a href="{{ route('listing') }}#{{ $my_add->id }}">View on Map</a>
						</p>
						{{-- Advertisement Giver Description - Start --}}
						<ul>
							<li>
								<span><img src="{{ URL::asset('images/u-logo.jpg') }}"></span>
								{{ $my_add->user->first_name }}
								{{ $my_add->user->last_name }}
							</li>
							<li>
								<span class="fa fa-location-arrow icon-adj"> &nbsp;</span>
								{{ $my_add->address }}
							</li>
							<li>
								<span class="fa fa-fw icon-adj"> </span>
								@if(strlen($my_add->user->cell_no)>0)
									<a href="tel:{{ $my_add->user->cell_no }}">
										{{ $my_add->user->cell_no }}
									</a>
								@else
									Please <a href="{{ URL::route('user.profile') }}" target="_blank">Update Your Profile</a> to add a Phone
								@endif
							</li>
							<li>
								<span class="fa fa-fw icon-adj"> </span>
								@if(strlen($my_add->user->website)>0)
									<a href="{{ $my_add->user->website }}" target="_blank">{{ $my_add->user->website }}</a>
								@else
									Please <a href="{{ URL::route('user.profile') }}" target="_blank">Update Your Profile</a> to add a Website
								@endif
							</li>
							<li>
								<span class="fa fa-fw icon-adj"> </span>
								<a href="mailto:{{ $my_add->user->email }}?Subject=About%20{{ $my_add->title }}" target="_top">{{ $my_add->user->email }}</a>
							</li>
						</ul>
						{{-- Advertisement Giver Description - Start --}}
					</div>
				</div>
			{{-- Advertisement Body - End --}}
	</div>
</div>