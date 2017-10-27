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
			 <div class="time"><span class="timestamp_msg">{{ $message->created_at }}</span></div>
		</li>
		@endforeach
	</ul>

	<form action="{{ route('postSendMessage') }}" method="POST" class="comapny_user_coversation_msg">
		<textarea name="text" placeholder="Your message..."></textarea>
		<input type="hidden" class="application_id_msg" name="application_id" value="{{ $conversation[0]->id }}">
		<input type="hidden" name="company_name" value="{{ Auth::user()->company_name }}">
		{{ csrf_field() }}
		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="Send" class="confirm_btn">
		</div>
	</form>
</main>
<script>

$(function(){
   

    function checkMessages(){

        $.ajax({
            type: 'post',
            url: '/updateMessages',  
            dataType: 'json',
            data:  {
            	timestamp: $('.timestamp_msg').last().text(),
            	application_id: $('.application_id_msg').val(),
            	 '_token': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(data) {
          	if (data[0] !== undefined ) {
           		   var text = data[0].text;
             	   var first_name = data[0].first_name;
             	   var last_name = data[0].last_name;
                   var timestamp_msg_created = data[0].created_at;
        			$('.comapny_user_coversation').append(
        				`<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
							<div class="comapny_user_coversation_item_name">
								<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i>`
								 + first_name + ' ' + last_name +
								`</a></p>
							</div>
			 				<div class="comapny_user_coversation_item_text">
			 				<p>`
			 				 + text + 
			 				 `</p>
			 				</div>
			 				<div class="time"><span class="timestamp_msg">`
			 				 + timestamp_msg_created + 
			 				 `</span></div>
						</li>`);		
            	}
            },
           complete: function(){
                checkMessagesTimeout = setTimeout(function(){
                    checkMessages();
                }, 5000); 
            }
        });

    }

     $(window).on('load', function (){
        checkMessages();
    });
});

</script>

@endsection
