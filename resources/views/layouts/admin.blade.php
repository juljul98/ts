<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Tracking System">
    <meta name="keywords" content="Tracking System">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="css/admin.css" type="text/css">
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>var base_url = 'http://localhost:8000/';
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });</script>
  </head>

  <body>
    <!-- Start Page Loading -->
    
    <!-- START HEADER -->
    
    <!-- END HEADER -->
    <aside id="left-sidebar-nav">
      <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
          <div class="row">
            <div class="col col s4 m4 l4">
         
              <img src="{{ Auth::user()->avatar }}" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col col s8 m8 l8">
              <ul id="profile-dropdown" class="dropdown-content">
                <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                </li>
                <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                </li>
                <li><a href="/logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                </li>
              </ul>
              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->fullname }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
              <p class="user-roal">{{ Auth::user()->position }}</p>
            </div>
          </div>
        </li>
        
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion sideNav">
            @if (Auth::user()->userlevel == 3)
            <li class="bold"><a href="{{ url('/home') }}" class="waves-effect waves-cyan"><i class="material-icons">dashboard</i> Home</a></li>
            @endif
            @if (Auth::user()->userlevel == 1)
            <li class="bold"><a href="{{ url('/admin') }}" class="waves-effect waves-cyan"><i class="material-icons">dashboard</i> Dashboard</a></li>
            @endif
            <li class="bold"><a href="{{ url('/calendar') }}" class="waves-effect waves-cyan"><i class="material-icons">perm_contact_calendar</i> Calendar</a></li>
            @if (Auth::user()->userlevel == 1)
            <li class="bold"><a href="{{ url('/manageleaves') }}" class="waves-effect waves-cyan"><i class="material-icons">line_weight</i> Manage Leaves</a></li>
            <li class="bold"><a href="{{ url('/manageaccounts') }}" class="waves-effect waves-cyan"><i class="material-icons">account_circle</i> Manage Account</a></li>
            @endif
            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="material-icons">settings</i> Settings</a>
              <div class="collapsible-body">
                <ul class="cBody">
                   @if (Auth::user()->userlevel == 1)
                  <li><a href="{{ url('/department') }}">Department/Position</a></li>
                    @endif
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
      </ul>
      <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
    </aside>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      @yield('content')
      <!-- END MAIN -->
    </div>

      <!-- jQuery Library -->
      <script type="text/javascript" src="js/plugins.min.js"></script>
      <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script type="text/javascript" src="js/plugins/moment/moment.js"></script>
      <script type="text/javascript" src="js/adminscript.js"></script>
      </body>
    </html>