@extends('quarx::layouts.dashboard')

@section('content')

    <div class="row">
        <h1 class="page-header">Courses</h1>
    </div>

    @include('courses::courses.breadcrumbs', ['location' => ['create']])

     <div class="row">
        {!! Form::open(['route' => 'quarx.courses.store', 'courses' => true, 'class' => 'add']); !!}

            {!! FormMaker::fromTable('courses', Quarx::moduleConfig('courses', 'courses')) !!}

            <div class="form-group text-right">
                <a href="{!! URL::to('quarx/courses') !!}" class="btn btn-default raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection
