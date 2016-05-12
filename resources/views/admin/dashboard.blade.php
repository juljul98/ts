@extends('layouts.admin')
@section('content')
<section id="content">

  <!--start container-->
  <div class="container">
    Welcome<h1> {{ (Auth::user()->fullname )}}</h1>
  </div>
   
    <!--end container-->
    </section>

@stop