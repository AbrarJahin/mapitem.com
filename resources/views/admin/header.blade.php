<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="@yield('meta_page_description')">
		<meta name="author" content="S. M. Abrar Jahin">
		<title>Block Hunt - @yield('page_title')</title>
		@section('header_styles')
			{{-- Bootstrap Core CSS --}}
			<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
			{{-- Bootstrap Core CSS --}}
			<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" type="text/css">    
			{{-- Custom Fonts --}}
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" type="text/css">
			{{-- Custom CSS --}}
			<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css">
		@show
		{{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
		{{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
		{{--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]--}}
	</head>

	<body>