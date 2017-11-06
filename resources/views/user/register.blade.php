@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">User Registration</h1>

<main class="main_app_container">
	@if($errors->any())
		<h4>{{$errors->error}}</h4>
	@endif
	<div class="login_register_container">
		<form action="{{ route('postUserRegister') }}" method="POST" class="login_reg_form">
			<div class="login_reg_form_item">
				<p class="form_title">First Name:</p>
				<input type="text" name="first_name">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">Last Name:</p>
				<input type="text" name="last_name">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">Gender:</p>
				<label>Male<input type="radio" value="Male" name="gender"></label>
				<label>Female<input type="radio" value="Female" name="gender"></label>
			</div>

			<div class="login_reg_form_item" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;">
				<small style="border-top: 1px solid #ddd;display: block;padding-top: 10px;margin-bottom: 10px;">Enter your current email address. At the entered address you will receive an email to verify your registration.</small>
				<p class="form_title">Email:</p>
				<input type="email" name="email">

				<p class="form_title">Re-enter email:</p>
				<input type="email" name="confirm_email">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">Password:</p>
				<input type="password" name="password">

				<p class="form_title">Re-enter password:</p>
				<input type="password" name="confirm_password">
			</div>

			<div class="login_reg_form_item">
				<label for="terms_and_conditions">
					<input type="checkbox" id="terms_and_conditions" name="terms_and_conditions" style="display: inline-block;width: auto;margin-right: 5px;"> 
					<span style="font-size: 15px;" class="bold">I agree with the <a href="#">terms and conditions</a></span>
				</label>
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">Key:</p>
				<div class="key_holder">
					
				</div>
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">Enter key:</p>
				<input type="text" name="">
				<small style="margin-bottom: 5px;">Copy the letters/numbers from the blue field. Use lowercase letters.</small>
			</div>
			{{ csrf_field() }}
			<div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
				<input type="submit" value="Create account">
			</div>
		</form>
	</div>

</main>

<!-- Popup Check Email Display None -->
<div class="pop_up_success_registration">
	<div class="pop_up_success_registration_content">
		<h3 class="bold">Welcome to Naposao.rs</h3>
		<p>To continue, please check your email and confirm your registration by clicking on the link in the confirmation email.</p>

		<button>Continue</button>
	</div>
</div>
@endsection