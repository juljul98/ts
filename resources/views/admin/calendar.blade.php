@extends('layouts.admin')
@section('content')
<script>
  $('.sideNav li:nth-child(3)').addClass('active').siblings().removeClass('active');
</script>
<section id="content">
  <link href="js/plugins/fullcalendar/css/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/spectrum/spectrum.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!--breadcrumbs start-->
  <div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey hide-on-large-only">
      <i class="mdi-action-search active"></i>
      <input name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" type="text">
    </div>
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 class="breadcrumbs-title">Calendar</h5>
          <ol class="breadcrumbs">
            <li><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="active">Calendar</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs end-->


  <!--start container-->
  <div class="container">
    <div class="section">

      <div id="full-calendar">
        <div class="row">
          <div class="col s12 m4 l3">
            <h4 class="header">List of Events</h4>
            <div id="external-events">
              <div class="list">
                <div class="fc-event" style="background-color: #ff0000">Birthday</div>
              </div>
              <p>
                <input id="drop-remove" type="checkbox">
                <label for="drop-remove">remove after drop</label>
              </p>
              <p>
                <input type="text" id="event-title" class="evnt event-title">
                <label for="event-title">Title</label>
              </p>
              <p>
                <textarea class="evnt event-description" id="event-descriptio" cols="30" rows="10"></textarea>
                <label for="event-description">Description</label>
              </p>
              <p>
                <input type="text" id="colorPicker" class="evnt event-color">
              </p>
              <p>
                <button class="waves-effect waves-light btn teal newEvent">New Event</button>
              </p>
            </div>
          </div>
          <div class="col s12 m8 l9">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end container-->

</section>

<script type="text/javascript" src="js/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar/lib/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar/fullcalendar-script.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="js/plugins/spectrum/spectrum.js"></script>

@stop