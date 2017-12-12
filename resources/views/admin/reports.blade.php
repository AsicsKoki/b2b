@extends('layouts.master')

@section('content')
	<h1 class="page_title main_page_title">Reports</h1>

	<main class="main_app_container">
		<ul class="list_of_reports">
			<li class="list_of_reports_item">
				<a href="" class="list_of_reports_item_holder cf">
					<span class="list_of_reports_name">Booproweb / Arsenijevic Vladimir</span>
					<span class="list_of_reports_date">12.12.2012</span>
				</a>
			</li>

			<li class="list_of_reports_item">
				<a href="" class="list_of_reports_item_holder cf">
					<span class="list_of_reports_name">Booproweb / Arsenijevic Vladimir</span>
					<span class="list_of_reports_date">12.12.2012</span>
				</a>
			</li>
		</ul>

		<div class="reports_popup_holder popUp">
			<div class="reports_popup_content">
				<div class="reports_popup_topic">Vredjanje</div>
				<div class="reports_popup_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
				<div class="reports_popup_bnt">
					<a href="#">Details</a>
				</div>

				<a href="" class="popup_close">
					<i class="fa fa-times" aria-hidden="true"></i>	
				</a>
			</div>
		</div>
	</main>
@endsection