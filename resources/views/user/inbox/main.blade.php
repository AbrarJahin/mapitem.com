@extends('user.master')

@section('page_title', 'Inbox')
@section('meta_page_description', 'Mapitem Inbox')
@section('meta_author', 'S. M. Abrar Jahin')

@section('header_styles')
	<link rel="stylesheet" href="{{ URL::asset('css/inbox.css') }}" type="text/css">
@endsection

@section('content')
	<div class="fill">
		<div class="row chat-wrap">

			@include('user.inbox.message_threads')
			@include('user.inbox.message_thread_details')

		</div>
@endsection