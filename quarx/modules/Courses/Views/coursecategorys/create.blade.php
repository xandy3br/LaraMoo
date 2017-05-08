@extends('quarx::layouts.dashboard') @section('content')

<div class="row">
	<h1 class="page-header">Categories</h1>
	<div class="form-group text-right">
		<a href="quarx/courses/category/new" class="btn btn-warning raw-right">New Category</a>
	</div>
</div>

@include('courses::coursecategorys.breadcrumbs', ['course' => ['create']])

<div class="row">
	<form method="POST" action="http://laramoo.local:8000/quarx/coursecategorys"
		accept-charset="UTF-8" courses="1" class="add">
		<input name="_token" value="sesUYbBTyv1mM3zN9hITd4xfw9YkvkUfxHb5ybQh"
			type="hidden">
		<div class="form-group ">
			<label class="control-label" for="Categoryname">Category Name</label><input
				id="Categoryname" class="form-control" name="categoryname"
				placeholder="Categoryname" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Description">Description</label><input
				id="Description" class="form-control" name="description"
				placeholder="Description" type="text">
		</div>
		<div class="form-group ">
			<label class="control-label" for="Categoryparent">Category Parent</label>
			  <select id="Categoryparent" class="form-control" name="categoryparent"
				placeholder="Categoryparent">
				@foreach ($categories as $category)
					<option value="{!! $category->id !!}">{!! $category->categoryname !!}</option>
				@endforeach
			  </select>	
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
