<div class="col-sm-3" id="message_threades">
	<ul class="list-group inbox_titles">
		@foreach ($message_threads as $message_thread)
			<li class="list-group-item">
				<div thread_id="{{ $message_thread->id }}" class="conversation btn">
					<div class="media-body">
						<h5 class="media-heading" id="contactName">{{ $message_thread->title }}</h5>
						<small class="pull-right time">Created {{ $message_thread->created_at }}</small>
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