
<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Page Not Found | MapItem</title>
  <meta content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
  <link href="{{ URL::asset('css/connectsense.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <script src="{{ URL::asset('js/html5.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/error.js') }}" type="text/javascript"></script>
</head>

<body id="error">
  <div id="error_404">
    <h1>
      <a href="{{ URL::route('index') }}">MapItem</a>
    </h1>
    <h2>
      Error - 404
      <div class="strobe">
        <div class="light"></div>
        <div class="siren"></div>
      </div>
    </h2>
    <p> This page could not be found </p>
    <a href="#" id="alarm">Off</a>
    <footer>
      <a class="back" href="javascript:window.history.back()">Go Back</a>
    </footer>
  </div>
</body>
</html>
