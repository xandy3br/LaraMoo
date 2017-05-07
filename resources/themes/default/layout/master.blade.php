<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no,  maximum-scale=1">
        <title>{{ config('app.name') }} @if (isset($page) && !is_null($page->title)) - {{ $page->title }} @endif</title>

        <meta name="description" content="@yield('seoDescription')">
        <meta name="keywords" content="@yield('seoKeywords')">
        <meta name="author" content="">

         <!-- Bootstrap CSS -->
    		<link rel="stylesheet" href="../frontend/bootstrap4/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/app.css') }}">

        @yield('stylesheets')
    </head>

    <body>
    	<header>
    		<div class="container">

        		@theme('partials.navigation')

       	</div>
      </header>  
      <div style="height: 80px"></div>  
        
       <div class="container" >
        

        	<div class="site-wrapper @if(Request::is('/')) homepage @endif">
            <div class="container-fluid">
                @yield('content')
            </div>
        	</div>

		 </div>
		 
       <div class="footer container-fluid navbar-fixed-bottom bg-primary">
            <p class="pull-left">&copy; {{ date('Y') }} - <a href="{{ url('pages') }}">Page Directory</a></p>
            @can('quarx')
                <a class="btn btn-xs btn-default pull-right" href="{{ url('quarx/dashboard') }}">Quarx</a>
                @yield('quarx')
            @else
                <a class="btn btn-xs btn-default pull-right" href="{{ url('login') }}">Login</a>
            @endcan
       </div>
        
       
    </body>

    <script type="text/javascript">
        var _token = '{!! csrf_token() !!}';
        var _url = '{!! url("/") !!}';
    </script>
    @yield("pre-javascript")
    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="../frontend/bootstrap4/js/jquery-3.1.1.slim.min.js"></script>
    <script src="../frontend/bootstrap4/js/tether.min.js"></script>
    <script src="../frontend/bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/app.js') }}"></script>
    @yield('javascript')
</html>
