@extends('user.master')

@section('page_title', 'Listing')
@section('meta_page_description', 'Mapitem Product Listing')
@section('meta_author', 'S. M. Abrar Jahin')

@section('header_styles')
    @parent
    {{-- Range css --}}
    <link href="{{ URL::asset('css/jquery.range.css') }}" rel="stylesheet" type="text/css">
    {{-- Slick css --}}
    <link href="{{ URL::asset('slick/slick/slick.css') }}" rel="stylesheet" type="text/css">
    {{-- Slick theme css --}}
    <link href="{{ URL::asset('slick/slick/slick-theme.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/loadie.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('footer_scripts')
    @parent
    <script src="{{ URL::asset('js/jquery.loadie.js') }}"></script>

    <!-- range js -->
    <script src="js/jquery.range.js"></script>
    <!-- Truncate paragraph -->
    <script src="js/jquery.dotdotdot.js"></script>
    <script src="js/jQuery.scrollSpeed.js"></script>
    <script type='text/javascript' src='js/jquery.mousewheel.js'></script>
    <script src="js/jquery.touchSwipe.js"></script>
    <script src="js/listing.js"></script>
    <!-- Slick Js -->
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
@endsection

@section('content')
	@for ($i = 0; $i < 5; $i++)
	    @include('user.my_adds.active_add')
	    @include('user.my_adds.inactive_add')
	@endfor
@endsection