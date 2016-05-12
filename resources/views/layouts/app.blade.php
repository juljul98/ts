<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tracking System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Load Bootstrap CSS -->
  <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
  {!! Html::script('js/jquery.min.js') !!}
  {!! Html::script('materialize/js/materialize.min.js') !!}
  {!! Html::script('js/credentials.js') !!}
  {!! Html::script('js/script.js') !!}
  <!-- Load AngularJS Application Scripts -->
  <!-- Load Styles -->
  {!! Html::style('css/app.css') !!}
  {!! Html::style('css/animate.css') !!}
  {!! Html::style('css/style.min.css') !!}
  {!! Html::style('materialize/css/materialize.min.css') !!}
  
</head>
  <body>
<!--
    <nav class="teal nav">
      <div class="nav-wrapper container">
        <a href="/" class="brand-logo">Tracking System</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">reorder</i></a>
        <ul class="right hide-on-med-and-down">
          @if (Auth::guest())
          <li><a class="welNav welNavBk" href="/login">Login</a></li>
          <li><a class="welNav welNavBk" href="/register">Register</a></li>
          @else
          <li><div class="profileImg"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"></div></li>
          <li>{{ Auth::user()->name }}</li>
          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
          @endif
        </ul>
        <ul class="side-nav" id="mobile-demo">
          @if (Auth::guest())
          <li><a class="welNav welNavBk" href="#loginframe">Login</a></li>
          <li><a class="welNav welNavBk" href="#registerframe">Register</a></li>
          @else
          <li><div class="profileImg"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"></div></li>
          <li>{{ Auth::user()->name }}</li>
          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
          @endif
        </ul>
      </div>
    </nav>
-->
    @yield('content')

</body>
</html>
