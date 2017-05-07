<li class="@if (Request::is('quarx/courses') || Request::is('quarx/courses/*')) active @endif">
	<a href="{{ url('quarx/courses') }}">
		<span class="fa fa-file"></span>
		Courses
	</a>
	<ul>
		<li>
			<a href="{{ url('quarx/courses') }}">
				<span class="fa fa-file"></span>
				Categories
			</a>
		</li>
	
	
	</ul>
</li>