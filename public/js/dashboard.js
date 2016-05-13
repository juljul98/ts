$(document).ready(function(){
//  ../images relative
//  /images   absolute

  var base_url = 'http://localhost:8000/';
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  function registeredEmployee () {
    $.ajax({
      type : 'post',
      url  : base_url + 'admin/getRegisteredEmployee',
      data : {},
      success : function(response){
        $('.registeredEmp').text(response);
        setTimeout(function(){
          registeredEmployee();
        }, 1000);
      }
    })
  }
  registeredEmployee();
  function getPendingEmployee () {
    $.ajax({
      type : 'post',
      url  : base_url + 'admin/getPendingEmployee',
      data : {},
      success : function(response){
        $('.pendingEmp').text(response);
        setTimeout(function(){
          getPendingEmployee();
        }, 1000);
      }
    })
  }
  getPendingEmployee();
  
  
});