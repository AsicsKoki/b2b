@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Job conversation</h1>

<main class="main_app_container">
	<ul class="comapny_user_coversation">
		<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> {{$conversation[0]->user->first_name}} {{$conversation[0]->user->last_name}}</a></p>
		@foreach($conversation[0]->messages as $message)
		<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
			<div class="comapny_user_coversation_item_name">
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>{{ $message->text }}</p>
			 </div>
			 <div class="time"><span>{{ $message->created_at }}</span></div>
		</li>
		@endforeach
	</ul>

	<form action="{{ route('postSendMessage') }}" method="POST" class="comapny_user_coversation_msg">
		<textarea name="text" placeholder="Your message..."></textarea>
		<input type="hidden" name="application_id" value="{{ $conversation[0]->id }}">
		{{ csrf_field() }}
		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="Send" class="confirm_btn">
		</div>
	</form>
</main>
@endsection
