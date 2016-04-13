@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @foreach($employee as $names)
                      <h1>{{ $names->name }}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
