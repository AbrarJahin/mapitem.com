<!DOCTYPE html>
<html lang="en">

<head>
	<title>Block Hunt - {{ $current_page }}</title>
	@include('meta_data')
	@include('css')

	{{-- Range css --}}
	<link href="{{ URL::asset('css/jquery.range.css') }}" rel="stylesheet" type="text/css">
	{{-- Slick CSS --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>

	<link href="{{ URL::asset('css/loadie.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="page-top" style="overflow-y:hidden">