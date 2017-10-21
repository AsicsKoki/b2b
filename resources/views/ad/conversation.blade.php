@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Job conversation</h1>

<main class="main_app_container">
	<ul class="comapny_user_coversation">
		<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
			<div class="comapny_user_coversation_item_name">
				<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> Vladimir Arsenijevic</a></p>
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is. This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is.</p>
			 </div>
			 <div class="time"><span>22:30h</span>, <span>2.2.2017</span></div>
		</li>

		<li class="comapny_user_coversation_item comapny_user_coversation_user comapny_user_coversation_company">
			<div class="comapny_user_coversation_item_name">
				<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> Booproweb</a></p>
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is. This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is.</p>
			 </div>
			 <div class="time"><span>22:30h</span>, <span>2.2.2017</span></div>
		</li>

		<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
			<div class="comapny_user_coversation_item_name">
				<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> Vladimir Arsenijevic</a></p>
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is. This is not the same on a vanilla MySQL install where the root user is not secured by a password by default – however under MAMP it is.</p>
			 </div>
			 <div class="time"><span>22:30h</span>, <span>2.2.2017</span></div>
		</li>
	</ul>

	<form action="" method="" class="comapny_user_coversation_msg">
		<textarea name="" id="" placeholder="Your message..."></textarea>

		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="Send" class="confirm_btn">
		</div>
	</form>
</main>
@endsection
