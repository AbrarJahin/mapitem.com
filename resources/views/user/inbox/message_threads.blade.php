<div class="col-sm-4" id="message_threades">
	<ul class="list-group inbox_titles">
		@foreach ($message_threads as $message_thread)
			<li class="list-group-item no-padding">
				<div thread_id="{{ $message_thread->id }}" class="btn conversation {{ $message_thread->is_readed }}">
					<div class="media-body">
						<h5 class="media-heading">{{ $message_thread->title }}</h5>
						<strong class="time pull-left">{{ $message_thread->sender_name }}</strong>
						<small class="pull-right time">
							<span class="glyphicon glyphicon-time message_thread_time"></span>
							<span class="message_thread_server_time">{{ $message_thread->last_message_time }}</span>
						</small>
					</div>
				</div>
			</li>
			{{--
				<li thread_id="2" class="list-group-item conversation">
					Second item
				</li>
			--}}
		@endforeach
	</ul>
</div>