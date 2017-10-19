@extends('layouts.master')

@section('content')

<h1 class="page_title">Applying for job</h1>

<main class="main_app_container">
	
	<form action="" method="">
		<textarea name="" id="" cols="30" rows="10" class="apply_for_job_text" placeholder="Enter job application..."></textarea>

		<button class="btn_attach_cv blue_btn">
			<i class="fa fa-paperclip" aria-hidden="true"></i> <span>Attach your CV</span>
		</button>

		<input type="submit" value="Apply" class="apply_for_job_submit confirm_btn">
	</form>

</main>
@endsection
