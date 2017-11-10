@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Edit Profile</h1>

<main class="main_app_container">
		<div class="login_register_container">
				<form action="{{ route('postEditCompany', ['cid' => Auth::user()->id]) }}" method="POST" id="company_reg_form" class="login_reg_form company_registration_form">

					<div class="login_reg_form_item">
						<p class="form_title">Country:*</p>
						<select name="country">
							<option value="Serbia">Serbia</option>
							<option value="Bulgaria">Bulgaria</option>
						</select>
					</div>

					<!-- Second Part Companies Registration -->
					<div class="">

						<div class="login_reg_form_item">
							<p class="form_title" style="margin-top: 20px;">Company name (in Serbian):*</p>
							<div class="required_field">
								<input name="company_name" type="text" required>
							</div>
						</div>

						<div class="login_reg_form_item form_smaller_text">
							<p class="form_title">Business sector:</p>
							<select class="selectSector select_move_area" size="5">
							@foreach( App\Category::getCategories() as $category)
								<option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
							</select>

							<select class="selectSectorSelected select_move_area" name="sector" size="5">
							</select>

							<p class="form_title">Company website:*</p>
							<div class="required_field">
								<input name="company_website" type="text" required>
							</div>

							<p class="form_title">Company phone:*</p>
							<div class="required_field">
								<input name="company_phone" type="text" required>
							</div>

							<p class="form_title">Address:*</p>
							<div class="required_field">
								<input name="company_address" type="text" required>
							</div>
							<p class="form_title">Number of employees:*</p>
							<div class="required_field">
								<input name="number_of_employees" type="text" required>
							</div>
						</div>

						<div class="login_reg_form_item">

							<div style="text-align: center;">
								<img src="images/employers/test-employer.jpg" alt="">
							</div>

							<p class="form_title">Enter key:</p>
							<input type="text">
						</div>
						 {{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" value="Update">
						</div>
					</div>
				</form>

				<script>
					$('#company_reg_form').validate();
				</script>
			</div>

</main>
@endsection