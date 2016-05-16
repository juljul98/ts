$(document).ready(function(){
  
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
});