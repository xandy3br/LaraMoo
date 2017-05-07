@extends('quarx-frontend::layout.master')

@section('content')

<div class="container">

    <h1>{!! $course->id !!} - <span>{!! $course->updated_at !!}</span></h1>

</div>

@endsection

@section('quarx')
    @edit('courses', $course->id)
@endsection
