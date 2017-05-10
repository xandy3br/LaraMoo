
<nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-primary clearfix">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <a class="navbar-brand" href="/index.php">LaraMoo</a>

	 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
   	<div class="navbar-nav">
    	
         @menu('main', 'quarx-frontend::partials.main-menu')
         
         <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> 
         <a class="nav-item nav-link" href="{{ url('blog') }}">Blog</a>
         <a class="nav-item nav-link" href="{{ url('events') }}">Events</a>
         <a class="nav-item nav-link" href="{{ url('faqs') }}">FAQs</a>
         <a class="nav-item nav-link" href="{{ url('gallery') }}">Gallery</a>
         <a class="nav-item nav-link href="#{{ url('courses') }}">Courses</a>
      </div>
   </div>
      <ul class="nav navbar-nav pull-xs-right">
          @if (auth()->user())
          	<li class="nav-item">
             	<a class="nav-item nav-link" href="{!! url('user/settings') !!}"><span class="fa fa-user"></span> Settings</a>
            </li>
            <li class="nav-item">
             <a class="nav-item nav-link" href="{!! url('logout') !!}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span class="fa fa-sign-out"></span>
                      Logout
             </a>
             
             <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
             </form>
             </li>
          @else
          	<li class="nav-item">
              <a class="nav-item nav-link" href="{!! url('login') !!}"><span class="fa fa-sign-in"></span> Login</a>
             </li>
          @endif
      
      	
      	
      
      </ul>
      
     
</nav>

