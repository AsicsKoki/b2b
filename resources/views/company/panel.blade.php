@extends('layouts.master')

@section('content')

<h1 class="page_title">Main Menu</h1>

<main class="main_app_container">
	
	<div class="main_menu_user_profile_holder">

	 	<input class="companies_profile_input" id="tab1" type="radio" name="tabs" checked>
	    <label class="companies_profile_label" for="tab1">Job Offers and Candidates</label>

	    <input class="companies_profile_input" id="tab2" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab2">Questionaries</label>

	    <input class="companies_profile_input" id="tab3" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab3">Company Profile</label>

	    <input class="companies_profile_input" id="tab4" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab4">Invoices</label>

	    <input class="companies_profile_input" id="tab5" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab5">Users</label>

	    <section class="company_profile_content" id="content1">

			<h2 class="page_title">Job offers</h2>

			<div class="tabs_job_offers">

				<input id="job_offers1" type="radio" name="tabz" checked>
				<label for="job_offers1">All</label>

				<input id="job_offers2" type="radio" name="tabz">
				<label for="job_offers2">Active and awaiting <span>(0)</span></label>

				<input id="job_offers3" type="radio" name="tabz">
				<label for="job_offers3">Inactive</label>
			
				<section id="con1">

					<p class="tab_title bold">All</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="new-job-add.html" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>

				<section id="con2">

					<p class="tab_title bold">Active and awaiting</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="new-job-add.html" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>


				<section id="con3">

					<p class="tab_title bold">Inactive</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="new-job-add.html" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>

				</div>

	  	</section>

	    <section class="company_profile_content" id="content2">

	    	<h2 class="page_title">Questionnaire</h2>

	    	<a href="#" class="add_more" style="margin-bottom: 10px;display: inline-block;"><i class="fa fa-plus" aria-hidden="true"></i>New Questionnaire</a>

		    <p>
		      Displaying <span>1-1 of 1</span>
		    </p>

	    	<hr class="company_profile_hr" />

	    	<p id="date"></p>

	    	<p class="company_questionnaire_title">Sample questionnaire</p>

	    	<p>questions: 3</p>

	    	<a class="company_questionnaire_options" href="#company_questionnaire_edit" id="company_edit">Edit</a>

	    	<a class="company_questionnaire_options" href="#" >Delete</a>

	    	<hr/>

	    	<p>Displaying <span>1-1 of 1</span></p>
	    	<!-- Edit section to be moved -->
	    	<br />

	    	<p>title: <span class="company_questionnaire_title">Sample Questionnaire</span></p>

	    	<br />

	    	<p>scoring: <span class="company_questionnaire_title">No</span></p>

	    	<div class="company_questionnaire_edit" id="company_questionnaire_edit">

		      	<p class="company_questionnaire_title">1. What experience do you have in such a position? *</p>
		      	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>

		      	<hr />

		      	<p class="company_questionnaire_title">2. When can you start working with us if you are approved? *</p>

		      	<div class="company_questionnaire_inputs">
		      		<input type="radio">Immediately <br />
			        <input type="radio">After 1 to 3 weeks <br />
		    	  	<input type="radio">After 1 month <br />
		      		<input type="radio">After more than 1 month
		    	</div>

		    	<hr />

		    	<p class="company_questionnaire_title">What net remuneration do you expect? *</p>

		      	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>
		    </div>

	 		<hr />

	 		<a href="#" class="add_more" style="margin-top: 15px;display: inline-block;"><i class="fa fa-plus" aria-hidden="true"></i>Add Question</a>
	    </section>

	  	<section class="company_profile_content" id="content3">

		   	<h2 class="page_title">Organization Profile</h2> 

		   	<a href="#" class="company_questionnaire_options">View Company Profile</a>
		    <p>You can edit your company profile here. The profile is the place where users expect to find concise and structured details about the company.</p>

		    <br />

		  	<hr />

		  	<br />

		   	<h3>Company Business Card</h3>

		   	<br />

		   <p>* The business card provides the candidates with general information about the company.</p>

		   <br />

		   <h3>BooProWeb</h3>

		   <br />

		    <small>Emplyees: <span style="font-weight:bold;"> 6</span> Location:<span style="font-weight:bold;">Serbia</span> </small>

			<br />

		    <button class="business_card_edit">Edit The Business Card</button>

		   <hr />

		  	<form name="form" method="post">
				<b>Cover Photo:</b>

				<input type="file" name="cover_photo" id="cover_photo" />
				<br />
				<i>* the supported file formats are: .jpg, .gif or .png</i>
		  	</form>

		  	<hr />

		  	<h2>BooProWeb</h2>
		  	<p class="company_questionnaire_title">About The Company</p>

		  	<i>*You can tell about your organization, core activities, products and services here</i>

		  	<br />

		  	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>

		  	<br />

		  	<button class="business_card_company_button">Save Section</button>

		   	<hr />
		  	<p class="company_questionnaire_title">Career at the Company</p>

		  	<i>*You can introduce your company as an employer, tell about the career development opportunities</i>

		  	<br />
		  	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>
			<br />
			    <button class="business_card_company_button">Save Section</button>
			<hr />
			<h2>Contacts</h2>
			<h3>Adress:</h3>
			<p>Anete And 9</p>
			<h3>Phone</h3>
			<p>4141424</p>

	  	</section>

		<section class="company_profile_content" id="content4">
		    <p>
		      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
		    </p>
		    <p>
		      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
		    </p>
		</section>

		<section class="company_profile_content" id="content5">

			<h2 class="page_title">Users</h2>

		</section>

	</div>
</main>



@endsection