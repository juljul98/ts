<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tracking System</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Load Bootstrap CSS -->
  {!! Html::style('css/bootstrap.min.css') !!}
  <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
  {!! Html::script('js/jquery.min.js') !!}
  {!! Html::script('app/lib/angular/angular.min.js') !!}
  {!! Html::script('js/bootstrap.min.js')!!}
  {!! Html::script('js/jquery.lazyload.js')!!}
  <!-- Load AngularJS Application Scripts -->
  {!! Html::script('app/app.js') !!}
  {!! Html::script('app/controllers/login.js') !!}
  {!! Html::script('app/controllers/slider.js') !!}
  {!! Html::script('js/script.js') !!}
  <!-- Load Styles -->
  {!! Html::style('css/style.css') !!}
  
</head>
  <body id="app-layout" ng-app="angularapplication">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
            Tracking System
          </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @else
            <li><div class="profileImg"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"></div></li>
            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
