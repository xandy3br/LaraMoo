@extends('quarx::layouts.dashboard') @section('content')

<div class="row">
	<h2 class="page-header">Create Section for "{!! $course->fullname !!}"</h2>
	<div class="form-group text-right">
		<a href="/quarx/coursesections/create" class="btn btn-warning raw-right">New Section</a>
	</div>
</div>

@include('courses::coursesections.breadcrumbs', ['coursesections' => ['create']])

<div class="row">
	<form method="POST" action="http://laramoo.local:8000/quarx/coursesections"
		accept-charset="UTF-8" courses="1" class="add">
		{!! csrf_field() !!}
		<input type="hidden" name="course_id" value="{!! $course->id !!}">
		<div class="form-group ">
			<label class="control-label" for="Sectionname">Section Name</label>
			<input id="Sectionname" class="form-control" name="sectionname"
				placeholder="Section Name" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Courseorder">Course Order</label>
			 <input id="Courseorder" class="form-control" name="courseorder"
				placeholder="Courseorder" type="number">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Sectionshortdescription">Short Description (max 255)</label>
			<textarea id="Sectionshortdescription" class="form-control redactor" name="sectionshortdescription"
				placeholder="Short Description" maxlength="250"></textarea>
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Sectiondescription">Description</label>
			<textarea id="Sectiondescription" class="form-control redactor" name="sectiondescription"
				placeholder="Description"></textarea>
		</div>
			
		
		<div class="form-group ">
			<label class="control-label" for="Idnumber">Idnumber</label><input
				id="Idnumber" class="form-control" name="idnumber"
				placeholder="Idnumber" type="text">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Course_format_id">Course Format Id</label><input
				id="Course_format_id" class="form-control" name="course_format_id"
				placeholder="Course Format Id" type="number">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Showgrades">Showgrades</label><input
				id="Showgrades" class="form-control" name="showgrades"
				placeholder="Showgrades" type="number">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Newsitems">Newsitems</label><input
				id="Newsitems" class="form-control" name="newsitems"
				placeholder="Newsitems" type="number">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Startdate">Startdate</label><input
				id="Startdate" class="form-control" name="startdate"
				placeholder="Startdate" type="date">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Enddate">Enddate</label><input
				id="Enddate" class="form-control" name="enddate"
				placeholder="Enddate" type="date">
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
			<a href="http://laramoo.local:8000/quarx/courses"
				class="btn btn-default raw-left">Cancel</a> <input
				class="btn btn-primary" value="Save" type="submit">
		</div>

	</form>


</div>

@endsection
