<li class="@if (Request::is('quarx/courses') || Request::is('quarx/courses/*')) active @endif">
	<a href="{{ url('quarx/courses') }}">
		<span class="fa fa-file"></span>
		Courses
	</a>
	<ul class="nav nav-sidebar">
		<li class="@if (Request::is('quarx/courses/category') || Request::is('quarx/courses/category/*')) active @endif">
			<a href="{{ url('quarx/courses/category/list') }}">
				<span class="fa fa-object-group"></span>
				Categories
			</a>
		</li>
		<li class="@if (Request::is('quarx/courses/teacher') || Request::is('quarx/courses/teacher/*')) active @endif">
			<a href="{{ url('quarx/courses/teacher/list') }}">
				<span class="fa fa-university"></span>
				Teachers
			</a>
		</li>
		<li class="@if (Request::is('quarx/courses/student') || Request::is('quarx/courses/student/*')) active @endif">
			<a href="{{ url('quarx/courses/teacher/list') }}">
				<span class="fa fa-users"></span>
				Students
			</a>
		</li>
	
	
	</ul>
</li>