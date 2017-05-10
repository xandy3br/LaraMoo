@extends('quarx::layouts.dashboard')

@section('content')

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('quarx.courses.create') !!}">Add New</a>
        <a class="btn btn-warning pull-right raw-margin-right-8" href="{!! Quarx::rollbackUrl($course) !!}">Rollback</a>
        <h1 class="page-header">Courses</h1>
    </div>

    @include('courses::courses.breadcrumbs', ['location' => ['edit']])

    <div class="row">
        {!! Form::model($course, ['route' => ['quarx.courses.update', $course->id], 'method' => 'patch', 'class' => 'edit']) !!}

            {!! FormMaker::fromObject($course, FormMaker::getTableColumns('courses')) !!}

            <div class="form-group text-right">
                <a href="{!! URL::to('quarx/courses') !!}" class="btn btn-default raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection


