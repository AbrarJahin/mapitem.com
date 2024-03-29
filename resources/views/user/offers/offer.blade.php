<div class="hd-box">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
		<div class="pull-left">
			<img height="56" src="{{ URL::asset('uploads') }}/{{ strlen($offer->User->profile_picture)>0 ? $offer->User->profile_picture : '../images/empty-profile.jpg' }}">
		</div>
		<div class="offer-content pull-left">
			<div class="pull-left hdd-left">
				<h6>{{ $offer->User->first_name }} {{ $offer->User->last_name }}</h6>
				<span>Cell:</span>{{ $offer->User->cell_no }}<br>
				<span>Email:</span>{{ $offer->User->email }}<br>
			</div>
			<div class="hdd-right">
				<h6>Offer: ${{ $offer->price }}</h6>
			</div>
			<div class="clearfix"></div>
			<p>{{ $offer->message }}</p>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" offer_id={{ $offer->id }}>
		@if($offer->status == 'accepted' || $offer->status == 'pending')
			<a class="green-small no-textdecor btn-adj1 {{ $offer->status == 'pending' ? 'accept-offer' : '' }}" href="#/">
				{{ $offer->status == 'pending' ? 'Accept Offer' : 'Offer Accepted' }}
			</a>
		@endif
		@if($offer->status == 'rejected' || $offer->status == 'pending')
			<a class="grey-small no-textdecor btn-adj1 {{ $offer->status == 'pending' ? 'reject-offer' : '' }}" href="#/">
				{{ $offer->status == 'pending' ? 'Reject Offer' : 'Offer Rejected' }}
			</a>
		@endif
	</div>
</div>