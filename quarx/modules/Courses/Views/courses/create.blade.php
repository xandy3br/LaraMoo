@extends('quarx::layouts.dashboard') @section('content')

<div class="row">
	<h1 class="page-header">Courses</h1>
</div>
<div class="row">
	    @include('courses::courseheader')
</div>

@include('courses::courses.breadcrumbs', ['course' => ['create']])

<div class="row">
	<form method="POST" action="/quarx/courses"
		accept-charset="UTF-8" courses="1" class="add">
		 {!! csrf_field() !!}
		<div class="form-group ">
			<label class="control-label" for="Category">Category</label>
			  <select id="Category" class="form-control" name="category"
				placeholder="Category">
				@foreach ($categories as $category)
					<option value="{!! $category->id !!}">{!! $category->categoryname !!}</option>
				@endforeach
			  </select>	
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Sortorder">Sort Order</label> <input
				id="Sortorder" class="form-control" name="sortorder"
				placeholder="Sortorder" type="number" min="0" max="1">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Fullname">Full Name</label><input
				id="Fullname" class="form-control" name="fullname"
				placeholder="Fullname" type="text">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Shortname">Short Name</label><input
				id="Shortname" class="form-control" name="shortname"
				placeholder="Shortname" type="text">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Idnumber">Id Number</label><input
				id="Idnumber" class="form-control" name="idnumber"
				placeholder="Idnumber" type="text">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Summary">Summary</label>
			<textarea id="Summary" class="form-control redactor" name="summary"
				placeholder="Summary"></textarea>
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Course_format_id">Course Format Id</label>
			<input id="Course_format_id" class="form-control" name="course_format_id"
				placeholder="Course Format Id" type="number">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Showgrades">Show Grades</label><input
				id="Showgrades" class="form-control" name="showgrades"
				placeholder="Show Grades" type="number">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Newsitems">News Items</label>
			<input id="Newsitems" class="form-control" name="newsitems"
				placeholder="News Items" type="number">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Startdate">Start Date</label>
			<input id="Startdate" class="form-control" name="startdate"
				placeholder="Start Date" type="date">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Enddate">End Date</label>
			<input id="Enddate" class="form-control" name="enddate"
				placeholder="End Date" type="date">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Icon">Icon</label>
			<input id="Icon"	class="form-control" name="icon" placeholder="Icon" type="text">
		</div>
		
		<div class="form-group ">
			<label class="control-label" for="Showreports">Showreports</label>
			<input id="Showreports" class="form-control" name="showreports"
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
			<label class="control-label" for="Theme">Theme</label>
			<input id="Theme" class="form-control" name="theme" placeholder="Theme"
				type="number">
		</div>

		<div class="form-group text-right">
			<a href="/quarx/courses"
				class="btn btn-default raw-left">Cancel</a> <input
				class="btn btn-primary" value="Save" type="submit">
		</div>

	</form>


</div>

@endsection
