@extends('quarx::layouts.dashboard')

@section('content')
    
    <div class="row">
		  <a class="btn btn-primary pull-right raw-margin-right-8" href="{!! url('quarx/quizs/create?course='.$course->id) !!}">Add New Quiz</a>    
        <a class="btn btn-primary pull-right raw-margin-right-8" href="{!! url('quarx/coursesections/create?course='.$course->id) !!}">Add New Section</a>
        <a class="btn btn-primary pull-right raw-margin-right-8" href="{!! url('quarx/courses/'.$course->id.'/edit') !!}">Edit Course</a>
        <h1 class="page-header">{!! $course->fullname !!}</h1>
    </div>

    @include('courses::courses.breadcrumbs', ['courses' => ['show']])

	<div class="panel panel-default panel-help">
       <div class="panel-heading"><b>Summary</b></div>
            <div class="panel-body">
                {!! $course->summary !!}
            </div>
   </div>
   
	<div class="row bottom-spacer-10">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Start Date:</b> {!! $course->startdate  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>End Date:</b> {!! $course->enddate  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Visible:</b> {!! $course->visible  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Language:</b> {!! $course->lang  !!}</span>
		</div>
	</div>

	<div class="row bottom-spacer-10">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Category:</b> {!! $course->categoryname  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Sort Order:</b> {!! $course->sortorder  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>ID Number:</b> {!! $course->idnumber  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Free Sections:</b> {!! $course->freesections  !!}</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Format:</b> {!! $course->format  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Show Grades:</b> {!! $course->showgrades  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>News Items:</b> {!! $course->newsitems  !!}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="summary-item"><b>Show Reports:</b> {!! $course->showreports  !!}</span>
		</div>
	</div>


    <div class="row">
        @if ($sections->isEmpty())
            <div class="well text-center">No sections found .</div>
        @else
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th width="200px" class="text-right">Sort Order</th>
                </thead>
                <tbody>

                @foreach($sections as $section)
                    <tr>
                        <td>
                            <a href="{!! route('quarx.coursesections.edit', [$section->id]) !!}">{!! $section->sectionname !!}</a>
                        </td>
                        <td class="text-right">
                            <form method="post" action="{!! url('_sectionPrefix_courses/'.$course->id) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default raw-margin-right-8 pull-right" href="{!! route('quarx.courses.edit', [$course->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


