<div class="row">
    <ol class="breadcrumb">
        <li><a href="/quarx/courses">Courses</a></li>
        <li><a href="/quarx/courses/{!! $course->id !!}">Course: {!! $course->shortname !!}</a></li>
			@if (isset($coursesection)) 
        	<li class="active">{!! $coursesection->sectionname !!}</li>
        	@endif
    </ol>
</div>