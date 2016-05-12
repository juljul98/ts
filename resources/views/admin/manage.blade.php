@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="js/plugins/data-tables/css/jquery.dataTables.min.css">

<section id="content">
  <div class="container" id="table-datatables">
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
       <tbody>
        @foreach( $users as $list)
         <tr>
            <td>{{ $list->fullname }}</td>
            <td>{{ $list->email }}</td>
            <td>{{ $list->position }}</td>
            <td>{{ $list->department }}</td>
            <td>
              <div class="switch">
                <label>
                  Off
                  <input type="checkbox">
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




@stop