@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="js/plugins/data-tables/css/jquery.dataTables.min.css">
<script>
    $('.sideNav li:nth-child(2)').addClass('active').siblings().removeClass('active');
</script>
<section id="content">
  <div id="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 class="breadcrumbs-title">Manage Account</h5>
          <ol class="breadcrumbs">
            <li><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="active">Manage Account</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <table id="data-table" class="responsive-table display" cellspacing="0">
      <thead>
        <tr>
         <th></th>
          <th>FullName</th>
          <th>Email</th>
          <th>Position</th>
          <th>Department</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="loadRecord">
         @foreach( $users as $list)
         <tr>
          <td></td>
           <td>{{ $list->fullname }}</td>
           <td>{{ $list->email }}</td>
           <td>{{ $list->position }}</td>
           <td>{{ $list->department }}</td>
           <td>
             <div class="switch">
               <label data-id="{{ $list->id }}">
                 Off
                 <input type="checkbox" class="chckBx" {{ ( $list->active == 1) ? 'checked' : '' }}>
                 <span class="lever"></span>
                 On
               </label>
             </div>
           </td>
         </tr>
         @endforeach
      </tbody>
    </table>
  </div>
</section>
<script src="js/manageAccount.js"></script>
@stop