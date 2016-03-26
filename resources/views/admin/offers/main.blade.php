@extends('admin.master')

@section('page_title', 'Offers')
@section('meta_page_description', 'Content on this page are offers content')

@section('footer_scripts')
	@parent
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@endsection

@section('content')

	<div class="db-body">
{{--
	    <section class="offerbox">
	        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5">
	          <img src="images/a-pic.jpg" class="img-responsive">
	        </div>
	        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
	          <h3>Hill Vactions</h3>
	        </div>
	        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
	          <h3>Price: 500</h3>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	          <p>Enjoy Trip to Kashmir Valley, Kashmir Valley is the one
	            Natural Place where Torreist comes across</p>
	        </div>
	    </section>
	    <div class="hd">
	        <a href="#" class="mhd ">Offers <span>1 New</span><i class="pull-right glyphicon glyphicon-circle-arrow-down"></i><i class="pull-right glyphicon glyphicon-circle-arrow-up"></i></a>
	    </div>    
	    
	    <div class="hd-detail">
	        <div class="hd-box">
	            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
	                <div class="pull-left">
	                  <img src="images/pp-2.jpg">
	                </div>
	                <div class="offer-content pull-left">
	                    <div class="pull-left hdd-left">
	                      <h6>Jonathan Kaneer</h6>
	                      <span>Cell:</span>123-456-789 <br>
	                      <span>Email:</span>jk@yahoo.com <br>
	                    </div>
	                    <div class="pull-right hdd-right">
	                        <h6>Offer: $400</h6>
	                    </div>
	                    <div class="clearfix"></div>
	                    <p>Hi Bilal, Please checkout my offer and let me know if you are agreed !</p>
	                </div>

	            </div>
	            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
	                <a class="green-small no-textdecor btn-adj1" href="#">Accept Offer</a>
	                <a class="grey-small no-textdecor btn-adj1" href="#">Reject</a>
	            </div>
	        </div>
	    </div>
--}}
	@for ($i = 0; $i < 5; $i++)

		<div class="clearfix margin-fifty"></div>

		@include('admin.offers.add_detail')
	    <div class="hd-detail">
			@for ($j = 0; $j < 5; $j++)
				@include('admin.offers.add_offer')
			@endfor
	    </div>

	@endfor
	</div>

@endsection