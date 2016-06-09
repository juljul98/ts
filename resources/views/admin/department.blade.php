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
    <div class="col s12 m12 l6">
      <div class="card-panel">
        <div class="row">
          <form class="col s12">
            <h4 class="header2">Add Department</h4>
            <div class="row">
              <div class="input-field col s4 l8">
                <i class="mdi-action-account-circle prefix"></i>
                <input placeholder="Type Here" id="icon_prefix2" class="validate" type="text">
                <label class="active" for="icon_prefix">Department Name</label>
              </div>
              <div class="input-field col s4">
                <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="material-icons">add_circle_outline</i><span class="addLbl">&nbsp;Add</span></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <a class="btn-floating btn-large positionBtn">
        <i class="material-icons">add</i>
      </a>
      <div class="row card-panel positionPanel">
        <form class="col s12">
          <h4 class="header2">Add Position</h4>
          <div class="row">
            <div class="input-field col s4 l6">
              <input placeholder="Position Name" id="icon_prefix2" class="validate" type="text">
              <label class="active" for="icon_prefix">Position Name</label>
            </div>
            <div class="input-field col s4 l6">
            <select name="userlevel" id="userlevel">
            @foreach($role as $list)
              <option value="{{ $list->id }}">{{ $list->name }}</option>
            @endforeach
            </select>
            <label for="userlevel" class="drpDown">Permission Level</label>
            </div>
            <p class="positionNote">Note: walasak</p>
            <div class="input-field col s4 l7">
              <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="material-icons">add_circle_outline</i><span class="addLbl">&nbsp;Add</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="js/department.js"></script>
@stop