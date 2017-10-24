@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Job conversation</h1>

<main class="main_app_container">
	<ul class="comapny_user_coversation">
		<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> {{$conversation[0]->user->first_name}} {{$conversation[0]->user->last_name}}</a></p>
		@foreach($conversation[0]->messages as $message)
		<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
			<div class="comapny_user_coversation_item_name">
				<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> {{$message->last_name}} {{ $message->first_name }} {{ $message->company_name }}</a></p>
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>{{ $message->text }}</p>
			 </div>
			 <div class="time"><span>{{ $message->created_at }}</span></div>
		</li>
		@endforeach
	</ul>

	<form action="{{ route('postUserMessage') }}" method="POST" class="comapny_user_coversation_msg">
		<textarea name="text" placeholder="Your message..."></textarea>
		<input type="hidden" name="application_id" value="{{ $conversation[0]->id }}">
		<input type="hidden" name="first_name" value="{{ Session::get('user')->first_name }}">
		<input type="hidden" name="last_name" value="{{ Session::get('user')->last_name }}">
		{{ csrf_field() }}
		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="Send" class="confirm_btn">
		</div>
	</form>
</main>
@endsection
