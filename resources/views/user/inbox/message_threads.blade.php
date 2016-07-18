<!-- Conversations -->
<div class="col-sm-3 panel-wrap">

	<!--Left Menu / Conversation List-->
	<div class="col-sm-12 section-wrap">
		<!--Header-->
		<div class="row header-wrap">
			<div class="chat-header col-sm-12">
				<h4>Conversation List</h4>
			</div>
		</div>
		<!--Conversations-->
		<meta name="thread_detail_ajax_url" content="{{ URL::route('user.message_thread_detail') }}">
		<div class="row content-wrap">
			@foreach ($message_threads as $message_thread)
				<div thread_id="{{ $message_thread->id }}" class="conversation btn">
					<div class="media-body">
						<h5 class="media-heading" id="contactName">{{ $message_thread->title }}</h5>
						<small class="pull-right time">Created {{ $message_thread->created_at }}</small>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>