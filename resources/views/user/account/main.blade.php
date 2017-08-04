@extends('user.master')

@section('page_title', 'Account')
@section('meta_page_description', 'Content on this page are account content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
			{{-- tabs left --}}
			<div class="tabbable tabs-left">
			<ul class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nav nav-tabs">
				{{--
					<li><a href="#a" data-toggle="tab">Send Money</a></li>
					<li><a href="#b" data-toggle="tab">Receive Money</a></li>
					<li><a href="#d" data-toggle="tab">Notifications</a></li>
					<li><a href="#e" data-toggle="tab">Transaction History</a></li>
				--}}
				<li><a href="#a" data-toggle="modal" data-target="#not_available">Send Money</a></li>
				<li><a href="#b" data-toggle="modal" data-target="#not_available">Receive Money</a></li>
				<li><a href="#d" data-toggle="modal" data-target="#not_available">Notifications</a></li>
				<li><a href="#e" data-toggle="modal" data-target="#not_available">Transaction History</a></li>

				<li class="active"><a href="#c" data-toggle="tab">Security</a></li>
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

	{{-- Templrary payment support message popup - Started --}}
	<div class="modal fade" id="not_available" role="dialog">
		<div class="modal-dialog">
			{{-- Modal content--}}
			<div class="modal-content" >
				<div class="modal-header modal-header-warning">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="glyphicon glyphicon-warning-sign"></i> Please Be Patient</h4>
				</div>
				<div class="modal-body">
					<p>This feature is not completed yet when it will be completed, we will let you know!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	{{-- Templrary payment support message popup - END --}}
@endsection