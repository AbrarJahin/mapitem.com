<meta name="notification_settings_url" content="{{ URL::route('user.update_notification_settings') }}">

<div class="tab-pane" id="d">
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <div class="question">
        Notify me when someone sends me an offer 
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
        <input type="checkbox" class="cmn-toggle cmn-toggle-round notification_settings" id="get_offer_notification" value="get_offer_notification" @if (Auth::user()->get_offer_notification == 'enabled') checked @endif>
        <label for="cmn-toggle-1"></label>
    </div>

    <div class="clearfix margin-bottom-twenty"></div>

    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <div class="question">
        Notify me when I receive a payment
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
        <input type="checkbox" class="cmn-toggle cmn-toggle-round notification_settings" id="receive_payment_notification" value="receive_payment_notification" @if (Auth::user()->receive_payment_notification == 'enabled') checked @endif>
        <label for="cmn-toggle-2"></label>
    </div>

    <div class="clearfix margin-bottom-twenty"></div>

    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <div class="question">
        Notify me when i receive a message
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
        <input type="checkbox" class="cmn-toggle cmn-toggle-round notification_settings" id="receive_message_notification" value="receive_message_notification" @if (Auth::user()->receive_message_notification == 'enabled') checked @endif>
        <label for="cmn-toggle-3"></label>
    </div>

    <div class="clearfix margin-bottom-twenty"></div>

    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <div class="question">
        Forward notifications to my email address
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
        <input type="checkbox" class="cmn-toggle cmn-toggle-round notification_settings" id="email_notification" value="email_notification" @if (Auth::user()->email_notification == 'enabled') checked @endif>
        <label for="cmn-toggle-4"></label>
    </div>

    <div class="clearfix margin-bottom-twenty"></div>

    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <div class="question">
        Notify me when I send a payment
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
        <input type="checkbox" class="cmn-toggle cmn-toggle-round notification_settings" id="send_payment_notification" value="send_payment_notification" @if (Auth::user()->send_payment_notification == 'enabled') checked @endif>
        <label for="cmn-toggle-5"></label>
    </div>
</div>