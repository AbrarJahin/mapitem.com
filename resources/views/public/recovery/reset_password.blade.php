<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MapItem - Reset Password</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style type="text/css" media="screen">
			.form-gap {
				padding-top: 70px;
			}
		</style>
	</head>
	<body>
		<div class="form-gap"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center">
								<h3><i class="fa fa-lock fa-4x"></i></h3>
								<h2 class="text-center">{{ $name }}</h2>
								<p>Please set your new Password</p>
								<p>
									@if($errors->has())
										<div role="alert" class="alert alert-danger alert-base alert-dismissible fade in">
											<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
											<h4>Error in reset Password !</h4>
											<ul class="error-list">
											{{-- <li><span>Password</span> are required</li> --}}
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
											</ul>
										</div>
									@endif
								</p>
								<div class="panel-body">
									<form role="form" autocomplete="off" class="form" method="post" action="{{ URL::route('password_recover_post') }}">
										<input type="hidden" name="reset_token" value="{{ $token }}"> 
										{!! csrf_field() !!}
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock color-blue"></i>
												</span>
												<input name="password" placeholder="New Password" class="form-control"  type="password">
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock color-blue"></i>
												</span>
												<input name="password_confirmation" placeholder="Re-type Password" class="form-control"  type="password">
											</div>
										</div>
										<div class="form-group">
											<input class="btn btn-lg btn-success btn-block" value="Reset Password" type="submit">
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	{!! $google_analytics_script  or '' !!}
</html>