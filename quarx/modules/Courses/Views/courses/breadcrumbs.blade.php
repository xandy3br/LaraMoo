<div class="row">
    <ol class="breadcrumb">
        <li><a href="{!! url('quarx/courses') !!}">Courses</a></li>
			@if (isset($course)) 
	        	<li class="active">{!! $course->fullname !!}</li>
        	@endif
    </ol>
</div>
