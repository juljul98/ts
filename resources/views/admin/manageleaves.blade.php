@extends('layouts.admin')
@section('content')

<script>
    $('.sideNav li:nth-child(3)').addClass('active').siblings().removeClass('active');
</script>
<section id="content">
  <div id="breadcrumbs-wrapper" class="mb40">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 class="breadcrumbs-title">{{ $breadcrumbs }}</h5>
          <ol class="breadcrumbs">
            <li><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="active">{{ $breadcrumbs }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
   <div class="loaderBlk">
    <div class="spinnerLoader">
        <img src="images/loading.gif" alt="">
    </div>
   </div>
   <div class="row">
     <div class="input-field col l4 mb40">
       <input placeholder="Fullname or Employee Number" id="first_name" type="text" class="validate searchFrm">
       <label for="first_name">Search</label>
     </div>
   </div>

    <table class="responsive-table display employeeTable" cellspacing="0">
      <thead>
        <tr>
          <th>FullName</th>
          <th>Position</th>
          <th>Department</th>
          <th>Leave Type</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="loadRecord" data-next-page="">
         @foreach( $employees as $list)
         <tr>
           <td>{{ $list->fullname }}</td>
           <td>{{ $list->position }}</td>
           <td>{{ $list->department }}</td>
           <td>{{ $list->title }}</td>
           <td>
             <div class="switch">
               <label data-id="{{ $list->keyenc }}">
                 Pending
                 <input type="checkbox" class="chckBx" {{ ( $list->status == 1) ? 'checked' : '' }}>
                 <span class="lever"></span>
                 Approved
               </label>
             </div>
           </td>

         </tr>
            
         @endforeach
      
      </tbody>
    </table>

  </div>
</section>
<script src="js/manageLeave.js"></script>
@stop