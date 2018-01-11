<section class="offerbox">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-5">
		<img src="@if (count($advertisement->AdvertisementImages) > 0)
					{{ URL::asset('uploads') }}/{{ $advertisement->AdvertisementImages[0]->image_name }}
				@else
					{{url('/images/not_uploaded.png')}}
				@endif" class="img-responsive">
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
		<h3>{{ $advertisement->title }}</h3>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<h3>Price: {{ $advertisement->price }}</h3>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<p>{{ $advertisement->description }}</p>
	</div>
</section>

<div class="hd">
	<a href="#" class="mhd ">Offers <span>{{ count($advertisement->offer) }} New</span><i class="pull-right glyphicon glyphicon-circle-arrow-down"></i><i class="pull-right glyphicon glyphicon-circle-arrow-up"></i></a>
</div>

<div class="hd-detail">
	@foreach ($advertisement->offer as $offer)
		@include('user.offers.offer')
	@endforeach
</div>

<div class="clearfix margin-fifty"></div>