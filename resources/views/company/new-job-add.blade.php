@extends('layouts.master')

@section('content')
<h1 class="page_title">New job ad</h1>

		<main class="main_app_container">
			
			<div class="new_job_ad_packege_holder cf">
				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">Basic</div>
					<div class="new_job_ad_packege_item_price">
						<p>Free</p>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>Job ad with standard design</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobStandard') }}">Select</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">Standard</div>
					<div class="new_job_ad_packege_item_price">
						<p>50$</p>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>Job ad with custom text formatting and image</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobCustom') }}">Select</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">Premium</div>
					<div class="new_job_ad_packege_item_price">
						<p>150$</p>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>Job ad with custom text formatting and image</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="">Select</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">Dimond</div>
					<div class="new_job_ad_packege_item_price">
						<p>200$</p>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>Confidential job ad</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="">Select</a>
					</div>
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
			
			<!-- Druga forma -->
			
			<!-- Pomereno na route -->

		</main>
@endsection