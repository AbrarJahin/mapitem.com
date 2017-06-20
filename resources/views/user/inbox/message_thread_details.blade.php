<!-- Messages & Info -->
<div class="col-sm-8" id="message_details">
	<ul class="list-group inbox_detail" id="inbox_detail">
		Please select any message thread to see detail
		{{-- <li class="list-group-item me_send_him">
			<div>
				<div class="pro_pic">
					<img src="img/1.jpg">
					<span class="lead text-success">
						My Name
					</span>
				</div>
				<blockquote>
					<div class="message">asdas
						Second item
						asdasd
						ad
						ads
						ad
					</div>
					<footer>
						<time class="message_sent_time">
							2:12:12 PM, 14 Aug, 2016
						</time>
					</footer>
				</blockquote>
			</div>
		</li>

		<li class="list-group-item he_sends_me">
			<div>
				<div class="pro_pic">
					<img src="img/2.jpg">
					<span class="lead text-success">
						His Name
					</span>
				</div>
				<blockquote>
					<div class="message">
						Second item
						asdasd
						ad
						ads
						ad
					</div>
					<footer>
						<time class="message_sent_time">
							2:12:12 PM, 14 Aug, 2016
						</time>
					</footer>
				</blockquote>
			</div>
		</li> --}}
	</ul>

	{{-- Send Button --}}
	<div class="panel panel-primary">
		<div class="panel-body">

			<form id="send_message_form" class="send-message" action="{{ URL::route('user.inbox_message_send') }}">
				<input type="hidden" name="thread_id">
				<div class="input-group">
					<textarea class="form-control" rows="3" name="message"></textarea>
					<span class="input-group-addon btn btn-primary" id="inbox_send_button">
						Send
						<i class="fa fa-send"></i>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>