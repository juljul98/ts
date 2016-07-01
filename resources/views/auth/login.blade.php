@extends('layouts.app')

@section('content')
<style>
  .nav li:nth-child(1) a {
    border-bottom: 2px solid #e74c3c;
  }
</style>

<div class="row" id="login">
  <div class="col l4 s10 offset-l4 offset-s1">
    <!-- Login -->
    <div class="collection with-header"  id="task-card">
      <div class="collection-header teal">
        <h5 class="task-card-title fntWhite center">Login</h5>
      </div>
      <form class="form-horizontal frmLogin" role="form" method="POST" action="{{ url('/auth') }}">
        {!! csrf_field() !!}
        <div class="row">
          <div class="input-field col l10 s10 offset-l1 offset-s1">
            <input id="username" type="text" class="validate username" name="username">
            
            <label for="username">Username/Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l10 s10 offset-l1 offset-s1">
            <input id="password" type="password" class="validate password" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <p class="col l8 offset-l1 offset-s1">
            <input type="checkbox" id="test6" name="remember" />
            <label for="test6">Remember Me</label>
          </p>
        </div>
        <div class="row">
          <div class="col l8 offset-l1 offset-s1">
            <button type="submit" class="waves-effect waves-light btn teal">
              <i class="material-icons">lock_open</i>&nbsp;&nbsp;&nbsp;<span style="vertical-align: top;">Login</span>
            </button>
          </div>
        </div>
      </form>
      <li class="divider"></li>
      <div class="row">
        <div class="col l6">
          <a class="waves-effect waves-teal btn-flat activator grey-text text-darken-4 fnt10" href="{{ url('password/reset') }}">Forgot Your Password?</a>
        </div>
        <div class="" style="float: right;">
          <a class="waves-effect waves-teal btn-flat activator grey-text text-darken-4 fnt10" href="{{ url('/register') }}">Register</a>
        </div>
      </div>
      <!-- / Login end -->
    </div>
    @if (session('message'))
    <div id="card-alert" class="card red loginError">
      <div class="card-content white-text">
        <p><i class="mdi-alert-error"></i> {{ session('message') }} </p>
      </div>
      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    @endif
    <div id="card-alert" class="card red loginError" style="display:none;">
      <div class="card-content white-text">
        <p><i class="mdi-alert-error"></i> {{ session('message') }} </p>
      </div>
      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>

    
  </div>
</div>
@endsection