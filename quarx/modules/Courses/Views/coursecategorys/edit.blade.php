@extends('quarx::layouts.dashboard')

@section('content')

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('quarx.coursecategorys.create') !!}">Add New</a>
        <a class="btn btn-warning pull-right raw-margin-right-8" href="{!! Quarx::rollbackUrl($coursecategory) !!}">Rollback</a>
        <h1 class="page-header">Category Edit</h1>
    </div>

    @include('courses::coursecategorys.breadcrumbs', ['location' => ['edit']])

    <div class="row">
        {!! Form::model($coursecategory, ['route' => ['quarx.coursecategorys.update', $coursecategory->id], 'method' => 'patch', 'class' => 'edit']) !!}

            {!! FormMaker::fromObject($coursecategory, FormMaker::getTableColumns('course_categorys')) !!}

            <div class="form-group text-right">
                <a href="{!! URL::to('quarx/courses') !!}" class="btn btn-default raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection


