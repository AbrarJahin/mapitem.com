<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0076)https://assets.wildbit.com/postmark/misc/starter-templates/resetpassword.html -->
<html xmlns="https://www.w3.org/1999/xhtml" class="gr__assets_wildbit_com">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Choose a new password for MapItem</title>
		<style type="text/css" rel="stylesheet" media="all">
			/* Base ------------------------------ */
			*:not(br):not(tr):not(html) {
				font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}
			body {
				width: 100% !important;
				height: 100%;
				margin: 0;
				line-height: 1.4;
				background-color: #F2F4F6;
				color: #74787E;
				-webkit-text-size-adjust: none;
			}
			a {
				color: #3869D4;
			}

			/* Layout ------------------------------ */
			.email-wrapper {
				width: 100%;
				margin: 0;
				padding: 0;
				background-color: #F2F4F6;
			}
			.email-content {
				width: 100%;
				margin: 0;
				padding: 0;
			}
			/* Masthead ----------------------- */
			.email-masthead {
				padding: 25px 0;
				text-align: center;
			}
			.email-masthead_logo {
				max-width: 400px;
				border: 0;
			}
			.email-masthead_name {
				font-size: 16px;
				font-weight: bold;
				color: #bbbfc3;
				text-decoration: none;
				text-shadow: 0 1px 0 white;
			}
			/* Body ------------------------------ */
			.email-body {
				width: 100%;
				margin: 0;
				padding: 0;
				border-top: 1px solid #EDEFF2;
				border-bottom: 1px solid #EDEFF2;
				background-color: #FFF;
			}
			.email-body_inner {
				width: 570px;
				margin: 0 auto;
				padding: 0;
			}
			.email-footer {
				width: 570px;
				margin: 0 auto;
				padding: 0;
				text-align: center;
			}
			.email-footer p {
				color: #AEAEAE;
			}
			.body-action {
				width: 100%;
				margin: 30px auto;
				padding: 0;
				text-align: center;
			}
			.body-sub {
				margin-top: 25px;
				padding-top: 25px;
				border-top: 1px solid #EDEFF2;
			}
			.content-cell {
				padding: 35px;
			}
			.align-right {
				text-align: right;
			}

			/* Type ------------------------------ */
			h1 {
				margin-top: 0;
				color: #2F3133;
				font-size: 19px;
				font-weight: bold;
				text-align: left;
			}
			h2 {
				margin-top: 0;
				color: #2F3133;
				font-size: 16px;
				font-weight: bold;
				text-align: left;
			}
			h3 {
				margin-top: 0;
				color: #2F3133;
				font-size: 14px;
				font-weight: bold;
				text-align: left;
			}
			p {
				margin-top: 0;
				color: #74787E;
				font-size: 16px;
				line-height: 1.5em;
				text-align: left;
			}
			p.sub {
				font-size: 12px;
			}
			p.center {
				text-align: center;
			}

			/* Buttons ------------------------------ */
			.button {
				display: inline-block;
				width: 200px;
				background-color: #3869D4;
				border-radius: 3px;
				color: #ffffff;
				font-size: 15px;
				line-height: 45px;
				text-align: center;
				text-decoration: none;
				-webkit-text-size-adjust: none;
				mso-hide: all;
			}
			.reset-button {
				background-color: #23a500;
			}
			.button--blue {
				background-color: #3869D4;
			}

			/*Media Queries ------------------------------ */
			@media only screen and (max-width: 600px) {
				.email-body_inner,
				.email-footer {
					width: 100% !important;
				}
			}
			@media only screen and (max-width: 500px) {
				.button {
					width: 100% !important;
				}
			}
		</style>
	</head>
	<body data-gr-c-s-loaded="true">
		<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="center">
						<table class="email-content" width="100%" cellpadding="0" cellspacing="0">
							{{-- Logo --}}
							<tbody>
								<tr>
									<td class="email-masthead">
										<a class="email-masthead_name" href="{{ URL::route('index') }}">
											<img src="{{ URL::asset('images/blockhunt-logo-minified.png') }}">
										</a>
									</td>
								</tr>
								{{-- Email Body --}}
								<tr>
									<td class="email-body" width="100%">
										<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
											{{-- Body content --}}
											<tbody>
											<tr>
												<td class="content-cell">
													<h1>Hi {{ $userName }},</h1>
													<p>You recently requested to reset your password for your <b>MapItem</b> account. Click the button below to reset it.</p>
													{{-- Action --}}
													<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
														<tbody>
															<tr>
																<td align="center">
																	<div>
																		<a href="{{ $actionUrl }}" class="button reset-button">Reset your password</a>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
													<p>
														If you did not request a password reset, please ignore this email.
													</p>
													<p>
														Thanks,<br/>
														<b>MapItem Team</b>
													</p>
													{{-- Sub copy --}}
													<table class="body-sub">
														<tbody>
															<tr>
																<td>
																	<p class="sub">
																		If you’re having trouble clicking the password reset button, copy and paste the URL below into your web browser.
																	</p>
																	<p class="sub">
																		<a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
																	</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td>
										<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td class="content-cell">
														<p class="sub center">© {{ date("Y") }} MapItem. All rights reserved.</p>
														<p class="sub center">
															<a href="{{ URL::route('index') }}">MapItem</a>
														</p>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>