{{-- Status Bar --}}
<div class="sb">
	<div class="container">
		<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
			<h1>Welcome {{ Auth::user()->first_name }}!</h1>
		</div>
		<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
			<ul>
				<li>
					You have <a href="{{ URL::route('user.my_adds') }}">
					{{ $adds_count }}</a> Ads
				</li>
				<li>
					You have <a href="{{ URL::route('user.inbox') }}">
					{{ $message_count }}</a> New Messages in Inbox
				</li>
				<li>
					You have <a href="{{ URL::route('user.offers') }}">
					{{ $offer_count }}</a> Offer
				</li>
			</ul>
		</div>
	</div>
</div>