@extends('layouts.master')

@section('content')
<h1 class="page_title">New job ad</h1>

		<main class="main_app_container">
			
			<div class="">
				<p class="form_title">Your company / organisation is:</p>
				<div class="new_job_add_choose_option_item">
					<label for=""><span>Job ad with standard design</span><input type="radio" name="company_job_type_add" id="" checked="checked" value="job_ad_standard_design"></label>

					<label for="">
						<span>Job ad with custom text formatting and image</span><input type="radio" name="company_job_type_add" id="" value="job_ad_custom_text_and_img">
						<span class="new_job_add_desc bold none">This option is available for Silver, Gold, Platinum, Diamond job offers.</span>
					</label>

					<label for="">

						<span>Job ad with fully customizable design</span><input type="radio" name="company_job_type_add" id="" value="job_ad_full_custom_design">
						<span class="new_job_add_desc bold none">This option is available for Diamond, Platinum, Gold, Silver job offers. <br>This option is only available for Diamond, Platinum, Gold and Silver job ads. Additional one time fee of 100 BGN (exc. VAT) is applicable. The fee covers the costs for creation of a job template based on the creative provided by you. You can use the template for other job ads at no extra cost. After choosing this option and publishing your job offer, you should contact us and provide us with your job ad creative based on which we will create your customized job ad template, phone: +359 2 439 22 22
						<button class="job_ad_enter_instuction_btn">Enter instructions</button>
						</span>
						
					</label>
					<label for="">

						<span>Confidential job ad</span><input type="radio" name="company_job_type_add" id="" value="job_ad_confidential_job">
						<span class="new_job_add_desc bold none">This option is available for Silver, Gold, Platinum job offers. The price is +150.00 BGN</span>

					</label>
				</div>
			</div>

			<!-- Popup custom job ad design -->
			<div class="custom_job_ad_popup">
				<a href="#" class="popup_close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				<form action="" method="">
					<textarea name="" id="" cols="30" rows="10" style="width: 100%;margin-top: 10px;" placeholder="Notes about fully customized design:*"></textarea>
					<input type="submit" value="Send">
				</form>
			</div>
			
			<!-- Prva Forma -->
			<form action="" method="" class="new_job_add_choose_form" style="display: none;">

				<div class="new_job_add_choose_form_item">
					<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
					<select name="" id="">
						<option value="">Arsa</option>
						<option value="">Sava</option>
						<option value="">Fiste</option>
					</select>
					<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
				</div>

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Ref.No:</p>
					<input type="text">
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Position:</p>
					<input type="text">
					<small>	Please, fill in the job title carefully as once the job ad is published, this field cannot be modified (corrections are possible within 24 hours of publishing). You can learn more about the options for editing jobs <a href="#">here</a>.</small>
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Description:</p>
					<textarea name="" id="" cols="30" rows="10"></textarea>
				</div>	
				
				<div class="new_job_add_choose_form_item cf">
					<p class="form_title">Category <small>(Choose up to 3 categories)</small>:</p>
					<select id="" class="selectSector select_move_area" name="" size="5">
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


					<select id="" class="selectSectorSelected select_move_area" name="" size="5">
				     
					</select>
				</div>

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Job type:</p>
					<label for="company_job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="company_job_type" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Term:</p>
					<label for="terms_job" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="terms_job" id=""></label>
					<label for="terms_job" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="terms_job" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Career level:</p>
					<label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" id=""></label>
					<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" id=""></label>
					<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" name="career_level" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Additional options::</p>
					<label for="add_options" style="margin-right: 20px"><span>Suitable also for students</span> <input type="checkbox" name="add_options" id=""></label>
					<br>
					<label for="add_options" style="margin-right: 20px"><span>Suitable also for candidates with little or no experience</span> <input type="checkbox" name="add_options" id=""></label>

				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Please, fill in the location where the position is based:</p>
					<select name="" id="">
						<option value="">Serbia</option>
						<option value="">Bulgaria</option>
						<option value="">Spain</option>
					</select>
					
					<p class="form_title">Location <small>(Choose from the list or type in the location)</small>:</p>
					<select name="" id="">
						<option value="">Beograd</option>
						<option value="">Nis</option>
						<option value="">Paracin</option>
					</select>

					<label for="add_options" style="margin-right: 20px;display: block;margin-top: 20px;"><input type="checkbox" name="add_options" id=""><span> Additional visibility of the job offer in a location different from the work location (optional)</span></label>

					<button class="add_more" style="margin-top: 20px;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add additional visibility</button>
				</div>	

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Enter the salary for this job position and get a significant discount of 20% when publishing this job. Free jobs with salary are displayed before the other free jobs.</p>

					<select name="" id="">
						<option value="">Gross</option>
						<option value="">Next</option>
					</select>
					<span> from </span>
					<input type="text">
					<span> to </span>
					<input type="text">
					<select name="" id="">
						<option value="">RSD</option>
						<option value="">EU</option>
						<option value="">USD</option>
					</select>

				</div>		

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Foreign languages:</p>

					<label for=""></label><input type="text" name="" id="">

				</div>	

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Questionnaire:</p>
					
					<p>	Use questionnaire to ask and receive answers to questions you have from the candidates applying to your job ad. Learn more <a href="">here</a>. Create a questionnaire <a href="">here</a></p>
					<select name="" id="">
						<option value="">xxx</option>
						<option value="">xxx</option>
						<option value="">xxx</option>
					</select>

				</div>

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Questionnaire:</p>
					
					<label for=""><input type="checkbox"> Link/button in the job offer to an external application website (optional)</label>

					<div class="new_job_add_choose_form_submit_btn">
						<input type="submit" value="Publish">
						<button class="cancel_btn">Cancle</button>	
					</div>
				</div>	
			</form>





			<!-- Druga forma -->
			<form action="" method="" class="new_job_add_choose_form">
				<div class="new_job_add_choose_form_item new_job_add_cover_photo_section">
					
					<div class="add_cover_preview_photo none">
						<img src="" alt="">	
					</div>

					<div class="add_cover_btn_input">
						<input type="file" id="" name="">
					</div>

					<div class="add_cover_btn">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Add cover</a>
					</div>

					<div class="add_cover_btn add_cover_btn_upload_cancle cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Upload cover</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancle</a>
					</div>

					<div class="add_cover_btn add_cover_btn_change_remove cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Change cover</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> Remove cover</a>
					</div>

				</div>

				<div class="new_job_add_choose_form_item">
					<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
					<select name="" id="">
						<option value="">Arsa</option>
						<option value="">Sava</option>
						<option value="">Fiste</option>
					</select>
					<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
				</div>

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Ref.No:</p>
					<input type="text">
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Position:</p>
					<input type="text">
					<small>	Please, fill in the job title carefully as once the job ad is published, this field cannot be modified (corrections are possible within 24 hours of publishing). You can learn more about the options for editing jobs <a href="#">here</a>.</small>
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Description:</p>
					<textarea name="" id="" cols="30" rows="10"></textarea>
				</div>	
				
				<div class="new_job_add_choose_form_item cf">
					<p class="form_title">Category <small>(Choose up to 3 categories)</small>:</p>
					<select id="" class="selectSector select_move_area" name="" size="5">
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


					<select id="" class="selectSectorSelected select_move_area" name="" size="5">
				     
					</select>
				</div>

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Job type:</p>
					<label for="company_job_type" style="margin-right: 20px"><span>Permanent</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Temporary</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Internship</span> <input type="radio" name="company_job_type" id=""></label>
					<label for="company_job_type" style="margin-right: 20px"><span>Distance job</span> <input type="radio" name="company_job_type" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Term:</p>
					<label for="terms_job" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="terms_job" id=""></label>
					<label for="terms_job" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="terms_job" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Career level:</p>
					<label for="career_level" style="margin-right: 20px"><span>Management</span> <input type="radio" name="career_level" id=""></label>
					<label for="career_level" style="margin-right: 20px"><span>Experts</span> <input type="radio" name="career_level" id=""></label>
					<label for="career_level" style="margin-right: 20px"><span>Administrative Staff/Workers</span> <input type="radio" name="career_level" id=""></label>

					<p class="form_title" style="margin-top: 20px;">Additional options::</p>
					<label for="add_options" style="margin-right: 20px"><span>Suitable also for students</span> <input type="checkbox" name="add_options" id=""></label>
					<br>
					<label for="add_options" style="margin-right: 20px"><span>Suitable also for candidates with little or no experience</span> <input type="checkbox" name="add_options" id=""></label>

				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">Please, fill in the location where the position is based:</p>
					<select name="" id="">
						<option value="">Serbia</option>
						<option value="">Bulgaria</option>
						<option value="">Spain</option>
					</select>
					
					<p class="form_title">Location <small>(Choose from the list or type in the location)</small>:</p>
					<select name="" id="">
						<option value="">Beograd</option>
						<option value="">Nis</option>
						<option value="">Paracin</option>
					</select>

					<label for="add_options" style="margin-right: 20px;display: block;margin-top: 20px;"><input type="checkbox" name="add_options" id=""><span> Additional visibility of the job offer in a location different from the work location (optional)</span></label>

					<button class="add_more" style="margin-top: 20px;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add additional visibility</button>
				</div>	

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Enter the salary for this job position and get a significant discount of 20% when publishing this job. Free jobs with salary are displayed before the other free jobs.</p>

					<select name="" id="">
						<option value="">Gross</option>
						<option value="">Next</option>
					</select>
					<span> from </span>
					<input type="text">
					<span> to </span>
					<input type="text">
					<select name="" id="">
						<option value="">RSD</option>
						<option value="">EU</option>
						<option value="">USD</option>
					</select>

				</div>		

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Foreign languages:</p>

					<label for=""></label><input type="text" name="" id="">

				</div>	

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Questionnaire:</p>
					
					<p>	Use questionnaire to ask and receive answers to questions you have from the candidates applying to your job ad. Learn more <a href="">here</a>. Create a questionnaire <a href="">here</a></p>
					<select name="" id="">
						<option value="">xxx</option>
						<option value="">xxx</option>
						<option value="">xxx</option>
					</select>

				</div>

				<div class="new_job_add_choose_form_item">

					<p class="form_title">Questionnaire:</p>
					
					<label for=""><input type="checkbox"> Link/button in the job offer to an external application website (optional)</label>

					<div class="new_job_add_choose_form_submit_btn">
						<input type="submit" value="Publish">
						<button class="cancel_btn">Cancle</button>	
					</div>
				</div>	
			</form>

		</main>
@endsection