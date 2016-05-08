@extends('user.master')

@section('page_title', 'My Profile')
@section('meta_page_description', 'Mapitem - My Profile')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
	    <div class="profile">
	        @include('user.profile.view')
	        @include('user.profile.edit')
	    </div>
	</div>
@endsection