@extends('user.master')

@section('page_title', 'Inbox')
@section('meta_page_description', 'Mapitem Inbox')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
    <div class="db-body">

        <div class="inbox">
            <h6>You have <span>(1)</span> New Email</h6>

			@for ($i = 0; $i < 10; $i++)
			    @include('user.inbox.message_single')
			@endfor

        </div>

    </div>
@endsection