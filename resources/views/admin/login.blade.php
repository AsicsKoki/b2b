@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">Admin Log in</h1>
<main class="main_app_container">
<div class="login_register_container">
	<form action="{{ route('postAdminLogin') }}" method="POST" class="login_reg_form">
		<div class="login_reg_form_item">
			@if($errors->any())
				<h4 style="text-align: center; margin-bottom: 15px;color: #ff5c5c;">Wrong email or password!</h4>
			@endif
			<label for="">Email</label>
			<input name="email" type="text">
		</div>

		<div class="login_reg_form_item">
			<label for="">Password</label>
			<input type="password" name="password">
		</div>
		{{ csrf_field() }}
		<div class="login_reg_form_item login_reg_form_submit">
			<input type="submit" value="Log in">
		</div>
		
		<div class="forgot_pass_link">
			<a href="" class="">Forgot your password?</a> 	
		</div>
		
		<a href=" {{ route('getAdminLogin') }} " class="login_reg_form_change_option">Create account</a>
	</form>
</div>
</main>
@endsection