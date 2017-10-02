@extends('layouts.master')

<h1 class="page_title">Companie Log in</h1>

@section('content')

<div class="login_register_container">
	<form action="" method="" class="login_reg_form">
		<div class="login_reg_form_item">
			<label for="">Username</label>
			<input type="text" name="" id="">
		</div>

		<div class="login_reg_form_item">
			<label for="">Password</label>
			<input type="password" name="" id="">
		</div>

		<div class="login_reg_form_item login_reg_form_submit">
			<input type="submit" value="Log in">
		</div>
		
		<div class="forgot_pass_link">
			<a href="" class="">Forgot your password?</a> 	
		</div>

		<a href="register-terms.html" class="login_reg_form_change_option">Crate account</a>
	</form>
</div>
@endsection