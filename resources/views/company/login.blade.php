@extends('layouts.master')
@section('content')
<h1 class="page_title">Company Log in</h1>

<main class="main_app_container">
<div class="login_register_container">
	<form action="{{ route('authenticate') }}" method="POST" class="login_reg_form">
		<div class="login_reg_form_item">
			<label for="">Username</label>
			<input name="username" type="text"  id="">
		</div>

		<div class="login_reg_form_item">
			<label for="">Password</label>
			<input type="password" name="password" id="">
		</div>
			{{ csrf_field() }}

		<div class="login_reg_form_item login_reg_form_submit">
			<input type="submit" value="Log in">
		</div>
		
		<div class="forgot_pass_link">
			<a href="" class="">Forgot your password?</a> 	
		</div>
		
		<a href="{{ route('getCompanyRegister') }}" class="login_reg_form_change_option">Create account</a>
	</form>
</div>
</main>
@endsection