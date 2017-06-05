@extends('quarx::layouts.dashboard') @section('content')

<div class="row">
	<span class="">{!! $course->fullname !!}</span>
	<a class="btn btn-primary pull-right"
		href="{!! route('quarx.courses.create') !!}">Add New</a> <a
		class="btn btn-warning pull-right raw-margin-right-8"
		href="{!! Quarx::rollbackUrl($course) !!}">Rollback</a>
	<h1 class="page-header">{!! $coursesection->sectionname !!}</h1>
	
</div>

@include('courses::coursesections.breadcrumbs', ['location' =>
['edit']])

<div class="row">

	<form method="POST" action="/quarx/coursesections/{!! $coursesection->id !!}"
		accept-charset="UTF-8" class="edit">
		{!! csrf_field() !!} <input name="_method" value="PATCH" type="hidden">
		<input name="course_id" value="{!! $coursesection->course_id !!}"
			type="hidden">

		<div class="form-group ">
			<label class="control-label" for="Sectionname">Section Name</label>
			<input
				id="Sectionname" class="form-control" name="sectionname"
				value="{!! $coursesection->sectionname !!}"
				placeholder="Sectionname" type="text">
		</div>

		<div class="form-group ">
			<label class="control-label" for="Courseorder">Course Order</label>
			<input id="Courseorder" class="form-control" name="courseorder"
				value="{!! $coursesection->courseorder !!}"
				placeholder="Courseorder" type="number" min="1" max="300" >
		</div>

		<div class="form-group ">
			<label class="control-label" for="Sectionshortdescription">Section Short Description</label>
			<textarea id="Sectionshortdescription" class="form-control redactor"
				name="sectionshortdescription"
				placeholder="Section Short Description">
				{!! $coursesection->sectionshortdescription !!}
		   </textarea>
		</div>

		<div class="form-group">
			<label class="control-label" for="Sectiondescription">Section Description</label>
			<textarea id="Sectiondescription" class="form-control redactor"
				name="sectiondescription" placeholder="Section Description">
				{!! $coursesection->sectiondescription !!}
			</textarea>
		</div>

		<div class="form-group ">
			<label class="control-label" for="Visible">Visible</label>
			<select id="Visible" class="form-control" name="visible">
				<option value="0" {!! ($coursesection->visible == 0 ? 'selected="selected"' : '') !!}>False</option>
				<option value="1" {!! ($coursesection->visible == 1 ? 'selected="selected"' : '') !!}>True</option>
			</select>
		</div>

		<div class="form-group text-right">
			<a href="/quarx/courses/{!! $coursesection->course_id !!}"
				class="btn btn-default raw-left">Cancel</a> <input
				class="btn btn-primary" value="Save" type="submit">
		</div>

	</form>


</div>

@endsection

