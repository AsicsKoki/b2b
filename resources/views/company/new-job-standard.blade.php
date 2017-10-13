@extends('layouts.master')

@section('content')
<h1 class="page_title">New job ad</h1>

<main class="main_app_container">
	<form action="{{ route('postNewJob') }}" method="POST" class="new_job_add_choose_form">

		<div class="new_job_add_choose_form_item">
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
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Position:</p>
			<input name="position" type="text">
			<small>	Please, fill in the job title carefully as once the job ad is published, this field cannot be modified (corrections are possible within 24 hours of publishing). You can learn more about the options for editing jobs <a href="#">here</a>.</small>
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Description:</p>
			<textarea name="description" cols="30" rows="10"></textarea>
		</div>	
		
		<div class="new_job_add_choose_form_item cf">
			<p class="form_title">Category <small>(Choose up to 3 categories)</small>:</p>
			<select class="selectSector select_move_area" name="" size="5">
			     <option value="3">Rose Tremain</option>
			     <option value="4">Jonathan Coe</option>           
			     <option value="5">Cecilia Ahern</option>
			     <option value="6">Marinel Serban</option>
			     <option value="7">Emanuela Cherchez</option>
			     <option value="8">Peter Buckley</option>
			     <option value="9">Clark Duncan</option>
			     <option value="10">Carlos-Ruiz Zafon</option>
			     <option value="11">Catalin Paduraru</option>
			     <option value="12">Dan-Silviu Boerescu</option>
			</select>


			<select class="selectSectorSelected select_move_area" name="category" size="5">
		     
			</select>
		</div>

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Job type:</p>
			<label for="company_job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="job_type"></label>
			<label for="job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="job_type"></label>
			<label for="job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="job_type"></label>
			<label for="job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="job_type"></label>

			<p class="form_title" style="margin-top: 20px;">Term:</p>
			<label for="term" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="term"></label>
			<label for="term" style="margin-right: 20px"><span>Part time</span> <input type="checkbox" name="term"></label>

			<p class="form_title" style="margin-top: 20px;">Career level:</p>
			<label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" value="2" name="career_level"></label>

			<p class="form_title" style="margin-top: 20px;">Additional options::</p>
			<label for="students" style="margin-right: 20px"><span>Suitable also for students</span> <input type="checkbox" name="students"></label>
			<br>
			<label for="low_experience" style="margin-right: 20px"><span>Suitable also for candidates with little or no experience</span> <input type="checkbox" name="low_experience"></label>

		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Please, fill in the location where the position is based:</p>
			<select name="country">
				<option value="Serbia">Serbia</option>
				<option value="Bulgaria">Bulgaria</option>
				<option value="Spain">Spain</option>
			</select>
			
			<p class="form_title">Location <small>(Choose from the list or type in the location)</small>:</p>
			<select name="city">
				<option value="Beograd">Beograd</option>
				<option value="Nis">Nis</option>
				<option value="Paracin">Paracin</option>
			</select>
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">Enter the salary for this job position and get a significant discount of 20% when publishing this job. Free jobs with salary are displayed before the other free jobs.</p>

			<select name="salary_type">
				<option value="Gross">Gross</option>
				<option value="Net">Net</option>
			</select>
			<span> from </span>
			<input name="salary_from" type="text">
			<span> to </span>
			<input name="salary_to" type="text">
			<select name="currency">
				<option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD">USD</option>
			</select>

		</div>		

		<div class="new_job_add_choose_form_item">

			<p class="form_title">Foreign languages:</p>

			<label for=""></label><input type="text" name="foreign_languages">

		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">Questionnaire:</p>
			
			<p>	Use questionnaire to ask and receive answers to questions you have from the candidates applying to your job ad. Learn more <a href="">here</a>. Create a questionnaire <a href="">here</a></p>
			<select name="questionnaire_id">
				<option value="1">Broj 1</option>
				<option value="2">Broj 2</option>
				<option value="3">Broj 3</option>
			</select>

		</div>

		<div class="new_job_add_choose_form_item">

			<p class="form_title">External link:</p>
			
			<label for="external_url"><input name="external_url" type="text"></label>
			<input name="ad_type" type="hidden" value="1">

			{{ csrf_field() }}
			<div class="new_job_add_choose_form_submit_btn">
				<input type="submit" value="Publish">
			</div>
		</div>	
	</form>
</main>
@endsection