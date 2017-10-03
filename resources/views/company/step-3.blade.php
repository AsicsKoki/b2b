@extends('layouts.master')

@section('content')

<main class="main_app_container">
		
<div class="creating_comp_buisness_card_holder">
	<p style="text-align: center;">The business card provides the candidates with general information about the company.</p>
	<form action="" method="" class="creating_comp_buisness_card_form">
		<div class="creating_comp_buisness_yes_no_section">
			<p class="form_title">Does the company have offices/facilities outside of Bulgaria?</p>
		
			<label for="office_out_country" style="margin-right: 10px;">
				Yes
				<input type="radio" value="yes" name="office_out_country">
			</label>

			<label for="office_out_country">
				No
				<input type="radio" value="no" name="office_out_country">
			</label>
		</div>
		
		<div class="office_out_country_section none">
			<div class="office_out_country_section_item">
				<p class="form_title">Main activity:</p>
				<textarea name="main_activity" id="" cols="30" rows="10" style="width: 100%" placeholder="Short description of the company’s main activity, up to 250 characters"></textarea>
			</div>

			<div class="office_out_country_section_item">
				<p class="form_title">Founded in:</p>
				<input name="founded_in" type="text">
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">Started operations in Bulgaria in:</p>
				<input name="" type="text">
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">Number of employees in Bulgaria:</p>
				<input name="" type="text">		
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">Locations in Bulgaria:</p>
				<input name="" type="text" placeholder="Cities where the company has offices/facilities">		
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">Number of employees worldwide</p>
				<input name="" type="text">		
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">Locations worldwide:</p>
				<input type="text" placeholder="Countries/cities outside of Bulgaria where the company has offices/facilities">		
			</div>

			<div class="office_out_country_section_item location_comp_reg">
				<p class="form_title">Number of employees:</p>
				<input type="text" placeholder="">		
			</div>

			<div class="office_out_country_section_item location_comp_reg">
				<p class="form_title">Locations:</p>
				<input type="text" placeholder="">		
			</div>

			<div class="office_out_country_section_item">
				<p class="form_title">Benefits</p>
				<p style="margin-bottom: 15px;">The benefits offered by the company are of interest to the candidates. In case your company offers benefits, you can list them here (Sample benefits).</p>
				<input type="text" placeholder="Enter benefits" style="margin-bottom: 15px;">	
				<input type="text" placeholder="Enter benefits" style="margin-bottom: 15px;">	
				<input type="text" placeholder="Enter benefits" style="margin-bottom: 15px;">		

				<button class="add_more" style="">
					<i class="fa fa-plus-square" aria-hidden="true"></i>
					<span>Add more benefits</span>
				</button>
			</div>

			<div class="office_out_country_section_item">
				<p class="form_title">Technologies:</p>
				<p style="margin-bottom: 15px;">If your company uses technologies that you consider are of special interest to the candidates, you can list them here.</p>
				<input type="text" placeholder="Technologies">		
			</div>

		</div>

		<div class="office_out_country_section_item" style="text-align: center;">
			{{ csrf_field() }}
			<input type="submit" value="Upload" class="btn_submit">
			<button class="cancel_btn">Cancle</button>
		</div>
	</form>
</div>	
</main>
@endsection