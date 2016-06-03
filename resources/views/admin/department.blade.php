@extends('layouts.admin')
@section('content')
<script>
  $(".collapsible-header").addClass("active");
  $(".collapsible").collapsible({accordion: false});
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
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <form class="col s12">
            <h4 class="header2">Inline form with placeholder</h4>
            <div class="row">
              <div class="input-field col s4">
                <i class="mdi-action-account-circle prefix"></i>
                <input placeholder="John Doe" id="icon_prefix2" class="validate" type="text">
                <label class="active" for="icon_prefix">First Name</label>
              </div>
              <div class="input-field col s4">
                <i class="mdi-communication-email prefix"></i>
                <input placeholder="john@mydomain.com" id="icon_email" class="validate" type="email">
                <label class="active" for="icon_email">Email</label>
              </div>
              <div class="input-field col s4">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="mdi-action-perm-identity"></i> Register</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@stop