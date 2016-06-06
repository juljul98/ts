@extends('layouts.admin')
@section('content')

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
   <div class="loaderBlk">
    <div class="spinnerLoader">
        <img src="images/loading.gif" alt="">
    </div>
   </div>
    <table id="data-table" class="responsive-table display" cellspacing="0">
      <thead>
        <tr>
          <th>FullName</th>
          <th>Email</th>
          <th>Position</th>
          <th>Department</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="loadRecord" data-next-page="{{ $employees->nextPageUrl() }}">
         @foreach( $employees as $list)
         <tr>
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
 <div>
    
        @if ($employees->lastPage() > 1)
          <ul class="pagination">
            <li class="prev disabled">
              <a href="">Prev</a>
            </li>
            @for ($i = 1; $i <= $employees->lastPage(); $i++)
            <li class="countpager">
              <a href="{{ $employees->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="next">
              <a href="{{ $employees->nextPageUrl() }}">Next</a>
            </li>

            </ul>
        @endif

 </div>
  </div>
</section>
<script src="js/manageAccount.js"></script>
@stop