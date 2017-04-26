@extends('user.master')

@section('page_title', 'Account')
@section('meta_page_description', 'Content on this page are account content')
@section('meta_author', 'S. M. Abrar Jahin')

{{--
@section('header_styles')
	@parent
	<!-- Notification on and off -->
	<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
@endsection
--}}
@section('content')
	<div class="db-body">
			<!-- tabs left -->
			<div class="tabbable tabs-left">
			<ul class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nav nav-tabs">
				<li class="active"><a href="#a" data-toggle="tab">Send Money</a></li>
				<li><a href="#b" data-toggle="tab">Receive Money</a></li>
				<li><a href="#d" data-toggle="tab">Notifications</a></li>
				<li><a href="#e" data-toggle="tab">Transaction History</a></li>
				<li><a href="#c" data-toggle="tab">Security</a></li>
			</ul>

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-content">
				@include('user.account.send_money')
				@include('user.account.receive_money')
				@include('user.account.notification')
				@include('user.account.transaction_history')
				@include('user.account.security')
			</div>
			{{-- /tabs --}}
		</div>
	</div>
@endsection