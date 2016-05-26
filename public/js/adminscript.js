$(document).ready(function(){
    $('.notifButton').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $('.dropdown-content').toggleClass('active');
    });
  $('.regEmp').click(function(e){
    e.preventDefault();
    $.ajax({
      type: 'post',
   dataType: 'json',
      url : base_url + 'admin/getEmployee',
      data : {},
      success : function(data) {
        var loops = data.length;
        for (x = 0; x < loops; x++) {
          console.log(data[x].fullname);
        }
      }
      
      
    });
    
  });

});