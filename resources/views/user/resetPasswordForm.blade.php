@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">Reset password</h1>

<main class="main_app_container">
	<form action="{{ route('setNewPassword', ['token' => $token]) }}" method="POST" class="form_reset_password">
		<div class="form_reset_password_item">
			<input type="password" name="password" placeholder="Enter new password">
		</div>
		<div class="form_reset_password_item">
			<input type="password" name="repeat_password" placeholder="Confirm new password">
		</div>
		{{ csrf_field() }}

		<div class="form_reset_password_item">
			<input type="submit" value="Confirm">
		</div>
	</form>
</main>
@endsection	