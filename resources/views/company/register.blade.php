@extends('layouts.master')

@section('content')
<main class="main_app_container">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<div class="login_register_container">
				<form action="{{ route('postCompanyRegister') }}" method="POST" class="login_reg_form company_registration_form">

					<div class="first_part_companies_reg">

						<div class="login_reg_form_item">
							<p class="form_title">Country</p>
							<select name="country" id="">
								<option value="Serbia">Serbia</option>
								<option value="Bulgaria">Bulgaria</option>
							</select>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">Your company / organisation is:</p>
							<div class="company_type_form_section">
								<label for="private_company">
									<span>Private</span>
									<input type="radio" value="1" name="company_registration" id="private_company">
								</label>
								<label for="government_company"><span>Government / municipal</span><input type="radio" value="0" name="company_registration" id="government_company"></label>
							</div>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">EIK / BULSTAT</p>
							<input type="text" name="pib" id="" name="">
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">Does your company/organization have a VAT registration?</p>
							<div class="company_type_form_section">
								<label for="company_organization_yes"><span>Yes</span><input type="radio" value="1" name="has_vat" id="company_organization_yes"></label>
								<label for="company_organization_no"><span>No</span><input type="radio" value="0" name="has_vat" id="company_organization_no"></label>
							</div>
						</div>

						<div class="login_reg_form_item login_reg_form_submit">
							<button class="submit btn_check_company_pib">Continue</button>
						</div>

					</div>

					<!-- Second Part Companies Registration -->
					<div class="second_part_companies_reg none">
						<div class="login_reg_form_item">
							<p>Country: <span>Serbia</span></p>
							<p>EIK / BULSTAT: <span>103873594</span></p>
							<p>Vat number: <span>BG103873594</span></p>
						</div>

						<div class="login_reg_form_item">
							<p class="">Please, fill in the name of the company as stated in the Trade Register, including the corresponding type of business ownership (Sole Proprietorship/ LTD/PLC, etc.):</p>
							<p class="form_title">Company name (in Serbian):</p>
							<input name="name" type="text">
							<p class="form_title">Company name (in foreign language):</p>
							<input name="foreign_name" type="text">
							<p class="form_title">Company registered office:</p>
							<input name="address" type="text">
						</div>

						<div class="login_reg_form_item form_smaller_text">
							<p class="form_title">Company type:</p>
							<div class="company_type_form_section">
								<label for="company_type_org_companies"><span>	Companies / Organizations</span><input type="radio" value="0" name="company_type" id="company_type_org_companies">
								<small>(Companies looking for employers)</small></label>

								<label for="company_type_hr_consultan"><span>HR Agencies/Consultancy companies, temp agencies </span><input type="radio" name="company_type" value="1" id="company_type_hr_consultan"><small>(with fully free services for candidates)</small></label>
							</div>
							

							<p class="form_title">Business sector:</p>
							<select id="business_sector_select" name="sector" size="5">
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

							<ul class="business_sector_selected_items">
								<li></li>
							</ul>

							<p class="form_title">Company website:</p>
							<input name="website" type="text">

							<p class="form_title">Company phone:</p>
							<input name="phone" type="text">

							<p class="form_title">Address:</p>
							<input name="address" type="text">
							
							<p class="form_title">Administrative information:</p>
							<p>This information is required in order to verify the authenticity of the registration and IS NOT PUBLISHED on the website. Upon posting one or more job ads, an administrator of Jobs.bg will contact you by phone in order to verify the registration.</p>
							<br>
							<p class="form_title">Please, fill in your name, title and contact information:</p>

							<p class="form_title">First Name:</p>
							<input name="first_name" type="text">

							<p class="form_title">Last Name:</p>
							<input name="last_name" type="text">

							<p class="form_title">Position:</p>
							<input name="position" type="text"> 

							<p class="form_title">Business phone:</p>
							<input name="phone" type="text">

							<p class="form_title">Business email:</p>
							<input name="email" type="text">

							<small style="margin-bottom: 10px;display: inline-block;">An email to confirm your registration request will be sent to the designated company email)</small>
							
							<label for="weekly_jobs_newsletter"><input type="checkbox" value="1" name="newsletter" id="weekly_jobs_newsletter"> I would like to receive the weekly jobs.bg/economy.bg newsletter</label>

							<p class="form_title">Please select your log-in username:</p>

							<p class="form_title">Username:</p>
							<input name="username" type="text">

							<p class="form_title">Password:</p>
							<input name="password" type="password" style="width: calc(100% - 30px);">

							<p class="form_title">Confirm password:</p>
							<input name="repeat_password" type="password" style="width: calc(100% - 30px);">
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">Are you the authorized person in your company whom our administrators can contact about registration confirmation, job ads verification, financial or other issues?</p>

							<label for="" style="display: inline-block; margin-right: 10px;"><span>Yes</span> <input type="radio" value="1" name="authorized_person" id="" value=" Yes">
							</label>

							<label for="" style="display: inline-block;"><span>No</span> <input type="radio" value="0" name="is_manager" id="" class="no_authorized_checkbox" value="No"></label>
							

							
							<div class="authorized_person_for_contact_company none" style="margin-top: 15px;">
								<p class="form_title">Person for administrative contact</p>
								
								<p>Please, fill in the authorized person in your company whom our administrators can contact about registration confirmation, job ads verification, financial or other issues</p>
								
								<br>
							
								<p class="form_title">First Name:</p>
								<input name="first_name" type="text">

								<p class="form_title">Last Name:</p>
								<input name="last_name" type="text">

								<p class="form_title">Position:</p>
								<input name="position" type="text">

								<p class="form_title">Business phone:</p>
								<input name="business_phone" type="text">

								<p class="form_title">Business email:</p>
								<input name="business_email" type="email" style="width: calc(100% - 30px)";>	
							</div>

						</div>
						

						<div class="login_reg_form_item">
							<p class="form_title">General manager / HR director</p>

							<p>Please, fill in the General manager/HR director of the company or a person in an equivalent position whom we can contact about important issues related to your company’s account in Jobs.bg</p>
							<br>
							<p class="form_title">First Name:</p>
							<input name="manager_first_name" type="text">

							<p class="form_title">Last Name:</p>
							<input name="manager_last_name" type="text">

							<p class="form_title">Position:</p>
							<input name="position" type="text">

							<p class="form_title">Business phone:</p>
							<input name="manager_phone" type="text">

							<p class="form_title">Business email:</p>
							<input name="manager_email" type="email" style="width: calc(100% - 30px)">

							<small>(An email to confirm your registration request will be sent to the designated company email)</small>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">General manager / HR director</p>

							<p style="color: #d42929;font-family: open_sans_bold;">Important: In order to increase the security of the service, identification by wire transfer of 1 BGN (VAT not incl.) is implemented, which aims to ensure the identity of the company.</p>
							<br>
							<p>You will find "Account validation" proforma invoice for 1 BGN (VAT not incl.) in your account.</p>
							<br>
							<p>It is mandatory that the payment is made via a corporate bank account of the legal entity that has requested the registration. The registration will not be validated if the fee is paid in cash over the counter at a bank branch, via credit card, through Easypay, etc., nor if the payment is made via a corporate bank account of a different legal entity. In order for the account to be validated, it is required that the full IBAN number of the ordering entity is visible in our bank system. Please, check with your bank that the payment method you are using meets this requirement. The "Account validation" fee is non-refundable. Additional requirements for registration might apply depending on the company type. Paying the fee does not guarantee that your registration will be approved.</p>
						</div>

						<div class="login_reg_form_item">

							<div style="text-align: center;">
								<img src="images/employers/test-employer.jpg" alt="">
							</div>

							<p class="form_title">Enter key:</p>
							<input name="key" type="text">
						</div>
						 {{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" name="submit" value="Create account">
						</div>
					</div>
				</form>
			</div>
		</main>
@endsection