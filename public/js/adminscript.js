$(document).ready(function(){
  
    function getNotification () {
    $.ajax({
      type : 'post',
      url  : base_url + 'admin/getNotification',
      data : {},
      success : function(response){
          if (response == 0) {
             $('.notification-badge, .new.badge').hide();
          } else {
            
            $('.notification-badge, .new.badge').text(response).show();
          }
        
        setTimeout(function(){
          getNotification();
        }, 1000);
      }
    })
  }
  getNotification();
    $('.notifButton').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $('.dropdown-content').toggleClass('active');
    });
});