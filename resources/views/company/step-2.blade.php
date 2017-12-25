@extends('layouts.master')

@section('content')
		<main class="main_app_container">
		
			<div class="upload_profile_photo_holder cf">	
				<div class="upload_profile_photo_holder_text">
					<p class="bold">Upload your compnay logo. The logo is displayed in your jobs ads, company profile, lists.</p>

					<ul style="padding-left: 40px;margin-top: 15px;">
						<li>you can only upload a logo that belongs to your company</li>
						<li>the logo and its elements should be clearly visible</li>
						<li>photos and creative ads will not be approved</li>
					</ul>					
				</div>

				<div class="upload_profile_photo">
					<p class="" style="margin-bottom: 15px;">The logo should be in this formats: .jpg, .gif or .png</p>
					{{Form::open(array('route' => 'getCompanyRegisterStep2','method'=>'POST', 'files'=>true))}}
						<input required type="file" name="company_logo">
						<input type="hidden" name="id" value="{{$id}}">
						{{ csrf_field() }}
						<input type="submit" value="Upload" class="btn_submit">
					</form>
				</div>
			</div>

			<div class="skip_btn_holder">
				<a href="{{ route('getCompanyRegisterStep3') }}">Skip</a>
			</div>
			
		</main>

@endsection