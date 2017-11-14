@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Edit Profile</h1>

<main class="main_app_container">
		<div class="login_register_container">
				<form action="{{ route('postEditCompany', ['cid' => Auth::user()->id]) }}" method="POST" id="company_reg_form" class="login_reg_form company_registration_form" enctype="multipart/form-data">

					<div class="login_reg_form_item">
						<p class="form_title">Country:*</p>
						<select name="country">
						    <option selected="selected" value="{{$company->country}}">{{$company->country}}</option>
							<option value="Serbia">Serbia</option>
							<option value="Bulgaria">Bulgaria</option>
						</select>
					</div>

					<!-- Second Part Companies Registration -->
					<div class="">

						<div class="login_reg_form_item">
							<p class="form_title" style="margin-top: 20px;">Company name (in Serbian):*</p>
							<div class="required_field">
								<input name="company_name" type="text" value="{{$company->company_name}}" required>
							</div>
						</div>

						<div class="login_reg_form_item form_smaller_text">
							<p class="form_title">Business sector:</p>
							<select class="selectSector select_move_area" size="5" >
							@foreach( App\Category::getCategories() as $category)
					
								<option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
							</select>

							<select multiple name="sectors[]" class="selectSectorSelected select_move_area" size="5">

							</select>

							<p class="form_title">Company website:*</p>
							<div class="required_field">
								<input name="company_website" type="text" value="{{$company->company_website}}" required>
							</div>

							<p class="form_title">Company phone:*</p>
							<div class="required_field">
								<input name="company_phone" type="text" value="{{$company->company_phone}}" required>
							</div>

							<p class="form_title">Address:*</p>
							<div class="required_field">
								<input name="company_address" type="text" value="{{$company->company_address}}" required>
							</div>
							<p class="form_title">Number of employees:*</p>
							<div class="required_field">
								<input name="number_of_employees" type="text" value="{{$businesscard->number_of_employees}}" required>
							</div>
						</div>
						<div class="company_profile_edit_item">
			
							<div class="small_subtitle">
						   		<h3>About The Company</h3>
						   	</div>

						  	<p class="bold">BooProWeb</p>

						  	<small style="margin-bottom: 5px;display: inline-block;">*You can tell about your organization, core activities, products and services here</small>
								<div class="edit_profile_textarea">
							  		<textarea name="about_us" id="about_us_text" cols="40" rows="4">{{$company->about_us}}</textarea>
							  	</div>
							<div class="small_subtitle">
						   		<h3>Career at the Company</h3>
						   	</div>

						  	<small style="margin-bottom: 5px;display: inline-block;">*You can introduce your company as an employer, tell about the career development opportunities</small>
						 		<div class="edit_profile_textarea">
				  					<textarea name="career" id="career" cols="40" rows="4">{{$company->career}}</textarea>
			  				</div>
					  	</div>
						{{Form::open(array('route' => 'postEditCompany','method'=>'POST', 'files'=>true))}}
						<div class="add_cover_btn">
							<input type="file" name="company_cover">
							<a class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Add cover</a>
						</div>
						 {{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" value="Update">
						</div>
					</div>
					{{Form::close()}}
				</form>

				<script>
					$('#company_reg_form').validate();
				</script>
			</div>

</main>
@endsection