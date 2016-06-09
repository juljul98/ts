$(document).ready(function(){
    
  $('.positionBtn').click(function(e){
    $('.positionPanel').find('input, select').val('');
    e.preventDefault();
      $('.positionPanel').slideToggle(1).toggleClass('active');
    if( $('.positionPanel').hasClass('active') ) {
      $(this).find('i').text('close');
    } else  {
      $('.positionPanel').find('input, select').val('');
      $(this).find('i').text('add');
    }
  });
  $('#userlevel').change(function(){
    var id  = $(this).val();
    
    $.ajax({
      type: 'get',
      url: base_url + 'department/getRole',
      data: { "trigger": id },
      success: function(response){
        $('.positionNote').text('Note: ' + response.description);
      }
    });
    
    
  });
  
});