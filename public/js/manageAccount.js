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
    
    // Pagination
    $('.countpager:first').addClass('active');
    $('.prev a').click(function(e){
        $('.countpager.active').prev().addClass('active').siblings().removeClass('active');
    });
    $('.next a').click(function(e){
        $('.countpager.active').next().addClass('active').siblings().removeClass('active');
    });
    
    $('.countpager a').click(function(e){
       e.preventDefault();
        $(this).parent().addClass('active').siblings().removeClass('active');
    });

    $('body').on('click', '.pagination a', function(e){
        e.preventDefault();
 
        var nextpage = $('.loadRecord').data('next-page');
        var url = $(this).attr('href');
        if (nextpage != null) {
             $('.spinnerLoader img').show();
                $.get(url, function(data){
                      var nextpage = data.next_page;
                      var prevpage = data.prev_page;
                      var dataEmp = data.employees.data;
                      var loops = dataEmp.length;
                      var html = '';
                      
                      for (x = 0; x < loops; x++) {
                        html += '<tr>';
                        html += '<td>' + dataEmp[x].fullname + '</td>';
                        html += '<td>' + dataEmp[x].email + '</td>';
                        html += '<td>' + dataEmp[x].position + '</td>';
                        html += '<td>' + dataEmp[x].department + '</td>';
                        html += '<td>';
                        html += '<div class="switch">';
                        html += '<label data-id="' + dataEmp[x].id + '">';
                        html += 'Off';
                        html += '<input type="checkbox" class="chckBx"';
                        html += (dataEmp[x].active == 1 ) ? 'checked' : '';
                        html += '>';
                        html += '<span class="lever"></span>';
                        html += 'On';
                        html += '</label>';
                        html += '</div>';
                        html += '</td>';
                        html += '</tr>';
                      }
            
                    $('.loadRecord').html(html);
                   $('.spinnerLoader img').hide();
                      $('.next a').attr('href', nextpage);
                      $('.prev a').attr('href', prevpage);
            
            
                      if (data.next_page == null) {
                        $('.spinnerLoader img').hide();
                          $('.next').removeClass('active').addClass('disabled');
                      } else {
                          $('.next').removeClass('disabled');
                      }
                        if(data.prev_page == null) {
                          $('.prev').addClass('disabled');
                        }  else {
                          $('.prev').removeClass('disabled');
                      }

                });
            }
           
    });
    
});