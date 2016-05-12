@extends('layouts.app')
@section('content')
<div class="container" id="registerframe">
  <div class="row">

    <div class="col l6 s10 offset-l3 offset-s1 collection with-header"  id="task-card">
        {!! Form::open (array('url' => '/register/savaData', 'method' => 'POST', 'class' => 'form-horizontal frmRegistration', 'role' => 'form')) !!}
        <!--                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">-->
        {!! csrf_field() !!}
      <div class="collection-header teal">
        <h5 class="task-card-title fntWhite center">Registration</h5>
      </div>
         <div class="collection-item">
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate" name="empno">
               <label class="empLbl">Employee Number</label>
               <p class="error empError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate" name="username">
               <label for="username">Username</label>
               <p class="error unameError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="text" class="validate" name="fullname">
               <label for="username">Fullname</label>
               <p class="error fullnameError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <input type="email" class="validate" name="email">
               <label for="email">E-Mail Address</label>
               <p class="error emailError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               {!! Form::password('password', array('class' => 'validate')) !!}
               <label for="password">Password</label>
               <p class="error passwordError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               {!! Form::password('password_confirmation', array('class' => 'validate' )) !!}
               <label for="password_confirmation">Confirm Password</label>
               <p class="error passConfirmError"></p>
             </div>
           </div>

           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               {!! Form::select('gender', array('male' => 'Male', 'female' => 'Female'), null)!!}
               <label>Gender</label>
               <p class="error genderError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               {!! Form::select('department', array('Web Integration' => 'Web Integration', 'E-Commerce' => 'E-Commerce', 'Callcenter' => 'Callcenter', 'HR' => 'HR'), null)!!}
               <label>Department</label>
               <p class="error departmentError"></p>
             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               {!! Form::select('position', array('Manager' => 'Manager', 'Team Lead' => 'Team Lead', 'Associate' => 'Associate', 'HR' => 'HR', 'Guard' => 'Guard'), null )!!}
               <label>Position</label>
               <p class="error positionError"></p>

             </div>
           </div>
           <div class="row">
             <div class="input-field col l8 s10 offset-l2 offset-s1">
               <button type="submit" class="waves-effect waves-light btn teal">
                 <i class="material-icons">people</i>&nbsp;&nbsp;&nbsp;<span style="vertical-align: top;">Login</span>
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
