@extends('layouts.admin')
@section('content')
<script>
  $(".collapsible-header").addClass("active");
  $(".collapsible").collapsible({ accordion: false});
  $('.cBody li:nth-child(1)').addClass('active');
</script>
<section id="content">
  <div id="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 class="breadcrumbs-title">Department and Position</h5>
          <ol class="breadcrumbs">
            <li><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="active">Department</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
<!--   left-->
    <div class="col s12 m12 l6">
      <div class="card-panel">
        <div class="row">
          <form class="col s12 addDepartment" action="{{ url('department/saveDepartment') }}">
            <h4 class="header2">Add Department</h4>
            <div class="row">
              <div class="input-field col s4 l8">
                <i class="mdi-action-account-circle prefix"></i>
                <input placeholder="Type Here" id="icon_prefix2" class="validate departmentname" type="text" name="departmentname">
                <label class="active" for="icon_prefix">Department Name</label>
              </div>
              <div class="input-field col s4">
                <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="material-icons">add_circle_outline</i><span class="addLbl">&nbsp;Add</span></button>
              </div>
            </div>
          </form>
        </div>
        <div class="departmentAlertSuccess" style="display: none;">
            <p>SUCCESS : The page has been added.</p>
        </div>
        <div class="departmentAlertError" style="display: none;">
            <p>DANGER : The daily report has failed</p>
        </div>
      </div>
      <a class="btn-floating btn-large positionBtn">
        <i class="material-icons">add</i>
      </a>
      <div class="row card-panel positionPanel">
        <form class="col s12 addPosition" action="{{ url('department/savePosition') }}">
          <h4 class="header2">Choose Department and add Position</h4>
          <div class="row">
           <!-- department name -->
            <div class="input-field col s4 l7">
              <select name="departmentname" id="departmentname" class="departmentnameforposition">
               
                @foreach($department as $list)
                <option value="{{ $list->id }}">{{ $list->departmentname }}</option>
                @endforeach
              
              </select>
              <label for="departmentname" class="drpDown">Department Name</label>
                <div class="positionAlertError dn" style="display: none;">
                    <p>DANGER : The daily report has failed</p>
                </div>
            </div>
            <!-- position name -->
            <div class="input-field col s4 l6">
              <input placeholder="Position Name" id="icon_prefix2" class="validate positionname" type="text" name="positionname">
              <label class="active" for="icon_prefix">Position Name</label>
                <div class="positionAlertError pn" style="display: none;">
                    <p>DANGER : The daily report has failed</p>
                </div>
            </div>
            <!-- userlevel -->
            <div class="input-field col s4 l6">
              <select name="userlevel" id="userlevel" class="userlevel">
              @foreach($role as $list)
                <option value="{{ $list->id }}">{{ $list->name }}</option>
              @endforeach
              </select>
              <label for="userlevel" class="drpDown">Permission Level</label>
                <div class="positionAlertError ul" style="display: none;">
                    <p>DANGER : The daily report has failed</p>
                </div>
            </div>
            
            <div class="col l12">
              <p class="positionNote">Note: <span>No User level Selected</span></p>
            </div>
            <div class="input-field col s4 l7">
              <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="material-icons">add_circle_outline</i><span class="addLbl">&nbsp;Add</span></button>
            </div>
            <div class="col l12">
                <div id="card-alert" class="card green lighten-2 positionAlertSuccess" style="display: none;">
                  <div class="card-content white-text">
                    <p>SUCCESS : The page has been added.</p>
                  </div>
                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
<!--    Right-->
   <div class="col l6">
     <ul class="collapsible popout" data-collapsible="accordion">
       @foreach($department as $list)
        <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{ $list->departmentname }}</div>
          <div class="collapsible-body">
            <ul>
              @foreach($records as $record)
                @if($list->id == $record->departmentid)
                <li>{{ $record->positionname }}</li>
                @endif
              @endforeach
            </ul>
          </div>
       </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
<script src="js/department.js"></script>
@stop