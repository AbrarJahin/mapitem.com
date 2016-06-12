<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('page_content')">
<meta name="author" content="Abrar jahin">
<meta name="base_url" content="{{ URL::to('/') }}">
<meta name="upload_folder_url" content="{{ URL::asset('uploads') }}/">
<title>Block Hunt - @yield('page_title')</title>
{{-- Fabicon - Start --}}
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ URL::asset('favicon.ico') }}" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ URL::asset('favicon.ico') }}" />
<link rel="icon" type="image/png" href="{{ URL::asset('favicon.ico') }}" sizes="196x196" />
<link rel="icon" type="image/png" href="{{ URL::asset('favicon.ico') }}" sizes="96x96" />
<link rel="icon" type="image/png" href="{{ URL::asset('favicon.ico') }}" sizes="32x32" />
<link rel="icon" type="image/png" href="{{ URL::asset('favicon.ico') }}" sizes="16x16" />
<link rel="icon" type="image/png" href="{{ URL::asset('favicon.ico') }}" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="{{ URL::asset('favicon.ico') }}" />
<meta name="msapplication-square70x70logo" content="{{ URL::asset('favicon.ico') }}" />
<meta name="msapplication-square150x150logo" content="{{ URL::asset('favicon.ico') }}" />
<meta name="msapplication-wide310x150logo" content="{{ URL::asset('favicon.ico') }}" />
<meta name="msapplication-square310x310logo" content="{{ URL::asset('favicon.ico') }}" />
<meta name="_token" content="{{ csrf_token() }}" />
{{-- Fabicon - End --}}