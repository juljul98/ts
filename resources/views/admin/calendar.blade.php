@extends('layouts.admin')
@section('content')
<script>
  $('.sideNav li:nth-child(2)').addClass('active').siblings().removeClass('active');
</script>
<section id="content">
  <link href="js/plugins/fullcalendar/css/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/spectrum/spectrum.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!--breadcrumbs start-->
  <div id="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 class="breadcrumbs-title">{{ $breadcrumbs }}</h5>
          <ol class="breadcrumbs">
            <li><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="active">{{ $breadcrumbs }}</li>
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
          <div class="col s12 m4 l3 card-panel">
            <h4 class="header">Events and Leaves</h4>
            <div id="external-events">
              <div class="list card-panel">
                <div data-type="leave" data-status="0" class="fc-event ui-draggable ui-draggable-handle" style="background-color:#27ae60">Sick Leave</div>
                <div data-type="leave" data-status="0" class="fc-event ui-draggable ui-draggable-handle" style="background-color:#d35400">Vacation Leave</div>
                <div data-type="leave" data-status="0" class="fc-event ui-draggable ui-draggable-handle" style="background-color:#c0392b">Emergency Leave</div>
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
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="js/plugins/spectrum/spectrum.js"></script>

@stop