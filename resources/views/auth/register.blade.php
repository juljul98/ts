@extends('layouts.app')
@section('content')
<div class="container" id="registerframe">
  <div class="row">

    <div class="col l6 s10 offset-l3 offset-s1 collection with-header"  id="task-card">
      <form class="form-horizontal frmRegistration" role="form" method="POST" action="{{ url('/register/savaData') }}">
        {{ csrf_field() }}
      <div class="collection-header teal">
        <h5 class="task-card-title fntWhite center">Registration</h5>
      </div>
         <div class="collection-item">
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate empno" name="empno">
               <label class="empLbl">Employee Number</label>
               <p class="error empError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate username" name="username">
               <label for="username">Username</label>
               <p class="error unameError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate fullname" name="fullname">
               <label for="username">Fullname</label>
               <p class="error fullnameError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="email" class="validate email" name="email">
               <label for="email">E-Mail Address</label>
               <p class="error emailError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
              <input type="password" name="password" id="password" class="validate password">
               <label for="password">Password</label>
               <p class="error passwordError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
              <input type="password" name="password_confirmation" id="password_confirmation" class="validate password_confirmation">
               <label for="password_confirmation">Confirm Password</label>
               <p class="error passConfirmError"></p>
             </div>
           </div>

           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
              <select name="gender" id="gender">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
                <label class="drpDown" for="gender">Gender</label>
               <p class="error genderError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
              <select name="department" id="department" class="department">
                <option value=""></option>
                @foreach($department as $list)
                <option value="{{ $list->departmentname }}" data-key="{{ $list->keyenc }}">{{ $list->departmentname }}</option>
                @endforeach
               </select>
               <label class="drpDown" for="department">Department</label>
               <p class="error departmentError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
              <select name="position" class="position" id="position">
                <option value=""></option>
                <option value="2">Manager</option>
                <option value="2">Team Lead</option>
                <option value="3">Associate</option>
                <option value="1">HR</option>
                <option value="3">Guard</option>
              </select>
               <label class="drpDown" for="position">Position</label>
               <p class="error positionError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <button type="submit" class="waves-effect waves-light btn teal">
                 <i class="material-icons">people</i>&nbsp;&nbsp;&nbsp;<span style="vertical-align: top;">Register</span>
               </button>
             </div>
           </div>
           <div class="row">
             <p class="margin center medium-small sign-up">Already have an account? <a href="{{ url('/login') }}">Login</a></p>
           </div>
         </div>
        {{ Form::close() }}
    </div>
  </div>
  <div id="card-alert" class="card green approval">
    <div class="card-content white-text">
      <p>Wait for the Approval of the Admin of this Site</p>
    </div>
    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
</div>
@stop
