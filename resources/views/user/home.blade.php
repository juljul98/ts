@extends('layouts.admin')
@section('content')
<center>
<h1>This is Home Page</h1>
<form action="" method="post">
  {!! csrf_field() !!}
  <input type="text" name="fullname" value="{{ Input::old('fullname') }}">
</form>
</center>
@stop