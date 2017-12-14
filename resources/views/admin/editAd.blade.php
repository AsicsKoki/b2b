@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">Edit job</h1>

<main class="main_app_container">
	<form action="{{ route('postAdminEditAd') }}" method="POST" class="new_job_add_choose_form">
		<input type="hidden" value="{{ $ad->id }}" name="aid">

		<!-- <div class="new_job_add_choose_form_item">
			<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
			<select name="">
				<option value="">Arsa</option>
				<option value="">Sava</option>
				<option value="">Fiste</option>
			</select>
			<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
		</div>

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Ref.No:</p>
			<input name="ref_number" type="text">
		</div>	 -->

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Position:</p>
			<input name="position" type="text" value="{{ $ad->position }}">
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Description:</p>
			<textarea name="description" cols="30" rows="10">{{ $ad->description }}</textarea>
		</div>	
		
		<div class="new_job_add_choose_form_item cf">
			<p class="form_title">Category <small>(Choose up to 3 categories)</small>:</p>
			<select class="selectSector select_move_area" size="5">
				@foreach( App\Category::getCategories() as $category)
			     	<option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
			    @endforeach
			</select>


			<select class="selectSectorSelected select_move_area" multiple name="categories[]" size="5">
		     	
			</select>
		</div>

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Job type:</p>
            @if ($ad->job_type == 0)
            <label for="job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type" value="0" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type" value="3"></label>
            @elseif ($ad->job_type == 1)
            <label for="job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type" value="1" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type" value="3"></label>            
            @elseif ($ad->job_type == 2)
            <label for="job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type" value="2" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type" value="3"></label>
            @elseif ($ad->job_type == 3)
            <label for="job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type" value="3" checked="checked"></label>
            @else
            <label for="job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type" value="3"></label>
            @endif


			<!-- <p class="form_title" style="margin-top: 20px;">Term:</p>
			<label for="term" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="term"></label>
			<label for="term" style="margin-right: 20px"><span>Part time</span> <input type="checkbox" name="term"></label> -->

			<p class="form_title" style="margin-top: 20px;">Career level:</p>
            @if ($ad->career_level==0)
			<label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" value="0" checked="checked"></label>
            <label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" value="2" name="career_level"></label>
            @elseif ($ad->career_level==1)
            <label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" value="1" checked="checked"></label>
			<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" value="2" name="career_level"></label>          
            @elseif ($ad->career_level==2)
            <label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" value="2" name="career_level" checked="checked"></label>
            @else
            <label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" value="2" name="career_level"></label>
            @endif

			<p class="form_title" style="margin-top: 20px;">Additional options:</p>
            @if ($ad->students == 1)
			<label for="students" style="margin-right: 20px"><span>Suitable also for students</span> <input type="checkbox" name="students" checked></label>
            @else
            <label for="students" style="margin-right: 20px"><span>Suitable also for students</span> <input type="checkbox" name="students"></label>
			@endif
			<br>
            @if ($ad->low_experience == 1)
			<label for="low_experience" style="margin-right: 20px"><span>Suitable also for candidates with little or no experience</span> <input type="checkbox" name="low_experience" checked></label>
            @else
			<label for="low_experience" style="margin-right: 20px"><span>Suitable also for candidates with little or no experience</span> <input type="checkbox" name="low_experience"></label>
			@endif

		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Please, fill in the location where the position is based:</p>
            <input name="country" type="text" value="{{ $ad->country }}">
			<!-- <select name="country">
				<option value="Serbia">Serbia</option>
				<option value="Bulgaria">Bulgaria</option>
				<option value="Spain">Spain</option>
			</select> -->
			
			<p class="form_title">Location <small>(Choose from the list or type in the location)</small>:</p>
            <input name="city" type="text" value="{{ $ad->city }}">


			<!-- <select name="city">
				<option value="Beograd">Beograd</option>
				<option value="Nis">Nis</option>
				<option value="Paracin">Paracin</option>
			</select> -->
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">Enter the salary for this job position and get a significant discount of 20% when publishing this job. Free jobs with salary are displayed before the other free jobs.</p>

			<select name="salary_type">
                @if($ad->salary_type=="Gross")
				<option value="Gross" selected>Gross</option>
				<option value="Net">Net</option>
                @elseif($ad->salary_type=="Net")
                <option value="Gross">Gross</option>
				<option value="Net" selected>Net</option>
                @else                
                <option value="Gross">Gross</option>
				<option value="Net">Net</option>
                @endif
			</select>
			<span> from </span>
			<input name="salary_from" type="text" value="{{ $ad->salary_from }}">
			<span> to </span>
			<input name="salary_to" type="text" value="{{ $ad->salary_to }}">
			<select name="currency">
            @if($ad->currency=="RSD")
				<option value="RSD" selected>RSD</option>
                <option value="EUR">EU</option>
				<option value="USD">USD</option>
            @elseif($ad->currency=="EU")
                <option value="RSD">RSD</option>
				<option value="EUR" selected>EU</option>
            @elseif($ad->currency=="USD")
                <option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD" selected>USD</option>
            @else				
                <option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD">USD</option>
			@endif
			</select>

		</div>		

		<div class="new_job_add_choose_form_item">

			<p class="form_title">languages:</p>
			<select name="foreign_languages">
				<option value="Null">None</option>
				@foreach(App\Language::getLanguages() as $language)
					<option value="{{ $language->language }}">{{ $language->language }}</option>
				@endforeach
			</select>
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">External link:</p>
			
			<label for="external_url"><input name="external_url" type="text" value="{{ $ad->external_url }}"></label>
			<input name="ad_type" type="hidden" value="1">

			{{ csrf_field() }}
			<div class="new_job_add_choose_form_submit_btn">
				<input type="submit" value="Publish">
			</div>
		</div>	
	</form>
</main>
@endsection