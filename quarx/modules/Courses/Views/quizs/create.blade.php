@extends('quarx::layouts.dashboard') @section('content')

<div class="row">
	<h1 class="page-header">Quizzes</h1>
	<div class="form-group text-right">
		<a href="quarx/quizs/questions/new" class="btn btn-warning raw-right">New Question</a>
	</div>
</div>

@include('courses::quizs.breadcrumbs', ['course' => ['create']])

<div class="row">
	<form method="POST" action="http://laramoo.local:8000/quarx/quizs"
		accept-charset="UTF-8" courses="1" class="add">
		{!! csrf_field() !!}
		<div class="form-group ">
			<label class="control-label" for="Quizname">Quiz Name</label>
			<input id="Quizname" class="form-control" name="quizname"
				placeholder="Quiz Name" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Description">Description</label>
			<input id="Description" class="form-control" name="description"
				placeholder="Description" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Sortorder">Sortorder</label> <input
				id="Sortorder" class="form-control" name="sortorder"
				placeholder="Sortorder" type="number">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Icon">Icon</label><input id="Icon"
				class="form-control" name="icon" placeholder="Icon" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Showreports">Showreports</label><input
				id="Showreports" class="form-control" name="showreports"
				placeholder="Showreports" type="number">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Visible">Visible</label><input
				id="Visible" class="form-control" name="visible"
				placeholder="Visible" type="number">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Lang">Lang</label><input id="Lang"
				class="form-control" name="lang" placeholder="Lang" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Theme">Theme</label><input
				id="Theme" class="form-control" name="theme" placeholder="Theme"
				type="number">
		</div>

		<div class="form-group text-right">
			<a href="http://laramoo.local:8000/quarx/coursecategorys"
				class="btn btn-default raw-left">Cancel</a> <input
				class="btn btn-primary" value="Save" type="submit">
		</div>

	</form>


</div>

@endsection
