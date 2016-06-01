@extends('layouts.admin')
@section('content')
<script>
  $('.sideNav li:nth-child(3)').addClass('active').siblings().removeClass('active');
</script>
<section id="content">
  <link href="js/plugins/fullcalendar/css/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
            <div id="external-events">    
              <h4 class="header">Draggable Events</h4>
              <div class="fc-event cyan ui-draggable ui-draggable-handle">March Invoices</div>
              <div class="fc-event teal ui-draggable ui-draggable-handle">Call Emy</div>
              <div class="fc-event cyan darken-1 ui-draggable ui-draggable-handle">Dinner with Team</div>
              <div class="fc-event cyan accent-4 ui-draggable ui-draggable-handle">Meeting with Support Team</div>
              <div class="fc-event teal accent-4 ui-draggable ui-draggable-handle">Meeting with Sales Team</div>
              <div class="fc-event light-blue accent-3 ui-draggable ui-draggable-handle">Design an iOS App</div>
              <div class="fc-event light-blue accent-4 ui-draggable ui-draggable-handle">Company Party</div>
              <p>
                <input id="drop-remove" type="checkbox">
                <label for="drop-remove">remove after drop</label>
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
@stop