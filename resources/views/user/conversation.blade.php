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

	<form action="{{ route('postUserMessage') }}" method="POST" class="comapny_user_coversation_msg">
		<textarea name="text" placeholder="Your message..."></textarea>
		<input class="application_id_msg" type="hidden" name="application_id" value="{{ $conversation[0]->id }}">
		<input  class="msg_first_name" type="hidden" name="first_name" value="{{ Session::get('user')->first_name }}">
		<input class="msg_last_name" type="hidden" name="last_name" value="{{ Session::get('user')->last_name }}">
		{{ csrf_field() }}
		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="Send" class="confirm_btn">
			
		</div>
	</form>
	<button class="ajaxtest">posalji</button>
</main>

<script>
// 	$(document).ready(function(){
// console.log($('.timestamp_msg').last().text() + ' this is application id =>  ' +  $('.application_id_msg').val());
// 	});
	

   

  //   $(window).load(function(){
  //       function checkMessage(){
  
  //       $.ajax({
  //           type: 'post',
  //           url: '/updateMessages',  
  //           data:  {
  //           	timestamp: $('.timestamp_msg').last().text(),
  //           	application_id: $('.application_id_msg').val(),
  //           	 '_token': $('meta[name="csrf-token"]').attr('content')
  //           }     
  //           timeout: 5000,
 	// 	  }).done(function(data) {
  // 		  	checkMessage()
		// }).fail( function(err) {
	 //        console.log(err);
	 //    });
  //   });
  //   });

//      $(function(){
//     function checkMessages(){

//       $.ajax({
//             type: 'post',
//             url: '/updateMessages',  
//             data:  {
//             	timestamp: $('.timestamp_msg').last().text(),
//             	application_id: $('.application_id_msg').val(),
//             	 '_token': $('meta[name="csrf-token"]').attr('content')
//             },   
//             timeout: 5000,
//             success: function(data) {
//                 console.log(data); // for testing only but this should call a handler for the data  
//             },
//             complete: function(){
//                 $.delay(1000, function(){
//                     checkMessages();
//                 });
//             }
//         });

//     }

//     $(window).load(function(){
//         checkMessages();
//     });
// });
$(function(){
    var checkMessagesTimeout;

    function checkMessages(){

        $.ajax({
            type: 'post',
            url: '/updateMessages',  
            data:  {
            	timestamp: $('.timestamp_msg').last().text(),
            	application_id: $('.application_id_msg').val(),
            	 '_token': $('meta[name="csrf-token"]').attr('content')
            },   
            timeout: 5000,
            success: function(data) {
            	// var text_message = JSON.stringify(["0"].text);
            	console.log(text_message);
                console.log(data); // for testing only but this should call a handler for the data  
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
