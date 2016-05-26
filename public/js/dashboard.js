$(document).ready(function(){
//  ../images relative
//  /images   absolute  
  $('#modal1').leanModal();
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