var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
users = [];
connections = [];

server.listen(8890);

  console.log('running');
  
  io.sockets.on('connection', function(socket){
     connections.push(socket);
     console.log('connected: %s sockets connected', connections.length);
      
     // Disconnect
      socket.on('disconnect', function(data){
        connections.splice(connections.indexOf(socket), 1);
        console.log('disconnected: %s sockets connected', connections.length);
      });
    
      // Send message
      socket.on('send message', function(data) {
         io.sockets.emit('new message', {msg:data});
      });

  });