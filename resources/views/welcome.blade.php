@extends('layouts.app')
@section('content')
<div class="container lpBlock" ng-controller="sliderapplication">
  <div class="slideCover">
  </div>
  <div class="slide" ng-repeat="image in images" ng-show="image.visible" ng-hide="hidden">
    <img src="@{{image.src}}" alt="">
  </div>
  <div class="lpTxtBlk">
    <p class="mainTxt col-md-8 col-md-offset-2">Interested in seeing what this <span>Tracking System</span> can do for You ?</p>
    <p class="subTxt col-md-10 col-md-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque illo et, accusantium maxime veniam, possimus laboriosam temporibus quaerat quod enim ex eius impedit dicta reiciendis quibusdam, doloribus quae cum, eum.</p>
  </div>
</div>
@endsection