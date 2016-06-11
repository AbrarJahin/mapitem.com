{{-- Status Bar --}}
<div class="sb">
    <div class="container">
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
          <h1>Welcome Max!</h1>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <ul>
                <li>
                    You have <a href="{{ URL::route('user.my_adds') }}">
                    {{ $total_no_of_adds }}</a> Ads
                </li>
                <li>
                    You have <a href="{{ URL::route('user.inbox') }}">
                    {{ $no_of_new_message }}</a> New Messages in Inbox
                </li>
                <li>
                    You have <a href="{{ URL::route('user.offers') }}">
                    {{ $no_of_new_offer }}</a> Offer
                </li>
            </ul>
        </div>
    </div>
</div>