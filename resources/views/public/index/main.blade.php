<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blockhunt Add posting">
    <meta name="author" content="Abrar jahin">
    <title>Map Item</title>

    <!-- Bootstrap Core CSS -->
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Animate Core CSS -->
    {{-- <link rel="stylesheet" href="css/animate.css" type="text/css"> --}}
    <link rel="stylesheet" href="http://daneden.github.io/animate.css/animate.min.css" type="text/css">    

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css"> --}}

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.maximage.css') }}" type="text/css" media="screen" title="CSS" charset="utf-8" />
</head>

<body id="demo">

<div class="loader"></div>
    <!-- Navigation -->
    @include('public.index.nav')

    <!-- Modal -->
    @include('modal')

    <div class="container-fluid no-padding height-adj1">
        @include('public.index.banner')
        @include('public.index.search_bar')

        <!-- Inner Body -->
        <div class="container">
            @include('public.index.items')
            @include('public.index.how_it_works')
        </div>
        <!-- Footer -->
        @include('footer_html')
    </div>
<!-- Footer Scripts - Start -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/jquery.cycle.all.js') }}" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('js/jquery.maximage.js') }}" type="text/javascript"></script>
    <!-- Truncate paragraph -->
    <script src="{{ URL::asset('js/jquery.dotdotdot.js') }}"></script>
    <!-- Scroll Speed -->
    <script src="{{ URL::asset('js/jQuery.scrollSpeed.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <!-- Post Free ad JS -->
    <script src="{{ URL::asset('js/jquery.bootstrap.wizard.js') }}"></script>
    <!-- Pages JS -->
    <script src="{{ URL::asset('js/page.js') }}"></script>
<!-- Footer Scripts - End -->

</body>

</html>