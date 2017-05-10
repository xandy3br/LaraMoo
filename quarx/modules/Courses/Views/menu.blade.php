<li class="sidebar-header">Courses</li>
<li class=" dropdown @if (Request::is('quarx/courses') || Request::is('quarx/courses/*')) active @endif">
	<a href="{{ url('quarx/courses') }}">
		<span class="fa fa-file"></span>
		Courses
	</a>
</li>
<li class=" dropdown @if (Request::is('/quarx/coursecategorys/list') || Request::is('/quarx/coursecategorys/*')) active @endif">
	<a href="{{ url('/quarx/coursecategorys') }}">
		<span class="fa fa-file"></span>
		Categories
	</a>
</li>
<li class=" dropdown @if (Request::is('quarx/courses/category/list') || Request::is('quarx/courses/category/*')) active @endif">
	<a href="{{ url('quarx/courses/category/list') }}">
		<span class="fa fa-file"></span>
		Teachers
	</a>
</li>
<li class=" dropdown @if (Request::is('quarx/courses/category/list') || Request::is('quarx/courses/category/*')) active @endif">
	<a href="{{ url('quarx/courses/category/list') }}">
		<span class="fa fa-file"></span>
		Students
	</a>
</li>