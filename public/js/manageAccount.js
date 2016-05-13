$(document).ready(function(){
  
  
  var base_url = 'http://localhost:8000/',
      userID;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.chckBx').on( "click", function(){
    var userID = $(this).parent().data('id');
    if ( $(this).is(':checked') ) {
      setActive(userID);
    } else {
      setInActive(userID);
    }
  });
  
    function setActive(userID) {
      var active = 1;
      $.ajax({
        type  : 'post',
        url   : base_url + 'manageaccount/updateActive/' + userID,
        data  : { "checked": active }
      });
    }
    function setInActive(userID) {
    
      var inactive = 0;
      $.ajax({
        type  : 'post',
        url   : base_url + 'manageaccount/updateActive/' + userID,
        data  : { "checked": inactive }
      });
    }

  
  

  
//  function getRecord() {
//    
//    $.ajax({
//      type  : 'post',
//      url   : base_url + '/manageaccount/getRecord',
//      data  : {},
//      success : function(response){
//        
//        var recordCount = response.length;
//        var html = "";
//        for (x = 0; x < recordCount; x++) {
//          html += "<tr>";
//            html += "<td>" +response[x].fullname + "</td>";
//            html += "<td>" +response[x].email + "</td>";
//            html += "<td>" +response[x].department + "</td>";
//            html += "<td>" +response[x].position + "</td>";
//            html += " <td><div class=\"switch\"><label>Off<input type=\"checkbox\"><span class=\"lever\"></span>On</label></div></td>";
//          html += "<tr>";
//        }
//        $('.loadRecord').html(html);
//
//        
//      }
//    });
//  }
//  getRecord();
  

  
  
  
});