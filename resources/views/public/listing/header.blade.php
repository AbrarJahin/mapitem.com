<!DOCTYPE html>
<html lang="en">

<head>
	<title>Block Hunt - {{ $current_page }}</title>
	@include('meta_data')
	@include('css')

	{{-- Range css --}}
	<link href="{{ URL::asset('css/jquery.range.css') }}" rel="stylesheet" type="text/css">
	{{-- Slick css --}}
	<link href="{{ URL::asset('slick/slick/slick.css') }}" rel="stylesheet" type="text/css">
	{{-- Slick theme css --}}
	<link href="{{ URL::asset('slick/slick/slick-theme.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/loadie.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="page-top" style="overflow-y:hidden">