@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Applying for job</h1>

<main class="main_app_container">
	
	<form action="{{ route('postJobApplication') }}" method="POST">
		<textarea name="text" cols="30" rows="10" class="apply_for_job_text" placeholder="Enter cover letter..."></textarea>
		<input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
		<input type="hidden" name="ad_id" value="{{ $jid }}">
		<input type="hidden" name="company_id" value="{{ $cid }}">
		<button class="btn_attach_cv blue_btn">
			<i class="fa fa-paperclip" aria-hidden="true"></i> <span>Attach your CV</span>
		</button>
		{{ csrf_field() }}
		<input type="submit" value="Apply" class="apply_for_job_submit confirm_btn">
	</form>

</main>
@endsection
