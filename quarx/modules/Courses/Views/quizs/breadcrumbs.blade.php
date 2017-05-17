<div class="row">
    <ol class="breadcrumb">
        <li><a href="{!! url('quarx/courses') !!}">Courses</a></li>    
        <li><a href="{!! url('quarx/quizs') !!}">Quizzes</a></li>
			@if (isset($quiz)) 
	        	<li class="active">{!! $quiz->quizname !!}</li>
        	@endif
    </ol>
</div>

