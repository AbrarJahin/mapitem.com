@extends('user.master')

@section('page_title', 'Inbox')
@section('meta_page_description', 'Mapitem Inbox')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="thread_detail_ajax_url" content="{{ URL::route('user.message_thread_detail') }}">

	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="center">Message Title</span>
			<span id="message_menu_close_button" class="glyphicon glyphicon-remove pull-right"></span>
		</div>
		<div class="panel-body">

			@include('user.inbox.message_threads')
			@include('user.inbox.message_thread_details')

		</div>
	</div>

@endsection