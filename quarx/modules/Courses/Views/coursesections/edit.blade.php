@extends('quarx::layouts.dashboard')

@section('content')

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('quarx.courses.create') !!}">Add New</a>
        <a class="btn btn-warning pull-right raw-margin-right-8" href="{!! Quarx::rollbackUrl($course) !!}">Rollback</a>
        <h1 class="page-header">{!! $coursesection->sectionname !!}</h1>
    </div>

    @include('courses::coursesections.breadcrumbs', ['location' => ['edit']])

    <div class="row">
        {!! Form::model($coursesection, ['route' => ['quarx.coursesections.update', $coursesection->id], 'method' => 'patch', 'class' => 'edit']) !!}

            {!! FormMaker::fromObject($coursesection, FormMaker::getTableColumns('course_sections')) !!}

            <div class="form-group text-right">
                <a href="{!! URL::to('quarx/courses') !!}" class="btn btn-default raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection

