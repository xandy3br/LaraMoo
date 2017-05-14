<div class="row">
    <ol class="breadcrumb">
    	  <li><a href="/quarx/courses">Courses</a></li>
        <li><a href="{!! url('quarx/coursecategorys') !!}">Categories</a></li>
			@if (isset($category)) 
        		<li class="active">{!! $category->categoryname !!}</li>
        	@endif

        <li class="active"></li>
    </ol>
</div>

