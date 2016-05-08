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
	<a href="#" class="mhd ">Offers <span>{{ $i }} New</span><i class="pull-right glyphicon glyphicon-circle-arrow-down"></i><i class="pull-right glyphicon glyphicon-circle-arrow-up"></i></a>
</div>

<div class="hd-detail">

	@for ($j = 0; $j < $i; $j++)
		@include('user.offers.offer')
	@endfor
</div>

<div class="clearfix margin-fifty"></div>