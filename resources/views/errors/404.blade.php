<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Mapitem - Not Found</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css" media="screen">
			.center
			{
				height: 100vh;
				display: flex;
				flex-flow: column nowrap;
				align-items: center;
				justify-content: center;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="hero-unit center">
						<h1>Mapitem&copy;</h1>
						<h2>
							Page Not Found
							<small>
								<font face="Tahoma" color="red">Error 404</font>
							</small>
						</h2>
						<br/>
						<p>
							The page you requested could not be found, either contact your webmaster or try again.
							Or you may <b><a class="back" href="javascript:window.history.back()">Go Back From Here</a></b>.
						</p>
						<p>
							<b>Or you could just press this neat little button:</b>
						</p>
						<a href="{{ URL::route('index') }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
					</div>
					<br />
				{{--
					<div class="thumbnail">
						<center><h2>Recent Content :</h2></center>
					</div>

					<div class="thumbnail span3 center col-sm-3">
						<h3>Try This...</h3>
						<p>write about your error page conent here and give some fool a good load of information or not</p>
						<div class="hero-unit">
							<img src="http://placehold.it/100x100"><!--Why Not Put a Picture To Celebrate Your 404-->
							<p></p>
						</div>
						<a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
					</div>

					<div class="thumbnail span3 center col-sm-3"> 
						<h3>Try This...</h3>
						<p>write about your error page conent here and give some fool a good load of information or not</p>
						<div class="hero-unit">
							<img src="http://placehold.it/100x100"><!--Why Not Put a Picture To Celebrate Your 404-->
							<p></p>
						</div>
						<a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
					</div>

					<div class="thumbnail span3 center col-sm-3">
						<h3>Try This...</h3>
						<p>write about your error page conent here and give some fool a good load of information or not</p>
						<div class="hero-unit">
							<img src="http://placehold.it/100x100"><!--Why Not Put a Picture To Celebrate Your 404-->
							<p></p>
						</div>
						<a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
					</div>

					<div class="thumbnail span3 center col-sm-3">
						<h3>Try This...</h3>
						<p>write about your error page conent here and give some fool a good load of information or not</p>
						<div class="hero-unit">
							<img src="http://placehold.it/100x100"><!--Why Not Put a Picture To Celebrate Your 404-->
							<p></p>
						</div>
						<a href="#" class="btn btn-danger btn-large"><i class="icon-share icon-white"></i> Take Me There...</a>
					</div>
				--}}
				</div>
			</div>
		</div>
	</body>
</html>
