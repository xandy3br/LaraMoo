@extends('quarx-frontend::layout.master')

@section('content')

<div class="container">

    <h1>Courses</h1>

    <div class="row">
        <div class="col-md-12">
        		@if (count($courses) > 1)
	            @foreach($courses as $course)
   	             <a href="{!! URL::to('courses/'.$course->id) !!}"><p>{!! $course->name !!} - <span>{!! $course->updated_at !!}</span></p></a>
      	      @endforeach
				@else
					<span class="text-warning font-weight-bold">{!! trans('laramoocourse.zerocourses') !!}</span>
				@endif

        </div>
    </div>

</div>

@endsection

@section('quarx')
    @edit('courses')
@endsection