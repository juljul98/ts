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
      <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script>var base_url = 'http://localhost:8000/';  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });</script>
  <!-- Load AngularJS Application Scripts -->
  <!-- Load Styles -->
  {!! Html::style('materialize/css/materialize.min.css') !!}
  {!! Html::style('css/app.css') !!}
  {!! Html::style('css/animate.css') !!}
  {!! Html::style('css/style.min.css') !!}
  
</head>
      <body>
        <main>
            @yield('content')
        </main>
    </body>
</html>
