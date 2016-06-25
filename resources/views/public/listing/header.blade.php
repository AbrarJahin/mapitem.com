<!DOCTYPE html>
<html lang="en">

<head>
	<title>Block Hunt - {{ $current_page }}</title>
	@include('meta_data')
	@include('css')

	{{-- Range css --}}
	<link href="{{ URL::asset('css/jquery.range.css') }}" rel="stylesheet" type="text/css">
	{{-- Slick CSS --}}
	<link href="https://cdn.jsdelivr.net/g/jquery.slick@1.5.9(slick-theme.css+slick.css)" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/loadie.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="page-top" style="overflow-y:hidden">