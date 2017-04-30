@extends('quarx-frontend::layout.master')

@section('content')

<div class="container">

    <h1>Course</h1>

    <div class="row">
        <div class="col-md-12">
            @foreach($courses as $course)
                <a href="{!! URL::to('courses/'.$course->id) !!}"><p>{!! $course->name !!} - <span>{!! $course->updated_at !!}</span></p></a>
            @endforeach

            {!! $courses !!}
        </div>
    </div>

</div>

@endsection

@section('quarx')
    @edit('courses')
@endsection