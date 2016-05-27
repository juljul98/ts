$(document).ready(function(){
//  ../images relative
//  /images   absolute  

  
  $('#modal').leanModal();
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
  $('.regEmp').click(function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        dataType: 'json',
        url : base_url + 'admin/getEmployee',
        data : {},
        success : function(data) {
     
       var data = data.data;
          var loops = data.length;
          console.log(data)

          var html = '';
          for (x = 0; x < loops; x++) {
            html += '<tr>';
            html += '<td>' + data[x].fullname + '</td>';
            html += '<td>' + moment(data[x].created_at).format('MMMM Do YYYY, h:mm:ss a') + '</td>';
            html += '<tr>';
          }
          $('.displayRecord').html(html);
        }
      });
  });
 
});