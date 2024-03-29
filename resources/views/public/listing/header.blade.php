<!DOCTYPE html>
<html lang="en">

<head>
	<title>MapItem - {{ $secondary_page_title or $current_page }}</title>
	@include('meta_data')
	@include('css')

	{{-- Range css --}}
	<link href="{{ URL::asset('css/jquery.range.css') }}" rel="stylesheet" type="text/css">
	{{-- Slick CSS --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>
	<link href="{{ URL::asset('css/loadie.css') }}" rel="stylesheet" type="text/css">
	{{-- swiper slider styles --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css" type="text/css">
</head>

<body id="page-top">