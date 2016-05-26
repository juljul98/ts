@extends('layouts.admin')
@section('content')
<section id="content">

  <div class="container">
    <h1>Welcome!</h1>

    <div id="card-stats">
      <div class="row">
        <div class="col s12 m6 l3 offset-l1">
         
          <div class="card">
            <a href="" data-target="modal1" class="modal-trigger regEmp">
            <div class="card-content  green white-text">
              <p class="card-stats-title"><i class="mdi-social-group-add"></i> Registered Employee</p>
              <h4 class="card-stats-number registeredEmp"></h4>
              </p>
            </div>
            <div class="card-action  green darken-2"></div>
            </a>
          </div>
         
        </div>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content pink lighten-1 white-text">
              <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Pending Accounts</p>
              <h4 class="card-stats-number pendingEmp"></h4>
              </p>
            </div>
            <div class="card-action  pink darken-2">
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content blue-grey white-text">
              <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Attendance Today</p>
              <h4 class="card-stats-number">1</h4>
              </p>
            </div>
            <div class="card-action blue-grey darken-2">
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <table class="striped">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Date Registered</th>
        </tr>
      </thead>
      <tbody>
    
  
    
      </tbody>
    </table>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"></a>
  </div>
</div>
    
  </div>
    </section>
<script src="js/dashboard.js"></script>
@stop