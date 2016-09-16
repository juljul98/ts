@extends('layouts.admin')
@section('content')
<script>
  $('.sideNav li:nth-child(1)').addClass('active').siblings().removeClass('active');
</script>
@stop