@extends('layouts.master')
@section('content')
<h1 class="page_title">User Registration</h1>

<main class="main_app_container">
	<div class="user_profile_content cf">
		<div class="user_profile_main">
			<div class="user_profile_main_header">
				<div class="user_profile_image user_profile_item">
					<div class="user_profile_image_holder">
						<span>
							<img src="https://scontent.fbeg5-1.fna.fbcdn.net/v/t1.0-1/p160x160/21686203_1317978501681658_3611638233223355882_n.jpg?oh=8125a6abd8ff47a68901a7907b32c738&oe=5A39DB7C" alt="">
						</span>
						<a href="" class="edit_link">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<br>
						<div class="edit_info_window change_image_edit_info_window">
							<input type="file">
							<button class="confirm_edit_btn">Choose image</button>
						</div>
					</div>
					
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>Vladimir Arsenijevic</span>
						<a href="" class="edit_link">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window">
						<input type="text" placeholder="Enter your full name">
						<button class="confirm_edit_btn">Confirm</button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>ETS Nikola Tesla - Programer racunara</span>
						<a href="" class="edit_link">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window">
						<input type="text" placeholder="Education">
						<button class="confirm_edit_btn">Confirm</button>
					</div>
				</div>

				<div class="user_profile_about user_profile_item">
					<p class="user_profile_about_text">
					<span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
						<a href="" class="edit_link">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window">
						<textarea name="" id="" cols="30" rows="10" width="100%" placeholder="Say something about you"></textarea>
						<button class="confirm_edit_btn">Confirm</button>
					</div>
				</div>
			</div>
		</div>

		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">Email:</p>
				<span>arsenije018@gmail.com</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Country:</p>
				<span>Serbia</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<input type="text" placeholder="Enter your country">
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">City:</p>
				<span>Nis</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<input type="text" placeholder="Enter your city">
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Region:</p>
				<span>Nis</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<input type="text" placeholder="Enter your region">
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Birth date:</p>
				<span>02.02.1990</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<input type="text" placeholder="Enter your birth date">
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Gender:</p>
				<span>Male</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<label for="male">
						<input type="radio" value="" id="male" name="gender" style="width: auto;margin-right: 5px;">
						<span style="font-size: 15px;">Male</span>
					</label>

					<label for="female">
						<input type="radio" value="" id="female" name="gender" style="width: auto;margin-right: 5px;">
						<span style="font-size: 15px;">Female</span>
					</label>
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">Phone:</p>
				<span>063/333-555</span>
				<a href="" class="edit_link">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window">
					<input type="text" placeholder="Enter your phone">
					<button class="confirm_edit_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>


		</div>
	</div>
</main>
@endsection