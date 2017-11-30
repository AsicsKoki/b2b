@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Applying for job</h1>

<main class="main_app_container">
	
	{{Form::open(array('route' => 'postJobApplication','method'=>'POST', 'files'=>true))}}
		<textarea name="text" cols="30" rows="10" class="apply_for_job_text" placeholder="Enter cover letter..."></textarea>
		<input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
		<input type="hidden" name="ad_id" value="{{ $jid }}">
		<input type="hidden" name="company_id" value="{{ $cid }}">
		<input type="hidden" name="first_name" value="{{ Session::get('user')->last_name }}">
		<input type="hidden" name="last_name" value="{{ Session::get('user')->first_name }}">
		<input type="file" name="file_input" accept="application/pdf" />
		<button class="btn_attach_cv blue_btn">
			<i class="fa fa-paperclip" aria-hidden="true"></i> <span>Attach your CV</span>
		</button>
		{{ csrf_field() }}
		<input type="submit" value="Apply" class="apply_for_job_submit confirm_btn">
	</form>

</main>
@endsection
