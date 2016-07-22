<!-- Messages & Info -->
<div class="col-sm-9 panel-wrap">
	<!--Main Content / Message List-->
	<div class="col-sm-9 section-wrap" id="messages">
		<!--Header-->
		<div class="row header-wrap">
			<div class="chat-header col-sm-12">
				<h4>Conversation Title</h4>
				<div class="header-button">
					<a class="btn pull-right info-btn">
						<i class="fa fa-info-circle fa-lg"></i>
					</a>
				</div>
			</div>
		</div>

		<!--Messages-->
		<div class="row content-wrap messages">
			
			<h3>Please click on any Conversation to see detail</h3>
			{{--
			@for ($i = 0; $i < 15; $i++)
				<div class="msg">
					<div class="media-body">
						<small class="pull-right time">
							<i class="fa fa-clock-o"></i> 
							12:10am
						</small>

						<h5 class="media-heading">
							Walter White
						</h5>
						<small class="col-sm-11">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper, eget sagittis velit venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos...
						</small>
					</div>
				</div>
			@endfor
			--}}
		</div>

		<!--Message box & Send Button-->
		<div class="row send-wrap">
			<form id="send_message_form" class="send-message" action="{{ URL::route('user.inbox_message_send') }}">
				<input type="hidden" name="thread_id">
				<div class="message-text">
					<textarea id="send_message_text" class="no-resize-bar form-control" rows="2" name="message" placeholder="Write a message..."></textarea>
				</div>
				<div class="send-button">
					<a class="btn">
						Send
						<i class="fa fa-send"></i>
					</a>
					{{-- <button type="submit" class="btn">
						Send
						<i class="fa fa-send"></i>
					</button> --}}
				</div>
			</form>
		</div>
	</div>

	<!--Sliding Menu -->
	<div class="col-sm-3 section-wrap" id="extra_info">
		<!--Header-->
		<div class="row header-wrap">
			<div class="chat-header col-sm-12">
				<h4>Conversation Info</h4>
				<div class="header-button">
					<a class="btn pull-right info-btn">
						<i class="fa fa-close"></i>
					</a>
				</div>
			</div>
		</div>
		<!--Members-->
		<div class="row content-wrap">

			@for ($i = 0; $i < 15; $i++)
				<div class="contact">
					<div class="media-body">
						<h5 class="media-heading">Walter White</h5>
						<small class="pull-left time"><i>Owner</i></small>
					</div>
				</div>
			@endfor

		</div>
	</div>
</div>