@extends('layouts.admin')
@section('content')
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
<h1>Online Users</h1> 
<div style="width: 50%; margin: 0 auto;">
  <ul class="list" id="user" style="float:left;"></ul>
  <form id="messageForm" style="float:right;">

    <textarea name="" id="message" cols="30" rows="10"></textarea>
    <input type="submit">
  </form>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2" >
      <div id="messages" ></div>
    </div>
  </div>
</div>


<script>
  var socket = io.connect('http://localhost:8890');
  var $messageform  = $('#messageForm');
  var $message = $('#message');
  var $chat = $('#chat');
  $messageform.submit(function(e){
    e.preventDefault();
    socket.emit('send message', $message.val());
    $message.val('');
  });

  socket.on('new message', function (data) {
    console.log(data);
    $( "#messages" ).append( "<p>"+data.msg+"</p>" );
  });
</script>
@stop