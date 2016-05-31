<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">

    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">

    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">

    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="css/admin.css" type="text/css">
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script>var base_url = 'http://localhost:8000/';  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });</script>
  </head>

  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color teal">
          <div class="nav-wrapper">
            <ul class="right hide-on-med-and-down">

              <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notifButton" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge"></small></i>
                </a>
              </li>
              <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
              </li>
              <ul id="notifications-dropdown" class="dropdown-content" style="white-space: nowrap; position: absolute; top: 64px; right: 60px; opacity: 1;">
                <li>
                  <h5>NOTIFICATIONS <span class="new badge"></span></h5>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                </li>
                <li>
                  <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                </li>
                <li>
                  <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                </li>
                <li>
                  <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                </li>
                <li>
                  <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                </li>
              </ul>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
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
            <li class="bold active"><a href="{{ url('/admin') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            <li class="bold"><a href="{{ url('/manageaccount') }}" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Manage Account</a>
            <li class="bold"><a href="{{ url('/calendar') }}" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Calendar</a>
            </li>
            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Settings</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="table-basic.html">Department</a>
                  </li>
                  <li><a href="table-data.html">Position</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
      </ul>
      <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
    </aside>
    <aside id="right-sidebar-nav">
      <ul id="chat-out" class="side-nav rightside-navigation right-aligned ps-container ps-active-y" style="width: 300px; right: 0px; height: 791px;">
        <li class="li-hover">
          <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
          <div id="right-search" class="row">
            <form class="col s12">
              <div class="input-field">
                <i class="mdi-action-search prefix"></i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix" class="">Search</label>
              </div>
            </form>
          </div>
        </li>
        <li class="li-hover">
          <ul class="chat-collapsible" data-collapsible="expandable">
            <li class="active">
              <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
              <div class="collapsible-body recent-activity" style="display: block;">
                <div class="recent-activity-list chat-out-list row">
                  <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#">just now</a>
                    <p>Jim Doe Purchased new equipments for zonal office.</p>
                  </div>
                </div>
                <div class="recent-activity-list chat-out-list row">
                  <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#">Yesterday</a>
                    <p>Your Next flight for USA will be on 15th August 2015.</p>
                  </div>
                </div>
                <div class="recent-activity-list chat-out-list row">
                  <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#">5 Days Ago</a>
                    <p>Natalya Parker Send you a voice mail for next conference.</p>
                  </div>
                </div>
                <div class="recent-activity-list chat-out-list row">
                  <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#">Last Week</a>
                    <p>Jessy Jay open a new store at S.G Road.</p>
                  </div>
                </div>
                <div class="recent-activity-list chat-out-list row">
                  <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#">5 Days Ago</a>
                    <p>Natalya Parker Send you a voice mail for next conference.</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 731px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 675px;"></div></div></ul>
    </aside>
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      @yield('content')
      <!-- END MAIN -->
    </div>

      <!-- jQuery Library -->

      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/plugins.min.js"></script>

      <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
      <script type="text/javascript" src="js/plugins/moment/moment.js"></script>
      <script type="text/javascript" src="js/adminscript.js"></script>




 



      </body>
    </html>