<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BBS</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
	<div class="container">
	    <a class="navbar-brand" href="{{ url('/') }}">
		BBS
	    </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

		<!-- Authentication Links -->
		@guest
		    <li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
		    </li>
		    @if (Route::has('register'))
			<li class="nav-item">
			    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			</li>
		    @endif
		@else
		    <li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
			    {{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			    <a class="dropdown-item" href="{{ route('logout') }}"
			       onclick="event.preventDefault();
			       document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
			    </a>

			    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			    </form>
			</div>
		    </li>
		@endguest
                </div>
	</div>
    </nav>

    <div>
	@yield('content')
    </div>
</body>
</html>
